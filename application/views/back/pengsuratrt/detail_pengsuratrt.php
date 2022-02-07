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
                        <h5><b> No Pengajuan : <?= $pengsuratrt->no_pengsurat ?></b></h5>
                    </div>

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-ticket-alt"></i> <b> PELAYANAN RT 002/018 </b>
                                    <small class="float-right">Date: <?= $pengsuratrt->tgl_daftar ?></small>
                                </h4>
                            </div>
                        </div>

                        <br>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Nama penduduk
                                <address>
                                    <strong><?= $pengsuratrt->username; ?> </strong>
                                </address>
                                Email
                                <address>
                                    <strong><?= $pengsuratrt->email; ?> </strong>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <b>Status Pengajuan </b> : <?php if ($pengsuratrt->status_pengsurat == '0') {
                                                                echo '<span class="badge badge-warning"> Waiting... </span>';
                                                            } else if ($pengsuratrt->status_pengsurat == '1') {
                                                                echo '<span class="badge badge-info"> Response... </span>';
                                                            } else if ($pengsuratrt->status_pengsurat == '2') {
                                                                echo '<span class="badge badge-success"> Process.... </span>';
                                                            } else if ($pengsuratrt->status_pengsurat == '3') {
                                                                echo '<span class="badge badge-danger"> Solved </span>';
                                                            } else {
                                                                echo '<span class="badge badge-dark"> Surat ditolak karena data tidak ditemukan </span>';
                                                            } ?>
                                <br>
                                <br>
                                <br> <b> Selesai : </b>
                                <?php
                                if ($pengsuratrt->status_pengsurat == '4') {
                                    echo $pengsuratrt->waktu_tanggapan;
                                } else {
                                    echo "";
                                }
                                ?>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-6">
                                <label for=""> Pengajuan </label>
                                <input type="text" value="<?= $pengsuratrt->judul_pengsurat ?>" readonly class="form-control">
                                <label for=""> NIK </label>
                                <input type="text" value="<?= $pengsuratrt->nik ?>" readonly class="form-control">
                                <label for=""> Nama </label>
                                <input type="text" value="<?= $pengsuratrt->nama ?>" readonly class="form-control">
                            </div>

                            <div class="col-6">
                                <label for=""> Tanggapan Admin </label>
                                <textarea rows="7" readonly class="form-control"><?= $pengsuratrt->tanggapan; ?>
                                </textarea>
                            </div>

                            <div class="col-6">
                                <br>
                                <p class="lead"><b> Bukti Tanggapan : </b> </p>
                                <a href="<?= base_url('./assets/images/surat/' . $pengsuratrt->gambar_tanggapan); ?>">Download Surat Disini</a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</div>