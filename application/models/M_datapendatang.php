<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapendatang extends CI_Model
{
    function get_datapendatang()
    {
        $this->db->select('id_datang, nik_datang , nama_datang , jekel_datang , tgl_datang, nama');
        $this->db->join('pend', 'tb_datang.pelapor = pend.id_pend', 'inner');

        return $this->db->get('tb_datang')->result();
    }

    function get_id_datang($id)
    {
        $this->db->where('id_datang', $id);
        return $this->db->get('tb_datang')->row();
    }

    function insert($data)
    {
        $this->db->insert('tb_datang', $data);
    }

    function update($id_datang, $data)
    {
        $this->db->where('id_datang', $id_datang);
        $this->db->update('tb_datang', $data);
    }

    function delete($id)
    {
        $this->db->where('id_datang', $id);
        $this->db->delete('tb_datang');
    }
}
