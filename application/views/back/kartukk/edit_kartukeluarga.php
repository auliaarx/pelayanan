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
                            <b class="fa fa-edit"></b> Edit kartu keluarga
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <a href="<?= base_url('kartukk') ?>" class="btn btn-warning float-right">
                                    <i class=""></i> Back</a>
                            </div>
                            <br>
                            <?= validation_errors() ?>
                            <form action="<?= base_url('kartukk/update_kartukeluarga') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="hidden" name="id_kk" value="<?= $kartukeluarga->id_kk ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nomor KK</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="no_kk" value="<?= $kartukeluarga->no_kk ?>" class="form-control" placeholder="Nomor KK" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="desa" value="<?= $kartukeluarga->desa ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RT/RW</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="rt" value="<?= $kartukeluarga->rt ?>" class="form-control" readonly />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="rw" value="<?= $kartukeluarga->rw ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="kec" value="<?= $kartukeluarga->kec ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="kabupaten" value="<?= $kartukeluarga->kabupaten ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="prov" value="<?= $kartukeluarga->prov ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"> Update </button>
                                        <button type="reset" class="btn btn-danger"> Reset </button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>