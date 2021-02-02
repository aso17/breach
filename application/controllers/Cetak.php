<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_laporan');
        check_not_login();
    }
    public function pdf($tanggalawal, $tanggalakhir)
    {
        $data['subtitle'] = "Dari tanggal :  " . date('d F Y', strtotime($tanggalawal)) . " Sampai tanggal :  " . date('d F Y', strtotime($tanggalakhir));
        $data['datafilter'] = $this->model_laporan->filterBytanggal($tanggalawal, $tanggalakhir);
        $this->load->library('fungsi');
        $this->fungsi->generate('laporan/output_lapkar', $data);
    }
}