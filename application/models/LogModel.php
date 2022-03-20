<?php
class LogModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log_send_email($user_email)
    {
        $this->db->where("email", $user_email);
        $query = $this->db->get('logs');
        $row = $query->row();
        if (!$row->email) {

            $send_at = gmdate('Y-m-d H:i:s');
            $add = [
                "email" => $user_email,
                "sending_at" => $send_at
            ];

            if ($this->db->insert('logs', $add)) {
                return true;
            }
        }
        return false;
    }

    public function log_read_email($user_email)
    {
        $this->db->where("email", $user_email);
        $query = $this->db->get('logs');
        $read_at = gmdate('Y-m-d H:i:s');

        if ($query) {
            $this->db->set('reading_at', $read_at);
            $this->db->update('logs');
            return true;
        }
        return false;
    }

    // store only first time
    public function log_download($user_email)
    {
        $this->db->where("email", $user_email);
        $query = $this->db->get('logs');
        $download_at = gmdate('Y-m-d H:i:s');

        if (!$query->row()->download_at) {
            $this->db->set('download_at', $download_at);
            $this->db->update('logs');
            return true;
        }
        return false;
    }
}