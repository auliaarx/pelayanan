<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketskck extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketskck'] = $this->M_suketskck->get_suketskck();

        $this->template->load('back/template', 'back/suket/suket_skck', $data);
    }

    function cetak_skck()
    {
        $id_pend = $this->input->post('id_pend');

        $data['cetakskck'] = $this->M_suketskck->get_cetakskck($id_pend)->result();
        $this->load->view('back/cetak/cetak_skck', $data);
    }
}
