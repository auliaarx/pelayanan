<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
    function get_pengguna()
    {
        $this->db->select('id_user, username , email, password, created, modified, image_user, level_user, status_user, no_kk , kepala');
        $this->db->join('kartukeluarga', 'kartukeluarga.id_kk = users.kepala_kk', 'inner');

        return $this->db->get('users')->result();
    }

    function insert($data)
    {
        $this->db->insert('users', $data);
    }

    function get_id_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('users')->row();
    }

    function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }


    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }
}
