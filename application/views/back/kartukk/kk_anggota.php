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
                            <b class="fa fa-edit"></b> Anggota Keluarga
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?= validation_errors() ?>
                            <form action="<?= base_url('kartukk/save_anggota') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input type="hidden" name="id_kk" value="<?= $kartukeluarga->id_kk ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No KK</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="no_kk" value="<?= $kartukeluarga->no_kk ?>" class="form-control" placeholder="Nomor KK" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="desa" value="<?= $kartukeluarga->desa ?>, RT <?= $kartukeluarga->rt ?>, RW <?= $kartukeluarga->rw ?> (<?= $kartukeluarga->kec ?>, <?= $kartukeluarga->kabupaten ?>, <?= $kartukeluarga->prov ?>)" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Anggota</label>
                                        <div class="col-sm-4">
                                            <select name="id_pend" class="form-control">
                                                <option value=""> - Pilih Anggota - </option>
                                                <?php foreach ($penduduk as $key => $view) { ?>
                                                    <option value="<?= $view->id_pend ?>">
                                                        <?= $view->nik ?> -
                                                        <?= $view->nama ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="hubungan" id="hubungan" class="form-control">
                                                <option>- Hub Keluarga -</option>
                                                <option>Kepala Keluarga</option>
                                                <option>Istri</option>
                                                <option>Anak</option>
                                                <option>Orang Tua</option>
                                                <option>Mertua</option>
                                                <option>Menantu</option>
                                                <option>Cucu</option>
                                                <option>Famili Lain</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary"> Tambah </button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin </th>
                                                <th>Hubungan </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($anggota as $row) { ?>
                                                <tr>
                                                    <td><?= $row->nik ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><?= $row->jekel ?></td>
                                                    <td><?= $row->hubungan ?></td>
                                                    <td>
                                                        <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('kartukk/delete_anggota/' . $row->id_anggota) ?>" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"> </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer">
                            <div>
                                <a href="<?= base_url('kartukk') ?>" class="btn btn-warning">
                                    <i class=""></i> Back</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>