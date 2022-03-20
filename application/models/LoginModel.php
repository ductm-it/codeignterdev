<?php
class LoginModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function check_user($user){
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
}
?>
