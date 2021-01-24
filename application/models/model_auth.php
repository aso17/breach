<?php

class model_auth extends CI_Model
{
    public function cek_login($username)
    {
        return $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
    }
}
