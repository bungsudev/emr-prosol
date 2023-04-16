<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cppt extends CI_Controller
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
		$this->load->model('Cppt_model', 'cppt');
		$this->load->model('Formulir_model');

		$this->endpoint = ENDPOINT;
		$this->label = 'components/parts/label';
	}

	public function index()
	{
		// database
		$db2 = $this->load->database('default', TRUE);
		$data['detail'] = api_detail_pasien($this->endpoint, $this->session->userdata('token'), $this->session->userdata('User_Code'), $this->input->get('Visit_No'));
		$data['dtl'] = $this->cppt->detail_cppt($_GET['Visit_No']);
		$data['dokter'] = api_daftar_dokter($this->endpoint, $this->session->userdata('token'), $this->session->userdata('User_Code'), '');
		$data['tanggal'] = $db2->query("SELECT tanggal, COUNT(*) as total_data FROM form_cppt_n WHERE visit_no = '$_GET[Visit_No]' AND is_deleted IS NULL GROUP BY tanggal ORDER BY tanggal")->result_array();
		$data['dokter_filter'] = $db2->query("
			SELECT DISTINCT created_by FROM form_cppt_n
			WHERE visit_no = '$_GET[Visit_No]' AND is_deleted IS NULL 
		")->result_array();

		// static data
		$data['link_insert'] = 'cppt/insert_cppt_v4';
		$data['link_print'] = base_url() .'cppt/print/'.encrypt_url($this->input->get('id')).'/'.$this->input->get('Visit_No');

		// template
		$data['title'] = 'Catatan Perkembangan Pasien Terintegrasi (CPPT)';
		$data['label'] = $this->label;
		$data['content'] = 'formulir/rsu-eshmun/rawat-inap/new-cppt/page-index';

		$this->load->view('layout', $data);
	}

	public function session()
	{
		echo json_encode($this->session->userdata());
	}

	public function get_doctor_name($doctor_code)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->where('Doctor_Code', $doctor_code);
		$res = $db2->get('Doctor')->result();
		if ($res)
			echo $res[0]->Doctor_Name;
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
		$data['title'] = 'CATATAN PERKEMBANGAN PASIEN TERINTEGRASI CPPT';
		$mpdf->SetTitle('CATATAN PERKEMBANGAN PASIEN TERINTEGRASI CPPT - ' . $visit_no);

		$i = 0;
	
		$dataTanggal = $db2->query("SELECT DISTINCT tanggal FROM form_cppt_n WHERE visit_no = '$visit_no' AND is_deleted IS NULL ORDER BY tanggal")->result_array();
		$data['max'] = sizeof($dataTanggal);
		do {
			$data['order'] = $i;
			$data['detail_cppt'] = $db2->query("
					SELECT CPPT.* FROM form_cppt_n CPPT 
					where CPPT.visit_no='$visit_no' AND CPPT.tanggal='" . $dataTanggal[$i]['tanggal'] . "' AND CPPT.is_deleted IS NULL ORDER BY jam
				")->result();

			$data['content'] = 'formulir/rsu-eshmun/rawat-inap/new-cppt/page-print';
			if ($data['order'] == 0)
				$html = $this->load->view('layout_print', $data, true);
				$html = $this->load->view('formulir/rsu-eshmun/rawat-inap/new-cppt/page-print', $data, true);
			$mpdf->WriteHTML($html);
			$i++;
		} while ($i < $data['max']);

		$mpdf->Output();
	}

	public function insert_cppt_v4()
	{
		$this->cppt->tambah_cppt_v4($this->input->post('is_doctor'));
	}

	public function ttdPenerima($id)
	{
		echo json_encode($this->cppt->ttdPenerima($id));
	}

	public function ttdPenerimaCabak($id)
	{
		if ($this->cppt->ttdPenerimaCabak($id))
			echo json_encode(["msg" => "Success", "status" => 200]);
		else
			echo json_encode(["msg" => "Failed", "status" => 500]);
	}

	public function ttdDPJP($id)
	{
		echo json_encode($this->cppt->ttdDPJP($id));
	}

	// ===== VERIFIKASI TTD DPJP DLM 24 JAM SEKALI ===== 
	public function checkTtdDpjp1Day($visit_no, $date)
	{
		echo $this->cppt->checkTtdDpjp1Day($visit_no, $date);
	}
	public function TtdDpjp1Day($visit_no, $date, $isConfirmed)
	{
		echo $this->cppt->ttdDPJP1Day($visit_no, $date, $isConfirmed);
	}
	// ===== VERIFIKASI TTD DPJP DLM 24 JAM SEKALI =====

	// ===== VERIFIKASI TTD DPJP SEBELUM TANGGAL DALAM SEKALI ===== 
	public function checkTtdDpjpBeforeDate($visit_no, $datetime)
	{
		echo $this->cppt->checkTtdDpjpBeforeDate($visit_no, urldecode($datetime));
	}
	public function TtdDpjpBeforeDate($visit_no, $datetime, $isConfirmed)
	{
		echo $this->cppt->ttdDPJPBeforeDate($visit_no, urldecode($datetime), $isConfirmed);
	}
	// ===== VERIFIKASI TTD DPJP SEBELUM TANGGAL DALAM SEKALI =====

	public function edit_cppt($visit_no, $id)
	{
		echo $this->cppt->edit_cppt($visit_no, $id);
	}

	public function data_tampil($visit_no)
	{
		echo json_encode($this->cppt->tampil_cppt($visit_no));
	}

	public function data_tampil_v2($visit_no)
	{
		echo json_encode($this->cppt->tampil_cppt_v2($visit_no));
	}

	public function data_tampil_v3($visit_no, $condition)
	{
		echo json_encode($this->cppt->tampil_cppt_v3($visit_no, $condition));
	}

	public function data_edit($id)
	{
		echo json_encode($this->cppt->data_edit($id));
	}

	public function hapus_cppt($id)
	{
		echo json_encode($this->cppt->delete_cppt($id));
	}

	public function show_trash($visit_no)
	{
		$data = $this->db->query("
			SELECT CPPT.* 
			FROM  form_cppt_n CPPT
			WHERE CPPT.visit_no='$visit_no' AND CPPT.is_deleted IS NOT NULL
			ORDER BY tanggal DESC, jam DESC, id_cppt DESC");
		echo json_encode($data);
	}

	public function soft_delete($id)
	{
		echo json_encode($this->cppt->soft_delete($id));
	}

	public function recover_data($id)
	{
		echo json_encode($this->cppt->recover_data($id));
	}
	
}
