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
                            <b class="fa fa-edit"></b> Edit Profile User
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <div>
                                <a href="<?= base_url('dashboard_warga') ?>" class="btn btn-warning float-right">
                                    <i class=""></i>Back</a>
                            </div>

                            <br>

                            <?= validation_errors() ?>

                            <form action="<?= base_url('kartukk/update_profile') ?> " method="POST">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id_user" value="<?= $kartukk->id_user ?>" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" value="<?= $kartukk->username ?>" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" name="email" value="<?= $kartukk->email ?>" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"> Update </button>
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