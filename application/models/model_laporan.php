<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_laporan extends CI_Model
{
    private $_table = "tb_pelangkar";
    // public $id_auth;
    public $id_pelangkar;
    public $nik_karyawan;
    public $nama_karyawan;
    public $departemen;
    public $kriteria;
    public $ket_pelanggaran;
    public $waktu;
    public $status;

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
        $this->db->join('tb_dept', 'tb_dept.id_dept = tb_pelangkar.departemen', 'left');
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_pelangkar.kriteria', 'left');
        $this->db->where('tb_pelangkar.waktu >=', $tanggalawal);
        $this->db->where('tb_pelangkar.waktu <=', $tanggalakhir);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
}
