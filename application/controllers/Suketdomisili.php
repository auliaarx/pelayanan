<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketdomisili extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketdomisili'] = $this->M_suketdomisili->get_suketdomisili();

        $this->template->load('back/template', 'back/suket/suket_domisili', $data);
    }

    function cetak_domisili()
    {
        $id_pend = $this->input->post('id_pend');

        $data['cetakdomisili'] = $this->M_suketdomisili->get_cetakdomisili($id_pend)->result();
        $this->load->view('back/cetak/cetak_domisili', $data);
    }
}
