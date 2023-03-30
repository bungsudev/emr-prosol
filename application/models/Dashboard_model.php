<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function jumlah_pasien()
    {
        //count jumlah_pasien
        return $query = $this->db->query("SELECT * FROM pasien")->num_rows();
    }
    public function jumlah_antrian()
    {
        //count jumlah_antrian
        return $query = $this->db->query("SELECT * FROM registrasi where status_antrian = 'Menunggu'")->num_rows();
    }
    public function jumlah_konsul()
    {
        //count jumlah_konsul
        return $query = $this->db->query("SELECT * FROM registrasi where status_antrian = 'Konsultasi'")->num_rows();
    }
    public function jumlah_selesai()
    {
        //count jumlah_selesai
        return $query = $this->db->query("SELECT * FROM registrasi where status_antrian = 'Selesai'")->num_rows();
    }

    public function chart_kunjungan()
	{
        $first = date('Y-m-01');
        $last = date('Y-m-t');
        // @date_start := (SELECT MIN(visit_date) FROM registrasi), 
        // @date_end := (SELECT MAX(visit_date) FROM registrasi), 
        $sql = "set
        @date_start := '$first', 
        @date_end := '$last', 
        @i := -1;";
        $this->db->query($sql);
		$query = $this->db->query("
        SELECT DATE(ADDDATE(@date_start, INTERVAL @i:=@i+1 DAY)) AS date,
        IFNULL((
            SELECT COUNT(*) FROM registrasi AS m2
            WHERE DATE(m2.visit_date) = DATE(ADDDATE(@date_start, INTERVAL @i DAY))
        ),0) AS total
        FROM registrasi AS m1
        HAVING @i < DATEDIFF(@date_end, @date_start) 
        ");
		return $query->result();
	}
}
