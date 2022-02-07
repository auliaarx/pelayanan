<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suketdatang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['suketdatang'] = $this->M_suketdatang->get_suketdatang();

        $this->template->load('back/template', 'back/suket/suket_datang', $data);
    }

    function cetak_datang()
    {
        $id_datang = $this->input->post('id_datang');

        $data['cetakdatang'] = $this->M_suketdatang->get_cetakdatang($id_datang)->result();
        $this->load->view('back/cetak/cetak_datang', $data);
    }
}
