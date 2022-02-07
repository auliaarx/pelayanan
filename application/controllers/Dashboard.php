<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['iuran_wait'] = $this->M_iuranrt->iuran_wait();
        $data['iuran_proses'] = $this->M_iuranrt->iuran_proses();
        $data['iuran_close'] = $this->M_iuranrt->iuran_close();
        $data['penduduk'] = $this->M_penduduk->jumlah_penduduk();
        $this->template->load('back/template', 'back/dashboard', $data);
    }
}
