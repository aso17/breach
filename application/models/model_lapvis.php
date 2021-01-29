<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_lapvis extends CI_Model
{
    private $_table = "tb_pelangvis";
    // public $id_auth;
    public $id_pelangvis;
    public $id_kunjungan;
    public $id_pelanggaran;
    public $lampiran_ktp;


    public function rules()
    {
        return [

            [
                'field' => 'tanggalawal',
                'label' => 'Tanggal Awal',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggalakhir',
                'label' => 'Tanggal Akhir',
                'rules' => 'required'
            ],

        ];
    }


    public function getById($id)
    {

        return $this->db->get_where($this->_table, ["id_pelangvis" => $id])->row();
    }

    public function filterBytanggal($tanggalawal, $tanggalakhir)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran = tb_pelangvis.id_pelanggaran', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_pelanggaran.id_kategori', 'left');
        $this->db->join('tb_kunjungan', 'tb_kunjungan.id_kunjungan = tb_pelangvis.id_kunjungan', 'left');
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor = tb_kunjungan.id_visitor', 'left');
        $this->db->where('tb_pelanggaran.waktu >=', $tanggalawal);
        $this->db->where('tb_pelanggaran.waktu <=', $tanggalakhir);
        $query = $this->db->get();
        return $query->result();
    }
}