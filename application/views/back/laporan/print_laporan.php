<link rel="stylesheet" href="<?= base_url() ?>assets/back/dist/css/adminlte.min.css">

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="display-4 text-center">Laporan Pelayanan RT 002/018</h3>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-borderd">
            <tr>
                <th>No</th>
                <th>No Iuran</th>
                <th>Judul</th>
                <th>Waktu daftar</th>
                <th>Waktu selesai</th>
            </tr>
            <?php
            $no = 1;
            foreach ($get_laporan as $row) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->no_bayar ?></td>
                    <td><?= $row->judul_bayar ?></td>
                    <td><?= $row->tgl_daftar ?></td>
                    <td><?= $row->waktu_tanggapan ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    window.print()
</script>