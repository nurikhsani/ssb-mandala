<?php

class Nilai_model extends CI_Model
{

    public function getAllSiswa()
    {
        $query = "SELECT a.*, no_hp, posisi
        FROM tabel_siswa a, user b, posisi c 
        WHERE sudah_bayar=1 AND a.id_user=b.id_user AND a.id_posisi=c.id_posisi ";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getSiswa($id)
    {
        $query = "SELECT a.*, b.posisi FROM tabel_siswa a JOIN posisi b ON a.id_posisi=b.id_posisi WHERE a.id_siswa=" . $id;

        $result = $this->db->query($query)->row();
        return $result;
    }

    public function nilai($id, $jenis, $tahun)
    {
        $tahun = $tahun != 0 ? $tahun : date('Y');

        if ($jenis == 2) {
            $jenis = 'kiper';
        } else {
            $jenis = 'umum';
        }
        $query = "SELECT a.id_teknik idteknik, a.nama_teknik, b.*
                    FROM t_teknik a
                    LEFT JOIN t_nilai b ON a.id_teknik = b.id_teknik 
                    AND (b.id_siswa = " . $id . " OR b.id_siswa IS NULL)
                    AND b.waktu='$tahun'
                    WHERE a.jenis = '$jenis'";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function get_list_tahun()
    {
        $tahun = [date('Y')];

        $query = "SELECT waktu FROM t_nilai group by waktu";
        $result = $this->db->query($query)->result();
        foreach ($result as $row) {
            if (isset($row->waktu) && $row->waktu != date('Y')) {
                array_push($tahun, $row->waktu);
            }
        }

        return $tahun;
    }
}
