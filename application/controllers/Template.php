<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('auth');
		}
		$this->load->model('Template_model');
		$db2 = $this->load->database('default', TRUE);
	}

	public function dataTemplate($id_form, $field)
	{
		echo json_encode($this->Template_model->dataTemplate($id_form, $field));
	}
	public function saveTemp($id_form, $field)
	{
		echo json_encode($this->Template_model->saveTemp($id_form, $field));
	}
	public function hapusTemp($id)
	{
		echo json_encode($this->Template_model->hapusTemp($id));
	}

	// RINGKASAN PULANG
	public function dataTemplateRK()
	{
		echo json_encode($this->Template_model->dataTemplateRK());
	}
	public function saveTempRK()
	{
		echo json_encode($this->Template_model->saveTempRK());
	}
	public function hapusTempRK($id)
	{
		echo json_encode($this->Template_model->hapusTempRK($id));
	}
}
