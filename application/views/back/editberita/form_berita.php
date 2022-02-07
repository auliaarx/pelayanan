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
                                <a href="<?= base_url('editberita') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>

                            <?= validation_errors() ?>

                            <form action="<?= base_url('editberita/save_berita') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> Judul </label>
                                        <div class="col-sm-6">
                                            <input name="judul" class="form-control" placeholder="Isi Judul"></input>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> Isi Berita </label>
                                        <div class="col-sm-6">
                                            <textarea name="isi" class="form-control" placeholder="Jelaskan isi berita"></textarea>
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