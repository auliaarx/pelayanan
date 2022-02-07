<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketnikah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketnikah'] = $this->M_suketnikah->get_suketnikah();

        $this->template->load('back/template', 'back/suket/suket_nikah', $data);
    }

    function cetak_nikah()
    {
        $id_pend = $this->input->post('id_pend');

        $data['cetaknikah'] = $this->M_suketnikah->get_cetaknikah($id_pend)->result();
        $this->load->view('back/cetak/cetak_nikah', $data);
    }
}
