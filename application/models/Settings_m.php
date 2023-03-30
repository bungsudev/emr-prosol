<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->cabang = $this->session->userdata('Cabang');
    }

    public function createNewsettings($data)
    {
        $this->db->insert('settings', $data);
    }

    public function getAllsettings()
    {
        return $this->db->order_by('id', 'DESC')->get('settings')->result_array();
    }

    public function getCurrentsettings($id_cabang)
    {
        return $this->db->get_where('settings', ['id_cabang' => $id_cabang])->row();
    }

    public function getActivesettings()
    {
        return $this->db->get_where('settings', ['is_active' => $this->cabang])->result_array();
    }

    public function getOneData($id)
    {
        $query = $this->db->get_where('settings', array('id' => $id));
        $dataTobeReturn =  $query->row_array();
        return $dataTobeReturn;
    }
    
    public function updatesettings()
    {
        $data = [
            "nama_rs" => $this->input->post('nama_rs'),
            "spesialisasi" => $this->input->post('spesialisasi'),
            "alamat" => $this->input->post('alamat'),
            "email" => $this->input->post('email'),
            "telepon" => $this->input->post('telepon'),
            "link_maps" => $this->input->post('link_maps'),
            "facebook" => $this->input->post('facebook'),
            "youtube" => $this->input->post('youtube'),
            "twitter" => $this->input->post('twitter'),
            "instagram" => $this->input->post('instagram')
        ];
        $uploadimg = $_FILES['foto_dokter'];
        if ($uploadimg['name']) {
            // Check file
            $newFileName = time() . str_replace(' ', '', $uploadimg['name']);;
            $config['allowed_types']  = '*';
            $config['max_size'] = '20000';
            $config['upload_path'] = './assets/images/';
            $config['file_name'] = $newFileName;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_dokter')) {
                $data['foto_dokter'] = $newFileName;
            }
        }
        $this->db->where('id',$this->cabang);
        $this->db->update('settings',$data);
    }

    public function updateWithGambarsettings($gambar)
    {
        $data = [
            "nama_rs" => $this->input->post('nama_rs'),
            "spesialisasi" => $this->input->post('spesialisasi'),
            "alamat" => $this->input->post('alamat'),
            "email" => $this->input->post('email'),
            "telepon" => $this->input->post('telepon'),
            "link_maps" => $this->input->post('link_maps'),
            "facebook" => $this->input->post('facebook'),
            "youtube" => $this->input->post('youtube'),
            "twitter" => $this->input->post('twitter'),
            "instagram" => $this->input->post('instagram'),
            "gambar_logo" => $gambar
        ];
        $uploadimg = $_FILES['foto_dokter'];
        if ($uploadimg['name']) {
            // Check file
            $newFileName = time() . str_replace(' ', '', $uploadimg['name']);;
            $config['allowed_types']  = '*';
            $config['max_size'] = '20000';
            $config['upload_path'] = './assets/images/';
            $config['file_name'] = $newFileName;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_dokter')) {
                $data['foto_dokter'] = $newFileName;
            }
        }
        $this->db->where('id',$this->cabang);
        $this->db->update('settings',$data);
    }

    public function updateViewer()
    {
        //query +1 every view codeigniter

        $this->db->query("UPDATE settings SET viewer = viewer + 1");
    }
}
