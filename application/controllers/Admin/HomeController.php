<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {


	public function index()
	{
        $this->load->helper('html');
		$this->load->view('admin/mainview');
	}

    public function list(){
        $query = $this->db->query("SELECT * FROM `users`");
        $data['result'] = $query->result_array();
        
        $this->load->view('admin/listaccview', $data);

    }

     public function log(){
        $query = $this->db->query("SELECT * FROM `users`");
        $data['result'] = $query->result_array();
        
        $this->load->view('admin/logview', $data);

    }

}
