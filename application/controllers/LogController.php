<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LogController extends CI_Controller
{
    public function read_email($mail)
    {
        $email = $this->uri->segment(3);
        $this->load->model('LogModel');
        $this->LogModel->log_read_email($email);
    }
}