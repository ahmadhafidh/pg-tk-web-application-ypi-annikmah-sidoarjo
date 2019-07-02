<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Artikel_model');
    $this->load->model('Kategori_model');

    $this->data['module'] = 'Artikel';    

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
    $this->data['title'] = "Data Artikel";
    
    $this->data['artikel_data'] = $this->Artikel_model->get_all();
    $this->load->view('back/artikel/artikel_list', $this->data);
  }

  public function create() 
  {
    $this->data['title']          = 'Tambah Artikel Baru';
    $this->data['action']         = site_url('admin/artikel/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_artikel'] = array(
      'name'  => 'id_artikel',
      'id'    => 'id_artikel',
      'type'  => 'hidden',
    );

    $this->data['judul_artikel'] = array(
      'name'  => 'judul_artikel',
      'id'    => 'judul_artikel',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_artikel'),
    );

    $this->data['isi_artikel'] = array(
      'name'  => 'isi_artikel',
      'id'    => 'isi_artikel',      
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('isi_artikel'),
    );

    $this->data['kategori'] = array(
      'name'  => 'kategori',
      'id'    => 'kategori',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kategori'),
    );

    $this->data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori(); 
    
    $this->load->view('back/artikel/artikel_add', $this->data);
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
      $data = array(
        'judul_artikel'  => $this->input->post('judul_artikel'),
        'isi_artikel'    => $this->input->post('isi_artikel'),
        'kategori'      => $this->input->post('kategori'),
        'uploader'      => $this->session->userdata('identity')
      );

              // eksekusi query INSERT
      $this->Artikel_model->insert($data);
              // set pesan data berhasil dibuat
      $this->session->set_flashdata('message', 'Data berhasil dibuat');
      redirect(site_url('admin/artikel'));
    }
  }

  public function update($id) 
  {
    $row = $this->Artikel_model->get_by_id($id);
    $this->data['artikel'] = $this->Artikel_model->get_by_id($id);

    if ($row) 
    {
      $this->data['title']          = 'Update Artikel';
      $this->data['action']         = site_url('admin/artikel/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

         $this->data['id_artikel'] = array(
          'name'  => 'id_artikel',
          'id'    => 'id_artikel',
          'type'=> 'hidden',
        );

        $this->data['judul_artikel'] = array(
          'name'  => 'judul_artikel',
          'id'    => 'judul_artikel',
          'type'  => 'text',
          'class' => 'form-control',
        );

        $this->data['isi_artikel'] = array(
          'name'  => 'isi_artikel',
          'id'    => 'isi_artikel',      
          'class' => 'form-control',
        );

        $this->data['kategori_css'] = array(
          'name'  => 'kategori',
          'id'    => 'kategori',
          'class' => 'form-control',
        );

      $this->data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori(); 

      $this->load->view('back/artikel/artikel_edit', $this->data);
    } 
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/artikel'));
      }
  }
  
    public function update_action() 
    {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) 
      {
        $this->update($this->input->post('id_artikel'));
      } 
      else 
      {
        $id['id_artikel'] = $this->input->post('id_artikel'); 

        $data = array(
          'judul_artikel'  => $this->input->post('judul_artikel'),
          'isi_artikel'    => $this->input->post('isi_artikel'),
          'kategori'      => $this->input->post('kategori'),
          'time_update'   => date('Y-m-d'),
          'updater'       => $this->session->userdata('identity')
        );

        $this->Artikel_model->update($this->input->post('id_artikel'), $data);
        $this->session->set_flashdata('message', 'Edit Data Berhasil');
        redirect(site_url('admin/artikel'));
      } 
    }

    public function delete($id) 
    {
      $row = $this->Artikel_model->get_by_id($id);
    
    if ($row) 
    {
      $this->Artikel_model->delete($id);
      $this->session->set_flashdata('message', 'Data berhasil dihapus');
      redirect(site_url('admin/artikel'));
    } 
      // Jika data tidak ada
      else 
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/artikel'));
      }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'trim|required');
      $this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'trim|required');

    // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_artikel', 'id_artikel', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }