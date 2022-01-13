<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Kegiatan_model');
    }
    public function index()
    {
        redirect(base_url('Ssb/posts'));
    }
    public function posts()
    {
        $data['title'] = "Home";
        $jml = $this->db->get('t_kegiatan')->num_rows();
        halaman(site_url('Ssb/posts'), $jml);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['kegiatan'] = $this->Kegiatan_model->posts($data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['file'] = 'kegiatan';
        $this->load->view('templateDepan/index', $data);
    }
    public function show_post($id)
    {
        $data['judul'] = 'kegiatan';
        $data['file'] = 'show_kegiatan';
        $data['col'] = $this->db->get_where('t_kegiatan', ['id_kegiatan' => $id])->row_array();

        $this->load->view('templateDepan/index', $data);
    }
}
