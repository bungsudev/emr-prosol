<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'mst_formulir';
        $this->cabang = $this->session->userdata('Cabang');
    }

    public function getFormulir()
    {
        $query = $this->db->query("SELECT * FROM $this->table where status = 1 AND id_cabang= '$this->cabang'");
        return $query;
    }

    public function getFormulirDetail($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table where id = '$id' AND status = 1 AND id_cabang= '$this->cabang'")->row();
        return $query;
    }

    public function updateFormulir($data, $kode_poli)
    {
        $this->db->where('kode_poli', $kode_poli);
        $this->db->where('id_cabang', $this->cabang);
        $this->db->update($this->table, $data);
    }
}
