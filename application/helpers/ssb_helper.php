<?php

function tampilSession($data)
{
    $ini = get_instance();
    return $ini->session->userdata($data);
}
function loadView($file, $data)
{
    $ini = get_instance();
    $ini->load->view("templates/header", $data);
    $ini->load->view($file, $data);
    $ini->load->view("templates/footer");
}
function halaman($base_url, $total_data)
{
    $ini = get_instance();
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_data;
    $config['per_page'] = 6;
    $choice = $config['total_rows'] / $config['per_page'];
    $config['num_link'] = floor($choice);

    // konfigurasi tampilan pagination
    $config['full_tag_open'] = '<nav> <ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = '';
    $config['las_tag_open'] = '<li class="page-item">';
    $config['las_tag_close'] = '</li>';
    $config['prev_link'] = 'Sebelumnya';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Selanjutnya';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    // kirim hasil konfigurasi
    $ini->pagination->initialize($config);
}
