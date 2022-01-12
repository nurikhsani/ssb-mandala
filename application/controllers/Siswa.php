<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        if (!$this->session->userdata('user')) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $header['judul'] = 'Data siswa';

        $usia = isset($_GET['usia']) ? $_GET['usia'] : 0;


        $index['list_usia'] = $this->Siswa_model->get_list_usia();
        $index['siswa'] = $this->Siswa_model->getAllSiswa($usia);
        $index['select_usia'] = $usia;

        $this->load->view('templates/header', $header);
        $this->load->view('siswa/index', $index);
        $this->load->view('templates/footer');
    }
    public function status()
    {
        $id = $this->uri->segment('4');
        $status = $this->uri->segment('3');
        $data = ['sudah_bayar' => $status];
        $where = ['id_siswa' => $id];

        $this->MyDB->update_dt($data, $where, 'tabel_siswa');
        $this->global_model->notifikasi("Berhasil", 'Status Siswa Berhasil di Ubah', 'success');
        redirect(base_url('siswa/belum_bayar'));
    }
    public function belum_bayar()
    {
        $header['judul'] = 'Data siswa';

        $usia = isset($_GET['usia']) ? $_GET['usia'] : 0;


        $index['list_usia'] = $this->Siswa_model->usia_belum_bayar();
        $index['siswa'] = $this->Siswa_model->belum_bayar($usia);
        $index['select_usia'] = $usia;

        $this->load->view('templates/header', $header);
        $this->load->view('siswa/belum_bayar', $index);
        $this->load->view('templates/footer');
    }
    public function i_siswa()
    {

        $this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim');
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
        $this->form_validation->set_rules('posisi', 'posisi', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim');


        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data siswa';

            $this->load->view('templates/header', $header);
            $this->load->view('siswa/i_siswa');
            $this->load->view('templates/footer');
        } else {
            date_default_timezone_set("Asia/Bangkok");
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
                    $buktitf = 'TF_' . str_replace(' ', '_', $this->input->post('nama_siswa')) . "_" . date('Y-m-d') . $data_upload['file_ext'];

                    rename(FOLDER_UPLOAD . $data_upload['file_name'], FOLDER_UPLOAD . $buktitf);
                } else {
                    die($this->upload->display_errors());
                }
            }
            $digit12 = date('y');
            $thn_lahir = $this->input->post('tanggal_lahir');
            $digit34  = date('y', strtotime($thn_lahir));
            $digit_akhir = $this->db->query('SELECT max(id_siswa) as jml FROM tabel_siswa')->row_array()['jml'];
            $username = $digit12 . $digit34 . $digit_akhir;

            $user = [
                'username' => $username,
                'password' => $this->input->post('password'),
                'role' => '2'
            ];
            $this->MyDB->input_dt($user, 'user');
            $id_user = $this->db->insert_id();

            $siswa = [
                'id_user' => $id_user,
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'asal' => $this->input->post('asal'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                'id_posisi' => $this->input->post('posisi'),
                'alamat' => $this->input->post('alamat'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                'tanggal_daftar' => date('Y-m-d h:i:s'),
                'foto' => $namafile,
                'bukti_pembayaran' => $buktitf,
                'no_hp' => $this->input->post('no_hp'),
                'usia' => date('Y') - date("Y", strtotime($this->input->post('tanggal_lahir')))
            ];
            $this->MyDB->input_dt($siswa, 'tabel_siswa');

            $this->global_model->notifikasi("Berhasil", 'Data siswa Berhasil di Tambahkan', 'success');
            redirect(base_url('siswa'));
        }
    }
    public function update_siswa($id)
    {
        $data['col'] = $this->db->get_where('tabel_siswa', ['id_siswa' => $id])->row_array();

        $this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim');
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
        $this->form_validation->set_rules('posisi', 'posisi', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim');


        if ($this->form_validation->run() == false) {

            $header['judul'] = 'Data siswa';

            $this->load->view('templates/header', $header);
            $this->load->view('siswa/e_siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $siswa = [
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'asal' => $this->input->post('asal'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                'id_posisi' => $this->input->post('posisi'),
                'alamat' => $this->input->post('alamat'),
                'nama_ortu' => $this->input->post('nama_ortu'),
                'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                'tanggal_daftar' => date('Y-m-d h:i:s'),
                // 'bukti_pembayaran' => $buktitf,
                'no_hp' => $this->input->post('no_hp'),
                'usia' => date('Y') - date("Y", strtotime($this->input->post('tanggal_lahir')))
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
            // $buktitf = "";
            // if (!empty($_FILES["bukti_pembayaran"]["name"])) {
            //     $config['upload_path'] = FOLDER_UPLOAD_BUKTI;
            //     $config['allowed_types'] = UPLOAD_ALLOWED_FILETYPE;
            //     $config['max_size'] = UPLOAD_SIZE_MAKSIMUM;
            //     $config['overwrite'] = true;
            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('foto')) {
            //         $data_upload = $this->upload->data();
            //         $buktitf = 'TF_' . str_replace(' ', '_', $this->input->post('nama_siswa')) . "_" . date('Y-m-d') . $data_upload['file_ext'];

            //         rename(FOLDER_UPLOAD . $data_upload['file_name'], FOLDER_UPLOAD . $buktitf);
            //     } else {
            //         die($this->upload->display_errors());
            //     }
            // }


            $this->MyDB->update_dt($siswa, ['id_siswa' => $id], 'tabel_siswa');
            $this->global_model->notifikasi("Berhasil", 'Data siswa Berhasil di Tambahkan', 'success');
            redirect(base_url('siswa'));
        }
    }
    public function del_siswa($id)
    {
        $where = ['id_user' => $id];
        $this->MyDB->del_dt($where, 'tabel_siswa');
        $this->MyDB->del_dt($where, 'user');
        $this->global_model->notifikasi("Berhasil", 'Data Siswa Berhasil di Hapus', 'success');
        redirect(base_url('siswa'));
    }
}
