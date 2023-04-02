<?php
defined('BASEPATH') or exit('No direct script access allowed');

class In extends CI_Controller
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
        $this->endpoint = ENDPOINT;
		$this->load->model('Log_model');
		$this->load->model('Record_model');
		$this->load->model('Formulir_model');

		$this->controller = 'In';
		$this->table = '';
		$this->field = '';

		$this->kode_rm = '';
		$this->content = '';
		$this->title = '';
	}

	public function form($id_form = '', $visit_no = '')
	{
		$id_form = decrypt_url($id_form);
		$data['detail'] = $this->api_detail_pasien($visit_no);

		// ambil data form dari table mst_formulir
		$formulir = $this->Formulir_model->getFormulirDetail($id_form);
		$this->table = $formulir->table;
		$this->kode_rm = $formulir->kode_formulir;
		$this->content = $formulir->content;
		$this->title = $formulir->nama_formulir;

		$data['link_print'] = base_url() . $this->controller . '/print?Visit_No=' . $visit_no;
		$data['row'] = $this->Record_model->detail($this->table, $visit_no);
		// $data['dokter'] = $this->User_model->data_dokter();
		// $data['rujukan'] = $this->Main_model->getPartner();

		$data['controller'] = $this->controller;
		$data['title'] = $this->title;
		$data['content'] = $this->content . '/page-index';

		$this->load->view('layout', $data);
	}

	public function detail($visit_no)
	{
		echo json_encode($this->Record_model->detail($this->table, $visit_no));
	}

	public function insert()
	{
		echo json_encode($this->Record_model->insert($this->table, $_POST));
	}

	public function update($visit_no)
	{
		echo json_encode($this->Record_model->update($this->table, $visit_no));
	}

    function myfunction($value) 
    {   
        echo $value;
    }

	//	RIWAYAT PENGOBATAN 
	public function insert_rp($visit_no)
	{
		// explode jika field (multi input ajax dalam 1 form)
		if (!empty($formulir->field))
			$arr_field = explode(',', $formulir->field);

		foreach ($arr_field as $key => $val) {
			$this->field = $val;
		}
		echo $this->Record_model->insert_json($this->table, $this->field, $_POST, $visit_no);
	}
	public function delete_rp($id)
	{
		echo $this->Record_model->delete_json($this->table, $this->field, $id);
	}

	public function print()
	{
		require_once './vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330], 'margin_left' => 10, 'margin_right' => 10, 'margin_top' => 8, 'margin_bottom' => 15, 'margin_header' => 0, 'margin_footer' => 0]); //use this customization
		$data['user'] = $this->db->get_where('User_Pass', ['User_Code' => $this->session->userdata('User_Code')])->row_array();
		$data['detail'] = $this->Pasien_model->detail_pasien($this->input->get('Visit_No'));
		$data['header'] = 'template/header';
		$data['title'] = $this->title;
		$data['kode_rm'] = $this->kode_rm;
		$data['dtl'] = $this->Record_model->detail($this->table, $this->input->get('Visit_No'));

		$mpdf->SetTitle($this->title);
		$i = 1;
		do {
			if ($i == 1) {
				$data['page'] = 'Hal ' . $i . '/3';
				$data['content'] = $this->content . '/page-print-' . $i;
				$html = $this->load->view('layout_print', $data, true);
				$mpdf->WriteHTML($html);
			} else {
				$mpdf->AddPage();
				$data['page'] = 'Hal ' . $i . '/3';
				$html = $this->load->view($this->content . '/page-print-' . $i, $data, true);
				$mpdf->WriteHTML($html);
			}
			$i++;
		} while (file_exists(APPPATH . 'views/' . $this->content . '/page-print-' . $i . '.php'));
		$mpdf->Output();
	}


	// api

	
    // API detail pasien
    public function api_detail_pasien($visit_no)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->endpoint.'detail_pasien',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('Visit_No' => $visit_no),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$this->session->userdata('token'),
					'x-username: '.$this->session->userdata('User_Code')
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				return $response['metadata']['code'];
			else
				$this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			$this->Log_model->save_log($response, 'Detail Pasien Error');
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}
	}
	// data api section END
}
