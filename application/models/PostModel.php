<?php
class PostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPost($slug = FALSE){
        if($slug === FALSE){
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }
}