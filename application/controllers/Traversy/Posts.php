<?php
    class Posts extends CI_Controller{
        public function index(){

            $data['title'] = 'Lastese Page';
            $this->load->model('PostModel');
            $data['posts'] = $this->PostModel->getPost();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

        public function view($slug = NULL){
            $data['post'] = $this->PostModel->getPost($slug);

            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = $data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }

        public function create(){
            $data['title'] = 'Create Post';
            $data['categories'] = $this->PostModel->getCategory();
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');
            if($this->form_validation->run() == false){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->PostModel->createPost();
                redirect('posts', 'refresh');
            }
        }

        public function delete($id){
            $this->PostModel->deletePost($id);
            redirect('posts', 'refresh');
        }

        public function edit($slug){
            $data['post'] = $this->PostModel->getPost($slug);
            $data['categories'] = $this->PostModel->getCategory();

            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = 'Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            $this->PostModel->updatePost();
            redirect('posts', 'refresh');

        }

      
    }