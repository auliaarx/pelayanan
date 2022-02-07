<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>

    <section class="content">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card card-dark">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-table"></i> Data Pengajuan Surat
                        </h3>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('pengsuratrtw/add_pengsuratrtw') ?>" class="btn btn-primary float-right" data-toggle="modal" data-target="#form_pengsuratrtw">
                            Tambah Data </a>
                        <br>
                        <br>
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered">
                            <br>

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No pengajuan</th>
                                    <th>Judul</th>
                                    <th>Status pengajuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pengsurat_user as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->no_pengsurat ?></td>
                                        <td><?= $row->judul_pengsurat ?></td>
                                        <td>
                                            <?php if ($row->status_pengsurat == '0') {
                                                echo '<span class="badge badge-warning"> Waiting... </span>';
                                            } else if ($row->status_pengsurat == '1') {
                                                echo '<span class="badge badge-info"> Response... </span>';
                                            } else if ($row->status_pengsurat == '2') {
                                                echo '<span class="badge badge-success"> Process... </span>';
                                            } else if ($row->status_pengsurat == '3') {
                                                echo '<span class="badge badge-danger"> Solved </span>';
                                            } else {
                                                echo '<span class="badge badge-dark"> Surat ditolak karena data tidak ditemukan </span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('pengsuratrtw/detail_pengsuratrtw/' . $row->no_pengsurat) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                            <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('pengsuratrtw/delete_pengsuratrtw/' . $row->no_pengsurat) ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"> </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="form_pengsuratrtw">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah pengajuan warga</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pengsuratrtw/save_pengsuratrtw') ?> " method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label> Jenis Surat </label>
                        <input type="hidden" name="no_pengsurat" value="<?= $no_pengsurat ?>" class="form-control">
                        <select name="judul_pengsurat" class="form-control">
                            <option>- Pilih -</option>
                            <option>Surat Keterangan Kelakuan Baik</option>
                            <option>Surat Keterangan Pengantar Nikah</option>
                            <option>Surat Keterangan Domisili</option>
                            <option>Surat Keterangan Lahir</option>
                            <option>Surat Keterangan Pendatang</option>
                            <option>Surat Keterangan Pindah</option>
                            <option>Surat Keterangan Meninggal Dunia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> NIK</label>
                        <input name="nik" class="form-control" placeholder="Wajib Isi"></input>
                    </div>

                    <div class="form-group">
                        <label> Nama</label>
                        <input name="nama" class="form-control" placeholder="Wajib Isi"></input>
                    </div>

                    <p class="text-danger"><i>*Data hanya terinput jika semua sudah terisi</i></p>



                    <form action="/button-type">
                        <button type="submit" onclick="return confirm('Yakin data sudah benar?')" class="btn btn-primary btn-sm"> Save </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
            </div>
        </div>
    </div>
</div>