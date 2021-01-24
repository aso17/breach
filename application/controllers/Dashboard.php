<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// check_not_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->user_model->getById($id);


		$this->template->load('shared/index', 'dashboard/dashboard', $data);
	}
}
