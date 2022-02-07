<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelahiran extends CI_Model
{
    function get_penduduk()
    {
        return $this->db->get('pend')->result();
    }

    function get_id_pend($id)
    {
        $this->db->where('id_pend', $id);
        return $this->db->get('pend')->row();
    }

    function get_id_pend_id($id_pend)
    {
        $this->db->join('users', 'pend.id_pend = users.id_user', 'left');
        $this->db->where('id_pend', $id_pend);

        return $this->db->get('pend')->row();
    }
}
