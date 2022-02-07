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
                            <b class="fas fa-user-plus"></b> Tambah Data
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('kartukk') ?>" class="btn btn-warning float-right">
                                    <i class=""></i> Back</a>
                            </div>

                            <br>
                            <?= validation_errors() ?>

                            <form action="<?= base_url('kartukk/save_kartukeluarga') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nomor KK</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="no_kk" class="form-control" placeholder="Nomor KK">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kepala</label>
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

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="desa" class="form-control" placeholder="Desa">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RT/RW</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="rt" class="form-control" placeholder="RT">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="rw" class="form-control" placeholder="RW">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="kec" class="form-control" placeholder="Kecamatan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="prov" class="form-control" placeholder="Provinsi">
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