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

    }


    public function download($alias)
    {
        $this->load->model("File_model");
        $this->File_model->download($alias);
    }

    public function send_mail_download($alias)
    {
        $this->load->model("MailerModel");
        $user_login = $this->session->userdata('logged_in');
        $email = $user_login['email'];
        $this->Mailer_model->send_mail_download($email, $alias);
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
