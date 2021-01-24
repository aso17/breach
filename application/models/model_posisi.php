<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_posisi extends CI_Model
{
    private $_table = "tb_posisi";
    public $id_posisi;
    public $bagian;


    public function rules()
    {
        return [

            [
                'field' => 'id_posisi',
                'label' => 'id_posisi',
                'rules' => 'required'
            ],

            [
                'field' => 'bagian',
                'label' => 'Bagian',
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
        return $this->db->get_where($this->_table, ["id_posisi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_posisi = $post['id_posisi'];
        $this->bagian = $post['bagian'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        $post = $this->input->post();
        $this->id_posisi = $post['id_posisi'];
        $this->bagian = $post['bagian'];
        return $this->db->update($this->_table, $this, array('id_posisi' => $post['id_posisi']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_posisi" => $id));
    }
}
