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
                            <b class="fa fa-edit"></b>Edit penduduk <?= $pend->nama ?>
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('penduduk') ?>" class="btn btn-warning float-right">
                                    <i class=""></i> Back </a>
                            </div>

                            <br>
                            <?= validation_errors() ?>

                            <form action="<?= base_url('penduduk/update_penduduk') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="hidden" class="form-control" id="id_pend" name="id_pend" value="<?= $pend->id_pend ?>" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nik" value="<?= $pend->nik ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="nama" value="<?= $pend->nama ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="tempat_lh" value="<?= $pend->tempat_lh ?>" class="form-control" />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="date" name="tgl_lh" value="<?= $pend->tgl_lh ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="jekel" class="form-control">
                                                <option>- Pilih -</option>
                                                <option> Laki-Laki</option>
                                                <option> Perempuan</option>>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="desa" value="<?= $pend->desa ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RT/RW</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="rt" value="<?= $pend->rt ?>" class="form-control" readonly />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="rw" value="<?= $pend->rw ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="agama" value="<?= $pend->agama ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Pernikahan</label>
                                        <div class="col-sm-3">
                                            <select name="kawin" class="form-control">
                                                <option>- Pilih -</option>
                                                <option>Sudah Menikah</option>
                                                <option>Belum Menikah</option>
                                                <option>Cerai Mati</option>
                                                <option>Cerai Hidup</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="pekerjaan" value="<?= $pend->pekerjaan ?>" class="form-control" />
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