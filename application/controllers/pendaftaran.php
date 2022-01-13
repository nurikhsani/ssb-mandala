<?php
class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->model('Siswa_model');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data['judul'] = 'Pendaftaran';
        $this->load->view('templateDepan/navbar');
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('templateDepan/footer');
    }

    public function berhasil($id)
    {
        $data['judul'] = 'Pendaftaran';
        $data['id'] = $id;
        $this->load->view('templateDepan/navbar');
        $this->load->view('pendaftaran/berhasil', $data);
        $this->load->view('templateDepan/footer');
    }

    function simpan()
    {
        $digit12 = date('y');
        $thn_lahir = $this->input->post('tanggal_lahir');
        $digit34  = date('y', strtotime($thn_lahir));
        $digit_akhir = $this->db->query('SELECT max(id_siswa) as jml FROM tabel_siswa')->row_array()['jml'];
        $username = $digit12 . $digit34 . $digit_akhir;
        date_default_timezone_set("Asia/Bangkok");
        $user['password'] = $this->input->post('password');
        $user['username'] = $username;
        $user['role'] = '2';
        $siswa['nama_siswa'] = $this->input->post('nama_siswa');
        $siswa['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $siswa['asal'] = $this->input->post('asal');
        $siswa['tinggi_badan'] = $this->input->post('tinggi_badan');
        $siswa['berat_badan'] = $this->input->post('berat_badan');
        $siswa['id_posisi'] = $this->input->post('posisi');
        $siswa['alamat'] = $this->input->post('alamat');
        $siswa['nama_ortu'] = $this->input->post('nama_ortu');
        $siswa['pekerjaan_ortu'] = $this->input->post('pekerjaan_ortu');
        $siswa['alamat_ortu'] = $this->input->post('alamat_ortu');
        $siswa['usia'] = date('Y') - date("Y", strtotime($siswa['tanggal_lahir']));

        $namafile = "";
        if (!empty($_FILES["foto"]["name"])) {
            $config['upload_path'] = FOLDER_UPLOAD;
            $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
            $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data_upload = $this->upload->data();
                $namafile = str_replace(' ', '_', $siswa['nama_siswa']) . "_" . date('Y-m-d') . $data_upload['file_ext'];

                rename(FOLDER_UPLOAD . $data_upload['file_name'], FOLDER_UPLOAD . $namafile);
            } else {
                die($this->upload->display_errors());
            }
        }
        $buktitf = "";
        if (!empty($_FILES["bukti_pembayaran"]["name"])) {
            $config['upload_path'] = FOLDER_UPLOAD_BUKTI;
            $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
            $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data_upload = $this->upload->data();
                $buktitf = 'TF_' . str_replace(' ', '_', $siswa['nama_siswa']) . "_" . date('Y-m-d') . $data_upload['file_ext'];

                rename(FOLDER_UPLOAD . $data_upload['file_name'], FOLDER_UPLOAD . $buktitf);
            } else {
                die($this->upload->display_errors());
            }
        }
        $siswa['tanggal_daftar'] = date('Y-m-d h:i:s');
        $siswa['foto'] = $namafile;
        $siswa['bukti_pembayaran'] = $buktitf;

        $id = $this->Pendaftaran_model->simpan($siswa, $user);
        redirect('pendaftaran/berhasil/' . $id);
    }

    function cetak($idsiswa)
    {
        $siswa = $this->Siswa_model->get_siswa_by_id($idsiswa);

        if ($siswa == null) {
            echo '<script language="JavaScript"> 
                      alert("Data siswa tidak sesuai");
                      window.location.href = "ssb-mandala/home";
                    </script>';
            die();
        }

        $pdf = new FPDF('P', 'mm', 'A4');

        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 7, 'SEKOLAH SEPAK BOLA (SSB)', 0, 1, 'C');
        $pdf->Cell(0, 7, 'MANDALA', 0, 1, 'C');
        $pdf->Cell(0, 7, 'KABUPATEN MAJALENGKA', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 7, 'Sekretariat Jl. Siti Armilah No. 51', 0, 1, 'C');

        $pdf->Line(10, 40, 210 - 10, 40);
        $pdf->Line(10, 41, 210 - 10, 41);
        $pdf->Cell(0, 7, '', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 7, 'BUKTI PENDAFTARAN', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(40, 7, 'Nama Siswa', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->nama_siswa, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Tempat/Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->asal . ", " . $siswa->tanggal_lahir, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Tinggi Badan', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->tinggi_badan . " CM", 0, 1, 'L');

        $pdf->Cell(40, 7, 'Berat Badan', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->berat_badan . " KG", 0, 1, 'L');

        $pdf->Cell(40, 7, 'Posisi', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->posisi, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Alamat', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->alamat, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Nama Orang Tua', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->nama_ortu, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Pekerjaan Orang Tua', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->pekerjaan_ortu, 0, 1, 'L');

        $pdf->Cell(40, 7, 'Alamat Orang Tua', 0, 0, 'L');
        $pdf->Cell(5, 7, ':', 0, 0, 'L');
        $pdf->Cell(90, 7, $siswa->alamat_ortu, 0, 1, 'L');

        $pdf->Image(base_url('foto/' . $siswa->foto), 40, 200, 50, 50);

        $pdf->Output();
    }
}
