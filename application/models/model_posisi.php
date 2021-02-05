<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_posisi extends CI_Model
{
    private $_table = "tb_posisi";
    public $id_posisi;
    public $level;


    public function rules()
    {
        return [

            [
                'field' => 'id_posisi',
                'label' => 'id_posisi',
                'rules' => 'required'
            ],

            [
                'field' => 'level',
                'label' => 'level',
                'rules' => 'required'
            ],



        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_posisi');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_posisi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_posisi = $post['id_posisi'];
        $this->level = $post['level'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($post, $id)
    {
        $data = [
            "level" => $post['level']
        ];

        $this->db->set('level', $data);
        $this->db->where('id_posisi', $id);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_posisi" => $id));
    }
}