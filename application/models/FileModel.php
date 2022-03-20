<?php
class FileModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function download($file_path)
    {
        $file_path = 'public/files/Report.pdf';
        $this->load->helper('download');

        $user = $_SESSION['logged_in'] ? $_SESSION['logged_in'] : '';
        if ($user && file_exists($file_path)) {
            force_download($file_path, null);
            $email = $user['email'];
            $this->load->model("LogModel");
            $this->LogModel->log_dowload($email);
            $this->session->set_flashdata('notify', 'Download success!');
        } else {
            $this->session->set_flashdata('notify', 'File not found!');
        }
        return redirect(base_url());
    }
}
