<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-primary">
                        <h5><b> No Bayar : <?= $iuranrtw->no_bayar ?></b></h5>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-ticket-alt"></i><b> PELAYANAN RT 002/018 </b>
                                    <small class="float-right">Date: <?= $iuranrtw->tgl_daftar; ?></small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Nama penduduk
                                <address>
                                    <strong><?= $iuranrtw->username; ?> </strong>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Status Iuran </b> : <?php if ($iuranrtw->status_bayar == '0') {
                                                            echo '<span class="badge badge-warning"> Waiting... </span>';
                                                        } else if ($iuranrtw->status_bayar == '1') {
                                                            echo '<span class="badge badge-info"> Response... </span>';
                                                        } else if ($iuranrtw->status_bayar == '2') {
                                                            echo '<span class="badge badge-success"> Process... </span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger"> Solved </span>';
                                                        } ?>
                                <br>
                                <br>
                                <br> <b> Selesai : </b>
                                <?php
                                if ($iuranrtw->status_bayar == '3') {
                                    echo $iuranrtw->waktu_tanggapan;
                                } else {
                                    echo "";
                                }
                                ?>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-6">
                                <label for=""> Pembayaran </label>
                                <input type="text" value="<?= $iuranrtw->judul_bayar ?>" readonly class="form-control">
                                <label for=""> NIK </label>
                                <input type="text" value="<?= $iuranrtw->nik ?>" readonly class="form-control">
                                <label for=""> Nama </label>
                                <input type="text" value="<?= $iuranrtw->nama ?>" readonly class="form-control">
                            </div>

                            <div class="col-6">
                                <label for=""> Tanggapan Admin </label>
                                <textarea rows="7" readonly class="form-control"><?= $iuranrtw->tanggapan; ?>
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-6">
                                <p class="lead"><b>Bukti Pembayaran : </b></p>
                                <img src="<?= base_url('./assets/images/iuranrt/' . $iuranrtw->gambar_bayar); ?>" width='250px'>
                            </div>
                            <div class="col-6">
                                <p class="lead"><b>Bukti Tanggapan : </b></p>
                                <img src="<?= base_url('./assets/images/tanggapan/' . $iuranrtw->gambar_tanggapan); ?>" width='250px'>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>