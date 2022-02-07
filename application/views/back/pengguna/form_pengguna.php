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
                                <a href="<?= base_url('pengguna') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>

                            <?= validation_errors() ?>

                            <form action="<?= base_url('pengguna/save_pengguna') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kepala KK</label>
                                        <div class="col-sm-6">
                                            <select name="id_kk" class="form-control">
                                                <option selected="selected">- Pilih -</option>
                                                <?php foreach ($kepala as $key => $view) { ?>
                                                    <option value="<?= $view->id_kk ?>">
                                                        <?= $view->no_kk ?> -
                                                        <?= $view->nama ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Retype Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level User</label>
                                        <div class="col-sm-6">
                                            <select name="level_user" class="form-control">
                                                <option>- Pilih -</option>
                                                <option>Admin</option>
                                                <option>User</option>
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