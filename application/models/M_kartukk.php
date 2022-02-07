<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kartukk extends CI_Model
{
    function get_kartukk()
    {
        return $this->db->get('kartukeluarga')->result();
    }

    function get_kepala()
    {
        $this->db->select('id_kk, no_kk , kepala , nama');
        $this->db->join('pend', 'kartukeluarga.kepala = pend.id_pend', 'inner');

        return $this->db->get('kartukeluarga')->result();
    }

    function get_anggota($id)
    {
        $this->db->select('nik , nama , jekel, hubungan , id_anggota');
        $this->db->join('tb_anggota', 'pend.id_pend = tb_anggota.id_pend_anggota', 'inner');
        $this->db->join('kartukeluarga', 'kartukeluarga.id_kk = tb_anggota.id_kk_anggota', 'inner');
        $this->db->where('id_kk', $id);

        return $this->db->get('pend')->result();
    }

    function insert($data)
    {
        $this->db->insert('kartukeluarga', $data);
    }

    function get_id_kk($id)
    {
        $this->db->where('id_kk', $id);
        return $this->db->get('kartukeluarga')->row();
    }

    function get_id_anggota($id)
    {
        $this->db->where('id_anggota', $id);
        return $this->db->get('tb_anggota')->row();
    }

    function update($id, $data)
    {
        $this->db->where('id_kk', $id);
        $this->db->update('kartukeluarga', $data);
    }

    function delete($id)
    {
        $this->db->where('id_kk', $id);
        $this->db->delete('kartukeluarga');
    }

    function delete_anggota($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('tb_anggota');
    }

    function insert_anggota($data)
    {
        return $this->db->insert('tb_anggota', $data);
    }

    function get_id_kartukk($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('users')->row();
    }

    function delete_semua($id)
    {
        $this->db->where('tb_anggota.id_kk_anggota=kartukeluarga.id_kk');
        $this->db->where('tb_anggota.id_pend_anggota=pend.id_pend');
        $this->db->delete(array('tb_anggota'));
    }
}
