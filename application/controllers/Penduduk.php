<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['penduduk'] = $this->M_penduduk->get_penduduk();
        $this->template->load('back/template', 'back/penduduk/data_penduduk', $data);
    }

    function add_penduduk()
    {
        $this->template->load('back/template', 'back/penduduk/form_penduduk');
    }

    function save_penduduk()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tempat_lh', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lh', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jekel', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa', 'trim|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('kawin', 'Hubungan', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lh' => $this->input->post('tempat_lh'),
                'tgl_lh'    => $this->input->post('tgl_lh'),
                'jekel'     => $this->input->post('jekel'),
                'jekel'     => $this->input->post('jekel'),
                'desa'      => $this->input->post('desa'),
                'rw'        => $this->input->post('rw'),
                'rt'        => $this->input->post('rt'),
                'agama'     => $this->input->post('agama'),
                'kawin'     => $this->input->post('kawin'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status'    => $this->input->post('status')
            );
            $this->M_penduduk->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('penduduk/', 'refresh');
        } else {
            $this->add_penduduk();
        }
    }

    function edit_penduduk($id)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['pend']) {
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/penduduk/edit_penduduk', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('penduduk', 'refresh');
        }
    }

    function update_penduduk()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'tempat_lh' => $this->input->post('tempat_lh'),
            'jekel'     => $this->input->post('jekel'),
            'tgl_lh'    => $this->input->post('tgl_lh'),
            'jekel'     => $this->input->post('jekel'),
            'desa'      => $this->input->post('desa'),
            'rt'        => $this->input->post('rt'),
            'rw'        => $this->input->post('rw'),
            'agama'     => $this->input->post('agama'),
            'kawin'     => $this->input->post('kawin'),
            'pekerjaan' => $this->input->post('pekerjaan')

        ];

        $this->M_penduduk->update($this->input->post('id_pend'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('penduduk', 'refresh');
    }

    function delete_penduduk($id)
    {
        $delete = $this->M_penduduk->get_id_pend($id);
        if ($delete) {
            $this->M_penduduk->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('penduduk', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('penduduk', 'refresh');
        }
    }

    function profilee($id = null)
    {
        $data['penduduk'] = $this->M_penduduk->get_id_penduduk($id);
        if ($data['penduduk']) {
            $data['title'] = 'profile user';
            $this->template->load('back/template', 'back/profilee', $data);
        } else {
            redirect('dashboard_warga', 'refresh');
        }
    }

    function profile_penduduk($id)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['pend']) {
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/penduduk/profile_penduduk', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('penduduk', 'refresh');
        }
    }

    function print_suket($id)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        if ($data['pend']) {
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $this->template->load('back/template', 'back/penduduk/print_suket', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('penduduk', 'refresh');
        }
    }
}
