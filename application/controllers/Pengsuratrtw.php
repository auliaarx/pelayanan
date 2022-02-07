<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengsuratrtw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['pengsuratrtw'] = $this->M_pengsuratrtw->get_pengsuratrtw();
        $data['no_pengsurat'] = $this->M_pengsuratrtw->no_pengsurat();
        $data['pengsurat_user'] = $this->M_pengsuratrtw->pengsurat_user();

        $this->template->load('back/template', 'back/pengsuratrtw/pengsuratrtw', $data);
    }

    function save_pengsuratrtw()
    {
        $this->form_validation->set_rules('judul_pengsurat', 'Judul Pempengsuratan', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'no_pengsurat'      => $this->input->post('no_pengsurat'),
                'judul_pengsurat'   => $this->input->post('judul_pengsurat'),
                'nama'              => $this->input->post('nama'),
                'nik'               => $this->input->post('nik'),
                'status_pengsurat'  => 0,
                'user_id'           => $this->session->userdata('id_user'),
                'tgl_daftar'        => date('Y-m-d'),
            );
            //var_dump($data);

            $this->M_pengsuratrtw->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');

            redirect('pengsuratrtw', 'refresh');
        } else {

            redirect('pengsuratrtw', 'refresh');
        }
    }

    function save_pengsuratrtw_waiting()
    {
        $this->form_validation->set_rules('status_pengsurat', 'Judul Pempengsuratan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'status_pengsurat' => $this->input->post('status_pengsurat'),
            );

            $this->M_pengsuratrtw->update($this->input->post('no_pengsurat'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di update</div>');
            redirect('pengsuratrtw', 'refresh');
        }
    }

    function save_tanggapan()
    {
        $this->form_validation->set_rules('tanggapan', 'Tanggapan admin', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($_FILES['gambar_tanggapan']['error'] <> 4) {

                $config['upload_path'] = './assets/images/tanggapan/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $nama_file = $this->input->post('pengsurat_no') . date('YmdHis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_tanggapan')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    if ($this->input->post('no_pengsurat')) {
                        $data = array(
                            'status_pengsurat' => 2,
                        );
                        $this->M_pengsuratrtw->update($this->input->post('no_pengsurat'), $data);
                    }
                    $gambar_tanggapan = $this->upload->data();
                    $data = array(
                        'pengsurat_no' => $this->input->post('no_pengsurat'),
                        'tanggapan' => $this->input->post('tanggapan'),

                        'gambar_tanggapan' => $this->upload->data('file_name'),
                        'waktu_tanggapan' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_pengsuratrtw->insert_tanggapan($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('pengsuratrtw', 'refresh');
                }
            } else {
                if ($this->input->post('no_pengsurat')) {
                    $data = array(
                        'status_pengsurat' => 2,
                    );
                    $this->M_pengsuratrtw->update($this->input->post('no_pengsurat'), $data);
                }
                $data = array(
                    'pengsurat_no' => $this->input->post('pengsurat_no'),
                    'tanggapan' => $this->input->post('tanggapan'),
                    'waktu_tanggapan' => date('Y-m-d'),
                );

                $this->M_pengsuratrtw->insert_tanggapan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('pengsuratrtw', 'refresh');
            }
        }
    }

    function save_close_pengsuratrtw()
    {
        $this->form_validation->set_rules('status_pengsurat', 'Judul Pempengsuratan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'status_pengsurat' => $this->input->post('status_pengsurat'),
            );

            $this->M_pengsuratrtw->update($this->input->post('no_pengsurat'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di close</div>');
            redirect('pengsuratrtw', 'refresh');
        }
    }

    function detail_pengsuratrtw($no_pengsurat)
    {
        $data['pengsuratrtw'] = $this->M_pengsuratrtw->get_no_pengsurat($no_pengsurat);
        if ($data['pengsuratrtw']) {
            $data['title'] = 'Detail pengsurat' . $data['pengsuratrtw']->no_pengsurat;
            $this->template->load('back/template', 'back/pengsuratrtw/detail_pengsuratrtw', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data pengsurat tidak ada</div>');
            redirect('pengsuratrtw', 'refresh');
        }
    }

    function delete_pengsuratrtw($no_pengsurat)
    {
        $delete =  $this->M_pengsuratrtw->get_no_pengsurat($no_pengsurat);

        if ($delete) {
            $this->M_pengsuratrtw->delete($no_pengsurat);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('pengsuratrtw', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('pengsuratrtw', 'refresh');
        }
    }
}
