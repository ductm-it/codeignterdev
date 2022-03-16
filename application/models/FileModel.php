<?php
class File_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function download($alias)
    {
        $this->load->helper('download');
        $file_info = $this->get_file_info($alias);
        $file_path = $file_info->path;
        $user = $_SESSION['logged_in'] ? $_SESSION['logged_in'] : '';
        if ($user && file_exists($file_path)) {
            force_download($file_path, null);
            log_message('info', 'DOWNLOAD-FILE:' . $file_path . ' - ' . date("Y-m-d H:i:s") . ' ' . $user['mail']);
            $this->session->set_flashdata('notify', 'Download success!');
        } else {
            $this->session->set_flashdata('notify', 'File not found!');
            log_message('info', 'DOWNLOAD-FAIL: ' . $file_path . ' ' . date("Y-m-d H:i:s") . ' ' . $user['mail']);
        }
        return redirect(base_url());
    }

    public function get_file_info($alias)
    {
        $this->db->where("alias", $alias);
        $query = $this->db->get('file');
        return $query->row();
    }
}
