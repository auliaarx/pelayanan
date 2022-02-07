<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pelayanan RT 002</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>one/assets/img/hero-img.png" rel="icon">
    <link href="<?= base_url() ?>one/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>one/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>one/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>one/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Pelayanan RT 002</a></h1>
            <nav id="navbar" class="navbar">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="" data-aos-delay="200">
                    <h1>Selamat Datang</h1>
                    <h2>Kp. Baru, RT 002 RW 018, Kelurahan Setia Mekar, Kecamatan Tambun Selatan, Bekasi Timur</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#login" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url() ?>one/assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Login Section ======= -->
        <section id="login" class="login">
            <div class="container" data-aos="">

                <div class="section-title">
                    <h2>Silahkan Login</h2>
                </div>

                <?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('auth/proses_login') ?>" method="post">

                    <div class="form-group row ">
                        <div class="col-sm-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <br>
                        <br>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <br>
                        <br>
                        <br>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-right">
                        <button class="btn btn-primary me-md-2" type="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </section>

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="<?= base_url() ?>one//vendor/aos/aos.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/php-email-form/validate.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="<?= base_url() ?>one/assets/vendor/waypoints/noframework.waypoints.js"></script>

        <!-- Template Main JS File -->
        <script src="<?= base_url() ?>one/assets/js/main.js"></script>

</body>

</html>