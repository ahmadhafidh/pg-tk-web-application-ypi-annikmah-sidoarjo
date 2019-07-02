<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Galeri_model');
		$this->load->model('Agenda_model');
	}
	
	public function index()
	{
		$data['total_data'] = $this->Galeri_model->total_rows();
		$data['agenda_dataFoot'] = $this->Agenda_model->get_dataLimit();
		$data['menuAktif'] = 6;
		$data_perHalaman  = 6;
		$data['halaman_sekarang'] = 1;
		if(isset($_GET['page'])) {
			$data['halaman_sekarang'] = $_GET['page'];
			//$halaman_sekarang = ($halaman_sekarang > 1) ? $halaman_sekarang : 1;
		}
		$data['total_halaman']  = ceil($data['total_data'] / $data_perHalaman);
		$data['awal'] = ($data['halaman_sekarang'] - 1) * $data_perHalaman;
		$data['galeri_data'] = $this->Galeri_model->get_DataHalaman($data_perHalaman, $data['awal']);
		$this->load->view('frontend/v_galeri', $data);
	}
}
