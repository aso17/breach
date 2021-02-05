<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tb_user";
    // public $id_auth;
    public $id_user;
    public $nik_karyawan;
    public $username;
    public $password;

    // public function login($post)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_user');
    //     $this->db->where('username', $post['username']);
    //     $this->db->where('password', md5($post['password']));
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function rules()
    {
        return [

            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required'
            ],



            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],



            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan=tb_user.nik_karyawan');
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi=tb_karyawan.id_posisi');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }
    public function getby_nik($nik)
    {
        return $this->db->get_where($this->_table, ["nik_karyawan" => $nik])->row();
    }
    public function getby_username($user)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan=tb_user.nik_karyawan');
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi=tb_karyawan.id_posisi');
        $this->db->where('username', $user);
        $query = $this->db->get()->row();
        return $query;
    }


    public function save($post)
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->nik_karyawan = $post['nik'];
        $this->username = $post['username'];
        $this->password = password_hash($post['password'], PASSWORD_BCRYPT);
        return $this->db->insert($this->_table, $this);
    }
    public function update($post, $id)
    {
        $data = [
            "nik_karyawan" => $post['nik'],
            "username" => $post['username']

        ];

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    // public function getUser($username=null,$pass=null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_user');
    //     $this->db->where('username', $username);
    //     $this->db->where('password', MD5($pass));
    //     $this->db->limit(1);

    //     $query = $this->db->get();

    //     return $query;
    // }
}