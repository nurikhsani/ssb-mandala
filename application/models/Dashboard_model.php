<?php
class Dashboard_model extends CI_Model
{
    public function nilai($id, $jenis, $tahun)
    {
        $tahun = $tahun != 0 ? $tahun : date('Y');

        if ($jenis == 2) {
            $jenis = 'kiper';
        } else {
            $jenis = 'umum';
        }

        $query = "SELECT a.id_materi idmateri, a.nama_materi, b.*
                    FROM t_materi a
                    LEFT JOIN t_nilai b ON a.id_materi = b.id_materi 
                    AND (b.id_siswa = " . $id . " OR b.id_siswa IS NULL)
                     AND b.waktu='$tahun'
                    WHERE a.jenis = '$jenis'";

        $result = $this->db->query($query)->result_array();
        return $result;
    }
    public function get_list_tahun()
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
