<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelangvis extends CI_Model
{
    private $_table = "tb_pelangvis";
    public $id_pelangvis;
    public $nik_visitor;
    public $nama_visitor;
    public $tamu;
    public $alamat;
    public $kriteria_pelanggaran;
    public $keterangan;
    public $bukti_pelanggaran;
    public $status;


    public function rules()
    {
        return [

            [
                'field' => 'nik_visitor',
                'label' => 'NIK KTP',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_visitor',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],

            [
                'field' => 'tamu',
                'label' => 'Tamu',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'kriteria_pelanggaran',
                'label' => 'Kriteria Pelanggaran',
                'rules' => 'required'
            ],

            [
                'field' => 'keterangan',
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
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor = tb_pelangvis.tamu', 'left');
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_pelangvis.kriteria_pelanggaran', 'left');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pelangvis" => $id])->row();
    }

    public function save($post)
    {
        $post = $this->input->post();
        $file = $_FILES['bukti_pelanggaran'];
        if ($file) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_pelanggaran')) {
                $bukti_pelanggaran = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->id_pelangvis = uniqid();
        $this->nik_visitor = $post['nik_visitor'];
        $this->nama_visitor = $post['nama_visitor'];
        $this->tamu = $post['tamu'];
        $this->alamat = $post['alamat'];
        $this->kriteria_pelanggaran = $post['kriteria_pelanggaran'];
        $this->keterangan = $post['keterangan'];
        $this->waktu = $post['waktu'];
        $this->bukti_pelanggaran = $bukti_pelanggaran;
        $this->status = 'open';
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $file = $_FILES['bukti_pelanggaran'];
        if ($file) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_pelanggaran')) {
                $bukti_pelanggaran = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->id_pelangvis = uniqid();
        $this->nik_visitor = $post['nik_visitor'];
        $this->nama_visitor = $post['nama_visitor'];
        $this->tamu = $post['tamu'];
        $this->alamat = $post['alamat'];
        $this->kriteria_pelanggaran = $post['kriteria_pelanggaran'];
        $this->keterangan = $post['keterangan'];
        $this->waktu = $post['waktu'];
        $this->bukti_pelanggaran = $bukti_pelanggaran;
        $this->status = 'open';
        return $this->db->update($this->_table, $this, array('id_pelangvis' => $post['id_pelangvis']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pelangvis" => $id));
    }
    public function detail_vis($id_pelangvis)
    {
        $this->db->select('*');
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor = tb_pelangvis.tamu', 'left');
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_pelangvis.kriteria_pelanggaran', 'left');
        $this->db->from($this->_table);
        $this->db->where('id_pelangvis', $id_pelangvis);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_status_open()
    {
        $post = $this->input->post();
        $this->id_pelangvis = $post['id_pelangvis'];
        $this->status = 'open';
        return $this->db->update($this->_table, $this, array('id_pelangvis' => $post['id_pelangvis']));
    }

    public function update_status_close($id)
    {
        $this->db->set('status', 'close');
        $this->db->where('id_pelangvis', $id);
        $this->db->update('tb_pelangvis');
    }
}
