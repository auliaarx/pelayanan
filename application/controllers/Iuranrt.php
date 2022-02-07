<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Iuranrt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['iuranrt'] = $this->M_iuranrt->get_iuranrt();
        $data['no_bayar'] = $this->M_iuranrt->no_bayar();
        $data['iuran_user'] = $this->M_iuranrt->iuran_user();

        $this->template->load('back/template', 'back/iuranrt/iuranrt', $data);
    }

    function save_iuranrt()
    {
        $this->form_validation->set_rules('judul_bayar', 'Judul Pembayaran', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Keterangan Tambahan', 'trim|required');

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
                        'no_bayar' => $this->input->post('no_bayar'),
                        'judul_bayar' => $this->input->post('judul_bayar'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'status_bayar' => 0,
                        'user_id' => $this->session->userdata('id_user'),
                        'gambar_bayar' => $this->upload->data('file_name'),
                        'tgl_daftar' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_iuranrt->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('iuranrt', 'refresh');
                }
            } else {
                $data = array(
                    'no_bayar' => $this->input->post('no_bayar'),
                    'judul_bayar' => $this->input->post('judul_bayar'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'status_bayar' => 0,
                    'user_id' => $this->session->userdata('id_user'),
                    //'gambar_bayar' => $this->upload->data('file_name'),
                    'tgl_daftar' => date('Y-m-d'),
                );

                $this->M_iuranrt->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('iuranrt', 'refresh');
            }
        }
    }

    function save_iuranrt_waiting()
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

            $this->M_iuranrt->update($this->input->post('no_bayar'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di update</div>');
            redirect('iuranrt', 'refresh');
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
                $nama_file = $this->input->post('bayar_no') . date('YmdHis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_tanggapan')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    if ($this->input->post('no_bayar')) {
                        $data = array(
                            'status_bayar' => 2,
                        );
                        $this->M_iuranrt->update($this->input->post('no_bayar'), $data);
                    }
                    $gambar_tanggapan = $this->upload->data();
                    $data = array(
                        'bayar_no' => $this->input->post('no_bayar'),
                        'tanggapan' => $this->input->post('tanggapan'),

                        'gambar_tanggapan' => $this->upload->data('file_name'),
                        'waktu_tanggapan' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_iuranrt->insert_tanggapan($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('iuranrt', 'refresh');
                }
            } else {
                if ($this->input->post('no_bayar')) {
                    $data = array(
                        'status_bayar' => 2,
                    );
                    $this->M_iuranrt->update($this->input->post('no_bayar'), $data);
                }
                $data = array(
                    'bayar_no' => $this->input->post('bayar_no'),
                    'tanggapan' => $this->input->post('tanggapan'),
                    'waktu_tanggapan' => date('Y-m-d'),
                );

                $this->M_iuranrt->insert_tanggapan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('iuranrt', 'refresh');
            }
        }
    }

    function save_close_iuranrt()
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

            $this->M_iuranrt->update($this->input->post('no_bayar'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di close</div>');
            redirect('iuranrt', 'refresh');
        }
    }

    function detail_iuranrt($no_bayar)
    {
        $data['iuranrt'] = $this->M_iuranrt->get_no_bayar($no_bayar);
        if ($data['iuranrt']) {
            $data['title'] = 'Detail Iuran' . $data['iuranrt']->no_bayar;
            $this->template->load('back/template', 'back/iuranrt/detail_iuranrt', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data iuran tidak ada</div>');
            redirect('iuranrt', 'refresh');
        }
    }

    function delete_iuranrt($no_bayar)
    {
        $delete =  $this->M_iuranrt->get_no_bayar($no_bayar);

        if ($delete) {
            $this->M_iuranrt->delete($no_bayar);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('iuranrt', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('iuranrt', 'refresh');
        }
    }
}
