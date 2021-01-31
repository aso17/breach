<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kunjungan extends CI_Model
{
    private $_table = "tb_kunjungan";
    public $id_kunjungan;
    public $id_visitor;

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
            // [
            //     'field' => 'id_visitor',
            //     'label' => 'ID VISITOR',
            //     'rules' => 'required'
            // ],

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

    public function getByno_visit($no_visit)
    {
        $this->db->select('*');
        $this->db->from('tb_kunjungan');
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor=tb_kunjungan.id_visitor');
        $this->db->where('tb_kunjungan.id_visitor', $no_visit);
        $query = $this->db->get()->row();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post(null, TRUE);
        $this->id_kunjungan = uniqid('kun');
        $this->id_visitor = $post['novisit'];
        $this->no_kendaraan = $post['no_kendaraan'];
        $this->bertemu = $post['bertemu'];
        $this->kepentingan = $post['kepentingan'];
        $this->jam_masuk = $post['jam_masuk'];

        return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = [
            "id_visitor" => $post['novisit'],
            "no_kendaraan" => $post['no_kendaraan'],
            "bertemu" => $post['bertemu'],
            "kepentingan" => $post['kepentingan'],
            "jam_masuk" => $post['jam_masuk']
        ];
        $this->db->set($data);
        $this->db->where('id_kunjungan', $id);
        $this->db->update($this->_table, $data);

        // $this->id_kunjungan = $post['id_kunjungan'];
        // $this->no_kendaraan = $post['no_kendaraan'];
        // $this->betemu = $post['bertemu'];
        // $this->kepentingan = $post['kepentingan'];
        // $this->jam_masuk = $post['jam_masuk'];

        // return $this->db->update($this->_table, $this, array('id_kunjungan' => $post['id_kunjungan']));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kunjungan" => $id));
    }
    public function get_join()
    {
        $this->db->select('*');
        $this->db->from('tb_kunjungan');
        $this->db->join('tb_visitor', 'tb_visitor.id_visitor=tb_kunjungan.id_visitor');
        $query = $this->db->get()->result();
        return $query;
    }
    public function change_out($jam, $id)
    {
        $data = [
            "jam_keluar" => $jam
        ];
        $this->db->set('jam_keluar', $data);
        $this->db->where('id_kunjungan', $id);
        $this->db->update('tb_kunjungan', $data);
    }
}