<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapindah extends CI_Model
{
    function get_datapindah()
    {
        $this->db->select('id_pend, nik , nama , tgl_pindah , alasan , id_pindah');
        $this->db->join('pend', 'pend.id_pend = tb_pindah.id_pdd', 'inner');

        return $this->db->get('tb_pindah')->result();
    }

    function get_id_pindah($id)
    {
        $this->db->where('id_pindah', $id);
        return $this->db->get('tb_pindah')->row();
    }

    function insert($data)
    {
        $this->db->insert('tb_pindah', $data);
    }

    function update($id_pindah, $data)
    {
        $this->db->where('id_pindah', $id_pindah);
        $this->db->update('tb_pindah', $data);
    }

    function delete($id)
    {
        $this->db->where('id_pindah', $id);
        $this->db->delete('tb_pindah');
    }
}
