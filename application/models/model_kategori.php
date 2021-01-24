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

    public function update($post)
    {
        $post = $this->input->post();
        $this->id_kategori = $post['id_kategori'];
        $this->kategori = $post['kategori'];
        return $this->db->update($this->_table, $this, array('id_kategori' => $post['id_kategori']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }
}
