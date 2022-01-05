<?php

class Siswa_model extends CI_model
{
    public function getAllSiswa($usia)
    {
        $query = "SELECT a.*, no_hp, posisi
        FROM tabel_siswa a, user b, posisi c 
        WHERE sudah_bayar=1 AND a.id_user=b.id_user AND a.id_posisi=c.id_posisi ";
        if ($usia != 0) {
            $query .= "AND usia='" . $usia . "'";
        }
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function get_siswa_by_id($id)
    {
        $query = "SELECT a.*, b.posisi FROM tabel_siswa a, posisi b 
         WHERE a.id_posisi = b.id_posisi 
        AND id_siswa=" . $id;
        $result = $this->db->query($query)->row();
        return $result;
    }

    function get_list_usia()
    {
        $query = "SELECT usia FROM tabel_siswa group by usia";
        $result = $this->db->query($query)->result();
        return $result;
    }
}
