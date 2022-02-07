<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kartukk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index($id = null)
    {
        $data['kartukk'] = $this->M_kartukk->get_kartukk();
        $data['anggota'] = $this->M_kartukk->get_anggota($id);
        $data['kepala'] = $this->M_kartukk->get_kepala();
        $this->template->load('back/template', 'back/kartukk/data_kartukeluarga', $data);
    }

    function add_kartukeluarga($id = null)
    {
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        $data['penduduk'] = $this->M_penduduk->get_penduduk();
        $this->template->load('back/template', 'back/kartukk/form_kartukeluarga', $data);
    }

    function add_anggota($id)
    {
        $data['kartukeluarga'] = $this->M_kartukk->get_id_kk($id);
        $data['pend'] = $this->M_penduduk->get_id_pend($id);
        $data['tb_anggota'] = $this->M_kartukk->get_id_anggota($id);
        if ($data['kartukeluarga']) {
            $data['kartukk'] = $this->M_kartukk->get_kartukk();
            $data['penduduk'] = $this->M_penduduk->get_penduduk();
            $data['anggota'] = $this->M_kartukk->get_anggota($id);
            $this->template->load('back/template', 'back/kartukk/kk_anggota', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('kartukk', 'refresh');
        }
    }

    function save_kartukeluarga()
    {
        $this->form_validation->set_rules('no_kk', 'Nomor KK', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'no_kk'     => $this->input->post('no_kk'),
                'kepala'    => $this->input->post('id_pend'),
                'desa'      => $this->input->post('desa'),
                'rt'        => $this->input->post('rt'),
                'rw'        => $this->input->post('rw'),
                'kec'       => $this->input->post('kec'),
                'kabupaten' => $this->input->post('kabupaten'),
                'prov'      => $this->input->post('prov')
            );
            $this->M_kartukk->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('kartukk/', 'refresh');
        } else {
            $this->add_kartukeluarga();
        }
    }

    function save_anggota($id = null)
    {
        $this->form_validation->set_rules('hubungan', 'Hubungan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(

                'id_kk_anggota'   => $this->input->post('id_kk'),
                'id_pend_anggota'   => $this->input->post('id_pend'),
                'hubungan'          => $this->input->post('hubungan')

            );
            $this->M_kartukk->insert_anggota($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('kartukk', 'refresh');
        } else {
            $this->add_anggota($id);
        }
    }

    function edit_kartukeluarga($id)
    {
        $data['kartukeluarga'] = $this->M_kartukk->get_id_kk($id);
        if ($data['kartukeluarga']) {
            $data['kartukk'] = $this->M_kartukk->get_kartukk();
            $this->template->load('back/template', 'back/kartukk/edit_kartukeluarga', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('kartukk', 'refresh');
        }
    }

    function update_kartukeluarga()
    {
        $data = [
            'no_kk'     => $this->input->post('no_kk'),
            'kepala'    => $this->input->post('kepala'),
            'desa'      => $this->input->post('desa'),
            'rt'        => $this->input->post('rt'),
            'rw'        => $this->input->post('rw'),
            'kec'       => $this->input->post('kec'),
            'kabupaten' => $this->input->post('kabupaten'),
            'prov'      => $this->input->post('prov')
        ];

        $this->M_kartukk->update($this->input->post('id_kk'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('kartukk', 'refresh');
    }

    function delete_kartukeluarga($id)
    {
        $delete = $this->M_kartukk->get_id_kk($id);
        if ($delete) {
            $this->M_kartukk->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('kartukk', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('kartukk', 'refresh');
        }
    }

    function delete_anggota($id)
    {
        $delete = $this->M_kartukk->get_id_anggota($id);
        if ($delete) {
            $this->M_kartukk->delete_anggota($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('kartukk', 'refresh');
        } else {
            $this->session->set_flashdata('hapus', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('kartukk', 'refresh');
        }
    }

    function profile($id)
    {
        $data['kartukk'] = $this->M_kartukk->get_id_kartukk($id);
        if ($data['kartukk']) {
            $data['title'] = 'profile user';
            $this->template->load('back/template', 'back/profile', $data);
        } else {
            redirect('dashboard_warga', 'refresh');
        }
    }

    function update_profile()
    {
        $data = [
            'email'     => $this->input->post('email'),
            'password'  => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        ];

        $this->M_pengguna->update($this->input->post('id_user'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di simpan</div>');
        redirect('dashboard_warga', 'refresh');
    }
}
