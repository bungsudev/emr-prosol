<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}

		//load model
		// $this->load->model('Dashboard_model');

		//define
		$this->controller = 'dashboard';
		$this->content = 'app/dashboard/page-dashboard';
		$this->title = 'Dashboard';
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$data['pasien'] = '1420';
		$data['antrian'] = '30';
		$data['konsul'] = '5';
		$data['selesai'] = '1385';
		$this->load->view('layout',$data);
	}

	public function chart_kunjungan()
	{
		echo json_encode($this->Dashboard_model->chart_kunjungan());
	}
}
