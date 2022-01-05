<?php

class Pelatih extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('pelatih_model');
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $header['judul'] = 'Data Pelatih';

        $index['pelatih'] = $this->db->get('tabel_pelatih')->result_array();
        $this->load->view('templates/header', $header);
        $this->load->view('pelatih/index', $index);
        $this->load->view('templates/footer');
    }
    public function i_pelatih()
    {
        $this->form_validation->set_rules('nama_pelatih', 'nama_pelatih', 'required|trim');
        $this->form_validation->set_rules('peran', 'peran', 'required|trim');
        $this->form_validation->set_rules('lisensi', 'lisensi', 'required|trim');
        $this->form_validation->set_rules('melatih_sejak', 'melatih_sejak', 'required|trim');
        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Pelatih';

            $this->load->view('templates/header', $header);
            $this->load->view('pelatih/i_pelatih');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pelatih' => $this->input->post('nama_pelatih'),
                'peran' => $this->input->post('peran'),
                'lisensi' => $this->input->post('lisensi'),
                'melatih_sejak' => $this->input->post('melatih_sejak')

            ];
            $this->MyDB->input_dt($data, 'tabel_pelatih');
            $this->global_model->notifikasi("Berhasil", 'Data Pelatih Berhasil di Tambahkan', 'success');
            redirect(base_url('pelatih'));
        }
    }
    public function update_pelatih($id)
    {

        $data['col'] = $this->db->get_where('tabel_pelatih', ['id_pelatih' => $id])->row_array();

        $this->form_validation->set_rules('nama_pelatih', 'nama_pelatih', 'required|trim');
        $this->form_validation->set_rules('peran', 'peran', 'required|trim');
        $this->form_validation->set_rules('lisensi', 'lisensi', 'required|trim');
        $this->form_validation->set_rules('melatih_sejak', 'melatih_sejak', 'required|trim');
        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Pelatih';

            $this->load->view('templates/header', $header);
            $this->load->view('pelatih/e_pelatih', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pelatih' => $this->input->post('nama_pelatih'),
                'peran' => $this->input->post('peran'),
                'lisensi' => $this->input->post('lisensi'),
                'melatih_sejak' => $this->input->post('melatih_sejak')

            ];
            $this->MyDB->update_dt($data, ['id_pelatih' => $id], 'tabel_pelatih');
            $this->global_model->notifikasi("Berhasil", 'Data Pelatih Berhasil di Ubah', 'success');
            redirect(base_url('pelatih'));
        }
    }
    public function del_pelatih($id)
    {
        $this->MyDB->del_dt(['id_pelatih' => $id], 'tabel_pelatih');
        $this->global_model->notifikasi("Berhasil", 'Data Pelatih di Hapus', 'success');
        redirect(base_url('pelatih'));
    }
}
