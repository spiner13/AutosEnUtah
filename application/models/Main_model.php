<?php

class Main_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getvisitorInfo($ip)
    {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); 
        if($query && $query['status'] == 'success') { 
            //var_dump($query); exit();
            $query['ip'] = $ip;
            $query['time'] = date('Y-m-d h:m:s');
            unset( $query['status']);
            unset( $query['region']);
            unset( $query['timezone']);
            unset( $query['as']);
            unset( $query['query']);

            $this->db->insert('visitors', $query);
            
        } 
    }

    public function saveLead($data)
    {
        $this->db->insert('leads', $data);
    }
}
