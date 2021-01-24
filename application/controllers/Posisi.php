<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_posisi');
        // check_not_login();
    }

    public function index()
    {
        $data['posisi'] = $this->model_posisi->getAll();
        $this->template->load('shared/index', 'posisi/data_posisi', $data);
    }

    public function add()
    {

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
        $posisi = $this->model_posisi;
        $validation = $this->form_validation;
        $validation->set_rules($posisi->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('shared/index', 'posisi/add_posisi');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->model_posisi->save($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Posisi Berhasil Ditambahkan!');
                redirect('posisi', 'refresh');
            }
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('posisi');
        $posisi = $this->model_posisi;
        $validation = $this->form_validation;
        $validation->set_rules($posisi->rules());

        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->model_posisi->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Posisi Berhasil Diupdate!');
                redirect('posisi', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data Posisi Tidak Diupdate!');
                redirect('posisi', 'refresh');
            }
        }
        $data['posisi'] = $this->model_posisi->getById($id);
        if (!$data['posisi']) {
            $this->session->set_flashdata('error', 'Data Posisi Tidak Diupdate!');
            redirect('posisi', 'refresh');
        }
        $this->template->load('shared/index', 'posisi/edit_posisi', $data);
    }
    public function delete($id)
    {
        $this->model_posisi->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Posisi Berhasil Dihapus!');
            redirect('posisi', 'refresh');
        }
    }
}
