<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
        // ambil role dari session
        $akses_user = $this->session->userdata('Role');

        // ambil menu
		$res = $this->db->query("SELECT * FROM mst_menu WHERE status = 1 AND 
        id_cabang= '".$this->session->userdata('Cabang')."'")->row();

        // menu ada di table mst_menu field struktur_menu dalam bentuk json
        $res = json_decode($res->struktur_menu, true);

        // ambil title menu
        $sidebar_menu = "";
        foreach($res['menu'] as $menu){
            //grup menu role akses
            $akses_array = $menu['akses'];

            //check akses grup menu
            if(in_array($akses_user, $akses_array) || in_array("ALL", $akses_array)){
                $title = $menu['title'];
                $sidebar_menu .= "<li class='header'>{$title}</li>";

                //ambil menu
                foreach ($menu['sub_menu'] as $sub_menu) {
                    //sub menu role akses
                    $sub_akses_array = $sub_menu['akses'];

                    //check akses sub menu
                    if(in_array($akses_user, $sub_akses_array) || in_array("ALL", $sub_akses_array)){
                        $menu = $sub_menu['nama_sub_menu'];
                        $icon = $sub_menu['icon'];
                        $link = $sub_menu['link'];

                        $sidebar_menu .= '
                        <li class="<?= ($this->uri->segment(1) == "'.$link.'")? "active" : ""; ?>">
                            <a href="<?= base_url(); ?>'.$link.'">
                                '.$icon.'
                                <span>'.$menu.'</span>
                            </a>
                        </li>';
                    }
                }
            }
        }
        return $sidebar_menu;
    }

    public function encode_url($id)
	{
		echo encrypt_url($id);
	}

    public function decode_url($id)
	{
		echo decrypt_url($id);
	}
}
