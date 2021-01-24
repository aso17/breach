<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kategori');
		// check_not_login();
	}

	public function index()
	{
		$data['kategori'] = $this->model_kategori->getAll();
		$this->template->load('shared/index', 'kategori/data_kategori', $data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$kategori = $this->model_kategori;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('shared/index', 'kategori/add_kategori');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->model_kategori->save($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Kategori Pelanggaran Berhasil Ditambahkan!');
				redirect('kategori', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('kategori');
		$kategori = $this->model_kategori;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->model_kategori->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Kategori Pelanggaran Berhasil Diupdate!');
				redirect('kategori', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data Kategori Pelanggaran Tidak Diupdate!');
				redirect('kategori', 'refresh');
			}
		}
		$data['kategori'] = $this->model_kategori->getById($id);
		if (!$data['kategori']) {
			$this->session->set_flashdata('error', 'Data Kategori Pelanggaran Tidak Diupdate!');
			redirect('kategori', 'refresh');
		}
		$this->template->load('shared/index', 'kategori/edit_kategori', $data);
	}
	public function delete($id)
	{
		$this->model_kategori->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Kategori Pelanggaran Berhasil Dihapus!');
			redirect('kategori', 'refresh');
		}
	}
}