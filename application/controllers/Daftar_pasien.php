<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_pasien extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}

		//load model
        $this->load->model('Log_model');

		//define
        $this->endpoint = ENDPOINT;
		$this->controller = 'Daftar Pasien';
		$this->content = 'app/daftar-pasien/page-pasien';
		$this->title = 'Daftar Pasien';
	}

    public function rawat_jalan()
	{
		$data['title'] = $this->title.' Rawat Jalan';
		$data['content'] = $this->content;
        $data['jenis'] = 'J';
        
		$this->load->view('layout',$data);
    }

	public function rawat_inap()
	{
		$data['title'] = $this->title.' Rawat Inap';
		$data['content'] = $this->content;
        $data['jenis'] = 'I';

		$this->load->view('layout',$data);
    }

    function fetch_daftar_pasien($jenis)
    {
        $data = $this->api_daftar_pasien($jenis);
        $data = json_decode($data);

        // pisah response dan metadata
        if ($data) {
            $response = $data->response;
            $metadata = $data->metadata;
            
            try {
                if ($metadata->code === 200) {
                    $no = 1;
                    $output = '<table class="table" id="tblData">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th width="100">No Visit</th>
                                        <th width="250">Informasi Pasien</th>
                                        <th>Dokter Konsul</th>
                                        <th width="50">Kunjungan</th>
                                        <th width="10">Form</th>
                                    </tr>
                                </thead>
                                <tbody>
                            ';
                    foreach ($response->data as $row) { 
                        $last_char = substr($row->Patient_Name, -1);
                        if ($last_char == '-')
                            $nama = substr($row->Patient_Name, 0, -1);
                        else
                            $nama =$row->Patient_Name;
                        
                        $output .= '
                        <tr>
                            <td>' .$no++.'.</td>
                            <td>' .$row->Visit_No.'</td>
                            <td>
                                <b>'.specialType($row->Patient_SpecialType, $nama, $row->Visit_No).' - 
                                '.iconGender($row->Patient_Sex).'</b> <br />
                                '.labelPasien($row->Patient_DOB).'
                            </td>
                            <td>' .$row->AttDoctorName.'</td>
                            <td>' .$row->Visit_Type.'</td>
                            <td align="center"><button class="btn btn-success btn-sm btnFormulir" data-id = "'.$row->Visit_No.'"><i class="ti-agenda"></i></button></td></td>
                        </tr>
                        ';
                    }
                    $output .= '</tbody></table>';
                    echo $output;
                }else{
                    echo $metadata;
                }
            } catch (\Throwable $e) {
                $this->Log_model->save_log($e, 'Fetch Daftar Pasien');
                return $e;
            }
        }else{
            echo "Tidak Ada data";
        }
    }

    // API daftar pasien
    public function api_daftar_pasien($jenis)
	{
		// try and catch get department
		try 
		{
            if ($this->session->userdata('Role') == 'DOKTER') {
                $kd_dokter = $this->session->userdata('User_Code');
            }else{
                $kd_dokter = NULL;
            }

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->endpoint.'daftar_pasien',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('jenis' => $jenis, 'kd_dokter' => $kd_dokter),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$this->session->userdata('token'),
					'x-username: '.$this->session->userdata('User_Code')
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

            if ($response['metadata']['code'] === 200)
                return $response;
			else
			    // insert log
    			$this->Log_model->save_log($response, 'Daftar Pasien Error');
		} catch (Exception $e) {
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}
	}
	// data api section END
}
