<?php

function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if ($user_session) {
        $CI->session->set_flashdata('error', 'Anda Sudah Login!');
        redirect('dashboard', 'refresh');
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
