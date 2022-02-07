<html>

<head>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
</head>

<body>
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
                                <i class="fa fa-table"></i> Data Penduduk
                            </h3>
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div>
                                    <a href="<?= base_url('penduduk/add_penduduk') ?>" class="btn btn-primary float-right">
                                        <i class="fas fa-user-plus"></i> Tambah Data</a>
                                    <br>
                                    <br>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <br>

                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penduduk as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nik ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->tempat_lh ?></td>
                                                <td><?= $row->jekel ?></td>
                                                <td>
                                                    <a href="<?= base_url('penduduk/profile_penduduk/' . $row->id_pend) ?>" class="btn btn-info btn-sm">
                                                        <i class="fa fa-user"> </i>
                                                    </a>
                                                    <a href="<?= base_url('penduduk/edit_penduduk/' . $row->id_pend) ?>" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"> </i>
                                                    </a>
                                                    <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('penduduk/delete_penduduk/' . $row->id_pend) ?>" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"> </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>