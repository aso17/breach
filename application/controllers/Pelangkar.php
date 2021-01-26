<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelangkar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelangkar');
		$this->load->model('model_pelanggaran');
		$this->load->model('model_kategori');
		$this->load->model('model_karyawan');
		// check_not_login();
	}

	public function index()
	{
		$data['pelangkar'] = $this->model_pelangkar->getAll();
		$this->template->load('shared/index', 'pelangkar/data_pelangkar', $data);
	}
	public function cari()
	{

		$nik = $_GET['nik'];
		$karyawan = $this->model_karyawan->getById($nik);

		$data = [
			// "no_ktp" => $kunjungan->no_ktp,
			"nama_lengkap" => $karyawan->nama_lengkap,
			"departemen" => $karyawan->departemen,


		];
		echo json_encode($data);
	}

	public function add()
	{



		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$pelangkar = $this->model_pelangkar;
		$validation = $this->form_validation;
		$validation->set_rules($pelangkar->rules());
		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->model_kategori->getAll();

			$this->template->load('shared/index', 'pelangkar/add_pelangkar', $data);
		} else {
			$id_pelanggaran = $this->model_pelanggaran->get_orderby('id_pelanggaran', 'tb_pelanggaran', 'DESC')->row();
			if (empty($id_pelanggaran)) {
				$id = 1;
			} else {
				$id = $id_pelanggaran->id_pelanggaran + 1;
			}

			$post = $this->input->post(null, TRUE);
			$this->model_pelanggaran->save($post);
			$this->model_pelangkar->save($post, $id);
			$this->session->set_flashdata('success', 'berhasil');
			redirect('pelangkar', 'refresh');
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