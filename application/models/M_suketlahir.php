<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suketlahir extends CI_Model
{
    function get_suketlahir()
    {
        return $this->db->get('tb_lahir')->result();
    }

    function get_cetaklahir($id_lahir)
    {

        $this->db->select('*');
        $this->db->from('tb_lahir');
        $this->db->where('id_lahir', $id_lahir);

        return $this->db->get();
    }
}
