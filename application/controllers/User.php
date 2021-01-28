<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('model_karyawan');
		// check_not_login();
	}

	public function index()
	{
		$data['user'] = $this->user_model->getAll();
		$this->template->load('shared/index', 'user/data_user', $data);
	}

	public function add()
	{
		// $nik1 = $this->input->post('nik');
		// $user = $this->user_model->getby_nik($nik1);
		// var_dump($user);
		// die;
		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());
		if ($this->form_validation->run() == false) {
			$this->template->load('shared/index', 'user/add_user');
		} else {
			$post = $this->input->post(null, TRUE);
			$nik = $this->input->post('nik');
			$karyawan = $this->model_karyawan->getbyid($nik);
			$users = $this->user_model->getby_nik($nik);


			if ($karyawan != null) {
				if ($users == false) {
					$this->user_model->save($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'user berhasil di tambah!');
						redirect('user', 'refresh');
					}
				} else {
					$this->session->set_flashdata('warning', 'already available!');
					redirect('user/add', 'refresh');
				}
			} else {
				$this->session->set_flashdata('error', 'nik karyawan not found!');
				redirect('user/add', 'refresh');
			}
		}
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('user');
		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, TRUE);
			$this->user_model->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data User Berhasil Diupdate!');
				redirect('user', 'refresh');
			} else {
				$this->session->set_flashdata('warning', 'Data User Tidak Diupdate!');
				redirect('user', 'refresh');
			}
		}
		$data['user'] = $this->user_model->getById($id);
		if (!$data['user']) {
			$this->session->set_flashdata('error', 'Data User Tidak Diupdate!');
			redirect('user', 'refresh');
		}
		$data['user'] = $this->user_model->getById($id);

		$this->template->load('shared/index', 'user/edit_user', $data);
	}
	public function delete($id)
	{
		$this->user_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
			redirect('user', 'refresh');
		}
	}
	public function edit_pass()
	{
		$valid = $this->form_validation;
		$valid->set_rules('password', 'Password Lama', 'required|trim');
		$valid->set_rules('password_baru', 'Password Baru', 'required|trim|matches[password_konfir]');
		$valid->set_rules('password_konfir', 'Konfirmasi Password', 'required|trim|matches[password_baru]');
		if ($valid->run() == false) {

			$this->template->load('shared/index', 'user/edit_pass');
		} else {
			$user = $this->user_model->getById($this->session->userdata('id_user'));
			$pass = $this->input->post('password');
			$pass_baru = $this->input->post('password_baru');
			if (!password_verify($pass, $user->password)) {
				$this->session->set_flashdata('error', 'password lama salah!');
				redirect('user/edit_pass');
			} else {
				$hass = password_hash($pass_baru, PASSWORD_BCRYPT);
				$this->db->set('password', $hass);
				$this->db->where('id_user', $user->id_user);
				$this->db->update('tb_user');
				$this->session->set_flashdata('success', 'ubah password berhasil');
				redirect('user/edit_pass');
			}
		}
	}
}