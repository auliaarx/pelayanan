<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datamd extends CI_Model
{
    function get_datamd()
    {
        $this->db->select('id_pend, nik , nama , tgl_mendu , sebab , id_mendu');
        $this->db->join('pend', 'pend.id_pend = tb_mendu.id_pdd', 'inner');

        return $this->db->get('tb_mendu')->result();
    }

    function get_id_mendu($id)
    {
        $this->db->where('id_mendu', $id);
        return $this->db->get('tb_mendu')->row();
    }

    function insert($data)
    {
        $this->db->insert('tb_mendu', $data);
    }

    function update($id_mendu, $data)
    {
        $this->db->where('id_mendu', $id_mendu);
        $this->db->update('tb_mendu', $data);
    }

    function delete($id)
    {
        $this->db->where('id_mendu', $id);
        $this->db->delete('tb_mendu');
    }
}
