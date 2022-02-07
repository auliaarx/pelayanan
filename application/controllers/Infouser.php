<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Infouser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['infouser'] = $this->M_infouser->get_info();
        $this->template->load('back/template', 'back/infouser/info_user', $data);
    }
}
