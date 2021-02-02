<?php

function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    $CI->load->model('model_pelanggaran');
    if ($user_session != null) {
        // $CI->session->set_flashdata('error', 'Anda Sudah Login!');
        $data['vringan'] = $CI->model_pelanggaran->get_num1();
        $data['vsedang'] = $CI->model_pelanggaran->get_num2();
        $data['vberat'] = $CI->model_pelanggaran->get_num3();
        $data['kringan'] = $CI->model_pelanggaran->get_num4();
        $data['ksedang'] = $CI->model_pelanggaran->get_num5();
        $data['kberat'] = $CI->model_pelanggaran->get_num6();

        $CI->template->load('shared/index', 'dashboard/index', $data);
    }
}

function check_not_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if (!$user_session) {
        $CI->session->set_flashdata('error', 'Anda Harus Login!');
        redirect('auth/login', 'refresh');
    }
}

function check_role()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('level');
    if ($user_session != '1') {
        $CI->session->set_flashdata('error', 'Hak Akses Terbatas!');
        redirect('dashboard', 'refresh');
    }
}