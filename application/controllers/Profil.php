<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Galeri_model');
		$this->load->model('Agenda_model');
	}
	
	public function index()
	{
		$data['menuAktif'] = 2;
		$data['agenda_dataFoot'] = $this->Agenda_model->get_dataLimit();
		$this->load->view('frontend/v_profil', $data);
	}
}
