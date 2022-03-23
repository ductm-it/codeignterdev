<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CategoryController extends CI_Controller
{
    public function viewCategory(){
        $this->load->model('CategoryModel');
        $result['categorys'] = $this->CategoryModel->getCategory()->result_array();
        $this->load->view('category/viewCategory', $result);
    }

    public function addCategory(){
        $this->load->view('category/addcategory');
        $category = $this->input->post('category');
        if($category){
            $this->load->model('CategoryModel');
            $this->CategoryModel->addCategory($category);
        }
    }

    public function deleteCategory($id){
        $this->load->model('CategoryModel');
        $this->CategoryModel->deleteCategory($id);
    }

    public function editCategory($id){
        $this->load->model('CategoryModel');
        $result['category'] = $this->CategoryModel->getCategoryById($id)->result_array();
        $this->load->view('category/editCategory', $result);
    }

    public function updateCategory(){
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        if($category){
            $this->load->model('CategoryModel');    
            $this->CategoryModel->updateCategory($id, $category);           
        }
        
    }
}