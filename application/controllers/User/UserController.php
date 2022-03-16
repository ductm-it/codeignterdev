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
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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
            $this->load->model('MailModel');
            $this->MailModel->send_email($data['email'], $user_id);
            redirect(base_url());

            // if ($result == true) {
            //     $logged_in = [
            //         'email' => $user['email'],
            //         'name' => $user['name'],
            //     ];
            //     $this->session->set_userdata('logged_in', $logged_in);
            //     $user_id = $this->UserModel->getId($user['email']);
            //     $this->load->model('MailModel');
            //     $this->MailModel->send_email($email, $user_id);
            //     redirect(base_url());
            // } else {
            //     set_value('error', 'Login fail! Please check your email and password again!');
            //     $this->load->view('auth/login');

            // }

            // $user_id = $this->UserModel->getId($email);
            // $id = $user_id['id'];

            // var_dump($user_id);
            // return;
            // nó k tìm ra được id ở đây nè
            // $this->load->model('MailModel');
            // $this->MailModel->send_email($data['email'], $user_id);
            // $result = $this->UserModel->save($data);
            // redirect(base_url());

            // if ($result) {
            //     $this->session->set_flashdata('status', 'Registered Successfully.! Go to Login');
            //     redirect(base_url());
            // } else {
            //     $this->session->set_flashdata('status', 'Something Went Wrong.!');
            //     $this->load->view('auth/register');
            // }
        }
    }

    public function user_verify($id)
    {
        $this->load->Model("UserModel");
        $this->UserModel->verify_check($id);
        $this->load->view('auth/verifyview.php');
        // này là khi nhấn link mà ba, còn ra cái id kèm theo thì bên đăng ký
    }

    public function login_view()
    {
        $this->load->view("auth/login.php");
    }

    public function loginAuth()
    {
        $user_login = array(

             'email' => $this->input->post('email'),
             'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

        );
//$user_login['user_email'],$user_login['user_password']
        $data['users'] = $this->UserModel->login_user();
        //  if($data)
        //{

        $this->session->set_userdata('id', $data['users'][0]['id']);
        $this->session->set_userdata('email', $data['users'][0]['email']);
        $this->session->set_userdata('name', $data['users'][0]['name']);
        // $this->session->set_userdata('user_age', $data['users'][0]['age']);
        // $this->session->set_userdata('user_mobile', $data['users'][0]['user_mobile']);
        echo $this->session->set_userdata('id');
        $this->load->view('auth/successpage', $data);

        //  }
        //  else{
        //   $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        //   $this->load->view("login.php");

        // }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}
