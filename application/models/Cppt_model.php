<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cppt_model extends CI_Model
{

	public function data_edit($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->where('id_cppt', $id);
		return $db2->get('form_cppt_n')->row();
	}

	public function detail_cppt($visit_no)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->where('visit_no', $visit_no);
		$db2->order_by('tanggal,jam');
		return $db2->get('form_cppt_n')->row_array();
	}

	public function tampil_cppt($visit_no)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->where('visit_no', $visit_no);
		$db2->order_by('tanggal, jam', 'DESC');
		return $db2->get('form_cppt_n')->result();
	}

	public function tampil_cppt_v2($visit_no)
	{
		$data = $this->db->query("
                SELECT CPPT.*, User_Rujukan.User_Name as Rujukan_Name, User_CreatedBy.User_Name as CreatedBy_Name 
                FROM  [HIMaster].[dbo].[form_cppt_n] CPPT
                LEFT JOIN [HIMain].[dbo].[User_Pass] User_Rujukan ON User_Rujukan.User_Code = CPPT.id_dokter_rujukan 
                LEFT JOIN [HIMain].[dbo].[User_Pass] User_CreatedBy ON User_CreatedBy.User_Code = CPPT.created_by 
                WHERE CPPT.visit_no='$visit_no' AND CPPT.is_deleted IS NULL
                ORDER BY tanggal DESC, jam DESC, id_cppt DESC");
		return $data->result();
	}

	public function tampil_cppt_v3($visit_no, $filter)
	{
		if ($filter == "Semua")
			$condition = "";
		else if ($filter == "Diverifikasi")
			$condition = "AND ttd_dpjp IS NOT NULL";
		else if ($filter == rawurlencode("Belum Diverifikasi"))
			$condition = "AND ttd_dpjp IS NULL";
		else {
			if (strtotime($filter))
				$condition = "AND tanggal = '$filter'";
			else if ($filter)
				$condition = "AND created_by = '$filter'";
			else
				$condition = "";
		}
		// if ($date)
		// 	$condition = "AND tanggal ='$date";

		// , User_Rujukan.User_Name as Rujukan_Name, User_CreatedBy.User_Name as CreatedBy_Name
		$data = $this->db->query("
                SELECT CPPT.* 
                FROM  form_cppt_n CPPT
                WHERE CPPT.visit_no='$visit_no' AND CPPT.is_deleted IS NULL $condition
                ORDER BY tanggal DESC, jam DESC, id_cppt DESC");
		return $data->result();
	}

	public function tambah_cppt_old()
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			'visit_no' => $this->input->post('visit_no'),
			'mr_code' => $this->input->post('mr_code'),
			"tanggal" => $this->input->post('tanggal', TRUE),
			"jam" => $this->input->post('pukul', TRUE),
			"ppa" => $this->input->post('ppa', TRUE),
			"happ" => nl2br($_POST['happ']),
			"intruksi_ppa" => $this->input->post('intruksi_ppa', TRUE),
			"review_dpjp" => $this->input->post('review_dpjp', TRUE),
			"status" => '1',
			"created_time" => $this->input->post('created_time', TRUE),
			"created_by" => $this->input->post('petugas', TRUE)

		];
		return $db2->insert("form_cppt_n", $data);
	}

	public function tambah_cppt($is_doctor = '')
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			'visit_no' => $this->input->post('visit_no'),
			'mr_code' => $this->input->post('mr_code'),
			"tanggal" => $this->input->post('tanggal', TRUE),
			"jam" => $this->input->post('pukul', TRUE),
			"ppa" => $this->input->post('ppa', TRUE),
			"happ" => nl2br($_POST['happ']),
			"metode_asesmen" => $this->input->post('metode_asesmen', TRUE),
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => nl2br($_POST['soap_p']),
			"serah_terima" => $this->input->post('serah_terima', TRUE),
			"intruksi_ppa" => $this->input->post('intruksi_ppa', TRUE),
			"dokter_rujukan" => $this->input->post('dokter_rujukan', TRUE),
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => $this->input->post('created_time', TRUE),
			"created_by" => $this->input->post('petugas', TRUE)
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->input->post('petugas', TRUE),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		(!empty($is_doctor)) ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function getDoctorCode($doctorName)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->where('Doctor_Name', $doctorName);
		return $db2->get('Doctor')->result();
	}

	public function tambah_cppt_v2($is_doctor) // v2
	{
		$db2 = $this->load->database('default', TRUE);
		$referralDoctorCode = $this->getDoctorCode($this->input->post('dokter_rujukan'))[0]->Doctor_Code;
		$data = [
			'visit_no' => $this->input->post('visit_no'),
			'mr_code' => $this->input->post('mr_code'),
			"tanggal" => $this->input->post('tanggal', TRUE),
			"jam" => $this->input->post('pukul', TRUE),
			"ppa" => $this->input->post('ppa', TRUE),
			"happ" => nl2br($_POST['happ']),
			"metode_asesmen" => $this->input->post('metode_asesmen', TRUE),
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => nl2br($_POST['soap_p']),
			"serah_terima" => $this->input->post('serah_terima', TRUE),
			"intruksi_ppa" => $this->input->post('intruksi_ppa', TRUE),
			"id_dokter_rujukan" => $referralDoctorCode,
			"dokter_rujukan" => $this->input->post('dokter_rujukan', TRUE),
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => $this->input->post('created_time', TRUE),
			"created_by" => $this->input->post('petugas', TRUE)
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->input->post('petugas', TRUE),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		($is_doctor == "DOKTER") ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function tambah_cppt_v2_1($is_doctor) // v2.1 -- using dokter rujukan code
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			'visit_no' => $this->input->post('visit_no'),
			'mr_code' => $this->input->post('mr_code'),
			"tanggal" => $this->input->post('tanggal', TRUE),
			"jam" => $this->input->post('pukul', TRUE),
			"ppa" => $this->input->post('ppa', TRUE),
			"happ" => nl2br($_POST['happ']),
			"metode_asesmen" => $this->input->post('metode_asesmen', TRUE),
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => nl2br($_POST['soap_p']),
			"serah_terima" => $this->input->post('serah_terima', TRUE),
			"intruksi_ppa" => $this->input->post('intruksi_ppa', TRUE),
			"id_dokter_rujukan" => $this->input->post('dokter_rujukan'),
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => $this->input->post('created_time', TRUE),
			"created_by" => $this->input->post('petugas', TRUE)
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->input->post('petugas', TRUE),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		($is_doctor == "DOKTER") ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function getDoctorName($doctorCode)
	{
		$this->db->where('Dep_Code', 'DOKTER');
		$this->db->where('Status', 'AKTIF');
		$this->db->where('Doctor_Code', $doctorCode);
		// $this->db->where('Sign_Code IS NOT NULL');
		$this->db->order_by('User_Name');
		return $this->db->get('User_Pass')->result();
	}

	public function tambah_cppt_v2_2($is_doctor) // v2.2 -- add form permintaan konsultasi
	{
		$metode_asesmen = $this->input->post('metode_asesmen', TRUE);
		if ($metode_asesmen == "SOAP+PK") {
			$doctorName = $this->getDoctorName($this->input->post('dokter_rujukan'))[0]->Doctor_Name;
			$happ = $doctorName . "|" . $this->input->post('smf') . "|" . $this->input->post('diagnosa') . "|" . $this->session->userdata('User_Name');
		}

		$db2 = $this->load->database('default', TRUE);
		$data = [
			'visit_no' => $this->input->post('visit_no'),
			'mr_code' => $this->input->post('mr_code'),
			"tanggal" => $this->input->post('tanggal', TRUE),
			"jam" => $this->input->post('pukul', TRUE),
			"ppa" => $this->input->post('ppa', TRUE),
			"happ" => $happ,
			"metode_asesmen" => $this->input->post('metode_asesmen', TRUE),
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => nl2br($_POST['soap_p']),
			"serah_terima" => $this->input->post('serah_terima', TRUE),
			"intruksi_ppa" => $this->input->post('intruksi_ppa', TRUE),
			"id_dokter_rujukan" => $this->input->post('dokter_rujukan'),
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => date('Y-m-d H:i:s'),
			"created_by" => $this->session->userdata('User_Code')
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->input->post('petugas', TRUE),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		($is_doctor == "DOKTER") ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function tambah_cppt_v3($is_doctor) // v3 -- ADIME
	{
		$db2 = $this->load->database('default', TRUE);
		if (is_array($_POST['soap_p']))
			$soap_p = str_replace("\\r\\n", "<br />", json_encode($_POST['soap_p']));
		else
			$soap_p = nl2br($_POST['soap_p']);

		$metode_asesmen = $this->input->post('metode_asesmen', TRUE);
		if ($metode_asesmen == "SOAP+PK") {
			$happ = $_POST['dokter_rujukan'] . "|" . $this->input->post('smf') . "|" . $this->input->post('diagnosa') . "|" . $this->session->userdata('User_Name');
		}

		$data = [
			'visit_no' => $_POST['visit_no'],
			'mr_code' => $_POST['mr_code'],
			"tanggal" => $_POST['tanggal'],
			"jam" => $_POST['pukul'],
			"ppa" => $_POST['ppa'],
			"happ" => $happ,
			"metode_asesmen" => $_POST['metode_asesmen'],
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => $soap_p,
			"serah_terima" => $_POST['serah_terima'],
			"intruksi_ppa" => $_POST['intruksi_ppa'],
			"id_dokter_rujukan" => $_POST['dokter_rujukan'],
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => date('Y-m-d H:i:s'),
			"created_by" => $this->session->userdata('User_Code')
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		($is_doctor == "DOKTER") ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function tambah_cppt_v4($is_doctor) // v4 -- (SBAR + PERALIHAN DPJP UTAMA) + (RAWAT BERSAMA)
	{
		$db2 = $this->load->database('default', TRUE);
		if (is_array($_POST['soap_p']))
			$soap_p = str_replace("\\r\\n", "<br />", json_encode($_POST['soap_p']));
		else
			$soap_p = nl2br($_POST['soap_p']);

		// INSERT LOG
		$log['id_cppt'] = "INSERT";
		$log['visit_no'] = $_POST['visit_no'];
		$log['metode_asesmen'] = $_POST['metode_asesmen'];
		$log['tanggal'] = $_POST['tanggal'];
		$log['jam'] = $_POST['pukul'];
		$log['soap_s'] = nl2br($_POST['soap_s']);
		$log['soap_o'] = nl2br($_POST['soap_o']);
		$log['soap_a'] = nl2br($_POST['soap_a']);
		$log['soap_p'] = nl2br($_POST['soap_p']);
		$log['intruksi_ppa'] = nl2br($_POST['intruksi_ppa']);
		$log['id_dokter_rujukan'] = $_POST['dokter_rujukan'];
		$log['status'] = 1;
		$log['user_code'] = $this->session->userdata('User_Code');
		$log['time'] = date('Y-m-d H:i:s');
		$db2->insert('form_cppt_n_Log', $log);
		// END LOG

		$metode_asesmen = $this->input->post('metode_asesmen', TRUE);
		if ($metode_asesmen == "SOAP+PK") {
			$happ = $_POST['dokter_rujukan'] . "|" . $this->input->post('smf') . "|" . $this->input->post('diagnosa') . "|" . $this->session->userdata('User_Name');
		} else if ($metode_asesmen == "SBAR+PDU") {
			$data['tgl_pdu'] = $_POST['tgl_pdu'];
			$data['alasan_pdu'] = $_POST['alasan_pdu'];
			$data['dpjp_lama_pdu'] = $_POST['dpjp_lama_pdu'];
			$data['dpjp_baru_pdu'] = $_POST['dpjp_baru_pdu'];
			$happ = json_encode($data);
		} else if ($metode_asesmen == "RB") {
			$data['dpjp_utama_rb'] = $_POST['dpjp_utama_rb'];
			$data['tgl_utama_rb'] = $_POST['tgl_utama_rb'];

			$data['dpjp1_rb'] = $_POST['dpjp1_rb'];
			$data['tgl1_rb'] = $_POST['tgl1_rb'];

			$data['dpjp2_rb'] = $_POST['dpjp2_rb'];
			$data['tgl2_rb'] = $_POST['tgl2_rb'];

			$data['dpjp3_rb'] = $_POST['dpjp3_rb'];
			$data['tgl3_rb'] = $_POST['tgl3_rb'];

			$happ = json_encode($data);
		}

		$data = [
			'visit_no' => $_POST['visit_no'],
			'mr_code' => $_POST['mr_code'],
			"tanggal" => $_POST['tanggal'],
			"jam" => $_POST['pukul'],
			"ppa" => $_POST['ppa'],
			"happ" => $happ,
			"metode_asesmen" => $_POST['metode_asesmen'],
			"soap_s" => nl2br($_POST['soap_s']),
			"soap_o" => nl2br($_POST['soap_o']),
			"soap_a" => nl2br($_POST['soap_a']),
			"soap_p" => $soap_p,
			"serah_terima" => $_POST['serah_terima'],
			"intruksi_ppa" => nl2br($_POST['intruksi_ppa']),
			"id_dokter_rujukan" => $_POST['dokter_rujukan'],
			"petugas_ttd" => $this->session->userdata('sign'),
			"status" => '1',
			"created_time" => date('Y-m-d H:i:s'),
			"created_by" => $this->session->userdata('User_Code')
		];
		//cek apakah penginput adalah dpjp
		$data2 = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		($is_doctor == "DOKTER") ? $data = array_merge($data, $data2) : '';
		return $db2->insert("form_cppt_n", $data);
	}

	public function edit_cppt($visit_no, $id)
	{
		$db2 = $this->load->database('default', TRUE);
		if (is_array($_POST['soap_p1']))
			$_POST['soap_p1'] = str_replace("\\r\\n", "<br />", json_encode($_POST['soap_p1']));

		// INSERT LOG
		$log['id_cppt'] = $id;
		$log['visit_no'] = $visit_no;
		$log['metode_asesmen'] = $_POST['metode_asesmen_edit'];
		$log['tanggal'] = $_POST['tanggal1'];
		$log['jam'] = $_POST['pukul1'];
		$log['soap_s'] = nl2br($_POST['soap_s1']);
		$log['soap_o'] = nl2br($_POST['soap_o1']);
		$log['soap_a'] = nl2br($_POST['soap_a1']);
		$log['soap_p'] = nl2br($_POST['soap_p1']);
		$log['intruksi_ppa'] = $_POST['intruksi_ppa1'];
		$log['id_dokter_rujukan'] = $_POST['dokter_rujukan1'];
		$log['status'] = 2;
		$log['user_code'] = $this->session->userdata('User_Code');
		$log['time'] = date('Y-m-d H:i:s');
		$db2->insert('form_cppt_n_Log', $log);
		// END LOG

		$db2->trans_begin();
		$data = [
			"tanggal" => $_POST['tanggal1'],
			"jam" => $_POST['pukul1'],
			// "metode_asesmen" => $_POST['metode_asesmen_edit'),
			"soap_s" => nl2br($_POST['soap_s1']),
			"soap_o" => nl2br($_POST['soap_o1']),
			"soap_a" => nl2br($_POST['soap_a1']),
			"soap_p" => nl2br($_POST['soap_p1']),
			"intruksi_ppa" => nl2br($_POST['intruksi_ppa1']),
			"id_dokter_rujukan" => $_POST['dokter_rujukan1'],
			"status" => '2',
			"edited_time" => date('Y-m-d H:i:s'),
			"edited_by" => $this->session->userdata('User_Code')
		];
		$db2->where('id_cppt', $id);
		if ($db2->update('form_cppt_n', $data)) {
			if ($db2->affected_rows() == 1) {
				$db2->trans_commit();
				return json_encode(["msg" => "Success", "status" => 200]);
			} else {
				$db2->trans_rollback();
				return json_encode(["msg" => "Not Allowed", "status" => 405]);
			}
		} else
			return json_encode(["msg" => "Failed", "status" => 500]);
	}

	public function ttdDPJP($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];
		$db2->where('id_cppt', $id);
		$db2->update('form_cppt_n', $data);
	}

	// check how many rows will be affected before executing
	public function checkTtdDpjp1Day($visit_no, $date)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];

		$db2->trans_start();
		$db2->where('tanggal', $date);
		$db2->where('visit_no', $visit_no);
		$db2->where('ttd_dpjp IS NULL');
		$execQuery = $db2->update('form_cppt_n', $data);
		if ($execQuery) {
			$affected_rows = $db2->affected_rows();
			$db2->trans_rollback();
			return json_encode(array("msg" => "Success", "status" => 200, "affected_rows" => $affected_rows));
		} else
			return json_encode(array("msg" => "Failed", "status" => 500, "affected_rows" => 0));
	}

	public function TtdDpjp1Day($visit_no, $date, $isConfirmed)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];

		$db2->trans_start();
		$db2->where('tanggal', $date);
		$db2->where('visit_no', $visit_no);
		$db2->where('ttd_dpjp IS NULL');
		$execQuery = $db2->update('form_cppt_n', $data);
		if ($execQuery) {
			$affected_rows = $db2->affected_rows();
			if ($affected_rows == $isConfirmed) {
				$db2->trans_commit();
				return json_encode(array("msg" => "Success", "status" => 200));
			} else {
				$db2->trans_rollback();
				return json_encode(array("msg" => "Not Allowed", "status" => 405));
			}
		} else
			return json_encode(array("msg" => "Failed", "status" => 500));
	}

	// check how many rows will be affected before executing
	public function checkTtdDpjpBeforeDate($visit_no, $datetime)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];

		$db2->trans_start();
		$db2->where("CONCAT(tanggal, ' ', jam) <=", $datetime);
		$db2->where("visit_no", $visit_no);
		$db2->group_start();
		$db2->where('ttd_dpjp IS NULL');
		$db2->or_where("ttd_dpjp = ''");
		$db2->group_end();
		$execQuery = $db2->update('form_cppt_n', $data);
		if ($execQuery) {
			$affected_rows = $db2->affected_rows();
			$db2->trans_rollback();
			return $affected_rows;
		} else
			return $db2->error;
	}

	public function TtdDpjpBeforeDate($visit_no, $datetime, $isConfirmed)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"review_dpjp" => $this->session->userdata('User_Name'),
			"ttd_dpjp" => $this->input->post('ttd', FALSE),
			"dpjp_id" => $this->session->userdata('User_Code'),
			"dpjp_time" => date('Y-m-d H:i:s')
		];

		$db2->trans_start();
		$db2->where("CONCAT(tanggal, ' ', jam) <=", $datetime);
		$db2->where("visit_no", $visit_no);
		$db2->group_start();
		$db2->where('ttd_dpjp IS NULL');
		$db2->or_where("ttd_dpjp = ''");
		$db2->group_end();
		$execQuery = $db2->update('form_cppt_n', $data);
		if ($execQuery) {
			$affected_rows = $db2->affected_rows();
			if ($affected_rows == $isConfirmed && $isConfirmed < 100) {
				$db2->trans_commit();
				return json_encode(array("msg" => "Success", "status" => 200));
			} else {
				$db2->trans_rollback();
				return json_encode(array("msg" => "Not Allowed", "status" => 405));
			}
		} else
			return json_encode(array("msg" => "Failed", "status" => 500));
	}

	public function ttdPenerima($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"penerima" => $this->session->userdata('User_Name'),
			"penerima_ttd" => $this->input->post('ttd', FALSE),
			"penerima_id" => $this->session->userdata('User_Code'),
			"penerima_time" => date('Y-m-d H:i:s')
		];
		$db2->where('id_cppt', $id);
		return $db2->update('form_cppt_n', $data);
	}

	public function ttdPenerimaCabak($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$data = [
			"penerima" => $this->session->userdata('User_Name'),
			"penerima_ttd" => $_POST['penerima_ttd'],
			"penerima_id" => $this->session->userdata('User_Code'),
			"penerima_time" => $_POST['tanggal_penerima'] . " " . $_POST['jam_penerima'] . ":00"
		];
		$db2->where('id_cppt', $id);
		return $db2->update('form_cppt_n', $data);
	}

	public function delete_cppt($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$query = $db2
			->where("id_cppt", $id)
			->delete("form_cppt_n");
		if ($query) {
			if ($db2->affected_rows() == 1) {
				$db2->trans_commit();
				return json_encode(array("msg" => "Success", "status" => 200));
			} else {
				$db2->trans_rollback();
				return json_encode(array("msg" => "Not Allowed", "status" => 405));
			}
		} else
			return json_encode(array("msg" => "Failed", "status" => 500));
	}

	public function soft_delete($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->trans_begin();
		$is_deleted = [
			"deleted_by" => $this->session->userdata('User_Code'),
			"deleted_time" => date('Y-m-d H:i:s')
		];
		$data = [
			"is_deleted" => json_encode($is_deleted)
		];
		$db2->where('id_cppt', $id);
		if ($db2->update('form_cppt_n', $data)) {
			if ($db2->affected_rows() == 1) {
				$db2->trans_commit();
				return json_encode(array("msg" => "Success", "status" => 200));
			} else {
				$db2->trans_rollback();
				return json_encode(array("msg" => "Not Allowed", "status" => 405));
			}
		} else
			return json_encode(array("msg" => json_encode($db2->error()), "status" => 500));
	}

	public function recover_data($id)
	{
		$db2 = $this->load->database('default', TRUE);
		$db2->trans_begin();
		$data = [
			"is_deleted" => NULL
		];
		$db2->where('id_cppt', $id);
		if ($db2->update('form_cppt_n', $data)) {
			if ($db2->affected_rows() == 1) {
				$db2->trans_commit();
				return json_encode(array("msg" => "Success", "status" => 200));
			} else {
				$db2->trans_rollback();
				return json_encode(array("msg" => "Not Allowed", "status" => 405));
			}
		} else
			return json_encode(array("msg" => json_encode($db2->error()), "status" => 500));
	}
}
