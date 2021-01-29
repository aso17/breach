<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_laporan extends CI_Model
{
    private $_table = "tb_pelangkar";
    // public $id_auth;
    public $id_pelangkar;
    public $id_pelanggaran;
    public $nik_karyawan;


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

        return $this->db->get_where($this->_table, ["id_pelangkar" => $id])->row();
    }

    public function filterBytanggal($tanggalawal, $tanggalakhir)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran = tb_pelangkar.id_pelanggaran', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_pelanggaran.id_kategori', 'left');
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan = tb_pelangkar.nik_karyawan', 'left');
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi = tb_karyawan.id_posisi', 'left');
        $this->db->where('tb_pelanggaran.waktu >=', $tanggalawal);
        $this->db->where('tb_pelanggaran.waktu <=', $tanggalakhir);
        $query = $this->db->get();
        return $query->result();
    }
}