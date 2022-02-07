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
                                <a href="<?= base_url('datapindah') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>

                            <?= validation_errors() ?>

                            <form action="<?= base_url('datapindah/save_datapindah') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penduduk</label>
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
                                        <label class="col-sm-2 col-form-label">Tanggal Pindah</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="tgl_pindah" class="form-control" placeholder="Tanggal Pindah">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alasan</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="alasan" class="form-control" placeholder="Alasan">
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