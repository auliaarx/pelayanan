<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Iuranrtw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['iuranrtw'] = $this->M_iuranrtw->get_iuranrtw();
        $data['no_bayar'] = $this->M_iuranrtw->no_bayar();
        $data['iuran_user'] = $this->M_iuranrtw->iuran_user();

        $this->template->load('back/template', 'back/iuranrtw/iuranrtw', $data);
    }

    function save_iuranrtw()
    {
        $this->form_validation->set_rules('judul_bayar', 'Judul Pembayaran', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($_FILES['gambar_bayar']['error'] <> 4) {

                $config['upload_path'] = './assets/images/iuranrt/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $nama_file = $this->input->post('no_bayar') . date('YmdHis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_bayar')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    $gambar_bayar = $this->upload->data();

                    $data = array(
                        'no_bayar'      => $this->input->post('no_bayar'),
                        'judul_bayar'   => $this->input->post('judul_bayar'),
                        'nama'          => $this->input->post('nama'),
                        'nik'           => $this->input->post('nik'),
                        'status_bayar'  => 0,
                        'user_id'       => $this->session->userdata('id_user'),
                        'gambar_bayar'  => $this->upload->data('file_name'),
                        'tgl_daftar'    => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_iuranrtw->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('iuranrtw', 'refresh');
                }
            } else {
                $data = array(
                    'no_bayar'      => $this->input->post('no_bayar'),
                    'judul_bayar'   => $this->input->post('judul_bayar'),
                    'nama'          => $this->input->post('nama'),
                    'nik'           => $this->input->post('nik'),
                    'status_bayar'  => 0,
                    'user_id'       => $this->session->userdata('id_user'),
                    //'gambar_bayar' => $this->upload->data('file_name'),
                    'tgl_daftar'    => date('Y-m-d'),
                );

                $this->M_iuranrtw->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('iuranrtw', 'refresh');
            }
        }
    }

    function save_iuranrtw_waiting()
    {
        $this->form_validation->set_rules('status_bayar', 'Judul Pembayaran', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'status_bayar' => $this->input->post('status_bayar'),
            );

            $this->M_iuranrtw->update($this->input->post('no_bayar'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di update</div>');
            redirect('iuranrtw', 'refresh');
        }
    }

    function save_tanggapan()
    {
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($_FILES['gambar_tanggapan']['error'] <> 4) {

                $config['upload_path'] = './assets/images/iuranrt/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $nama_file = $this->input->post('bayar_no') . date('YmdHis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_tanggapan')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    $gambar_tanggapan = $this->upload->data();

                    $data = array(
                        'bayar_no' => $this->input->post('bayar_no'),
                        'tanggapan' => $this->input->post('tanggapan'),

                        'gambar_tanggapan' => $this->upload->data('file_name'),
                        'waktu_tanggapan' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_iuranrtw->insert_tanggapan($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('iuranrtw', 'refresh');
                }
            } else {
                $data = array(
                    'bayar_no' => $this->input->post('bayar_no'),
                    'tanggapan' => $this->input->post('tanggapan'),
                    'waktu_tanggapan' => date('Y-m-d'),
                );

                $this->M_iuranrtw->insert_tanggapan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('iuranrtw', 'refresh');
            }
        }
    }

    function save_close_iuranrtw()
    {
        $this->form_validation->set_rules('status_bayar', 'Judul Pembayaran', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'status_bayar' => $this->input->post('status_bayar'),
            );

            $this->M_iuranrtw->update($this->input->post('no_bayar'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di close</div>');
            redirect('iuranrtw', 'refresh');
        }
    }

    function detail_iuranrtw($no_bayar)
    {
        $data['iuranrtw'] = $this->M_iuranrtw->get_no_bayar($no_bayar);
        if ($data['iuranrtw']) {
            $data['title'] = 'Detail Iuran' . $data['iuranrtw']->no_bayar;
            $this->template->load('back/template', 'back/iuranrtw/detail_iuranrtw', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data iuran tidak ada</div>');
            redirect('iuranrtw', 'refresh');
        }
    }

    function delete_iuranrtw($no_bayar)
    {
        $delete =  $this->M_iuranrtw->get_no_bayar($no_bayar);

        if ($delete) {
            $this->M_iuranrtw->delete($no_bayar);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('iuranrtw', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('iuranrtw', 'refresh');
        }
    }
}
