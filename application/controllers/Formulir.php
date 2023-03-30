<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}

		//load model
		$this->load->model('Formulir_model');

		//define
		$this->controller = 'dashboard';
		$this->content = 'app/formulir/page-formulir';
		$this->title = 'Formulir E - Medical Record';
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$this->load->view('layout',$data);
    }

    function formulir_fetch()
    {
        $data = $this->Formulir_model->getFormulir();
        $no = 1;
        $output = '<table class="table" id="example1">
                    <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th width="150">Kode Formulir</th>
                            <th>Nama Formulir</th>
                            <th width="10">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
        foreach ($data->result() as $row) {
            if($row->status == 1){
                $msg = '<span class="badge badge-pill badge-success">Aktif</span>';
            }else{
                $msg = '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
            }
            $output .= '
			<tr>
                <td>' .$no++.'.</td>
				<td>' .$row->kode_formulir.'</td>
                <td>' .$row->nama_formulir.'</td>
                <td>' .$msg.'</td>
			</tr>
			';
        }
        $output .= '</tbody></table>';
        echo $output;
    }
}
