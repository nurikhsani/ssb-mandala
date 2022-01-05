<?php

class Pendaftaran_model extends CI_model
{
    public function simpan($siswa, $user)
    {
        $this->db->insert('user', $user);
        $id_user = $this->db->insert_id();

        $siswa['id_user'] = $id_user;

        $this->db->insert('tabel_siswa', $siswa);
        $id = $this->db->insert_id();
        return $id;
    }
}
