<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datalahir extends CI_Model
{
    function get_datalahir()
    {
        $this->db->select('id_lahir, nama , tgl_lh , jekel , no_kk , kepala');
        $this->db->join('kartukeluarga', 'kartukeluarga.id_kk = tb_lahir.kk_id', 'inner');

        return $this->db->get('tb_lahir')->result();
    }

    function get_id_lahir($id)
    {
        $this->db->where('id_lahir', $id);
        return $this->db->get('tb_lahir')->row();
    }

    function insert($data)
    {
        $this->db->insert('tb_lahir', $data);
    }

    function update($id_lahir, $data)
    {
        $this->db->where('id_lahir', $id_lahir);
        $this->db->update('tb_lahir', $data);
    }

    function delete($id)
    {
        $this->db->where('id_lahir', $id);
        $this->db->delete('tb_lahir');
    }
}
