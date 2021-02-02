<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_visitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lapvis');

        check_not_login();
    }

    function filter_lapvis()
    {
        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!!!');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka!!!');
        $datafilter = $this->model_lapvis;
        $validation = $this->form_validation;
        $validation->set_rules($datafilter->rules());
        if ($this->form_validation->run() == FALSE) {
            $data['datafilter'] = null;
            $this->template->load('shared/index', 'laporan/data_lapvis', $data);
        } else {
            $tanggalawal = $this->input->post('tanggalawal');
            $tanggalakhir = $this->input->post('tanggalakhir');
            $data['tanggalawal'] = $tanggalawal;
            $data['tanggalakhir'] = $tanggalakhir;

            $data['subtitle'] = "Dari tanggal :  " . $tanggalawal . " Sampai tanggal :  " . $tanggalakhir;
            $data['datafilter'] = $this->model_lapvis->filterBytanggal($tanggalawal, $tanggalakhir);
            $this->template->load('shared/index', 'laporan/data_lapvis', $data);
        }
    }
}