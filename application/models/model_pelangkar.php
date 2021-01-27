<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelangkar extends CI_Model
{
    private $_table = "tb_pelangkar";
    public $id_pelangkar;
    public $nik_karyawan;
    public $id_pelanggaran;


    public function rules()
    {
        return [

            [
                'field' => 'nik',
                'label' => 'nik',
                'rules' => 'required'
            ],




            [
                'field' => 'kategori',
                'label' => 'Kategori Pelanggaran',
                'rules' => 'required'
            ],

            [
                'field' => 'ket_pelanggaran',
                'label' => 'Keterangan Pelanggaran',
                'rules' => 'required'
            ],

            [
                'field' => 'waktu',
                'label' => 'Waktu',
                'rules' => 'required'
            ],



        ];
    }
    public function getAll()
    {
        $this->db->select('*');

        $this->db->from($this->_table);
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan = tb_pelangkar.nik_karyawan', 'left');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran = tb_pelangkar.id_pelanggaran', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {

        return $this->db->get_where($this->_table, ["id_pelangkar" => $id])->row();
    }
    public function  getbyid_join($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran = tb_pelangkar.id_pelanggaran', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_pelanggaran.id_kategori', 'left');
        $this->db->join('tb_karyawan', 'tb_karyawan.nik_karyawan = tb_pelangkar.nik_karyawan', 'left');
        $this->db->join('tb_posisi', 'tb_posisi.id_posisi = tb_karyawan.id_posisi', 'left');
        $query = $this->db->where('tb_pelangkar.id_pelangkar', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function save($post, $id)
    {

        $this->id_pelangkar = uniqid('pekar');
        $this->nik_karyawan = $post['nik'];
        $this->id_pelanggaran = $id;
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $file = $_FILES['bukti'];
        if ($file) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $bukti = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->id_pelangkar = $post['id_pelangkar'];
        $this->nik_karyawan = $post['nik_karyawan'];
        $this->nama_karyawan = $post['nama_karyawan'];
        $this->departemen = $post['departemen'];
        $this->kriteria = $post['kriteria'];
        $this->ket_pelanggaran = $post['ket_pelanggaran'];
        $this->waktu = $post['waktu'];
        $this->bukti = $bukti;
        $this->status = 'open';
        return $this->db->update($this->_table, $this, array('id_pelangkar' => $post['id_pelangkar']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pelangkar" => $id));
    }

    public function detail_kar($id_pelangkar)
    {
        $this->db->select('*');
        $this->db->join('tb_dept', 'tb_dept.id_dept = tb_pelangkar.departemen', 'left');
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_pelangkar.kriteria', 'left');
        $this->db->from($this->_table);
        $this->db->where('id_pelangkar', $id_pelangkar);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_status_open()
    {
        $post = $this->input->post();
        $this->id_pelangkar = $post['id_pelangkar'];
        $this->status = 'open';
        return $this->db->update($this->_table, $this, array('id_pelangkar' => $post['id_pelangkar']));
    }

    public function update_status_close($id)
    {
        $this->db->set('status', 'close');
        $this->db->where('id_pelangkar', $id);
        $this->db->update('tb_pelangkar');
    }

    function chart()
    {
        $this->db->group_by('kriteria');
        $this->db->select('kriteria');
        $this->db->select("count(*) as total");
        return $this->db->from('tb_pelangkar');
    }
}