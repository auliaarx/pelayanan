<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datamd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['datamd'] = $this->M_datamd->get_datamd();

        $this->template->load('back/template', 'back/datamd/data_md', $data);
    }

    function add_datamd($id = null)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        $data['penduduk'] = $this->M_penduduk->get_penduduk();
        $this->template->load('back/template', 'back/datamd/form_datamd', $data);
    }

    function save_datamd()
    {
        $this->form_validation->set_rules('tgl_mendu', 'Tanggal Meninggal', 'trim|required');
        $this->form_validation->set_rules('sebab', 'Sebab Kematian', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'tgl_mendu'    => $this->input->post('tgl_mendu'),
                'sebab'        => $this->input->post('sebab'),
                'id_pdd'       => $this->input->post('id_pend')


            );
            $this->M_datamd->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('datamd', 'refresh');
        } else {
            $this->add_datamd();
        }
    }

    function edit_datamd($id)
    {
        $data['tb_mendu'] = $this->M_datamd->get_id_mendu($id);
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['tb_mendu']) {
            $data['datamd'] = $this->M_datamd->get_datamd();
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/datamd/edit_datamd', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('datamd', 'refresh');
        }
    }

    function update_datamd()
    {
        $data = [
            'tgl_mendu'    => $this->input->post('tgl_mendu'),
            'sebab'        => $this->input->post('sebab')

        ];

        $this->M_datamd->update($this->input->post('id_mendu'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('datamd', 'refresh');
    }

    function delete_datamd($id)
    {
        $delete = $this->M_datamd->get_id_mendu($id);
        if ($delete) {
            $this->M_datamd->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('datamd', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('datamd', 'refresh');
        }
    }
}
