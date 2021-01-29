<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_laporan');
        // $this->load->model('model_departemen');
        // $this->load->model('model_kriteria');
        // check_not_login();
    }

    function filter()
    {
        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
        $datafilter = $this->model_laporan;
        $validation = $this->form_validation;
        $validation->set_rules($datafilter->rules());
        if ($this->form_validation->run() == FALSE) {
            $data['datafilter'] = null;
            $this->template->load('shared/index', 'laporan/data_laporan', $data);
        } else {
            $tanggalawal = $this->input->post('tanggalawal');
            $tanggalakhir = $this->input->post('tanggalakhir');
            $data['tanggalawal'] = $tanggalawal;
            $data['tanggalakhir'] = $tanggalakhir;

            $data['subtitle'] = "Dari tanggal :  " . $tanggalawal . " Sampai tanggal :  " . $tanggalakhir;
            $data['datafilter'] = $this->model_laporan->filterBytanggal($tanggalawal, $tanggalakhir);
            $this->template->load('shared/index', 'laporan/data_laporan', $data);
        }
    }
}