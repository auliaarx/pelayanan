<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketpindah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketpindah'] = $this->M_suketpindah->get_suketpindah();

        $this->template->load('back/template', 'back/suket/suket_pindah', $data);
    }

    function cetak_pindah()
    {
        $id_pend = $this->input->post('id_pend');

        $data['cetakpindah'] = $this->M_suketpindah->get_cetakpindah($id_pend)->result();
        $this->load->view('back/cetak/cetak_pindah', $data);
    }
}
