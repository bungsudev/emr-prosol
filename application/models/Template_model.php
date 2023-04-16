<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_model extends CI_Model
{

    //template
    public function dataTemplate($id_form, $field)
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->where('created_by', $this->session->userdata('User_Code'));
        $db2->where('id_form', $id_form);
        $db2->where('field', $field);
        $db2->where('deleted_by', NULL);
        $db2->order_by('id_template', 'desc');
        return $db2->get('template')->result_array();
    }

    public function saveTemp($id_form, $field)
    {
        $db2 = $this->load->database('default', TRUE);

        $data = [
            'id_form' => $id_form, //ganti jika ubah urutan form di EMR_Formulir
            "field" => $field,
            "nama" => $this->input->post('nama', false),
            "isi" => $this->input->post('isi', false),

            "created_date" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata('User_Code')
        ];
        return $db2->insert("template", $data);
    }
    public function hapusTemp($id)
    {
        $db2 = $this->load->database('default', TRUE);

        $data = [
            "deleted_date" => date("Y-m-d H:i:s"),
            "deleted_by" => $this->session->userdata('User_Code')
        ];
        $db2->where('id_template', $id);
        $db2->update('template', $data);
        return;
    }

    // RINGKASAN PULANG
    public function dataTemplateRK()
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->where('created_by', $this->session->userdata('User_Code'));
        $db2->where('id_form', '99');
        $db2->where('field', 'Ringkasan Pulang');
        $db2->where('deleted_by', NULL);
        $db2->order_by('id_template', 'desc');
        return $db2->get('template')->result_array();
    }
    public function saveTempRK()
    {
        $db2 = $this->load->database('default', TRUE);
        $isi = $this->input->post('ringkasan_pulang');
        if (!empty($isi))
            $isis = implode("||", $isi);
        else
            $isis = $this->input->post('ringkasan_pulang');
        $data = [
            'id_form' => '99',
            "field" => 'Ringkasan Pulang',
            "nama" => $this->input->post('nama'),
            "isi" => $isis, //
            "created_date" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata('User_Code')
        ];
        return $db2->insert("template", $data);
    }

    public function hapusTempRK($id)
    {
        $db2 = $this->load->database('default', TRUE);
        $db2->where('id_template', $id);
        $db2->delete('template');
        return;
    }
}
