<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengsuratrt extends CI_Model
{
    function get_pengsuratrt()
    {
        return $this->db->get('pengsurat')->result();
    }

    function pengsurat_user()
    {
        $this->db->where('pengsurat.user_id', $this->session->userdata('id_user'));
        return $this->db->get('pengsurat')->result();
    }

    function get_no_pengsurat($no_pengsurat)
    {
        $this->db->join('users', 'pengsurat.user_id = users.id_user', 'left');
        $this->db->join('detail_pengsurat', 'pengsurat.no_pengsurat = detail_pengsurat.pengsurat_no', 'left');
        $this->db->where('no_pengsurat', $no_pengsurat);

        return $this->db->get('pengsurat')->row();
    }

    function no_pengsurat()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_pengsurat,4)) AS no_pengsurat FROM pengsurat WHERE DATE(tgl_daftar)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_pengsurat) + 1;
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
        return $this->db->insert('pengsurat', $data);
    }

    function insert_tanggapan($data)
    {
        return $this->db->insert('detail_pengsurat', $data);
    }

    function delete($id)
    {
        $this->db->where('no_pengsurat', $id);
        $this->db->delete('pengsurat');
    }

    function update($no_pengsurat, $data)
    {
        $this->db->where('no_pengsurat', $no_pengsurat);
        $this->db->update('pengsurat', $data);
    }

    function pengsurat_wait()
    {
        $this->db->select('*');
        $this->db->from('pengsurat');
        $this->db->where('status_pengsurat', 0);

        return $this->db->get()->num_rows();
    }

    function pengsurat_proses()
    {
        $this->db->select('*');
        $this->db->from('pengsurat');
        $this->db->where('status_pengsurat', 1);

        return $this->db->get()->num_rows();
    }

    function pengsurat_close()
    {
        $this->db->select('*');
        $this->db->from('pengsurat');
        $this->db->where('status_pengsurat', 3);

        return $this->db->get()->num_rows();
    }
}
