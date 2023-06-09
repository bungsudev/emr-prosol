<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{

    // IMPLODE ARRAY DATA []
    public function checkArray($data)
    {
        $result = $data;
        if (is_array($result))
            $result = implode('|', $data);
        return $result;
    }

    // FUNCTION CURD 
    public function detail($table, $visit_no)
    {
        $db2 = $this->load->database('default', TRUE);

        $query = $db2->query("SELECT a.* 
                FROM $table a
                WHERE a.visit_no = '$visit_no'");
        return $query->row_array();
    }

    // multiple
    public function getMultipleData($table, $visit_no, $form_ke)
    {
        $db2 = $this->load->database('default', TRUE);

        ($form_ke) ? $append_where = " AND a.form_ke = '$form_ke'" : $append_where = " AND a.form_ke = 1";

        $query = $db2->query("SELECT a.* 
                FROM $table a
                WHERE a.visit_no = '$visit_no' 
                $append_where");
        return $query;
    }

    public function detail_list_multiple($table, $visit_no, $form_ke, $filter)
    {
        $db2 = $this->load->database('default', TRUE);
        $cabang = $this->session->userdata('Cabang');
        $append_where = '';
        ($form_ke) ? $append_where .= " AND a.form_ke = '$form_ke'" : $append_where = "";
        ($filter != 'Semua') ? $append_where .= " AND a.jenis = '$filter'" : $append_where = "";

        $query = $db2->query("SELECT a.* 
                FROM $table a
                WHERE a.visit_no = '$visit_no' 
                $append_where 
                AND id_cabang = '$cabang'
                AND is_deleted IS NULL
                ");
        return $query;
    }
    
    // end multiple

    // catatan pemberian obat
    public function getTanggalPOB($table, $visit_no, $form_ke)
    {
        $db2 = $this->load->database('default', TRUE);

        $query = $db2->query("SELECT DISTINCT a.tanggal 
                FROM $table a
                WHERE 
                a.visit_no = '$visit_no'
                ")->result_array();
        return $query;
    }

    // end catatan pemberian obat


    public function insert($table, $data)
    {
        $db2 = $this->load->database('default', TRUE);

        foreach ($data as $key => $value)
            $data[$key] = $this->checkArray($data[$key]);

        // tanda tangan hanya dilakukan saat penyimpanan pertama, karena ttd berdasarkan created time untuk menghindari manipulasi
        $data['nama_ttd'] = $this->session->userdata('User_Name');
        $data['ttd'] = $this->session->userdata('sign');

        $data['status'] = 'created';
        $data['created_by'] = $this->session->userdata('User_Code');
        $data['created_time'] = date('Y-m-d H:i:s');
        $data['id_cabang'] = $this->session->userdata('Cabang');

        if ($db2->insert($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status_insert' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status_insert' => 500));
    }

    public function update($table, $visit_no)
    {
        $db2 = $this->load->database('default', TRUE);

        foreach ($_POST as $key => $value)
            $_POST[$key] = $this->checkArray($_POST[$key]);

        $_POST['status'] = 'edited';
        $_POST['edited_by'] = $this->session->userdata('User_Code');
        $_POST['edited_time'] = date('Y-m-d H:i:s');


        $db2->where('visit_no', $visit_no);
        if ($db2->update($table, $_POST))
            return json_encode(array('msg_update' => 'Success', 'status_update' => 200));
        else
            return json_encode(array('msg_update' => json_encode($db2->error()), 'status_update' => 500));
    }
    // END CURD FUNCTION

    // FUNCTION CURD JSON DATA
    public function show_row($table, $field, $visit_no, $id)
    {
        $db2 = $this->load->database('default', TRUE);
        $data = $db2->select($field)->where('visit_no', $visit_no)->get($table)->result_array()[0][$field];
        $jsonData = json_decode($data);
        $currData = [];
        foreach ($jsonData as $j) {
            if (strval($j->id) == $id) {
                $currData = $j;
                break;
            }
        }
        return json_encode($currData);
    }

    public function insert_json($table, $field, $data, $visit_no)
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->trans_start();

        $data['id'] = strtotime(date('Y-m-d H:i:s'));
        if (isset($visit_no)) {

            $checkData = $db2->select($field)->where('visit_no', $visit_no)->get($table)->result_array()[0][$field];
            if ($checkData == NULL)
                $dataBefore = [];
            else
                $dataBefore = json_decode($checkData);

            $finalData[$field] = json_encode(array_merge($dataBefore, array($data)));

            $db2->where('visit_no', $visit_no);
            $exQuery = $db2->update($table, $finalData);
            if ($exQuery) {
                $affected_rows = $db2->affected_rows();
                if ($affected_rows == 1) {
                    $db2->trans_commit();
                    return json_encode(array('msg' => 'Success', 'status' => 200));
                } else {
                    $db2->trans_rollback();
                    return json_encode(array('msg' => 'Forbidden', 'status' => 405));
                }
            } else
                return json_encode(array('msg' => json_encode($db2->error()), 'status' => 500));
        } else {
            return json_encode(array('msg' => 'Visit No Kosong', 'status' => 405));
        }
    }

    public function delete_json($table, $field, $id)
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->trans_start();

        if (isset($_POST['visit_no'])) {

            $checkData = $db2->select($field)->where('visit_no', $_POST['visit_no'])->get($table)->result_array()[0][$field];
            $dataArray = json_decode($checkData, TRUE);
            $resultDataArray = array();
            foreach ($dataArray as $d) {
                if ($d['id'] != $id)
                    $resultDataArray[] = $d;
            }

            $finalData[$field] = json_encode($resultDataArray);

            $db2->where('visit_no', $_POST['visit_no']);
            $exQuery = $db2->update($table, $finalData);
            if ($exQuery) {
                $affected_rows = $db2->affected_rows();
                if ($affected_rows == 1) {
                    $db2->trans_commit();
                    return json_encode(array('msg' => 'Success', 'status' => 200));
                } else {
                    $db2->trans_rollback();
                    return json_encode(array('msg' => 'Forbidden', 'status' => 405));
                }
            } else
                return json_encode(array('msg' => json_encode($db2->error()), 'status' => 500));
        } else {
            return json_encode(array('msg' => 'Visit No Kosong', 'status' => 405));
        }
    }

    public function update_json($table, $field, $data, $visit_no, $id)
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->trans_start();

        $checkData = $db2->select($field)->where('visit_no', $visit_no)->get($table)->result_array()[0][$field];
        $dataArray = json_decode($checkData, TRUE);
        $resultDataArray = array();
        foreach ($dataArray as $d) {
            if (strval($d['id']) == $id)
                $resultDataArray[] = $data;
            else
                $resultDataArray[] = $d;
        }

        $finalData[$field] = json_encode($resultDataArray);

        $db2->where('visit_no', $visit_no);
        $exQuery = $db2->update($table, $finalData);
        if ($exQuery) {
            $affected_rows = $db2->affected_rows();
            if ($affected_rows == 1) {
                $db2->trans_commit();
                return json_encode(array('msg' => 'Success', 'status' => 200));
            } else {
                $db2->trans_rollback();
                return json_encode(array('msg' => 'Forbidden', 'status' => 405));
            }
        } else
            return json_encode(array('msg' => json_encode($db2->error()), 'status' => 500));
    }

    public function update_exist($table, $field, $data)
    {
        $data = array();
        $data = array($field => $this->input->post('currData'));

        $db2 = $this->load->database("dbmaster", TRUE);
        $db2->trans_begin();
        $db2->where('visit_no', $this->input->post('visit_no'));
        if ($db2->update($table, $data)) {
            if ($db2->affected_rows() == 1) {
                $db2->trans_commit();
                return json_encode(array("msg" => "Success", "status" => 200));
            } else {
                $db2->trans_rollback();
                return json_encode(array("msg" => "Forbidden", "status" => 403));
            }
        } else
            return json_encode(array("msg" => "Failed", "status" => 500));
    }
    // END FUNCTION JSON

    //FORM CPPT
    public function detail_cppt($table, $visit_no)
    {
        $db2 = $this->load->database('default', TRUE);
        $query = $db2->query("SELECT a.* , b.User_Name as created, c.ICD_Desc as ICD_Desc
                FROM $table a
                join [HIMain].[dbo].[User_Pass] b on b.User_Code = a.created_by
                join ICD c on c.ICD_Code = a.diagnosa_icd
                WHERE a.visit_no = '$visit_no'
                -- AND a.is_deleted ='' OR a.is_deleted is NULL
                ");
        return $query->result_array();
    }

    public function insert_cppt($table, $data)
    {
        $db2 = $this->load->database('default', TRUE);

        foreach ($data as $key => $value)
            $data[$key] = $this->checkArray($data[$key]);

        $data['status'] = 'created';
        $data['created_by'] = $this->session->userdata('User_Code');
        $data['created_time'] = date('Y-m-d H:i:s');

        if ($db2->insert($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status_insert' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status_insert' => 500));
    }

    public function delete_cppt($table, $id)
    {
        $db2 = $this->load->database('default', TRUE);

        $is_deleted = [
            "deleted_by" => $this->session->userdata('User_Code'),
            "deleted_time" => date('Y-m-d H:i:s')
        ];

        $data = [
            "status" => "deleted",
            "is_deleted" => json_encode($is_deleted)
        ];

        $db2->where('id', $id);
        if ($db2->update($table, $data))
            return json_encode(array('msg_update' => 'Success', 'status_update' => 200));
        else
            return json_encode(array('msg_update' => json_encode($db2->error()), 'status_update' => 500));
    }

    public function delete($table, $id)
    {
        $db2 = $this->load->database('default', TRUE);

        $is_deleted = [
            "deleted_by" => $this->session->userdata('User_Code'),
            "deleted_time" => date('Y-m-d H:i:s')
        ];

        $data = [
            "status" => "deleted",
            "is_deleted" => json_encode($is_deleted)
        ];

        $db2->where('id', $id);
        if ($db2->update($table, $data))
            return array('msg_update' => 'Success', 'status_update' => 200);
        else
            return array('msg_update' => json_encode($db2->error()), 'status_update' => 500);
    }

    // insert formulir baru
    public function insert_form($table, $data)
    {
        $db2 = $this->load->database('default', TRUE);

        $data['created_time'] = date('Y-m-d H:i:s');

        if ($db2->insert($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status_insert' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status_insert' => 500));
    }

    // DIAGNOSA
    // diagnosa pasien dari formulir surat perintah rawah inap
    public function getDiagnosaPasien($visit_no)
    {
        $id_cabang = $this->session->userdata('Cabang');

        $query = $this->db->query("SELECT a.diagnosa FROM form_surat_perintah_ranap a WHERE a.visit_no = '$visit_no' AND id_cabang = '$id_cabang'");
        return $query->row();
    }


    public function save_alergi()
    {
        $data = [
            "tanggal" => $this->input->post('tanggal'),
            "jenis_nilai" => $this->input->post('jenis_nilai'),
            "nilai" => $this->input->post('nilai'),
            "keterangan" => $this->input->post('keterangan'),
            "status" => $this->input->post('status'),
            "created" => date("d-m-Y H:i:s").'-'.$this->session->userdata('username'),
        ];
        $this->db->insert('lembur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // 2 colom save
    public function insert_kolom($mr_code, $visit_no, $table, $data)
    {
        $db2 = $this->load->database('default', TRUE);

        foreach ($data as $key => $value)
            $data[$key] = $this->checkArray($data[$key]);

        $data['mr_code'] = $mr_code;
        $data['visit_no'] = $visit_no;

        // tanda tangan hanya dilakukan saat penyimpanan pertama, karena ttd berdasarkan created time untuk menghindari manipulasi
        $data['nama_ttd'] = $this->session->userdata('User_Name');
        $data['ttd'] = $this->session->userdata('sign');

        $data['status'] = 'created';
        $data['created_by'] = $this->session->userdata('User_Code');
        $data['created_time'] = date('Y-m-d H:i:s');
        $data['id_cabang'] = $this->session->userdata('Cabang');

        if ($db2->insert($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status' => 500));
    }

    
	public function data_tampil($bagian, $visit_no, $table)
	{
		$db2 = $this->load->database('default', TRUE);
        
		$db2->where('bagian', $bagian);
		$db2->where('visit_no', $visit_no);
		$db2->where('is_deleted', NULL);
		$db2->order_by('tanggal', 'DESC');
		return $db2->get($table)->result();
	}

    public function delete_kolom($id, $table)
    {
        $db2 = $this->load->database('default', TRUE);

        $is_deleted = [
            "deleted_by" => $this->session->userdata('User_Code'),
            "deleted_time" => date('Y-m-d H:i:s')
        ];

        $data = [
            "status" => "deleted",
            "is_deleted" => json_encode($is_deleted)
        ];

        $db2->where('id', $id);
        if ($db2->update($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status' => 500));
    }



    // verifikasi distribusi obat
    public function kirim_verif($table, $visit_no, $data)
    {
        $db2 = $this->load->database('default', TRUE);

        $cek = $db2->query("SELECT * FROM $table WHERE visit_no = '$visit_no'")->num_rows();

        if($cek > 0){
            $db2->where('visit_no', $visit_no);
            if ($db2->update($table, $data))
                return json_encode(array('msg_update' => 'Success', 'status' => 200));
            else
                return json_encode(array('msg_update' => json_encode($db2->error()), 'status' => 500));
        }else{
            foreach ($data as $key => $value)
                $data[$key] = $this->checkArray($data[$key]);
    
            $data['visit_no'] = $visit_no;
    
            $data['status'] = 'created';
            $data['created_by'] = $this->session->userdata('User_Code');
            $data['created_time'] = date('Y-m-d H:i:s');
            $data['id_cabang'] = $this->session->userdata('Cabang');
    
            if ($db2->insert($table, $data))
                return json_encode(array('msg_insert' => 'Success', 'status' => 200));
            else
                return json_encode(array('msg_insert' => json_encode($db2->error()), 'status' => 500));
        }
    }

    public function detail_verif($visit_no, $table)
	{
		$db2 = $this->load->database('default', TRUE);
        
		$db2->where('visit_no', $visit_no);
		$db2->where('is_deleted', NULL);
		return $db2->get($table)->result();
	}

    public function notif_verif($user_code)
	{
		$db2 = $this->load->database('default', TRUE);

        $cek = $db2->query("SELECT visit_no FROM form_distribusi_obat_ri_verif WHERE '$user_code' 
        IN 
        (staff_instalasi_farmasi,
        staff_farmasi_depo_1,
        staff_farmasi_depo_2,
        perawat_penerima_obat,
        perawat_retur,
        staff_depo_retur,
        staff_inst_farmasi_retur) AND 
        is_deleted IS NULL")->result();

		return $cek;
	}

    public function update_verif($table, $visit_no)
    {
        $db2 = $this->load->database('default', TRUE);

        $data = [
            "status" => "deleted",
            "is_deleted" => json_encode($is_deleted)
        ];

        $db2->where('id', $id);
        if ($db2->update($table, $data))
            return json_encode(array('msg_insert' => 'Success', 'status' => 200));
        else
            return json_encode(array('msg_insert' => json_encode($db2->error()), 'status' => 500));
    }
}
