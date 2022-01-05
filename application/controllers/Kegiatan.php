<?php

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $header['judul'] = 'Kegiatan';

        $index['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();

        $this->load->view('templates/header', $header);
        $this->load->view('kegiatan/index', $index);
        $this->load->view('templates/footer');
    }
    public function i_kegiatan()
    {

        $this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        // $this->form_validation->set_rules('foto_kegiatan', 'foto_kegiatan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');


        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Kegiatan';

            $this->load->view('templates/header', $header);
            $this->load->view('kegiatan/i_kegiatan');
            $this->load->view('templates/footer');
        } else {
            $namafile = "";
            if (!empty($_FILES["foto_kegiatan"]["name"])) {
                $config['upload_path'] = FOLDER_UPLOAD_KEG;
                $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
                $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
                $config['overwrite'] = true;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_kegiatan')) {
                    $data_upload = $this->upload->data();
                    $namafile = str_replace(' ', '_', $this->input->post('nama_kegiatan') . "_" . date('Y-m-d') . $data_upload['file_ext']);

                    rename(FOLDER_UPLOAD_KEG . $data_upload['file_name'], FOLDER_UPLOAD_KEG . $namafile);
                } else {
                    die($this->upload->display_errors());
                }
            }
            date_default_timezone_set('Asia/Jakarta');
            $time = date('Y-m-d H:i:s');
            $data = [

                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'foto_kegiatan' => $namafile,
                'tgl_upload' => $time,
                'deskripsi' => $this->input->post('deskripsi')

            ];
            $this->MyDB->input_dt($data, 't_kegiatan');
            $this->global_model->notifikasi("Berhasil", 'Data Kegiatan Berhasil di Tambahkan', 'success');
            redirect(base_url('kegiatan'));
        }
    }
    public function del_kegiatan($id)
    {
        $this->MyDB->del_dt(['id_kegiatan' => $id], 't_kegiatan');
        $this->global_model->notifikasi("Berhasil", 'Data Kegiatan di Hapus', 'success');
        redirect(base_url('kegiatan'));
    }
    public function detail($id)
    {
        $header['judul'] = 'Detail Kegiatan';

        $data['col'] = $this->db->get_where('t_kegiatan', ['id_kegiatan' => $id])->row_array();
        $this->load->view('templates/header', $header);
        $this->load->view('kegiatan/detail_kegiatan', $data);
        $this->load->view('templates/footer');
    }
    public function update_kegiatan($id)
    {

        $header['judul'] = 'Update Kegiatan';

        $dt['col'] = $this->db->get_where('t_kegiatan', ['id_kegiatan' => $id])->row_array();

        // copy dari controller input
        $this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        // $this->form_validation->set_rules('foto_kegiatan', 'foto_kegiatan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');


        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data Kegiatan';

            $this->load->view('templates/header', $header);
            $this->load->view('kegiatan/e_kegiatan', $dt);
            $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $time = date('Y-m-d H:i:s');
            $data = [

                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'tgl_upload' => $time,
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $old = $this->input->post('fotolama');
            $this->db->get_where('t_kegiatan', ['deskripsi' => ""]);
            $namafile = "";
            if (!empty($_FILES["foto_kegiatan"]["name"])) {
                $config['upload_path'] = FOLDER_UPLOAD_KEG;
                $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
                $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
                $config['overwrite'] = true;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_kegiatan')) {
                    $data_upload = $this->upload->data();
                    $namafile = 'New ' . str_replace(' ', '_', $this->input->post('nama_kegiatan') . "_" . date('Y-m-d') . $data_upload['file_ext']);

                    rename(FOLDER_UPLOAD_KEG . $data_upload['file_name'], FOLDER_UPLOAD_KEG . $namafile);
                    unlink(FOLDER_UPLOAD_KEG . $old);
                    $data['foto_kegiatan'] = $namafile;
                } else {
                    die($this->upload->display_errors());
                }
            }

            $this->MyDB->update_dt($data, ['id_kegiatan' => $id], 't_kegiatan');
            $this->global_model->notifikasi("Berhasil", 'Data Kegiatan di Hapus', 'success');
            redirect(base_url('kegiatan'));
        }
    }
}
