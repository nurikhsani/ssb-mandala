<?php

class Kegiatan_model extends CI_model
{
    public function getAllKegiatan()
    {
        $query = "SELECT * FROM t_kegiatan";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    public function posts($limit)
    {
        $this->db->from('t_kegiatan')->order_by('tgl_upload', 'DESC')->limit(6, $limit);
        return $this->db->get()->result_array();
    }
}
