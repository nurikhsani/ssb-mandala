<?php

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $header['judul'] = 'Jadwal Latihan';

        $index['jadwal'] = $this->Jadwal_model->getAllJadwal();

        $this->load->view('templates/header', $header);
        $this->load->view('jadwal/index', $index);
        $this->load->view('templates/footer');
    }
    public function i_jadwal()
    {
        $this->form_validation->set_rules('kelompok_usia', 'kelompok_usia', 'required|trim');
        $this->form_validation->set_rules('waktu_mulai', 'waktu_mulai', 'required|trim');
        $this->form_validation->set_rules('waktu_selesai', 'waktu_selesai', 'required|trim');
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim');
        $this->form_validation->set_rules('hari', 'hari', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Jadwal Latihan';

            $this->load->view('templates/header', $header);
            $this->load->view('jadwal/i_jadwal');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelatih' => $this->input->post('pelatih'),
                'id_pelatih_gk' => $this->input->post('pelatih_gk'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'kelompok_usia' => $this->input->post('kelompok_usia'),
                'tempat' => $this->input->post('tempat'),
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal')

            ];
            $this->MyDB->input_dt($data, 't_jadwal');
            $this->global_model->notifikasi("Berhasil", 'Data Jadwal Latihan Berhasil di Tambahkan', 'success');
            redirect(base_url('jadwal'));
        }
    }
    public function update_jadwal($id)
    {
        $header['judul'] = 'Update Data Jadwal Latihan';

        $dt['col'] = $this->db->get_where('t_jadwal', ['id_jadwal' => $id])->row_array();

        $this->form_validation->set_rules('kelompok_usia', 'kelompok_usia', 'required|trim');
        $this->form_validation->set_rules('waktu_mulai', 'waktu_mulai', 'required|trim');
        $this->form_validation->set_rules('waktu_selesai', 'waktu_selesai', 'required|trim');
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim');
        $this->form_validation->set_rules('hari', 'hari', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Jadwal Latihan';

            $this->load->view('templates/header', $header);
            $this->load->view('jadwal/e_jadwal', $dt);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelatih' => $this->input->post('pelatih'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'kelompok_usia' => $this->input->post('kelompok_usia'),
                'tempat' => $this->input->post('tempat'),
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal')

            ];
            $this->MyDB->update_dt($data, ['id_jadwal' => $id], 't_jadwal');
            $this->global_model->notifikasi("Berhasil", 'Data Jadwal Latihan Berhasil di Edit', 'success');
            redirect(base_url('jadwal'));
        }
    }
    public function del_jadwal($id)
    {
        $this->MyDB->del_dt(['id_jadwal' => $id], 't_jadwal');
        $this->global_model->notifikasi("Berhasil", 'Data Jadwal di Hapus', 'success');
        redirect(base_url('jadwal'));
    }
}
