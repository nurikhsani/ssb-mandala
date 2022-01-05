<?php

class Jadwal_model extends CI_model
{
    public function getAllJadwal()
    {
        $query = "SELECT a.*, b.nama_pelatih as pelatih, c.nama_pelatih as pelatih_gk
        FROM t_jadwal a, tabel_pelatih b, tabel_pelatih c
        WHERE a.id_pelatih=b.id_pelatih 
        AND a.id_pelatih_gk = c.id_pelatih";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    public function pelatih($kategori)
    {
        if ($kategori == 'gk') {
            $query = $this->db->get_where('tabel_pelatih', ['peran' => 'Pelatih Kiper'])->result_array();
        } else {
            $query = $this->db->get_where('tabel_pelatih', ['peran!=' => 'Pelatih Kiper'])->result_array();
        }
        return $query;
    }
}
