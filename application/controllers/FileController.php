<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->library('session');
        $this->load->model('UserModel');
        $this->load->model('FileModel');

    }


      public function download($alias_alias)
    {
        $user_login = $this->session->userdata('logged_in');
        $email = $user_login['email'];

        if ($email) {
            $this->load->model("LogModel");
            $this->LogModel->log_download($email);
            $this->load->model("FileModel");
            $this->FileModel->download($alias_alias);
        }
    }

    public function send_mail_link_download()
    {
        $this->load->model("MailModel");
        $this->load->model("LogModel");
        $user_login = $this->session->userdata('logged_in');
        $email = $user_login['email'];
        $this->MailModel->send_email_download($email);
        $this->LogModel->log_send_email($email);
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
