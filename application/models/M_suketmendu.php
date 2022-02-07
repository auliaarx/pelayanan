<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suketmendu extends CI_Model
{
    function get_suketmendu()
    {
        $this->db->select('id_mendu , nik, nama');
        $this->db->join('pend', 'tb_mendu.id_pdd = pend.id_pend', 'inner');

        return $this->db->get('tb_mendu')->result();
    }

    function get_cetakmendu($id_mendu)
    {
        $this->db->select('nik , nama , tgl_mendu , sebab , id_mendu');
        $this->db->from('tb_mendu');
        $this->db->join('pend', 'tb_mendu.id_pdd = pend.id_pend', 'inner');
        $this->db->where('id_mendu', $id_mendu);

        return $this->db->get();
    }
}
