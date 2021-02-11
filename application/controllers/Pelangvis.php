<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelangvis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelangvis');
		$this->load->model('model_kunjungan');
		$this->load->model('model_visitor');
		$this->load->model('model_kategori');
		$this->load->model('model_pelanggaran');
		check_not_login();
	}

	public function index()
	{
		$data['pelangvis'] = $this->model_pelangvis->get_join();
		$this->template->load('shared/index', 'pelangvis/data_pelangvis', $data);
	}
	public function cari()
	{

		$novisit = $_GET['novisit'];
		$kunjungan = $this->model_kunjungan->getByno_visit($novisit);
		// var_dump($kunjungan);
		// die;

		$data = [

			"id_kunjungan" => $kunjungan->id_kunjungan,
			"nama_visitor" => $kunjungan->nama_visitor,
			"nama_perusahaan" => $kunjungan->nama_perusahaan,
			"alamat" => $kunjungan->alamat,
			"no_kendaraan" => $kunjungan->no_kendaraan,
			"jam_masuk" => $kunjungan->jam_masuk,


		];
		echo json_encode($data);
	}

	public function add()
	{

		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
		$this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
		$pelangvis = $this->model_pelangvis;
		$validation = $this->form_validation;
		$validation->set_rules($pelangvis->rules());
		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->model_kategori->getAll();
			$this->template->load('shared/index', 'pelangvis/add_pelangvis', $data);
		} else {
			$id_pelanggaran = $this->model_pelanggaran->get_orderby('id_pelanggaran', 'tb_pelanggaran', 'DESC')->row();
			if (empty($id_pelanggaran)) {
				$id = 1;
			} else {
				$id = $id_pelanggaran->id_pelanggaran + 1;
			}

			$post = $this->input->post(null, TRUE);
			$this->model_pelanggaran->save($post, $id);
			$this->model_pelangvis->save($post, $id);

			$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
			redirect('pelangvis', 'refresh');
		}
	}

	public function edit($id = null)
	{

		$data['pelangvis'] = $this->model_pelangvis->getbyid_join($id);
		$data['kategori'] = $this->model_kategori->getAll();
		$this->template->load('shared/index', 'pelangvis/edit_pelangvis', $data);
	}
	public function change()
	{
		$post = $this->input->post(null, TRUE);
		$this->model_pelanggaran->update_vis($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Diupdate!');
			redirect('pelangvis', 'refresh');
		} else {
			$this->session->set_flashdata('warning', 'Data Tidak Diupdate!');
			redirect('pelangvis', 'refresh');
		}
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
	public function delete($id)
	{
		$this->model_pelanggaran->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
			redirect('pelangvis', 'refresh');
		}
	}
	public function detail($id_pelangvis)
	{
		$data['pelangvis'] = $this->model_pelangvis->getbyid_join($id_pelangvis);
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
