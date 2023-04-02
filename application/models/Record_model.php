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

    public function insert($table, $data)
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
}
