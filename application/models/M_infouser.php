<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_infouser extends CI_Model
{
    function get_info()
    {
        return $this->db->get('pend')->result();
    }

    function insert($data)
    {
        $this->db->insert('pend', $data);
    }
}
