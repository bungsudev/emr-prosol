
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiquery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
        $token = $this->input->post('token');
        if ($token == 'PROSOL2022APIMANUALTOKEN') {
            $post_query = $this->input->post('query');
            $result_query = $this->db->query("$post_query")->result();
            echo json_encode($result_query);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Token tidak valid']);
        }
  }
}