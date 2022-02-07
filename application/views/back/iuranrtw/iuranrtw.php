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
                            <i class="fa fa-table"></i> Data Iuran
                        </h3>
                    </div>

                    <div class="card-body">
                        <b>Pilihan Pembayaran</b>

                        <div class="image">
                            <br>
                            <img src="<?= base_url() ?>assets/back/dist/img/iuran/bca.png" width="75" alt="User Image">
                            <i>
                                Nomor Rekening : xxxx atas nama xxx
                            </i>
                            <br>
                            <br>
                            <img src="<?= base_url() ?>assets/back/dist/img/iuran/dana.jpg" width="75" alt="User Image">
                            <i>
                                Nomor Akun : xxxx atas nama xxx
                            </i>
                            <br>
                            <br>
                            <img src="<?= base_url() ?>assets/back/dist/img/iuran/gopay.jpg" width="75" alt="User Image">
                            <i>
                                Nomor Akun : xxxx atas nama xxx
                            </i>
                        </div>

                        <br>

                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered">
                            <a href="<?= base_url('iuranrtw/add_iuranrtw') ?>" class="btn btn-primary float-right" data-toggle="modal" data-target="#form_iuranrtw">
                                Tambah Data </a>
                            <br>
                            <br>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Iuran</th>
                                    <th>Judul</th>
                                    <th>Status Iuran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($iuran_user as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->no_bayar ?></td>
                                        <td><?= $row->judul_bayar ?></td>
                                        <td>
                                            <?php if ($row->status_bayar == '0') {
                                                echo '<span class="badge badge-warning"> Waiting... </span>';
                                            } else if ($row->status_bayar == '1') {
                                                echo '<span class="badge badge-info"> Response... </span>';
                                            } else if ($row->status_bayar == '2') {
                                                echo '<span class="badge badge-success"> Process... </span>';
                                            } else {
                                                echo '<span class="badge badge-danger"> Solved </span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('iuranrtw/detail_iuranrtw/' . $row->no_bayar) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                            <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('iuranrtw/delete_iuranrtw/' . $row->no_bayar) ?>" class="btn btn-danger btn-sm">
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

<div class="modal fade" id="form_iuranrtw">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah iuran warga</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('iuranrtw/save_iuranrtw') ?> " method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label> Jenis Pembayaran </label>
                        <input type="hidden" name="no_bayar" value="<?= $no_bayar ?>" class="form-control">
                        <select name="judul_bayar" class="form-control">
                            <option>- Pilih -</option>
                            <option>Iuran Pembangunan Masjid</option>
                            <option>Iuran 17 Agustus</option>
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

                    <div class="form-group">
                        <label> Bukti pembayaran </label>
                        <br>
                        <input type="file" name="gambar_bayar">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm"> Save </button>
                    <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                </form>
            </div>
        </div>
    </div>
</div>