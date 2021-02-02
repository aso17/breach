<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kunjungan');
        $this->load->model('model_visitor');
        check_not_login();
    }

    public function cari()
    {

        $novisit = $_GET['novisit'];
        $kunjungan = $this->model_visitor->getBy_visit($novisit);

        $data = [

            "nama_visitor" => $kunjungan->nama_visitor,
            "alamat" => $kunjungan->alamat,
            "nama_perusahaan" => $kunjungan->nama_perusahaan,

        ];
        echo json_encode($data);
    }

    public function index()
    {
        $data['kunjungan'] = $this->model_kunjungan->get_join();

        $this->template->load('shared/index', 'kunjungan/data_kunjungan', $data);
    }

    public function add()
    {

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
        $kunjungan = $this->model_kunjungan;
        $validation = $this->form_validation;
        $validation->set_rules($kunjungan->rules());
        if ($this->form_validation->run() == FALSE) {

            $this->template->load('shared/index', 'kunjungan/add_kunjungan');
        } else {

            $this->model_kunjungan->save();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'kunjungan Berhasil Ditambahkan!');
                redirect('kunjungan', 'refresh');
            }
        }
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('kunjungan');
        // $kunjungan = $this->model_kunjungan;


        // $validation = $this->form_validation;
        // $validation->set_rules($kunjungan->rules());

        // if ($this->form_validation->run()) {
        //     $post = $this->input->post(null, TRUE);
        //     $this->model_kunjungan->update($post);
        //     if ($this->db->affected_rows() > 0) {
        //         $this->session->set_flashdata('success', 'kunjungan Berhasil Diupdate!');
        //         redirect('kunjungan', 'refresh');
        //     } else {
        //         $this->session->set_flashdata('warning', 'Data kunjungan Tidak Diupdate!');
        //         redirect('kunjungan', 'refresh');
        //     }
        // }
        // if (!$data['kunjungan']) {
        //     $this->session->set_flashdata('error', 'Data Tidak Diupdate!');
        //     redirect('kunjungan', 'refresh');
        // }

        $data['kunjungan'] = $this->model_kunjungan->getById($id);

        $this->template->load('shared/index', 'kunjungan/edit_kunjungan', $data);
    }
    public function change()
    {
        $id = $this->input->post('id_kunjungan');
        $this->model_kunjungan->update($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'kunjungan Berhasil Diupdate!');
            redirect('kunjungan', 'refresh');
        } else {
            $this->session->set_flashdata('warning', 'Data kunjungan Tidak Diupdate!');
            redirect('kunjungan', 'refresh');
        }
    }
    public function delete($id)
    {
        $this->model_kunjungan->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data kunjungan Berhasil Dihapus!');
            redirect('kunjungan', 'refresh');
        }
    }
    public function out()
    {
        $id = $this->input->post('id_kunjungan');
        $jam = $this->input->post('jam_keluar');
        $this->model_kunjungan->change_out($id, $jam);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Kunjungan Berahir');
            redirect('kunjungan', 'refresh');
        }
    }
}