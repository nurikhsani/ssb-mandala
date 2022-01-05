<?php

class MyDB extends CI_Model
{

    function input_dt($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_dt($data, $where, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function del_dt($where, $table)
    {

        $this->db->where($where);
        $this->db->delete($table);
    }
}
