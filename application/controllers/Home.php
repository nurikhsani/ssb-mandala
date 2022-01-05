<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            $this->global_model->notifikasi("Gagal", 'Anda Tidak Bisa Mengakses Halaman Ini', 'danger');
            redirect(base_url('dashboard'));
        }
    }
    public function index()
    {
        $data['judul'] = 'Halaman Home';
        $this->load->view("templates/header", $data);
        $this->load->view("home/index", $data);
        $this->load->view("templates/footer");
    }
}
