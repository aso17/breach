<?php

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_auth');
    }

    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password wajib diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Validasi Success
            $post = $this->input->post();
            $username = $post['username'];
            $user = $this->model_auth->cek_login($username);
            // var_dump($user);
            // die;

            if ($user != null) {
                $post = $this->input->post();
                $password = $post['password'];
                $pass = $user['password'];

                if (password_verify($password, $pass)) {

                    $data = [
                        "id_user" => $user['id_user'],
                        "nik" => $user['nik_karyawan'],
                        "nama_lengkap" => $user['nama_lengkap'],
                        "username" => $user['username'],
                        "level" => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Password tidak sesuai! Silahkan ulangi kembali');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('warning', 'Akun Belum Terdaftar');
                redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect('auth/login');
    }
}