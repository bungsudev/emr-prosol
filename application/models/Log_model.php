<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'log_data';
    }
    
    public function save_log($log, $job)
    {
        $data = [
            'log' => $log,
            'job' => $job
        ];
        return $this->db->insert($this->table, $data);
    }

}