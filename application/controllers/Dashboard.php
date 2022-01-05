<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
        $this->load->model('Jadwal_model');
        $this->load->library('Pdf');
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $data['judul'] = 'Halaman Home';
        loadView('home/index', $data);
    }
    public function DataDiri()
    {
        $data['judul'] = 'Data Diri';
        $data['col'] = $this->db->get_where('tabel_siswa', ['id_user' => tampilSession('id_user')])->row_array();

        loadView('dashboard/data_diri', $data);
    }
    public function e_DataDiri($id)
    {

        $data['col'] = $this->db->get_where('tabel_siswa', [tampilSession('id_user') => $id])->row_array();

        $this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required|trim');
        // $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim');
        $this->form_validation->set_rules('asal', 'asal', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('tinggi_badan', 'tinggi_badan', 'required|trim');
        $this->form_validation->set_rules('berat_badan', 'berat_badan', 'required|trim');
        // $this->form_validation->set_rules('usia', 'usia', 'required|trim');
        $this->form_validation->set_rules('nama_ortu', 'nama_ortu', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_ortu', 'pekerjaan_ortu', 'required|trim');
        $this->form_validation->set_rules('alamat_ortu', 'alamat_ortu', 'required|trim');
        // $this->form_validation->set_rules('sudah_bayar', 'sudah_bayar', 'required|trim');
        // $this->form_validation->set_rules('tanggal_daftar', 'tanggal_daftar', 'required|trim');
        // $this->form_validation->set_rules('posisi', 'posisi', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim');


        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Data siswa';

            loadView('dashboard/e_data_diri', $data);
        } else {
            $siswa = [
                'nama_siswa' => $this->input->post('nama_siswa'),
                // 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'asal' => $this->input->post('asal'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                // 'id_posisi' => $this->input->post('posisi'),
                'alamat' => $this->input->post('alamat'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                // 'tanggal_daftar' => date('Y-m-d h:i:s'),
                'no_hp' => $this->input->post('no_hp'),
                // 'usia' => date('Y') - date("Y", strtotime($this->input->post('tanggal_lahir')))
            ];
            date_default_timezone_set("Asia/Bangkok");
            $old = $this->input->post('fotolama');
            $namafile = "";
            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = FOLDER_UPLOAD;
                $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
                $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
                $config['overwrite'] = true;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $data_upload = $this->upload->data();
                    $namafile = str_replace(' ', '_', $this->input->post('nama_siswa')) . "_" . date('Y-m-d') . $data_upload['file_ext'];

                    rename(FOLDER_UPLOAD . $data_upload['file_name'], FOLDER_UPLOAD . $namafile);
                    unlink(FOLDER_UPLOAD . $old);
                    $siswa['foto'] = $namafile;
                } else {
                    die($this->upload->display_errors());
                }
            }
            $this->MyDB->update_dt($siswa, [tampilSession('id_user') => $id], 'tabel_siswa');
            $this->global_model->notifikasi("Berhasil", 'Data Anda Berhasil di Edit', 'success');
            redirect(base_url('dashboard/DataDiri'));
        }
    }
    public function cetak($id)
    {
        $cetak = $this->db->query('SELECT a.*, b.posisi 
        FROM tabel_siswa a, posisi b 
        WHERE a.id_posisi = b.id_posisi 
        AND id_user="' . tampilSession('id_user') . '"')->row_array();

        if ($cetak == null) {
            echo '<script language="JavaScript"> 
                      alert("Data siswa tidak di temukan");
                      window.location.href = "http://localhost/ssb-mandala/dashboard/DataDiri";
                    </script>';
            die();
        }

        $pdf = new FPDF('P', 'mm', array(85.60, 53.98));

        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 3, 'SEKOLAH SEPAK BOLA (SSB)', 0, 1, 'C');
        $pdf->Cell(0, 3, 'MANDALA', 0, 1, 'C');
        $pdf->Cell(0, 3, 'KABUPATEN MAJALENGKA', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 5, 'Sekretariat Jl. Siti Armilah No. 51', 0, 1, 'C');

        $pdf->Image(base_url('foto/' . $cetak['foto']), 10, 10, 30, 30);

        // $pdf->Line(10, 40, 210 - 10, 40);
        // $pdf->Line(10, 41, 210 - 10, 41);
        $pdf->Cell(0, 7, '', 0, 1, 'L');

        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(10, 0, 'Nama Siswa', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $cetak['nama_siswa'], 0, 1, 'L');

        $pdf->Cell(40, 7, 'Tempat/Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $cetak['asal'] . ", " . $cetak['tanggal_lahir'], 0, 1, 'L');

        $pdf->Cell(40, 7, 'Tinggi Badan', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $cetak['tinggi_badan'] . " CM", 0, 1, 'L');

        $pdf->Cell(40, 7, 'Berat Badan', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $cetak['berat_badan'] . " KG", 0, 1, 'L');

        $pdf->Cell(40, 7, 'Posisi', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $cetak['posisi'], 0, 1, 'L');


        $pdf->Output();
    }
    public function JadwalLatihan()
    {

        $data['judul'] = 'Jadwal Latihan';
        $data['tampil'] = $this->db->query('SELECT a.*, b.nama_pelatih as pelatih, c.nama_pelatih as pelatih_gk
        FROM t_jadwal a, tabel_pelatih b, tabel_pelatih c
        WHERE a.id_pelatih = b.id_pelatih 
        AND a.id_pelatih_gk = c.id_pelatih
        AND a.kelompok_usia="' . tampilSession('usia') . '"')->result_array();

        loadView('dashboard/jadwal_latihan', $data);
    }
    public function KelompokSiswa()
    {
        $data['tampil'] = $this->db->query('SELECT a.*, no_hp, posisi
        FROM tabel_siswa a, user b, posisi c 
        WHERE sudah_bayar=1 AND a.id_user=b.id_user AND a.id_posisi=c.id_posisi AND a.usia="' . tampilSession('usia') . '"')->result_array();
        $data['judul'] = "Data Kelompok";
        loadView('dashboard/kelompok_siswa', $data);
    }
    public function nilai()
    {
        $id = tampilSession('id_siswa');
        $tahun = isset(tampilSession('waktu')) ? tampilSession('waktu') : date('Y');
        $data['judul'] = 'Nilai';
        //ngambil data siswa
        $data['col'] = $this->db->get_where('tabel_siswa', ['id_user' => tampilSession('id_user')])->row_array();
        // list tahun
        $data['list_tahun'] = $this->Dashboard_model->get_list_tahun();
        $data['select_tahun'] = $tahun;
        // ngambil nilai
        $data['nilai'] = $this->Dashboard_model->nilai($id, tampilSession('id_posisi'), $tahun);

        loadView('dashboard/nilai', $data);
    }
}
