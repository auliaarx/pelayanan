<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_warga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['editberita'] = $this->M_editberita->get_editberita();
        $this->template->load('back/template', 'back/dashboard_warga', $data);
    }
}
