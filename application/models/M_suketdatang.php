<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suketdatang extends CI_Model
{
    function get_suketdatang()
    {
        return $this->db->get('tb_datang')->result();
    }

    function get_cetakdatang($id_datang)
    {

        $this->db->select('*');
        $this->db->from('tb_datang');
        $this->db->where('id_datang', $id_datang);

        return $this->db->get();
    }
}
