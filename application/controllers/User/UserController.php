<?php
// use App\Models\UserModel;

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data = [];
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('UserModel');
        $this->load->library('form_validation');
    }

    public function register_view()
    {
        $this->load->view("auth/register.php");
    }

    public function store()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() == false) {
            // failed
            $this->load->view('auth/register');

        } else {

            $data = [
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'name' => $this->input->post('name'),
                'sex' => $this->input->post('sex'),
                'age' => $this->input->post('age'),
                'job' => $this->input->post('job'),

            ];
            $this->load->model('UserModel');
            $user = [
                "email" => $data['email'],
                "password" => $data['password'],
                "name" => $data['name'],
                "sex" => $data['sex'],
                "age" => $data['age'],
                "job" => $data['job'],
            ];
            $result = $this->UserModel->save($user);
            $user_id = $this->UserModel->getId($user['email']);
                            $logged_in = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    // 'verify' => $user_info->verify,
                ];
                $this->session->set_userdata('logged_in', $logged_in);
            $this->load->model('MailModel');
            $this->MailModel->send_email($data['email'], $user_id);
            redirect(base_url());

           
        }
    }

    public function user_verify($id)
    {
        $this->load->Model("UserModel");
        $this->UserModel->verify_check($id);
        $this->load->view('auth/verifyview.php');
    }

    public function login_view()
    {
        $this->load->view("auth/login.php");
    }

//     public function loginAuth()
//     {
        
//         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
//         $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
//         if ($this->form_validation->run() == false) {
//             $this->load->view('auth/login');
//         } else {
//            $user_login = array(
//              'email' => $this->input->post('email'),
//              'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
             
//         );

//         }
     
// //$user_login['user_email'],$user_login['user_password']
//         $data['users'] = $this->UserModel->login_user();
//          if($data)
//         {

//             $this->session->set_userdata('id', $data['users'][0]['id']);
//             $this->session->set_userdata('email', $data['users'][0]['email']);
//             $this->session->set_userdata('name', $data['users'][0]['name']);
//             $this->load->view('auth/successpage', $data);

//          }
//          else{
//           $this->load->view("auth.login.php");

//         }

//     }
//
    public function loginAuth(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        if ($this->form_validation->run() == false) {
           $this->load->view('auth/login');
        } else {
            $user = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),

            );
            $this->load->Model("LoginModel");
            $result = $this->LoginModel->check_user($user);
            if ($result) {
                $this->load->Model("UserModel");
                $user_info = $this->UserModel->getInfoByEmail($user['email']);
                $logged_in = [
                    'email' => $user_info->email,
                    'name' => $user_info->name,
                    // 'verify' => $user_info->verify,
                ];
                $this->session->set_userdata('logged_in', $logged_in);
                // $this->session->set_flashdata('notify', 'Login Success!');
                $this->load->view('auth/successpage');
            } else {
                print_r($user['email']);

                // hash password có vẫn đeef gì đó
                // set_value('error', 'Login fail! Please check your email and password again!');
                $this->load->view('auth/login');
                
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}
