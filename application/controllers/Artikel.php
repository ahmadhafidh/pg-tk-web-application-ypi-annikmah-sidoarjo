<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Agenda_model');
		$this->load->model('Artikel_model');
		$this->load->model('Kategori_model');
	}
	
	public function index()
	{
		$data['menuAktif'] = 4;
		$data['agenda_dataFoot'] = $this->Agenda_model->get_dataLimit();
		$data['dataRandom'] = $this->Artikel_model->get_all_random();
		$data['dataKategori'] = $this->Kategori_model->get_all();
		if(isset($_GET['detail'])) {
			$data['data_detail'] = $this->Artikel_model->get_id($_GET['detail']);
			$data['status'] = 'artikel/';
			$this->load->view('frontend/v_detail', $data);
		}else{
			$data_perHalaman  = 6;
			$data['halaman_sekarang'] = 1;
			if(isset($_GET['cari'])) {
				$data['total_data'] = $this->Artikel_model->get_pencarian_row($_GET['cari']);
				if(isset($_GET['page'])) {
					$data['halaman_sekarang'] = $_GET['page'];
					//$halaman_sekarang = ($halaman_sekarang > 1) ? $halaman_sekarang : 1;
				}
				$data['total_halaman']  = ceil($data['total_data'] / $data_perHalaman);
				$data['awal'] = ($data['halaman_sekarang'] - 1) * $data_perHalaman;
				$data['artikel_data'] = $this->Artikel_model->get_pencarian($_GET['cari'], $data_perHalaman, $data['awal']);
			}else if(isset($_GET['kategori'])) {
				$data['total_data'] = $this->Artikel_model->get_kategori_row($_GET['kategori']);
				if(isset($_GET['page'])) {
					$data['halaman_sekarang'] = $_GET['page'];
					//$halaman_sekarang = ($halaman_sekarang > 1) ? $halaman_sekarang : 1;
				}
				$data['total_halaman']  = ceil($data['total_data'] / $data_perHalaman);
				$data['awal'] = ($data['halaman_sekarang'] - 1) * $data_perHalaman;
				$data['artikel_data'] = $this->Artikel_model->get_kategori($_GET['kategori'], $data_perHalaman, $data['awal']);
			}else{
				$data['total_data'] = $this->Artikel_model->total_rows();
				if(isset($_GET['page'])) {
					$data['halaman_sekarang'] = $_GET['page'];
					//$halaman_sekarang = ($halaman_sekarang > 1) ? $halaman_sekarang : 1;
				}
				$data['total_halaman']  = ceil($data['total_data'] / $data_perHalaman);
				$data['awal'] = ($data['halaman_sekarang'] - 1) * $data_perHalaman;
				$data['artikel_data'] = $this->Artikel_model->get_DataHalaman($data_perHalaman, $data['awal']);
			}
			
			$this->load->view('frontend/v_artikel', $data);
		}
	}
}
