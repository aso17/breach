<?php

class model_auth extends CI_Model
{
    public function cek_login($username)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan=tb_user.nik_karyawan');
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi=tb_karyawan.id_posisi');
        $this->db->where('tb_user.username', $username);
        $query = $this->db->get()->row_array();
        return $query;
    }
}