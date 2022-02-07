<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengsuratrt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['pengsuratrt'] = $this->M_pengsuratrt->get_pengsuratrt();
        $data['no_pengsurat'] = $this->M_pengsuratrt->no_pengsurat();
        $data['pengsurat_user'] = $this->M_pengsuratrt->pengsurat_user();

        $this->template->load('back/template', 'back/pengsuratrt/pengsuratrt', $data);
    }

    function save_pengsuratrt()
    {
        $this->form_validation->set_rules('judul_pengsurat', 'Judul Pempengsuratan', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Keterangan Tambahan', 'trim|required');

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($_FILES['gambar_pengsurat']['error'] <> 4) {

                $config['upload_path'] = './assets/images/pengsuratrt/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $nama_file = $this->input->post('no_pengsurat') . date('YmdHis');
                $config['file_name'] = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_pengsurat')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');
                    $this->index();
                } else {
                    $gambar_pengsurat = $this->upload->data();

                    $data = array(
                        'no_pengsurat' => $this->input->post('no_pengsurat'),
                        'judul_pengsurat' => $this->input->post('judul_pengsurat'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'status_pengsurat' => 0,
                        'user_id' => $this->session->userdata('id_user'),
                        'gambar_pengsurat' => $this->upload->data('file_name'),
                        'tgl_daftar' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_pengsuratrt->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('pengsuratrt', 'refresh');
                }
            } else {
                $data = array(
                    'no_pengsurat' => $this->input->post('no_pengsurat'),
                    'judul_pengsurat' => $this->input->post('judul_pengsurat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'status_pengsurat' => 0,
                    'user_id' => $this->session->userdata('id_user'),
                    //'gambar_pengsurat' => $this->upload->data('file_name'),
                    'tgl_daftar' => date('Y-m-d'),
                );

                $this->M_pengsuratrt->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('pengsuratrt', 'refresh');
            }
        }
    }

    function save_pengsuratrt_waiting()
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

            $this->M_pengsuratrt->update($this->input->post('no_pengsurat'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di update</div>');
            redirect('pengsuratrt', 'refresh');
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

                $config['upload_path'] = './assets/images/surat/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
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
                            'status_pengsurat' => 3,
                        );
                        $this->M_pengsuratrt->update($this->input->post('no_pengsurat'), $data);
                    }
                    $gambar_tanggapan = $this->upload->data();
                    $data = array(
                        'pengsurat_no' => $this->input->post('no_pengsurat'),
                        'tanggapan' => $this->input->post('tanggapan'),

                        'gambar_tanggapan' => $this->upload->data('file_name'),
                        'waktu_tanggapan' => date('Y-m-d'),
                    );
                    //var_dump($data);

                    $this->M_pengsuratrt->insert_tanggapan($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                    redirect('pengsuratrt', 'refresh');
                }
            } else {
                if ($this->input->post('no_pengsurat')) {
                    $data = array(
                        'status_pengsurat' => 3,
                    );
                    $this->M_pengsuratrt->update($this->input->post('no_pengsurat'), $data);
                }
                $data = array(
                    'pengsurat_no' => $this->input->post('pengsurat_no'),
                    'tanggapan' => $this->input->post('tanggapan'),
                    'waktu_tanggapan' => date('Y-m-d'),
                );

                $this->M_pengsuratrt->insert_tanggapan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di simpan</div>');
                redirect('pengsuratrt', 'refresh');
            }
        }
    }

    function save_tolak_surat()
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

            $this->M_pengsuratrt->update($this->input->post('no_pengsurat'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di close</div>');
            redirect('pengsuratrt', 'refresh');
        }
    }

    function save_close_pengsuratrt()
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

            $this->M_pengsuratrt->update($this->input->post('no_pengsurat'), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data Berhasil Di close</div>');
            redirect('pengsuratrt', 'refresh');
        }
    }

    function detail_pengsuratrt($no_pengsurat)
    {
        $data['pengsuratrt'] = $this->M_pengsuratrt->get_no_pengsurat($no_pengsurat);
        if ($data['pengsuratrt']) {
            $data['title'] = 'Detail pengsurat' . $data['pengsuratrt']->no_pengsurat;
            $this->template->load('back/template', 'back/pengsuratrt/detail_pengsuratrt', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data pengsurat tidak ada</div>');
            redirect('pengsuratrt', 'refresh');
        }
    }

    function delete_pengsuratrt($no_pengsurat)
    {
        $delete =  $this->M_pengsuratrt->get_no_pengsurat($no_pengsurat);

        if ($delete) {
            $this->M_pengsuratrt->delete($no_pengsurat);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Di hapus</div>');
            redirect('pengsuratrt', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada</div>');
            redirect('pengsuratrt', 'refresh');
        }
    }
}
