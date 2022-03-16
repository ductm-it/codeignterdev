<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MailerController extends CI_Controller{
        function  __construct(){
            parent::__construct();
            $this->load->library('phpmailer_lib');
            $this->load->library('session');
            $this->load->helper('form');
        }

        public function index(){
            $this->load->view("mailer_view");
        }

        // public function verify($email_code, $email_address) {
        //     if($this->user_model->verifyEmail($email_code, $email_address)){
        //     $this->load->view('templates/header');
        //     $this->load->view('users/email_validated');
        //     $this->load->view('templates/footer'); 
        //     } else {
        //         echo 'error'.$this->config->item('admin_email');    
        //     }
        // }
    }

    
?>