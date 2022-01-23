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
        $data['judul'] = "Home";
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
        $data['kegiatan'] = $this->Kegiatan_model->show_posts();
        $this->db->select('a.*, nama_admin');
        $this->db->from('t_kegiatan a');
        $this->db->join('t_admin b', 'a.id_admin=b.id_admin');
        $this->db->where('a.id_kegiatan =' . $id);
        $data['col'] = $this->db->get()->row_array();

        $this->load->view('templateDepan/index', $data);
    }
    public function profil()
    {
        $data['judul'] = 'Profil';
        $data['file'] = 'profil';
        $this->load->view('templateDepan/index', $data);
    }
}
