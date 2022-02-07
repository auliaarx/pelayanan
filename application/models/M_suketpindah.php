<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suketpindah extends CI_Model
{
    function get_suketpindah()
    {
        return $this->db->get('pend')->result();
    }

    function get_cetakpindah($id_pend)
    {
        $this->db->select('*');
        $this->db->from('pend');
        $this->db->where('id_pend', $id_pend);

        return $this->db->get();
    }
}
