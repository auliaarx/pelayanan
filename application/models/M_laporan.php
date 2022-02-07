<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    function get_periode_laporan($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('detail_iuran');
        $this->db->join('iuran', 'detail_iuran.bayar_no = iuran.no_bayar', 'left');
        $this->db->where('waktu_tanggapan >=', $tgl_awal);
        $this->db->where('waktu_tanggapan <=', $tgl_akhir);

        return $this->db->get();
    }
}
