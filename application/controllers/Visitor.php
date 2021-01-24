<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_visitor');
		// check_not_login();
	}

	public function index()
	{
		$data['visitor'] = $this->model_visitor->getAll();
		$this->template->load('shared/index', 'visitor/data_visitor', $data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$visitor = $this->model_visitor;
		$validation = $this->form_validation;
		$validation->set_rules($visitor->rules());
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('shared/index', 'visitor/add_visitor');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->model_visitor->save($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Visitor Berhasil Ditambahkan!');
				redirect('visitor', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('visitor');
		$visitor = $this->model_visitor;
		$validation = $this->form_validation;
		$validation->set_rules($visitor->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->model_visitor->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Visitor Berhasil Diupdate!');
				redirect('visitor', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data Visitor Tidak Diupdate!');
				redirect('visitor', 'refresh');
			}
		}
		$data['visitor'] = $this->model_visitor->getById($id);
		if (!$data['visitor']) {
			$this->session->set_flashdata('error', 'Data Tidak Diupdate!');
			redirect('visitor', 'refresh');
		}
		$this->template->load('shared/index', 'visitor/edit_visitor', $data);
	}
	public function delete($id)
	{
		$this->model_visitor->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data visitor Berhasil Dihapus!');
			redirect('visitor', 'refresh');
		}
	}
}
