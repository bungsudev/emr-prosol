<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('labelPasien'))
{
    function labelPasien($var = '')
    {
        $lahir = new DateTime($var);
        $today = new DateTime();
        $umur = $today->diff($lahir);

        $output = $umur->y . " Tahun, " . $umur->m . " Bulan, dan " . $umur->d . " Hari";
        return $output;
    }   
}

if ( ! function_exists('specialType'))
{
    function specialType($specialType = '', $nama_pasien = '', $visit_no = '')
    {
        // penyakit berbahaya
        if ($specialType == 'HIV')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'HEPATITIES B')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'HEPATITIES C')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'SIFILIS')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else
                $output = '<span class="btnName" data-id="'.$visit_no.'">'.$nama_pasien.'</span>';

        return $output;
    }   
}

if ( ! function_exists('iconGender'))
{
    function iconGender($var = '')
    {
         // icon gender
        if ($var == 'PRIA')
            $output = '<i class="fa fa-mars" style="color: blue;" title="PRIA"></i>';
        else if ($var == 'WANITA')
            $output = '<i class="fa fa-venus" style="color: magenta;" title="WANITA"></i>';
        else
            $output = '';
            
        return $output;
    }   
}

if ( ! function_exists('api_detail_pasien'))
{
    // API detail pasien
    function api_detail_pasien($endpoint, $token, $user_code, $visit_no)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'detail_pasien',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('Visit_No' => $visit_no),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_daftar_dokter'))
{
    // API detail pasien
    function api_daftar_dokter($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_dokter',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_detail_dokter'))
{
    // API detail pasien
    function api_detail_dokter($endpoint, $token, $user_code)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'detail_dokter',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('user_code' => $user_code),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('unique_array'))
{
    function unique_array($array, $key) {

		$temp_array = array();
	
		$i = 0;
	
		$key_array = array();
	
		
	
		foreach($array as $val) {
	
			if (!in_array($val[$key], $key_array)) {
	
				$key_array[$i] = $val[$key];
	
				$temp_array[$i] = $val;
	
			}
	
			$i++;
	
		}
	
		return $temp_array;
	
	}
}


if ( ! function_exists('api_daftar_obat'))
{
    // API detail pasien
    function api_daftar_obat($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_obat',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_daftar_durasi'))
{
    // API detail pasien
    function api_daftar_durasi($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_durasi',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_daftar_frekuensi'))
{
    // API detail pasien
    function api_daftar_frekuensi($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_frekuensi',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_daftar_instruksi'))
{
    // API detail pasien
    function api_daftar_instruksi($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_instruksi',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_daftar_user'))
{
    // API detail pasien
    function api_daftar_user($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'daftar_user',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_user'))
{
    // API detail pasien
    function api_user($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'user',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}

if ( ! function_exists('api_obat'))
{
    // API detail pasien
    function api_obat($endpoint, $token, $user_code, $params)
	{
		// try and catch get department
		try 
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $endpoint.'obat',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('params' => $params),
				CURLOPT_HTTPHEADER => array(
					'x-token: '.$token,
					'x-username: '.$user_code
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = json_decode($response, true);

			if ($response['metadata']['code'] === 200)
				// echo json_encode($response['response']['data']);
				return $response['response']['data'];
			// else
				// $this->Log_model->save_log($response, 'Detail Pasien Error');
		} catch (Exception $e) {
            // insert log
			// $this->Log_model->save_log($e, 'Detail Pasien Error');
		}
	}
	// data api section END  
}