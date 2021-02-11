<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_karyawan');
		$this->load->model('model_posisi');
		check_not_login();
	}

	public function index()
	{
		$data['karyawan'] = $this->model_karyawan->getAll();
		$this->template->load('shared/index', 'karyawan/data_karyawan', $data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$karyawan = $this->model_karyawan;
		$validation = $this->form_validation;
		$validation->set_rules($karyawan->rules());
		if ($this->form_validation->run() == false) {
			$data['id_posisi'] = $this->model_posisi->getAll();
			$this->template->load('shared/index', 'karyawan/add_karyawan', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$nik = $this->input->post('nik_karyawan');
			$karyawan = $this->model_karyawan->getbyid_join($nik);
			if ($karyawan == false) {
				$this->model_karyawan->save($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'karyawan Berhasil Ditambahkan!');
					redirect('karyawan', 'refresh');
				}
			} else {

				$this->session->set_flashdata('warning', 'Nik karyawan sudah terdaftar!');
				redirect('karyawan/add', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('karyawan');
		$karyawan = $this->model_karyawan;
		$validation = $this->form_validation;
		$validation->set_rules($karyawan->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->model_karyawan->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'karyawan Berhasil Diupdate!');
				redirect('karyawan', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data karyawan Tidak Diupdate!');
				redirect('karyawan', 'refresh');
			}
		}
		$data['karyawan'] = $this->model_karyawan->getById($id);
		if (!$data['karyawan']) {
			$this->session->set_flashdata('error', 'Data karyawan Tidak Diupdate!');
			redirect('karyawan', 'refresh');
		}
		$data['id_posisi'] = $this->model_posisi->getAll();
		$this->template->load('shared/index', 'karyawan/edit_karyawan', $data);
	}
	public function delete($id)
	{
		$this->model_karyawan->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data karyawan Berhasil Dihapus!');
			redirect('karyawan', 'refresh');
		}
	}
}
