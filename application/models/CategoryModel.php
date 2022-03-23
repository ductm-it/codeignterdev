<?php
class CategoryModel extends CI_Model
{
    public function addCategory($category){
        $object = array('name' => $category);
        $this->db->insert('categorys', $object);
        redirect('viewcategory', 'refresh');
    }

    public function getCategory(){
        return $this->db->get('categorys');
    }

    public function deleteCategory($id){
        $this->db->where('id', $id);
        $this->db->delete('categorys');
        redirect('viewcategory', 'refresh');
    }

    public function getCategoryById($id){
        $this->db->where('id', $id);
        return $this->db->get('categorys');
      
    }

    public function updateCategory($id, $category){
        $this->db->where('id', $id);
        $object = array('name' => $category);
        $this->db->update('categorys',$object);
        redirect('viewcategory', 'refresh');

    }
}