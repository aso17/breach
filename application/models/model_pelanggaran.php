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
    public function save($post, $id)
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

        $this->id_pelanggaran = $id;
        $this->id_kategori = $post['kategori'];
        $this->keterangan = $post['ket_pelanggaran'];
        $this->waktu = $post['waktu'];
        $this->bukti = $foto;
        $this->status = 'open';
        return $this->db->insert($this->_table, $this);
    }

    public function update($post)

    {
        $post = $this->input->post();
        $foto = $_FILES['bukti']['name'];
        $id = $this->input->post('id_pelanggaran');
        if ($foto != null) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $config['file_name']     = 'bukti';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $fot = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }

            $data = [
                "bukti" => $fot
            ];
            $this->db->set('bukti', $data);
            $this->db->where('id_pelanggaran', $id);
            $this->db->update($this->_table, $data);
        } else {

            $waktu = $this->input->post('waktu1');
            if ($waktu != null) {
                $data = [
                    "id_kategori" => $post['kategori'],
                    "keterangan" => $post['ket_pelanggaran'],
                    "waktu" => $post['waktu1'],
                    "status" => 'open',
                ];
                $this->db->set($data);
                $this->db->where('id_pelanggaran', $id);
                $this->db->update($this->_table, $data);
            } else {

                $data = [
                    "id_kategori" => $post['kategori'],
                    "keterangan" => $post['ket_pelanggaran'],
                    "waktu" => $post['waktu'],
                    "status" => 'open',
                ];
                $this->db->set($data);
                $this->db->where('id_pelanggaran', $id);
                $this->db->update($this->_table, $data);
            }
        }
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pelanggaran" => $id));
    }


    public function update_vis($post)
    {
        $post = $this->input->post();
        $foto = $_FILES['bukti']['name'];
        $id = $this->input->post('id_pelanggaran');
        if ($foto != null) {

            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg|gif';
            $config['max_size']             = '50000';
            $config['file_name']     = 'bukti';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $fot = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }

            $data = [
                "bukti" => $fot
            ];
            $this->db->set('bukti', $data);
            $this->db->where('id_pelanggaran', $id);
            $this->db->update($this->_table, $data);
        } else {
            $waktu = $this->input->post('waktu1');
            if ($waktu != null) {
                $data = [
                    "id_kategori" => $post['kategori'],
                    "keterangan" => $post['ket_pelanggaran'],
                    "waktu" => $post['waktu1'],
                    "status" => 'open',
                ];
                $this->db->set($data);
                $this->db->where('id_pelanggaran', $id);
                $this->db->update($this->_table, $data);
            } else {

                $data = [
                    "id_kategori" => $post['kategori'],
                    "keterangan" => $post['ket_pelanggaran'],
                    "waktu" => $post['waktu'],
                    "status" => 'open',
                ];
                $this->db->set($data);
                $this->db->where('id_pelanggaran', $id);
                $this->db->update($this->_table, $data);
            }
        }
    }


    public  function get_num1()
    {
        $this->db->select('count(' . 'tb_pelangvis.id_pelanggaran' . ') as ring');
        $this->db->from('tb_pelangvis');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangvis.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '5feea06453');
        return $this->db->get()->row();
    }
    public  function get_num2()
    {
        $this->db->select('count(' . 'tb_pelanggaran.id_pelanggaran' . ') as sed');
        $this->db->from('tb_pelangvis');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangvis.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '5feea48629');
        return $this->db->get()->row();
    }
    public  function get_num3()
    {
        $this->db->select('count(' . 'tb_pelanggaran.id_pelanggaran' . ') as ber');
        $this->db->from('tb_pelangvis');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangvis.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '600066b43a');
        return $this->db->get()->row();
    }
    public  function get_num4()
    {
        $this->db->select('count(' . 'tb_pelanggaran.id_pelanggaran' . ') as ring');
        $this->db->from('tb_pelangkar');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangkar.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '5feea06453');
        return $this->db->get()->row();
    }
    public  function get_num5()
    {
        $this->db->select('count(' . 'tb_pelanggaran.id_pelanggaran' . ') as sed');
        $this->db->from('tb_pelangkar');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangkar.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '5feea48629');
        return $this->db->get()->row();
    }
    public  function get_num6()
    {
        $this->db->select('count(' . 'tb_pelanggaran.id_pelanggaran' . ') as ber');
        $this->db->from('tb_pelangkar');
        $this->db->join('tb_pelanggaran', 'tb_pelanggaran.id_pelanggaran=tb_pelangkar.id_pelanggaran');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_pelanggaran.id_kategori');
        $this->db->where('tb_pelanggaran.id_kategori', '600066b43a');
        return $this->db->get()->row();
    }
}
