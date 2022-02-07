<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Editberita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['editberita'] = $this->M_editberita->get_editberita();

        $this->template->load('back/template', 'back/editberita/data_berita', $data);
    }

    function add_berita()
    {
        $this->template->load('back/template', 'back/editberita/form_berita');
    }

    function edit_berita($id)
    {
        $data['tb_berita'] = $this->M_editberita->get_id_berita($id);
        if ($data['tb_berita']) {
            $data['editberita'] = $this->M_editberita->get_editberita();
            $this->template->load('back/template', 'back/editberita/edit_berita', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('editberita', 'refresh');
        }
    }

    function save_berita()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi berita', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi')
            );

            $this->M_editberita->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
            redirect('editberita', 'refresh');
        } else {
            $this->add_berita();
        }
    }

    function update_berita()
    {
        $data = [
            'judul'         => $this->input->post('judul'),
            'isi'           => $this->input->post('isi')

        ];

        $this->M_editberita->update($this->input->post('id_berita'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('editberita', 'refresh');
    }

    function delete_berita($id)
    {
        $delete = $this->M_editberita->get_id_berita($id);
        if ($delete) {
            $this->M_editberita->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('editberita', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('editberita', 'refresh');
        }
    }
}
