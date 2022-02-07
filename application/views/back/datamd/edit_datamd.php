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
                            <b class="fa fa-edit"></b>Edit Data Meninggal
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('datamd') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>
                            <?= validation_errors() ?>

                            <form action="<?= base_url('datamd/update_datamd') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id_mendu" value="<?= $tb_mendu->id_mendu ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Meninggal</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="tgl_mendu" value="<?= $tb_mendu->tgl_mendu ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sebab</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="sebab" value="<?= $tb_mendu->sebab ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"> Update </button>
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