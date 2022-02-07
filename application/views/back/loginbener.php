<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelayanan RT 002/018</title>
    <link rel="icon" href="<?= base_url() ?>assets/back/dist/img/izin.png">


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/back/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<img src="<?= base_url() ?>assets/back/dist/img/coverlogin.png" class="img-thumbnail">


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Pelayanan Warga</b>
                <br>
                <center>
                    <h6>Kp. Baru, RT 002 RW 018, Kelurahan Setia Mekar, Kecamatan Tambun Selatan, Bekasi Timur</h6>
                </center>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login untuk memulai</p>
                <?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('auth/proses_login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">LOGIN</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/back/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/back/dist/js/adminlte.min.js"></script>

</body>

</html>