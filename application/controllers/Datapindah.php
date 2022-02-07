<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datapindah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['datapindah'] = $this->M_datapindah->get_datapindah();

        $this->template->load('back/template', 'back/datapindah/data_pindah', $data);
    }

    function add_datapindah($id = null)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        $data['penduduk'] = $this->M_penduduk->get_penduduk();
        $this->template->load('back/template', 'back/datapindah/form_datapindah', $data);
    }

    function save_datapindah()
    {
        $this->form_validation->set_rules('tgl_pindah', 'Tanggal Pindah', 'trim|required');
        $this->form_validation->set_rules('alasan', 'Alasan Pindah', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'tgl_pindah'    => $this->input->post('tgl_pindah'),
                'alasan'        => $this->input->post('alasan'),
                'id_pdd'       => $this->input->post('id_pend')


            );
            $this->M_datapindah->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('datapindah', 'refresh');
        } else {
            $this->add_datapindah();
        }
    }

    function edit_datapindah($id)
    {
        $data['tb_pindah'] = $this->M_datapindah->get_id_pindah($id);
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['tb_pindah']) {
            $data['datapindah'] = $this->M_datapindah->get_datapindah();
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/datapindah/edit_datapindah', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('datapindah', 'refresh');
        }
    }

    function update_datapindah()
    {
        $data = [
            'tgl_pindah'    => $this->input->post('tgl_pindah'),
            'alasan'        => $this->input->post('alasan')

        ];

        $this->M_datapindah->update($this->input->post('id_pindah'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('datapindah', 'refresh');
    }

    function delete_datapindah($id)
    {
        $delete = $this->M_datapindah->get_id_pindah($id);
        if ($delete) {
            $this->M_datapindah->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('datapindah', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('datapindah', 'refresh');
        }
    }
}
