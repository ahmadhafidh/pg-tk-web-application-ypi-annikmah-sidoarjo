<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeri extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Galeri_model');
    // $this->load->model('Kategori_model');

    $this->data['module'] = 'Galeri';    

    /* cek login */
    if (!$this->ion_auth->logged_in()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
    elseif($this->ion_auth->is_user()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
  }

  public function index()
  {
    $this->data['title'] = "Data Galeri";
    
    $this->data['galeri_data'] = $this->Galeri_model->get_all();
    $this->load->view('back/galeri/galeri_list', $this->data);
  }

  public function create() 
  {
    $this->data['title']          = 'Tambah Galeri Baru';
    $this->data['action']         = site_url('admin/galeri/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_galeri'] = array(
      'name'  => 'id_galeri',
      'id'    => 'id_galeri',
      'type'  => 'hidden',
    );

    $this->data['judul'] = array(
      'name'  => 'judul',
      'id'    => 'judul',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul'),
    );
    
    $this->load->view('back/galeri/galeri_add', $this->data);
  }
  
  public function create_action() 
  {
    $this->load->helper('judul_seo_helper');
    $this->_rules();

    if ($this->form_validation->run() == FALSE) 
    {
      $this->create();
    } 
      else 
      {
        /* Jika file upload tidak kosong*/
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        if ($_FILES['userfile']['error'] <> 4) 
        {
          $nmfile = judul_seo($this->input->post('judul'));

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/galeri/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '2000'; //pixels
          $config['max_height']       = '2000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload())
          {   //file gagal diupload -> kembali ke form tambah
            $this->create();
          } 
            //file berhasil diupload -> lanjutkan ke query INSERT
            else 
            { 
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name']; 
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2'; 
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/galeri/'.$userfile['file_name'].''; 
              // membuat thumbnail
              $config['create_thumb']   = TRUE;               
              // rasio resolusi
              $config['maintain_ratio'] = FALSE; 
              // lebar
              $config['width']          = 600; 
              // tinggi
              $config['height']         = 450; 

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul'  => $this->input->post('judul'),
                'userfile'      => $nmfile,
                'userfile_type' => $userfile['file_ext'],
                'userfile_size' => $userfile['file_size']
              );

              // eksekusi query INSERT
              $this->Galeri_model->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', 'Data berhasil dibuat');
              redirect(site_url('admin/galeri'));
            }
        }
        else // Jika file upload kosong
        {
          $data = array(
            'judul'  => $this->input->post('judul'),
            // 'uploader'      => $this->session->userdata('identity')
          );

          // eksekusi query INSERT
          $this->Galeri_model->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', 'Data berhasil dibuat');
          redirect(site_url('admin/galeri'));
        }
      }  
  }
  
  public function update($id) 
  {
    $row = $this->Galeri_model->get_by_id($id);
    $this->data['galeri'] = $this->Galeri_model->get_by_id($id);

    if ($row) 
    {
      $this->data['title']          = 'Update Galeri';
      $this->data['action']         = site_url('admin/galeri/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_galeri'] = array(
        'name'  => 'id_galeri',
        'id'    => 'id_galeri',
        'type'=> 'hidden',
      );

      $this->data['judul'] = array(
        'name'  => 'judul',
        'id'    => 'judul',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/galeri/galeri_edit', $this->data);
    } 
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/galeri'));
      }
  }
  
  public function update_action() 
  {
    $this->load->helper('judul_seo_helper');
    $this->_rules();

    if ($this->form_validation->run() == FALSE) 
    {
      $this->update($this->input->post('id_galeri'));
    } 
      else 
      {
        $nmfile = judul_seo($this->input->post('judul'));
        $id['id_galeri'] = $this->input->post('id_galeri'); 
        
        /* Jika file upload diisi */
        if ($_FILES['userfile']['error'] <> 4) 
        {
          // select column yang akan dihapus (gambar) berdasarkan id
          $this->db->select("userfile, userfile_type");
          $this->db->where($id);
          $query = $this->db->get('galeri');
          $row = $query->row();        

          // menyimpan lokasi gambar dalam variable
          $dir = "assets/images/galeri/".$row->userfile.$row->userfile_type;
          $dir_thumb = "assets/images/galeri/".$row->userfile.'_thumb'.$row->userfile_type;

          // Jika ada foto lama, maka hapus foto kemudian upload yang baru
          if($dir)
          {
            $nmfile = $this->input->post('judul');
            
            // Hapus foto
            unlink($dir);
            unlink($dir_thumb);

            //load uploading file library
            $config['upload_path']      = './assets/images/galeri/';
            $config['allowed_types']    = 'jpg|jpeg|png|gif';
            $config['max_size']         = '2048'; // 2 MB
            $config['max_width']        = '2000'; //pixels
            $config['max_height']       = '2000'; //pixels
            $config['file_name']        = $nmfile; //nama yang terupload nantinya

            $this->load->library('upload', $config);
            
            // Jika file gagal diupload -> kembali ke form update
            if (!$this->upload->do_upload())
            {   
              $this->update();
            } 
              // Jika file berhasil diupload -> lanjutkan ke query INSERT
              else 
              { 
                $userfile = $this->upload->data();
                // library yang disediakan codeigniter
                $thumbnail                = $config['file_name']; 
                //nama yang terupload nantinya
                $config['image_library']  = 'gd2'; 
                // gambar yang akan dibuat thumbnail
                $config['source_image']   = './assets/images/galeri/'.$userfile['file_name'].''; 
                // membuat thumbnail
                $config['create_thumb']   = TRUE;               
                // rasio resolusi
                $config['maintain_ratio'] = FALSE; 
                // lebar
                $config['width']          = 400; 
                // tinggi
                $config['height']         = 200; 

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                  'judul'  => $this->input->post('judul'),
                  'userfile'      => $nmfile,
                  'userfile_type' => $userfile['file_ext'],
                  'userfile_size' => $userfile['file_size']
                );

                $this->Galeri_model->update($this->input->post('id_galeri'), $data);
                $this->session->set_flashdata('message', 'Edit Data Berhasil');
                redirect(site_url('admin/galeri'));
              }
          }
            // Jika tidak ada foto pada record, maka upload foto baru
            else
            {
              //load uploading file library
              $config['upload_path']      = './assets/images/galeri/';
              $config['allowed_types']    = 'jpg|jpeg|png|gif';
              $config['max_size']         = '2048'; // 2 MB
              $config['max_width']        = '2000'; //pixels
              $config['max_height']       = '2000'; //pixels
              $config['file_name']        = $nmfile; //nama yang terupload nantinya

              $this->load->library('upload', $config);
              
              // Jika file gagal diupload -> kembali ke form update
              if (!$this->upload->do_upload())
              {   
                $this->update();
              } 
                // Jika file berhasil diupload -> lanjutkan ke query INSERT
                else 
                { 
                  $userfile = $this->upload->data();
                  // library yang disediakan codeigniter
                  $thumbnail                = $config['file_name']; 
                  //nama yang terupload nantinya
                  $config['image_library']  = 'gd2'; 
                  // gambar yang akan dibuat thumbnail
                  $config['source_image']   = './assets/images/galeri/'.$userfile['file_name'].''; 
                  // membuat thumbnail
                  $config['create_thumb']   = TRUE;               
                  // rasio resolusi
                  $config['maintain_ratio'] = FALSE; 
                  // lebar
                  $config['width']          = 400; 
                  // tinggi
                  $config['height']         = 200; 

                  $this->load->library('image_lib', $config);
                  $this->image_lib->resize();

                  $data = array(
                    'judul'  => $this->input->post('judul'),
                    'userfile'      => $nmfile,
                    'userfile_type' => $userfile['file_ext'],
                    'userfile_size' => $userfile['file_size'],
                  );

                  $this->Galeri_model->update($this->input->post('id_galeri'), $data);
                  $this->session->set_flashdata('message', 'Edit Data Berhasil');
                  redirect(site_url('admin/galeri'));
                }
            }
        }
          // Jika file upload kosong
          else 
          {
            $data = array(
              'judul'  => $this->input->post('judul'),
            );

            $this->Galeri_model->update($this->input->post('id_galeri'), $data);
            $this->session->set_flashdata('message', 'Edit Data Berhasil');
            redirect(site_url('admin/galeri'));
          }
      }  
  }
  
  public function delete($id) 
  {
    $row = $this->Galeri_model->get_by_id($id);

    $this->db->select("userfile, userfile_type");
    $this->db->where($row);
    $query = $this->db->get('galeri');
    $row2 = $query->row();        

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/galeri/".$row2->userfile.$row2->userfile_type;
    $dir_thumb = "assets/images/galeri/".$row2->userfile.'_thumb'.$row2->userfile_type;

    // Jika data ditemukan, maka hapus foto dan record nya
    if ($row) 
    {
      // Hapus foto
      unlink($dir);
      unlink($dir_thumb);

      $this->Galeri_model->delete($id);
      $this->session->set_flashdata('message', 'Data berhasil dihapus');
      redirect(site_url('admin/galeri'));
    } 
      // Jika data tidak ada
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/galeri'));
      }
  }

  public function _rules() 
  {
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_galeri', 'id_galeri', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */