<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_lapvis extends CI_Model
{
    private $_table = "tb_pelangvis";
    // public $id_auth;
    public $id_pelangvis;
    public $nik_visitor;
    public $nama_visitor;
    public $tamu;
    public $alamat;
    public $kriteria_pelanggaran;
    public $keterangan;
    public $waktu;

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
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor = tb_pelangvis.tamu', 'left');
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_pelangvis.kriteria_pelanggaran', 'left');
        $this->db->where('tb_pelangvis.waktu >=', $tanggalawal);
        $this->db->where('tb_pelangvis.waktu <=', $tanggalakhir);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
}
