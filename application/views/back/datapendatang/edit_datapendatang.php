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
                        <h4 class="card-title">
                            <b class="fa fa-edit"></b> Edit Data Pendatang
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('datapendatang') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>

                            <?= validation_errors() ?>

                            <form action="<?= base_url('datapendatang/update_datapendatang') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id_datang" value="<?= $tb_datang->id_datang ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="nik_datang" value="<?= $tb_datang->nik_datang ?>" class="form-control" placeholder="NIK">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="nama_datang" value="<?= $tb_datang->nama_datang ?>" class="form-control" placeholder="Nama pendatang">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="jekel_datang" class="form-control">
                                                <option>- Pilih -</option>
                                                <option> Laki-Laki</option>
                                                <option> Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Datang</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="tgl_datang" value="<?= $tb_datang->tgl_datang ?>" class="form-control" placeholder="Tanggal lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pelapor</label>
                                        <div class="col-sm-6">
                                            <select name="id_pend" class="form-control">
                                                <option selected="selected">- Pilih -</option>
                                                <?php foreach ($penduduk as $key => $view) { ?>
                                                    <option value="<?= $view->id_pend ?>">
                                                        <?= $view->nik ?> -
                                                        <?= $view->nama ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"> Save </button>
                                        <button type="reset" class="btn btn-danger"> Reset </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>