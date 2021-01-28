<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_karyawan extends CI_Model
{
    private $_table = "tb_karyawan";
    public $nik_karyawan;
    public $id_posisi;
    public $nama_lengkap;
    public $departemen;
    public $j_kelamin;
    public $email;
    public $telp;


    public function rules()
    {
        return [

            [
                'field' => 'nik_karyawan',
                'label' => 'NIK Karyawan',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],

            [
                'field' => 'departemen',
                'label' => 'Departemen',
                'rules' => 'required'
            ],

            [
                'field' => 'id_posisi',
                'label' => 'ID Posisi',
                'rules' => 'required'
            ],

            [
                'field' => 'j_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],

            [
                'field' => 'telp',
                'label' => 'Telepon',
                'rules' => 'required'
            ],


        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi = tb_karyawan.id_posisi', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nik_karyawan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nik_karyawan = $post['nik_karyawan'];;
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->departemen = $post['departemen'];
        $this->id_posisi = $post['id_posisi'];
        $this->j_kelamin = $post['j_kelamin'];
        $this->email = $post['email'];
        $this->telp = $post['telp'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $this->nik_karyawan = $post['nik_karyawan'];;
        $this->nama_lengkap = $post['nama_lengkap'];
        $this->departemen = $post['departemen'];
        $this->id_posisi = $post['id_posisi'];
        $this->j_kelamin = $post['j_kelamin'];
        $this->email = $post['email'];
        $this->telp = $post['telp'];
        return $this->db->update($this->_table, $this, array('nik_karyawan' => $post['nik_karyawan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nik_karyawan" => $id));
    }
}