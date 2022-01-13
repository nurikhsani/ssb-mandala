<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        // if ($this->session->userdata('user')) {
        //     redirect(base_url('Home'));
        // }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Login Page";
            $this->load->view('Auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = htmlspecialchars(md5($this->input->post('password', true)));
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if ($password == $user['password']) {

                if ($user['role'] == '1') {
                    $nama = 'Admin';
                    $foto = 'user.png';
                    $dashboard = 'home';
                } else {
                    $siswa = $this->db->get_where('tabel_siswa', ['id_user' => $user['id_user'], 'sudah_bayar' => '1']);
                    if ($siswa->num_rows() < 1) {
                        $this->global_model->notifikasi("Gagal", 'belum bisa login', 'error');
                        redirect(base_url('Auth'));
                    } else {
                        $siswa = $siswa->row_array();
                        $nama = $siswa['nama_siswa'];

                        $foto = $siswa['foto'];
                        $dashboard = 'dashboard';

                        $posisi = $this->db->get_where('posisi', ['id_posisi' => $siswa['id_posisi']])->row_array();
                        $_SESSION['posisi'] = $posisi['posisi'];
                        $_SESSION['usia'] = $siswa['usia'];
                        $_SESSION['id_siswa'] = $siswa['id_siswa'];
                        $_SESSION['id_posisi'] = $posisi['id_posisi'];

                        $tahun = $this->db->get_where('t_nilai', ['id_siswa' => $_SESSION['id_siswa']])->row_array();
                        $_SESSION['waktu'] = $tahun['waktu'];
                    }
                }

                $data = [
                    'nama' => $nama,
                    'foto' => $foto,
                    'user' => $user['username'],
                    'role_id' => $user['role'],
                    'id_user' => $user['id_user']
                ];
                $this->session->set_userdata($data);

                $this->global_model->notifikasi("Berhasil", 'Selamat Datang Pengguna', 'success');
                redirect(base_url($dashboard));
            } else {
                $this->global_model->notifikasi("Gagal", 'Password Salah', 'error');
                redirect(base_url('Auth'));
            }
        } else {
            $this->global_model->notifikasi('Gagal', 'Username Tidak terdaftar', 'error');
            redirect(base_url('Auth'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('posisi');
        $this->session->unset_userdata('usia');
        $this->session->unset_userdata('id_siswa');
        $this->session->unset_userdata('id_posisi');
        $this->session->unset_userdata('waktu');
        $this->global_model->notifikasi('Berhasil', 'Anda Sudah Logout', 'success');
        redirect(base_url('Ssb'));
    }
}
