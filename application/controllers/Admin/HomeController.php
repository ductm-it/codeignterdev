<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {


	public function index()
	{
        $this->load->helper('html');
		$this->load->view('admin/mainview');
	}

    public function list(){
        $this->load->view('admin/listaccview');

    }
}
