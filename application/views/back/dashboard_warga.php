<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <center>
                <h1 class="m-0 text-dark"> <b> PENGUMUMAN WARGA</b></h1>
            </center>
            <br>
            <br>
            <?php
            foreach ($editberita as $key => $view) { ?>
                <div class="card mb-12" style="max-width: 1200px;">
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <h2><b><?= $view->judul ?></b></h2>
                                <br>
                                <p class="card-text"><?= $view->isi ?></p>
                                <p class="card-text"><small class="text-muted">Pelayanan RT 002/018</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>