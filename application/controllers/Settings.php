<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}
        $this->load->model('settings_m','settings');
	}

	public function index()
	{
		$data['title'] = 'Settings';
		$data['content'] = "app/settings/page-settings";
		$this->load->view('layout',$data);
	}

    function get_settings(){
        echo json_encode($this->settings->getCurrentsettings());
    }

    function update_settings(){
		if($this->_validate()){
			if ($_FILES['gambar_logo']['name'] == '') {
				$this->settings->updatesettings();
				echo json_encode(array(
					"status" => TRUE, "message" => 'Berhasil mengedit tanpa gambar!'));
			}else{
				$this->do_upload_settings();
				echo json_encode(array(
					"status" => TRUE, "message" => 'Berhasil mengedit dengan gambar!'));
			}
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"nama_rs" => form_error("nama_rs"),
					"alamat" => form_error("alamat"),
					"telepon" => form_error("telepon"),
					"link_maps" => form_error("link_maps")
				)
			));
		}
    }

    function do_upload_settings(){
        $config['upload_path']="./assets/images/";
        $config['allowed_types']='*';
        $config['overwrite']=true;
        // $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
		$files = $_FILES;

        $name = $files ['gambar_logo'] ['name'];
        $_FILES ['gambar_logo'] ['name'] = $name;
        $_FILES ['gambar_logo'] ['type'] = $files ['gambar_logo'] ['type'];
        $_FILES ['gambar_logo'] ['tmp_name'] = $files ['gambar_logo'] ['tmp_name'];
        $_FILES ['gambar_logo'] ['error'] = $files ['gambar_logo'] ['error'];
        $_FILES ['gambar_logo'] ['size'] = $files ['gambar_logo'] ['size'];

        if(!$this->upload->do_upload('gambar_logo'))
        {
            print_r($this->upload->display_errors());
        }else{
            $this->settings->updateWithGambarsettings($name);
        }
	}

	private function _validate(){
		$rules = array(
			array(
				"field" => "nama_rs",
				"label" => "Nama Rumah Sakit",
				"rules" => "required"
			),
			array(
				"field" => "alamat",
				"label" => "Alamat",
				"rules" => "required"
			),
			array(
				"field" => "telepon",
				"label" => "Telepon",
				"rules" => "required"
			),
			array(
				"field" => "link_maps",
				"label" => "Link Maps",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("","");

		return $this->form_validation->run();
	}
	// Setting Vaksinasi
	public function vaksinasi()
	{
		$data['title'] = 'Setting Vaksinasi';
		$data['content'] = "app/settings/page-settings-vaksinasi";
		$this->load->view('layout',$data);
	}

	public function vaksinasi_selected(){
        echo  json_encode($this->db->query("SELECT * FROM setting_vaksin LIMIT 1")->row_array());
    }
    public function vaksinasi_act()
    {
        // $this->form_validation->set_rules('link', 'link', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        // $this->form_validation->set_error_delimiters('-', '-');
        if ($this->form_validation->run() == false) {
            if (form_error('link')) {
                echo "Error|" . str_replace("</p>", "", str_replace("<p>", "", form_error('link'))) . "|";
                die();
            }
        } else {
            $data = [
                // 'link' => $this->input->post('link'),
                'status' => $this->input->post('status')
            ];
            $this->db->update("setting_vaksin",$data);
            echo 'Success|Successfully update data';
        }
    }
}
