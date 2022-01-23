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

    // VIEW FORGOT PASSWORD
    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Lupa Password";
            $this->load->view('auth/forgot');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {
                //INPUT TOKEN
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('t_token', $user_token);
                $this->_setEmail($token, 'forgot');
                $this->global_model->notifikasi("Berhasil", 'Silahkan Cek Email Anda', 'success');
                redirect(base_url('Auth/forgotPassword'));
            } else {
                $this->global_model->notifikasi("Gagal", 'Email Tidak Terdaftar', 'error');
                redirect(base_url('Auth/forgotPassword'));
            }
        }
    }

    //CONFIGURASI EMAIL
    private function _setEmail($token, $type)
    {
        $this->load->library('encryption');
        $config = [
            'protocol' => 'smtp',
            // 'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'ssbmandalamjl@gmail.com',
            'smtp_pass' => 'ssbmandala123',
            'smtp_port' => 465,
            // 'smtp_crypto' => 'ssl',
            'mailtype' => 'text',
            'charset' => 'iso-8859-1',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('ssbmandalamjl@gmail.com', 'SSB MANDALA');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Kepada Yth. Click this link to reset your password : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // LOGIKA RESET PASSWORD
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('t_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token!</div>');
                redirect(base_url('Auth'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email!</div>');
            redirect(base_url('Auth'));
        }
    }

    // VIEW UBAH PASSWORD
    public function changePassword()
    {
        // $this->session->set_userdata('reset_email', 'Andialfi90@gmail.com');
        if (!$this->session->userdata('reset_email')) {
            redirect(base_url("Auth"));
        }
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('confirm', 'confirm', 'required|trim|min_length[4]|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Password";
            $this->load->view('auth/change');
        } else {
            $pass = md5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $pass);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->global_model->notifikasi("Berhasil", 'Password Sudah Diubah', 'success');
            redirect(base_url('Auth'));
        }
        // $this->session->unset_userdata('reset_email');
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
