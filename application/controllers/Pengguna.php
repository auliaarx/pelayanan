<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['pengguna'] = $this->M_pengguna->get_pengguna();

        $this->template->load('back/template', 'back/pengguna/data_pengguna', $data);
    }

    function add_pengguna($id = null)
    {

        $data['kartukeluarga'] = $this->M_kartukk->get_id_kk($id);
        $data['kartukk'] = $this->M_kartukk->get_kartukk();
        $data['kepala'] = $this->M_kartukk->get_kepala();
        $this->template->load('back/template', 'back/pengguna/form_pengguna', $data);
    }

    function save_pengguna()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]|required');
        $this->form_validation->set_rules('level_user', 'Level', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('valid_email', '{field} anda harus valid');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'username'      => $this->input->post('username'),
                'email'         => $this->input->post('email'),
                'kepala_kk'     => $this->input->post('id_kk'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status_user'   => 1,
                'level_user'    => $this->input->post('level_user'),
            );

            $this->M_pengguna->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('pengguna', 'refresh');
        } else {
            $this->add_pengguna();
        }
    }

    function edit_pengguna($id)
    {
        $data['users'] = $this->M_pengguna->get_id_user($id);
        if ($data['users']) {
            $data['pengguna'] = $this->M_pengguna->get_pengguna();
            $this->template->load('back/template', 'back/pengguna/edit_pengguna', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('pengguna', 'refresh');
        }
    }

    function update_pengguna()
    {
        $data = [
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'level_user'    => $this->input->post('level_user')
        ];

        $this->M_pengguna->update($this->input->post('id_user'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('pengguna', 'refresh');
    }

    function delete_pengguna($id)
    {
        $delete = $this->M_pengguna->get_id_user($id);
        if ($delete) {
            $this->M_pengguna->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('pengguna', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('pengguna', 'refresh');
        }
    }
}
