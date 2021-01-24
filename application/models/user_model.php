<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tb_user";
    // public $id_auth;
    public $id_user;
    public $nik;
    public $nama_lengkap;
    public $username;
    public $level;
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
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],

            [
                'field' => 'level',
                'label' => 'Level',
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
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->nik = $post['nik'];
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->username = $post['username'];
        $this->level = $post['level'];
        $this->password = password_hash($post['password'], PASSWORD_BCRYPT);
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->nik = $post['nik'];
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->username = $post['username'];
        $this->level = $post['level'];
        $this->password = password_hash($post['password'], PASSWORD_BCRYPT);
        return $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
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
