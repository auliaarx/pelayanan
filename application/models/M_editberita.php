<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_editberita extends CI_Model
{
    function get_editberita()
    {
        return $this->db->get('tb_berita')->result();
    }

    function get_id_berita($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->get('tb_berita')->row();
    }

    function insert($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    function update($id_berita, $data)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->update('tb_berita', $data);
    }

    function delete($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('tb_berita');
    }
}
