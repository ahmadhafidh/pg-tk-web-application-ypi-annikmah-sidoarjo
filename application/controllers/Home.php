<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Galeri_model');
		$this->load->model('Agenda_model');
	}
	
	public function index()
	{
		$data['galeri_data'] = $this->Galeri_model->get_all_random();
		$data['agenda_dataFoot'] = $this->Agenda_model->get_dataLimit();
		$data['menuAktif'] = 1;
		$this->load->view('frontend/v_home', $data);
	}
}
