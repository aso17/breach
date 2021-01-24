<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelangvis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelangvis');
		$this->load->model('model_kriteria');
		$this->load->model('model_visitor');
		// check_not_login();
	}

	public function index()
	{
		$data['pelangvis'] = $this->model_pelangvis->getAll();
		$this->template->load('shared/index', 'pelangvis/data_pelangvis', $data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$pelangvis = $this->model_pelangvis;
		$validation = $this->form_validation;
		$validation->set_rules($pelangvis->rules());
		if ($this->form_validation->run() == FALSE) {
			$data['tamu'] = $this->model_visitor->getAll();
			$data['kriteria_pelanggaran'] = $this->model_kriteria->getAll();
			$this->template->load('shared/index', 'pelangvis/add_pelangvis', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->model_pelangvis->save($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
				redirect('pelangvis', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('pelangvis');
		$pelangvis = $this->model_pelangvis;
		$validation = $this->form_validation;
		$validation->set_rules($pelangvis->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->model_pelangvis->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Diupdate!');
				redirect('pelangvis', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data Tidak Diupdate!');
				redirect('pelangvis', 'refresh');
			}
		}
		$data['pelangvis'] = $this->model_pelangvis->getById($id);
		if (!$data['pelangvis']) {
			$this->session->set_flashdata('error', 'Data Tidak Diupdate!');
			redirect('pelangvis', 'refresh');
		}
		$data['tamu'] = $this->model_visitor->getAll();
		$data['kriteria_pelanggaran'] = $this->model_kriteria->getAll();
		$this->template->load('shared/index', 'pelangvis/edit_pelangvis', $data);
	}
	public function delete($id)
	{
		$this->model_pelangvis->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
			redirect('pelangvis', 'refresh');
		}
	}
	public function detail($id_pelangvis)
	{
		$data['pelangvis'] = $this->model_pelangvis->detail_vis($id_pelangvis);
		$this->template->load('shared/index', 'pelangvis/detail_pelangvis', $data);
	}
	public function status_close($id)
	{
		$this->model_pelangvis->update_status_close($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Pelanggaran Close!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
