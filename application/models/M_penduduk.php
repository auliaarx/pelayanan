<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
    function get_penduduk()
    {
        return $this->db->get('pend')->result();
    }

    function insert($data)
    {
        $this->db->insert('pend', $data);
    }

    function get_id_pend($id)
    {
        $this->db->where('id_pend', $id);
        return $this->db->get('pend')->row();
    }

    function update($id, $data)
    {
        $this->db->where('id_pend', $id);
        $this->db->update('pend', $data);
    }

    function delete($id)
    {
        $this->db->where('id_pend', $id);
        $this->db->delete('pend');
    }

    function jumlah_penduduk()
    {
        $this->db->select('*');
        $this->db->from('pend');

        return $this->db->get()->num_rows();
    }

    function get_id_pend_id($id_pend)
    {
        $this->db->join('users', 'pend.id_pend = users.id_user', 'left');
        $this->db->where('id_pend', $id_pend);

        return $this->db->get('pend')->row();
    }

    function get_id_penduduk($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('users')->row();
    }
}
