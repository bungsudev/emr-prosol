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
		$this->label = 'components/parts/label';
	}

	public function form($id_form = '', $visit_no = '')
	{
		// $id_form = decrypt_url($id_form);

		// ambil data form dari table mst_formulir
		$formulir = $this->Formulir_model->getFormulirDetail($id_form);
		if (empty($formulir->controller)) {
			
			$data['table'] = $formulir->table;
			$data['field'] = $formulir->field;
			$data['kode_rm'] = $formulir->kode_formulir;
			$data['view'] = $formulir->content;
			$data['title'] = $formulir->nama_formulir;

			$this->id_form = $id_form;
			// ambil detail pasien
			$data['detail'] = $this->api_detail_pasien($visit_no);
			
			$data['link_print'] = base_url() . $this->controller .'/print/'.encrypt_url($id_form).'/'.$visit_no;
			$data['row'] = $this->Record_model->detail($formulir->table, $visit_no);
			// $data['dokter'] = $this->User_model->data_dokter();
			// $data['rujukan'] = $this->Main_model->getPartner();

			$data['controller'] = $this->controller;
			$data['label'] = $this->label;
			$data['content'] = $formulir->content . '/page-index';

			$this->load->view('layout', $data);
		}else{
			redirect(base_url().$formulir->controller.'/?id='. $id_form .'&Visit_No='.$visit_no);
		}
	}

	public function detail($visit_no, $table)
	{
		// echo $table; die();
		echo json_encode($this->Record_model->detail($table, $visit_no));
	}

	public function insert($table)
	{
		echo json_encode($this->Record_model->insert($table, $_POST));
	}

	public function update($visit_no, $table)
	{
		echo json_encode($this->Record_model->update($table, $visit_no));
	}

	//	RIWAYAT PENGOBATAN 
	public function insert_list($visit_no, $field, $table)
	{
		// explode jika field (multi input ajax dalam 1 form)
		if (!empty($field))
			$arr_field = explode(',', $field);

		foreach ($arr_field as $key => $val) {
			$field = $val;
		}
		echo $this->Record_model->insert_json($table, $field, $_POST, $visit_no);
	}

	public function delete_list($table, $field, $id)
	{
		echo $this->Record_model->delete_json($table, $field, $id);
	}

	public function print($id_form, $visit_no)
	{
		require_once './vendor/autoload.php';

		$id_form = decrypt_url($id_form);
		
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330], 'margin_left' => 10, 'margin_right' => 10, 'margin_top' => 8, 'margin_bottom' => 10, 'margin_header' => 0, 'margin_footer' => 0]); //use this customization

		$data['detail'] = $this->api_detail_pasien($visit_no);

		// ambil data dari table mst_formulir
		$formulir = $this->Formulir_model->getFormulirDetailPrint($id_form);
		$data['cabang'] = $formulir;

		$data['header'] = 'template/header';
		$data['dtl'] = $this->Record_model->detail($formulir->table, $visit_no);
		// echo json_encode($data['dtl']);
		// die();
		// var_dump($data['dtl']['terapi_pulang']);
		// die();
		// $data['dtl_list'] = $this->Record_model->detail($formulir->table, $formulir->field, $visit_no);

		$mpdf->SetTitle($formulir->nama_formulir);
		$i = 1;
		do {
			if ($i == 1) {
				$data['page'] = 'Hal ' . $i . '/3';
				$data['content'] = $formulir->content . '/page-print-' . $i;
				$html = $this->load->view('layout_print', $data, true);
				$mpdf->WriteHTML($html);
			} else {
				$mpdf->AddPage();
				$data['page'] = 'Hal ' . $i . '/3';
				$html = $this->load->view($formulir->content . '/page-print-' . $i, $data, true);
				$mpdf->WriteHTML($html);
			}
			$i++;
		} while (file_exists(APPPATH . 'views/' . $formulir->content . '/page-print-' . $i . '.php'));
		$mpdf->Output();
	}

	public function print_test($id_form, $visit_no)
	{
		require_once './vendor/autoload.php';

		$id_form = decrypt_url($id_form);
		
		$data['detail'] = $this->api_detail_pasien($visit_no);

		// ambil data dari table mst_formulir
		$formulir = $this->Formulir_model->getFormulirDetailPrint($id_form);
		$data['cabang'] = $formulir;

		$data['header'] = 'template/header';
		$data['dtl'] = $this->Record_model->detail($formulir->table, $visit_no);
		
		$i = 1;

		$data['page'] = 'Hal ' . $i . '/3';
		$data['content'] = $formulir->content . '/page-print-1';
		$this->load->view('layout_print', $data);
	}



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
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			else
				$this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			$this->Log_model->save_log($e, 'Detail Pasien Error');
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}
	}
	// data api section END
}
