<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resume_rj extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}

		// declare
		$this->load->model('Formulir_model');
		$this->load->model('Record_model');

		$this->endpoint = ENDPOINT;
		$this->label = 'components/parts/label';
	}

	public function index()
	{
		// database
		$db2 = $this->load->database('default', TRUE);
		$data['detail'] = api_detail_pasien($this->endpoint, $this->session->userdata('token'), $this->session->userdata('User_Code'), $this->input->get('Visit_No'));
		$data['link_print'] = base_url() .'resume_rj/print/'.encrypt_url($this->input->get('id')).'/'.$this->input->get('Visit_No');

		// template
		$data['title'] = 'Resume Medis Rawat jalan';
		$data['label'] = $this->label;
		$data['content'] = 'formulir/rsu-eshmun/rawat-inap/resume-medis-rj/page-index';

		$this->load->view('layout', $data);
	}

	public function print($id_form, $visit_no)
	{
		$db2 = $this->load->database('default', TRUE);
		$id_form = decrypt_url($id_form);

		require_once './vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal', 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 8, 'margin_bottom' => 0, 'margin_header' => 0, 'margin_footer' => 0]); //use this customization
		
		
		$data['detail'] = api_detail_pasien($this->endpoint, $this->session->userdata('token'), $this->session->userdata('User_Code'), $visit_no);
		
		$formulir = $this->Formulir_model->getFormulirDetailPrint($id_form);
		$data['cabang'] = $formulir;

		$data['header'] = 'template/header';
		$data['title'] = $formulir->nama_formulir;
		$mpdf->SetTitle($formulir->nama_formulir . '-' . $visit_no);

		$i = 0;
	
		do {
			$data['order'] = $i;

			// data
			$data['alergi'] = $db2->query("SELECT * FROM form_rawat_jalan WHERE 
			visit_no = '$visit_no' AND 
			id_cabang = '$formulir->id_cabang' AND
			bagian = 'alergi' AND
			is_deleted IS NULL
			")->result_array();

			$data['riwayat'] = $db2->query("SELECT * FROM form_rawat_jalan WHERE 
			visit_no = '$visit_no' AND 
			id_cabang = '$formulir->id_cabang' AND
			bagian = 'riwayat' AND
			is_deleted IS NULL
			")->result_array();

			$data['imunisasi'] = $db2->query("SELECT * FROM form_rawat_jalan WHERE 
			visit_no = '$visit_no' AND 
			id_cabang = '$formulir->id_cabang' AND
			bagian = 'imunisasi' AND
			is_deleted IS NULL
			")->result_array();

			$data['resume'] = $db2->query("SELECT * FROM form_rawat_jalan WHERE 
			visit_no = '$visit_no' AND 
			id_cabang = '$formulir->id_cabang' AND
			bagian = 'resume' AND
			is_deleted IS NULL
			")->result_array();


			$data['content'] = $formulir->content.'/page-print-1';

			if ($data['order'] == 0)
				$html = $this->load->view('layout_print', $data, true);
				$html = $this->load->view($formulir->content.'/page-print-1', $data, true);
			$mpdf->WriteHTML($html);
			$i++;
		} while ($i < $data['max']);

		$mpdf->Output();
	}

	public function save($mr_code, $visit_no, $table)
	{
		echo $this->Record_model->insert_kolom($mr_code, $visit_no, $table, $_POST);
	}

	public function data_tampil($bagian, $visit_no, $table)
	{
		echo json_encode($this->Record_model->data_tampil($bagian, $visit_no, $table));
	}

	public function delete($id, $table)
	{
		echo $this->Record_model->delete_kolom($id, $table);
	}

	
}
