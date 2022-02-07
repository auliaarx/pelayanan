<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_iuranrt extends CI_Model
{
    function get_iuranrt()
    {
        return $this->db->get('iuran')->result();
    }

    function iuran_user()
    {
        $this->db->where('iuran.user_id', $this->session->userdata('id_user'));
        return $this->db->get('iuran')->result();
    }

    function get_no_bayar($no_bayar)
    {
        $this->db->join('users', 'iuran.user_id = users.id_user', 'left');
        $this->db->join('detail_iuran', 'iuran.no_bayar = detail_iuran.bayar_no', 'left');
        $this->db->where('no_bayar', $no_bayar);

        return $this->db->get('iuran')->row();
    }

    function no_bayar()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_bayar,4)) AS no_bayar FROM iuran WHERE DATE(tgl_daftar)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_bayar) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }

    function insert($data)
    {
        return $this->db->insert('iuran', $data);
    }

    function insert_tanggapan($data)
    {
        return $this->db->insert('detail_iuran', $data);
    }

    function delete($id)
    {
        $this->db->where('no_bayar', $id);
        $this->db->delete('iuran');
    }

    function update($no_bayar, $data)
    {
        $this->db->where('no_bayar', $no_bayar);
        $this->db->update('iuran', $data);
    }

    function iuran_wait()
    {
        $this->db->select('*');
        $this->db->from('iuran');
        $this->db->where('status_bayar', 0);

        return $this->db->get()->num_rows();
    }

    function iuran_proses()
    {
        $this->db->select('*');
        $this->db->from('iuran');
        $this->db->where('status_bayar', 1);

        return $this->db->get()->num_rows();
    }

    function iuran_close()
    {
        $this->db->select('*');
        $this->db->from('iuran');
        $this->db->where('status_bayar', 3);

        return $this->db->get()->num_rows();
    }
}
