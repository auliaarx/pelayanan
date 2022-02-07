<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketmendu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketmendu'] = $this->M_suketmendu->get_suketmendu();

        $this->template->load('back/template', 'back/suket/suket_mendu', $data);
    }

    function cetak_mendu()
    {
        $id_mendu = $this->input->post('id_mendu');

        $data['cetakmendu'] = $this->M_suketmendu->get_cetakmendu($id_mendu)->result();
        $this->load->view('back/cetak/cetak_mendu', $data);
    }
}
