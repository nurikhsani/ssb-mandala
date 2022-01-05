<?php
class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $header['judul'] = 'Data siswa';
        $index['siswa'] = $this->Nilai_model->getAllSiswa();

        $this->load->view('templates/header', $header);
        $this->load->view('nilai/index', $index);
        $this->load->view('templates/footer');
    }
    public function nilai()
    {
        $id = $_GET['idsiswa'];
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
        $header['judul'] = 'Data siswa';

        //ngambil data siswa
        $index['siswa'] = $this->Nilai_model->getSiswa($id);
        // ngambil nilai
        $index['nilai'] = $this->Nilai_model->nilai($id, $index['siswa']->id_posisi, $tahun);

        $index['list_tahun'] = $this->Nilai_model->get_list_tahun();
        $index['select_tahun'] = $tahun;
        $this->load->view('templates/header', $header);
        $this->load->view('nilai/nilai', $index);
        $this->load->view('templates/footer');
    }

    public function i_nilai()
    {

        $this->form_validation->set_rules('nilai_1', 'nilai_1', 'required|trim');

        if ($this->form_validation->run() == false) {
            $header['judul'] = 'Tambah Nilai';
            $index['siswa'] = $this->Nilai_model->getSiswa($_GET['idsiswa']);
            $index['teknik'] = $this->db->get_where('t_teknik', ['id_teknik' => $_GET['idteknik']])->row_array();
            $index['tahun'] = $_GET['tahun'];

            $this->load->view('templates/header', $header);
            $this->load->view('nilai/i_nilai', $index);
            $this->load->view('templates/footer');
        } else {
            // nilai dari dropdown
            $nilai = [
                'id_siswa' => $this->input->post('id_siswa'),
                'id_teknik' => $this->input->post('id_teknik'),
                'waktu' => $this->input->post('waktu'),
                'nilai_1' => $this->input->post('nilai_1'), //dari dropdown
                'nilai_2' => $this->input->post('nilai_2'), //dari dropdown
                'nilai_3' => $this->input->post('nilai_3'), //dari dropdown
                'nilai_4' => $this->input->post('nilai_4') //dari dropdown
            ];
            $this->global_model->notifikasi("Berhasil", 'Nilai Berhasil di Tambahkan', 'success');
            $this->MyDB->input_dt($nilai, 't_nilai');
            redirect(base_url('nilai/nilai?idsiswa=' . $this->input->post('id_siswa')));
        }
    }
    public function update_nilai($id)
    {
        $data['col'] = $this->db->get_where('t_nilai', ['id_nilai' => $id])->row_array();
        $data['sis'] = $this->db->query('SELECT a.*, b.posisi FROM tabel_siswa a, posisi b 
         WHERE a.id_posisi = b.id_posisi 
        AND id_siswa="' . $data['col']['id_siswa'] . '"')->row_array();
        $data['tek'] = $this->db->get_where('t_teknik', ['id_teknik' => $data['col']['id_teknik']])->row_array();

        $this->form_validation->set_rules('nilai_1', 'nilai_1', 'required|trim');

        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Tambah Nilai';

            $this->load->view('templates/header', $header);
            $this->load->view('nilai/e_nilai', $data);
            $this->load->view('templates/footer');
        } else {
            // nilai dari dropdown
            $nilai = [
                'nilai_1' => $this->input->post('nilai_1'), //dari dropdown
                'nilai_2' => $this->input->post('nilai_2'), //dari dropdown
                'nilai_3' => $this->input->post('nilai_3'), //dari dropdown
                'nilai_4' => $this->input->post('nilai_4') //dari dropdown
            ];
            $this->global_model->notifikasi("Berhasil", 'Nilai Berhasil di Ubah', 'success');
            $this->MyDB->update_dt($nilai, ['id_nilai' => $id], 't_nilai');
            redirect(base_url('nilai'));
        }
    }
    public function del_nilai($id)
    {
        $this->MyDB->del_dt(['id_nilai' => $id], 't_nilai');
        $this->global_model->notifikasi("Berhasil", 'Data Nilai di Hapus', 'success');
        redirect(base_url('nilai/nilai/' . $id));
    }
}
