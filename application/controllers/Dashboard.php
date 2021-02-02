<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('model_pelanggaran');
		check_not_login();
	}

	public function index()
	{
		$data['vringan'] = $this->model_pelanggaran->get_num1();
		$data['vsedang'] = $this->model_pelanggaran->get_num2();
		$data['vberat'] = $this->model_pelanggaran->get_num3();
		$data['kringan'] = $this->model_pelanggaran->get_num4();
		$data['ksedang'] = $this->model_pelanggaran->get_num5();
		$data['kberat'] = $this->model_pelanggaran->get_num6();


		$this->template->load('shared/index', 'dashboard/index', $data);
	}
}