<?php

class UserModel extends CI_Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email',
        'password',
        'name',
        'sex',
        'age',
        'job',
        'created_at',
    ];
    public function save($user)
    {
        $this->db->insert('users', $user);
    }

    public function getId($email)
    {
        $this->db->where("email", $email);
        $query = $this->db->get('users');
        return $query->row()->id;

    }


    public function verify_check($id)
    {
        $this->db->where("id", $id);
        $this->db->update('users', ['verify' => true]);
    }

    public function login_user()
    {
        //$email,$pass
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->where('user_email', $email);
        // $this->db->where('user_password', $pass);

        if ($query = $this->db->get()) {
            return $query->result_array();
        } else {
            return false;
        }

    }
     public function getAllUser()
    {
        $this->load->model('UserModel');
        return $this->userModel->findAll();
    }

    function check_user($user){
		$condition = array('email' => $user['email'], 'password' => $user['password']);
		$this->db->where($condition);
		$query = $this->db->get('users');
		if ($query->num_rows() == 1){
			return true;
		}
		else
		{
			return false;
		}
	}
    
    function getInfoByEmail($email){
		$this->db->where("email",$email);
		$query = $this->db->get('users');

		if($query->num_rows()!=0){
			return $query->row();
		}
		else{
			return 0;
		}
	}
}
