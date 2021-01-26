<?php
class model_pelanggaran extends CI_Model
{
    private $_table = "tb_pelanggaran";
    public $id_pelanggaran;
    public $id_kategori;
    public $keterangan;
    public $waktu;
    public $bukti;
    public $status;
    public function get_orderby($id_pelanggaran, $tb_pelanggaran, $oder)
    {
        $this->db->order_by($id_pelanggaran, $oder);
        return $this->db->get($tb_pelanggaran);
    }
    public function save($post)
    {
        $post = $this->input->post();
        $file = $_FILES['bukti'];
        if ($file) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $foto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->id_kategori = $post['kategori'];
        $this->keterangan = $post['ket_pelanggaran'];
        $this->waktu = $post['waktu'];
        $this->bukti = $foto;
        $this->status = 'open';
        return $this->db->insert($this->_table, $this);
    }
}