<?php

class Global_model extends CI_model
{
    function notifikasi($title, $text, $type)
    {

        $data = [
            'notifikasi' => true,
            'judul' => $title,
            'pesan' => $text,
            'warna' => $type
        ];
        // $this->session->set_flashdata($data);
        $this->session->set_tempdata($data, NULL, 2);
    }
}
