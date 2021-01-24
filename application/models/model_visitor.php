<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_visitor extends CI_Model
{
    private $_table = "tb_visitor";
    public $id_visitor;
    public $no_ktp;
    public $nama_visitor;
    public $alamat;
    public $nama_perusahaan;



    public function rules()
    {
        return [

            [
                'field' => 'no_ktp',
                'label' => 'No KTP',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_visitor',
                'label' => 'Nama Visitor',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_perusahaan',
                'label' => 'Nama Perusahaan',
                'rules' => 'required'
            ],

        ];
    }
    public function getBy_ktp($id)
    {
        $this->db->select('*');
        $this->db->from('tb_visitor');
        $this->db->where('tb_visitor.no_ktp', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_visitor" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_visitor = uniqid();
        $this->no_ktp = $post['no_ktp'];
        $this->nama_visitor = $post['nama_visitor'];
        $this->alamat = $post['alamat'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $this->id_visitor = $post['id_visitor'];
        $this->no_ktp = $post['no_ktp'];
        $this->nama_visitor = $post['nama_visitor'];
        $this->alamat = $post['alamat'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        return $this->db->update($this->_table, $this, array('id_visitor' => $post['id_visitor']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_visitor" => $id));
    }
}
