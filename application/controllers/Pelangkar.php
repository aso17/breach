<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelangkar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelangkar');
		$this->load->model('model_departemen');
		$this->load->model('model_kriteria');
		// check_not_login();
	}

	public function index()
	{
		$data['pelangkar'] = $this->model_pelangkar->getAll();
		$this->template->load('shared/index', 'pelangkar/data_pelangkar', $data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$pelangkar = $this->model_pelangkar;
		$validation = $this->form_validation;
		$validation->set_rules($pelangkar->rules());
		if ($this->form_validation->run() == FALSE) {
			$data['departemen'] = $this->model_departemen->getAll();
			$data['kriteria'] = $this->model_kriteria->getAll();
			$this->template->load('shared/index', 'pelangkar/add_pelangkar', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->model_pelangkar->save($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
				redirect('pelangkar', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('pelangkar');
		$pelangkar = $this->model_pelangkar;
		$validation = $this->form_validation;
		$validation->set_rules($pelangkar->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->model_pelangkar->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Diupdate!');
				redirect('pelangkar', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data Tidak Diupdate!');
				redirect('pelangkar', 'refresh');
			}
		}
		$data['pelangkar'] = $this->model_pelangkar->getById($id);
		if (!$data['pelangkar']) {
			$this->session->set_flashdata('error', 'Data Tidak Diupdate!');
			redirect('pelangkar', 'refresh');
		}
		$data['departemen'] = $this->model_departemen->getAll();
		$data['kriteria'] = $this->model_kriteria->getAll();
		$this->template->load('shared/index', 'pelangkar/edit_pelangkar', $data);
	}
	public function delete($id)
	{
		$this->model_pelangkar->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
			redirect('pelangkar', 'refresh');
		}
	}
	public function detail($id_pelangkar)
	{
		$data['pelangkar'] = $this->model_pelangkar->detail_kar($id_pelangkar);
		$this->template->load('shared/index', 'pelangkar/detail_pelangkar', $data);
	}
	public function status_close($id)
	{
		$this->model_pelangkar->update_status_close($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Pelanggaran Close!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
