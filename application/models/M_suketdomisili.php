<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suketdomisili extends CI_Model
{
    function get_suketdomisili()
    {
        return $this->db->get('pend')->result();
    }

    function get_cetakdomisili($id_pend)
    {
        $this->db->select('*');
        $this->db->from('pend');
        $this->db->where('id_pend', $id_pend);

        return $this->db->get();
    }
}
