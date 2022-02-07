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
                                <i class="fa fa-table"></i> Data Pengajuan Surat
                            </h3>
                        </div>

                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>

                            <table id="example" class="table table-bordered">
                                <br>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No pengajuan</th>
                                        <th>Judul</th>
                                        <th>Status pengajuan</th>
                                        <th>Konfirmasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengsuratrt as $row) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->no_pengsurat ?></td>
                                            <td><?= $row->judul_pengsurat ?></td>
                                            <td>
                                                <?php if ($row->status_pengsurat == '0') {
                                                    echo '<span class="badge badge-warning"> Waiting... </span>';
                                                } else if ($row->status_pengsurat == '1') {
                                                    echo '<span class="badge badge-info"> Response... </span>';
                                                } else if ($row->status_pengsurat == '2') {
                                                    echo '<span class="badge badge-success"> Process... </span>';
                                                } else if ($row->status_pengsurat == '3') {
                                                    echo '<span class="badge badge-danger"> Solved </span>';
                                                } else {
                                                    echo '<span class="badge badge-dark"> Surat ditolak karena data tidak ditemukan </span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->status_pengsurat == '0') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal-pengsuratrt" id="select_pengsuratrt"
                                                    data-no_pengsurat="' . $row->no_pengsurat . '"
                                                    data-status_pengsurat="' . $row->status_pengsurat . '"
                                                    class="btn btn-success btn-sm">
                                                    Confirm
                                                </a>';
                                                } else if ($row->status_pengsurat == '1') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" id="reply-message"
                                                    data-pengsurat_no="' . $row->no_pengsurat . '"
                                                    data-no_pengsurat_no="' . $row->no_pengsurat . '"
                                                    data-judul_pengsurat="' . $row->judul_pengsurat . '"
                                                    data-nama="' . $row->nama . '"
                                                    data-nik="' . $row->nik . '"
                                                    class="btn btn-warning btn-sm">
                                                        Reply Message
                                                     </a>';
                                                } else if ($row->status_pengsurat == '2') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modalclosepengsuratrt" id="cpengsuratrt"
                                                    data-closepengsuratrt="' . $row->no_pengsurat . '"
                                                    data-closestatus="' . $row->status_pengsurat . '"
                                                    class="btn btn-primary btn-sm">
                                                        Close
                                                    </a>';
                                                } else if ($row->status_pengsurat == '3') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal-tolaksurat" id="tolaksuratt"
                                                        data-tolakpengsuratrt="' . $row->no_pengsurat . '"
                                                        data-tolakstatus="' . $row->status_pengsurat . '"
                                                        class="btn btn-danger btn-sm">
                                                            Closed
                                                        </a>';
                                                } else {
                                                    echo '<a href ="javascript:void(0);" class="btn btn-dark btn-sm">
                                                            Tolak Surat
                                                        </a>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('pengsuratrt/detail_pengsuratrt/' . $row->no_pengsurat) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"> </i>
                                                </a>
                                                <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('pengsuratrt/delete_pengsuratrt/' . $row->no_pengsurat) ?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"> </i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="form_pengsuratrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form tambah pengajuan warga</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengsuratrt/save_pengsuratrt') ?> " method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Judul </label>
                            <input type="hidden" name="no_pengsurat" value="<?= $no_pengsurat ?>" class="form-control">
                            <input type="text" name="judul_pengsurat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Deskripsi tambahan </label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Bukti pengajuan </label>
                            <br>
                            <input type="file" name="gambar_bayar">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"> Save </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-pengsuratrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin Konfirmasi pengajuan ini?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengsuratrt/save_pengsuratrt_waiting') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_pengsurat" id="no_pengsurat" class="form-control">
                        <input type="hidden" name="status_pengsurat" value="1" class="form-control">

                        <button type="submit" class="btn btn-primary btn-sm"> Save </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-reply">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Form Tanggapan </h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengsuratrt/save_tanggapan') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_pengsurat" id="no_pengsurat_no" class="form-control">
                        <input type="hidden" name="pengsurat_no" id="pengsurat_no" class="form-control">

                        <div class="form-group">
                            <label for="keluhan"> Judul </label>
                            <input type="text" id="judul_pengsurat" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nik"> NIK </label>
                            <input type="text" id="nik" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" id="nama" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tanggapan"> Tanggapan </label>
                            <textarea name="tanggapan" class="form-control">
                        </textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggapan"> Gambar Tanggapan </label>
                            <br>
                            <input type="file" name="gambar_tanggapan" class="form_control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"> Reply Message </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalclosepengsuratrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin close pengajuan ini?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengsuratrt/save_close_pengsuratrt') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_pengsurat" id="closepengsuratrt" class="form-control">
                        <input type="hidden" name="status_pengsurat" value="3" class="form-control">

                        <button type="submit" class="btn btn-primary btn-sm"> Close pengajuan </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tolaksurat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin tolak pengajuan ini?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengsuratrt/save_tolak_surat') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_pengsurat" id="tolakpengsuratrt" class="form-control">
                        <input type="hidden" name="status_pengsurat" value="4" class="form-control">

                        <button type="submit" class="btn btn-primary btn-sm"> Tolak Surat </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select_pengsuratrt', function() {
            var no_pengsurat = $(this).data('no_pengsurat')
            var status_pengsurat = $(this).data('status_pengsurat')

            $('#no_pengsurat').val(no_pengsurat)
            $('#status_pengsurat').val(status_pengsurat)
        })
        $(document).on('click', '#reply-message', function() {
            var no_pengsurat = $(this).data('no_pengsurat')
            var no_pengsurat_no = $(this).data('no_pengsurat_no')
            var judul_pengsurat = $(this).data('judul_pengsurat')
            var nama = $(this).data('nama')
            var nik = $(this).data('nik')

            $('#no_pengsurat').val(no_pengsurat)
            $('#no_pengsurat_no').val(no_pengsurat_no)
            $('#judul_pengsurat').val(judul_pengsurat)
            $('#nama').val(nama)
            $('#nik').val(nik)

        })
        $(document).on('click', '#cpengsuratrt', function() {
            var closepengsuratrt = $(this).data('closepengsuratrt')
            var closestatus = $(this).data('closestatus')

            $('#closepengsuratrt').val(closepengsuratrt)
            $('#closestatus').val(closestatus)
        })
        $(document).on('click', '#tolaksuratt', function() {
            var tolakpengsuratrt = $(this).data('tolakpengsuratrt')
            var tolakstatus = $(this).data('tolakstatus')

            $('#tolakpengsuratrt').val(tolakpengsuratrt)
            $('#tolakstatus').val(tolakstatus)
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>