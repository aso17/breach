<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kunjungan extends CI_Model
{
    private $_table = "tb_kunjungan";
    public $id_kunjungan;
    public $id_visitor;
    public $no_ktp;
    public $nama_visitor;
    public $alamat;
    public $nama_perusahaan;
    public $no_kendaraan;
    public $bertemu;
    public $kepentingan;
    public $jam_masuk;
    public $jam_keluar;



    public function rules()
    {
        return [


            // [
            //     'field' => 'no_ktp',
            //     'label' => 'No KTP',
            //     'rules' => 'required'
            // ],

            // [
            //     'field' => 'nama_visitor',
            //     'label' => 'Nama Visitor',
            //     'rules' => 'required'
            // ],

            // [
            //     'field' => 'alamat',
            //     'label' => 'Alamat',
            //     'rules' => 'required'
            // ],

            // [
            //     'field' => 'nama_perusahaan',
            //     'label' => 'Nama Perusahaan',
            //     'rules' => 'required'
            // ],
            [
                'field' => 'id_visitor',
                'label' => 'ID VISITOR',
                'rules' => 'required'
            ],

            [
                'field' => 'no_kendaraan',
                'label' => 'No Kendaraan',
                'rules' => 'required'
            ],

            [
                'field' => 'bertemu',
                'label' => 'Bertemu',
                'rules' => 'required'
            ],

            [
                'field' => 'kepentingan',
                'label' => 'Kepentingan',
                'rules' => 'required'
            ],

            [
                'field' => 'jam_masuk',
                'label' => 'Jam Masuk',
                'rules' => 'required'
            ],

            [
                'field' => 'jam_keluar',
                'label' => 'Jam Keluar',
                'rules' => 'required'
            ],

        ];
    }



    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('tb_visitor', ' tb_visitor.no_ktp tb_visitor.nama_visitor tb_visitor.alamat tb_visitor.nama_perusahaan tb_visitor.id_visitor = tb_kunjungan.id_visitor', 'left');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kunjungan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kunjungan = uniqid();
        $this->id_visitor = $post['id_visitor'];
        $this->no_ktp = $post['no_ktp'];
        $this->nama_visitor = $post['nama_visitor'];
        $this->alamat = $post['alamat'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        $this->no_kendaraan = $post['no_kendaraan'];
        $this->bertemu = $post['bertemu'];
        $this->kepentingan = $post['kepentingan'];
        $this->jam_masuk = $post['jam_masuk'];
        $this->jam_keluar = $post['jam_keluar'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $this->id_kunjungan = $post['id_kunjungan'];
        $this->no_kendaraan = $post['no_kendaraan'];
        $this->betemu = $post['bertemu'];
        $this->kepentingan = $post['kepentingan'];
        $this->jam_masuk = $post['jam_masuk'];
        $this->jam_keluar = $post['jam_keluar'];
        return $this->db->update($this->_table, $this, array('id_kunjungan' => $post['id_kunjungan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kunjungan" => $id));
    }
}