<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
    private $_table = "tb_kategori";
    public $id_kategori;
    public $kategori;

    public function rules()
    {
        return [

            [
                'field' => 'kategori',
                'label' => 'kategori',
                'rules' => 'required'
            ],



        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        $this->id_kategori = uniqid();
        $this->kategori = $post['kategori'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = [
            "kategori" => $post['kategori']
        ];
        $this->db->set('kategori', $data);
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }
}