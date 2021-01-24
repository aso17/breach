<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;

class fungsi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function generate($view, $data = array(), $html = '', $filename = 'laporan_pelanggaran', $size = 'A4', $orientation = 'landscape',  $attachment = false)
    {
        $options = new Dompdf();
        $html = $this->ci->load->view($view, $data, true);
        $options->loadHtml($html);
        $options->setPaper($size, $orientation);
        $options->render();
        $options->stream($filename, ['Attachment' => $attachment]);
    }
}
