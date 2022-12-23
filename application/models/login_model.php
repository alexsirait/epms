<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function check_user($username, $password)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('fix_epms');
        return $query;
    }


    public function keamanan()
    {
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
}
