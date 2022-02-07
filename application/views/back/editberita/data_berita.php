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
                            <i class="fa fa-table"></i> Berita
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('editberita/add_berita') ?>" class="btn btn-primary float-right">
                                    <i class="fas fa-user-plus"></i> Tambah Berita</a>
                                <br>
                                <br>
                                <?= $this->session->flashdata('message'); ?>
                            </div>

                            <br>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi berita</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($editberita as $row) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->judul ?></td>
                                            <td><?= $row->isi ?></td>
                                            <td>
                                                <a href="<?= base_url('editberita/edit_berita/' . $row->id_berita) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"> </i>
                                                </a>
                                                <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('editberita/delete_berita/' . $row->id_berita) ?>" class="btn btn-danger btn-sm">
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
        </div>
    </section>
</div>