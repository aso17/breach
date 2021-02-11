<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_lapvis extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lapvis');
        check_not_login();
    }
    public function mypdf($tanggalawal, $tanggalakhir)
    {
        $data['subtitle'] = "Dari tanggal :  " . date('d/m/Y', strtotime($tanggalawal)) . " Sampai tanggal :  " . date('d/m/Y', strtotime($tanggalakhir));
        $data['datafilter'] = $this->model_lapvis->filterBytanggal($tanggalawal, $tanggalakhir);
        $this->load->library('fungsi');
        $this->fungsi->generate('laporan/output_lapvis', $data);
    }
}
