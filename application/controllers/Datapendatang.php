<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datapendatang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['datapendatang'] = $this->M_datapendatang->get_datapendatang();

        $this->template->load('back/template', 'back/datapendatang/data_pendatang', $data);
    }

    function add_datapendatang($id = null)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        $data['penduduk'] = $this->M_penduduk->get_penduduk();
        $this->template->load('back/template', 'back/datapendatang/form_datapendatang', $data);
    }

    function save_datapendatang()
    {
        $this->form_validation->set_rules('nik_datang', 'NIK Pendatang', 'trim|required');
        $this->form_validation->set_rules('nama_datang', 'Nama Pendatang', 'trim|required');
        $this->form_validation->set_rules('jekel_datang', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tgl_datang', 'Tanggal pendatang', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nik_datang'      => $this->input->post('nik_datang'),
                'nama_datang'     => $this->input->post('nama_datang'),
                'jekel_datang'    => $this->input->post('jekel_datang'),
                'tgl_datang'      => $this->input->post('tgl_datang'),
                'pelapor'         => $this->input->post('id_pend')


            );
            $this->M_datapendatang->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('datapendatang', 'refresh');
        } else {
            $this->add_datapendatang();
        }
    }

    function edit_datapendatang($id)
    {
        $data['tb_datang'] = $this->M_datapendatang->get_id_datang($id);
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['tb_datang']) {
            $data['datapendatang'] = $this->M_datapendatang->get_datapendatang();
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/datapendatang/edit_datapendatang', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('datapendatang', 'refresh');
        }
    }

    function update_datapendatang()
    {
        $data = [
            'nik_datang'      => $this->input->post('nik_datang'),
            'nama_datang'     => $this->input->post('nama_datang'),
            'jekel_datang'    => $this->input->post('jekel_datang'),
            'tgl_datang'      => $this->input->post('tgl_datang'),
            'pelapor'         => $this->input->post('id_pend')

        ];

        $this->M_datapendatang->update($this->input->post('id_datang'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('datapendatang', 'refresh');
    }

    function delete_datapendatang($id)
    {
        $delete = $this->M_datapendatang->get_id_datang($id);
        if ($delete) {
            $this->M_datapendatang->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('datapendatang', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('datapendatang', 'refresh');
        }
    }
}
