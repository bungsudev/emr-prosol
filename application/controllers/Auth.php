<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// models
		$this->load->model('Log_model');
		$this->load->model('Settings_m');

		// define
		$this->endpoint = ENDPOINT;
		$this->cabang = NULL;
	}

	public function index()
	{
		if ($this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		$data['title'] = 'Login';
		$this->load->view('auth/page-login', $data);
	}
	
	function login(){
		// $user_code = 'IT1';
		// $password = 'p@ssw0rd';
		// $dep = 'IT';

		$user_code = $this->input->post('user_code');
		$password = $this->input->post('password');
		$dep = $this->input->post('dep');
		
		$data = $this->api_login($user_code, $password, $dep);
		$data = json_decode($data);

		// pisah response dan metadata
		$response = $data->response;
		$metadata = $data->metadata;

		// param cabang
		$this->cabang = $response->Cabang;

		if ($metadata->code == 200) {
			if ($response->Status == 'AKTIF') {
				// data session
				$session = array(
					'token' => $response->token,
					'Dep_Code' => $response->Dep_Code,
					'Role' => $response->is_doctor,
					'Doctor_Code' => $response->Doctor_Code,
					'Medical_Code' => $response->Medical_Code,
					'User_Code' => $response->User_Code,
					'User_Name' => $response->User_Name,
					'Status' => $response->Status,
					'Cabang' => $this->cabang,
					'sign' => $response->sign,
				);
				

				// ambil data settings
				$settings = $this->Settings_m->getCurrentsettings($this->cabang);
				// data session settings
				$session_settings = array(
					"nama_rs" => $settings->nama_rs,
					"spesialisasi" => $settings->spesialisasi,
					"no_sip" => $settings->no_sip,
					"alamat" => $settings->alamat,
					"email" => $settings->email,
					"telepon" => $settings->telepon,
					"link_maps" => $settings->link_maps,
					"facebook" => $settings->facebook,
					"youtube" => $settings->youtube,
					"twitter" => $settings->twitter,
					"instagram" => $settings->instagram,
					"gambar_logo" => $settings->gambar_logo,
					"favicon" => $settings->favicon,
					"foto_dokter" => $settings->foto_dokter
				);

				if (empty($response->sign)) {
					redirect('auth/sign');
				} else {
					// simpan session
					$this->session->set_userdata($session);
					$this->session->set_userdata($session_settings);
					$this->session->set_userdata('Sidebar', $this->akses_sidebar());
					
					if ($this->session->userdata('prev_url'))
						header("Location: " . $this->session->userdata('prev_url'));
					else if ($this->session->userdata('Role') == 'DOKTER')
						redirect('dokter/dashboard');
					else
						redirect('dashboard');
				}
			}else {
				$this->session->set_flashdata('message', 'Maaf, Akun anda tidak aktif!');
				redirect('auth');
			}
			
		}else if ($metadata->code == 401) {
			$this->session->set_flashdata('message', 'User atau Password yang anda masukan salah!');
			redirect('auth');
		}else{
			$this->session->set_flashdata('message', $metadata->message);
			redirect('auth');
		}
	}

	// data api section
	function api_login($user_code, $password, $dep)
	{
		// try and catch login
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->endpoint.'auth',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('User_Code' => $user_code, 'Password' => $password, 'dep' => $dep),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			// insert log
			$this->Log_model->save_log($response, 'Login');

			return $response;
		} catch (Exception $e) {
			$this->Log_model->save_log($e, 'LoginError');
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}

	}

	public function api_department($User_Code)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->endpoint.'department',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('User_Code' => $User_Code),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			$response = json_decode($response, true);
			echo json_encode($response);

		} catch (Exception $e) {
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}
	}
	// data api section END

	// function untuk role akses sidebar
	public function akses_sidebar()
	{
        // ambil role dari session
        $akses_user = $this->session->userdata('Role');

        // ambil menu
		$res = $this->db->query("SELECT * FROM mst_menu WHERE status = 1 AND 
        id_cabang= '".$this->session->userdata('Cabang')."'")->row();

        // menu ada di table mst_menu field struktur_menu dalam bentuk json
        $res = json_decode($res->struktur_menu, true);

		// container HTML
        $sidebar_menu = "";

        // ambil title menu
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
                        <li class="'.$link.'">
                            <a href="'.base_url().$link.'">
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

	// tanda tangan
	public function api_update_sign()
	{
		// try and catch get department
		try 
		{
			$ttd_petugas = $this->input->post('ttd_petugas');

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->endpoint.'update_sign',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('User_Code' => $this->session->userdata('User_Code'), 'ttd_petugas' => $ttd_petugas),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$this->session->userdata('token'),
					'x-username: '.$this->session->userdata('User_Code')
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			// insert log
			$this->Log_model->save_log($response, 'Sign');

			$response = json_decode($response, true);
			$this->session->set_userdata('sign', $ttd_petugas);
			echo json_encode($response);

		} catch (Exception $e) {
			$this->session->set_flashdata('message', 'Gangguan jaringan! silahkan coba lagi');
		}
	}
	// data api section END

	public function sign()
	{
		if (!$this->session->userdata('User_Code')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			$this->session->set_userdata("prev_url", $_SERVER['REQUEST_URI']);
			redirect('auth');
		}

		if (empty($this->session->userdata('sign'))) {
			$data['title'] = 'Harap Tanda Tangan Terlebih dahulu';
			$data['cara'] = 'Klik save setelah melakukan tanda tangan';
			$this->session->set_flashdata('message_sign', '<div class="alert alert-danger text-center msg" role="alert"> <h5> Maaf kamu harus menyimpan tanda tangan terlebih dahulu!</h5></div>');
		} else {
			$data['title'] = "Tanda Tangan Digital";
			$data['cara'] = "";
		}

		$data['content'] = 'auth/page-sign';
		$this->load->view('layout', $data);
	}

	//function for backup database mysqli
	public function backup_database()
	{
		$this->load->dbutil();
		$prefs = array(
			'format' => 'zip',
			'filename' => 'emr.sql'
		);
		$backup = &$this->dbutil->backup($prefs);
		$db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip';
		//create folder if not exist
		if (!is_dir('assets/backup')) {
			mkdir('./assets/backup', 0777, TRUE);
		}
		$save = './assets/backup/' . $db_name;
		$this->load->helper('file');
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	
	function check_username_avalibility()
	{
		if (!filter_var($_POST["username"], FILTER_VALIDATE_DOMAIN)) {
			echo '<label class="text-danger"><span class="feather-x"></span> Invalid Username</span></label>';
		} else {
			if ($this->Auth_model->is_username_available($_POST["username"])) {
				echo '<label class="text-danger"><span class="feather-x"></span> Username Already register</label>';
			} else {
				echo '<label class="text-success"><span class="feather-check"></span> Username Available</label>';
			}
		}
	}

	public function proses_tambah()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		$this->Auth_model->insert_user();
		$this->session->set_flashdata('message', 'Akun berhasil didaftarkan, Silahkan Login.');
		redirect(base_url() . 'auth');
	}

	public function proses_hapus()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		$this->Auth_model->hapus_user($this->input->get('id'));
		$this->session->set_flashdata('message', 'Berhasil Menghapus Data.');
		redirect(base_url('auth'));
	}

	public function proses_edit()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		$this->Auth_model->edit_user();
		$this->session->set_flashdata('message', 'Berhasil Mengedit Data.');
		redirect(base_url('auth/profile'));
	}

	public function changepassword()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		if ($this->session->userdata('username')) {
			$data['user'] = $this->db->get_where('User_Pass', ['username' => $this->session->userdata('username')])->row_array();
			$data['header'] = 'template/header';
			$data['title'] = 'Ganti password';
			$data['content'] = 'auth/change-password';
			$this->load->view('layout', $data);
		} else {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('auth');
		}
	}

	public function change_pass()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		$data['user'] = $this->db->get_where('User_Pass')->row_array();
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$new_password2 = $this->input->post('new_password2');
		if ($old_password != $data['user']['password_1']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> password lama Anda salah!</div>');
			redirect('auth/changepassword');
		} else if ($new_password2 != $new_password) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Konfirmasi password tidak sama!</div>');
			redirect('auth/changepassword');
		} else {
			if ($old_password == $new_password) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> password tidak boleh sama!</div>');
				redirect('auth/changepassword');
			} else {
				$password_hash =  $this->input->post('new_password');
				$this->db->set('password_1', $password_hash);
				$this->db->where('username', $this->session->userdata('username'));
				$this->db->update('User_Pass');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> password berhasil diganti!</div>');
				redirect('auth/changepassword');
			}
		}
	}

	public function profile()
	{
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu.');
			redirect('dashboard');
		}
		if ($this->session->userdata('username')) {
			$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$data['list'] = $this->Auth_model->list_user();
			$data['header'] = 'header';
			$data['footer'] = $this->load->view('footer', '', TRUE);
			$this->load->view('auth/profil_view', $data);
		} else {
			redirect('auth/login');
		}
	}

	public function login_old()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->Auth_model->get($username);
		if (empty($user)) {
			$this->session->set_flashdata('message', 'Username tidak ditemukan!');
			redirect('auth');
		} else {
			if (password_verify($password, $user->password)) {
				$session = array(
					'username' => $user->username,
					'nama' => $user->nama,
					'level' => $user->level,
					'status' => $user->status
				);
				if ($user->status == 'Aktif') {
					$this->session->set_userdata($session);

					if ($user->level == "Dokter") {
						redirect('antrian');
					} else {
						redirect('dashboard');
					}
				} else {
					$this->session->set_flashdata('message', 'Maaf, Akun anda tidak aktif!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'Password yang anda masukan salah!');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
