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
                                <i class="fa fa-table"></i> Data Iuran
                            </h3>
                        </div>

                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example" class="table table-bordered">
                                <br>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Iuran</th>
                                        <th>Judul</th>
                                        <th>Status Iuran</th>
                                        <th>Konfirmasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($iuranrt as $row) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->no_bayar ?></td>
                                            <td><?= $row->judul_bayar ?></td>
                                            <td>
                                                <?php if ($row->status_bayar == '0') {
                                                    echo '<span class="badge badge-warning"> Waiting... </span>';
                                                } else if ($row->status_bayar == '1') {
                                                    echo '<span class="badge badge-info"> Response... </span>';
                                                } else if ($row->status_bayar == '2') {
                                                    echo '<span class="badge badge-success"> Process... </span>';
                                                } else {
                                                    echo '<span class="badge badge-danger"> Solved </span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->status_bayar == '0') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal-iuranrt" id="select_iuranrt"
                                                    data-no_bayar="' . $row->no_bayar . '"
                                                    data-status_bayar="' . $row->status_bayar . '"
                                                    class="btn btn-success btn-sm">
                                                    Confirm
                                                </a>';
                                                } else if ($row->status_bayar == '1') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" id="reply-message"
                                                    data-bayar_no="' . $row->no_bayar . '"
                                                    data-no_bayar_no="' . $row->no_bayar . '"
                                                    data-judul_bayar="' . $row->judul_bayar . '"
                                                    data-nama="' . $row->nama . '"
                                                    data-nik="' . $row->nik . '"
                                                    class="btn btn-warning btn-sm">
                                                        Reply Message
                                                     </a>';
                                                } else if ($row->status_bayar == '2') {
                                                    echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modalcloseiuranrt" id="ciuranrt"
                                                    data-closeiuranrt="' . $row->no_bayar . '"
                                                    data-closestatus="' . $row->status_bayar . '"
                                                    class="btn btn-primary btn-sm">
                                                        Close
                                                    </a>';
                                                } else {
                                                    echo '<a href ="javascript:void(0);" class="btn btn-danger btn-sm">
                                                    Closed
                                                </a>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('iuranrt/detail_iuranrt/' . $row->no_bayar) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"> </i>
                                                </a>
                                                <a onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('iuranrt/delete_iuranrt/' . $row->no_bayar) ?>" class="btn btn-danger btn-sm">
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

    <div class="modal fade" id="form_iuranrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form tambah iuran warga</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('iuranrt/save_iuranrt') ?> " method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Judul </label>
                            <input type="hidden" name="no_bayar" value="<?= $no_bayar ?>" class="form-control">
                            <input type="text" name="judul_bayar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Deskripsi tambahan </label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Bukti pembayaran </label>
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

    <div class="modal fade" id="modal-iuranrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin konfirmasi pembayaran ini?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('iuranrt/save_iuranrt_waiting') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_bayar" id="no_bayar" class="form-control">
                        <input type="hidden" name="status_bayar" value="1" class="form-control">

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
                    <form action="<?= base_url('iuranrt/save_tanggapan') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_bayar" id="no_bayar_no" class="form-control">
                        <input type="hidden" name="bayar_no" id="bayar_no" class="form-control">

                        <div class="form-group">
                            <label for="keluhan"> Judul </label>
                            <input type="text" id="judul_bayar" class="form-control" readonly>
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

    <div class="modal fade" id="modalcloseiuranrt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin close pembayaran ini?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('iuranrt/save_close_iuranrt') ?> " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="no_bayar" id="closeiuranrt" class="form-control">
                        <input type="hidden" name="status_bayar" value="3" class="form-control">

                        <button type="submit" class="btn btn-primary btn-sm"> Close Iuran </button>
                        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select_iuranrt', function() {
            var no_bayar = $(this).data('no_bayar')
            var status_bayar = $(this).data('status_bayar')

            $('#no_bayar').val(no_bayar)
            $('#status_bayar').val(status_bayar)
        })
        $(document).on('click', '#reply-message', function() {
            var no_bayar = $(this).data('no_bayar')
            var no_bayar_no = $(this).data('no_bayar_no')
            var judul_bayar = $(this).data('judul_bayar')
            var nama = $(this).data('nama')
            var nik = $(this).data('nik')

            $('#no_bayar').val(no_bayar)
            $('#no_bayar_no').val(no_bayar_no)
            $('#judul_bayar').val(judul_bayar)
            $('#nama').val(nama)
            $('#nik').val(nik)

        })
        $(document).on('click', '#ciuranrt', function() {
            var closeiuranrt = $(this).data('closeiuranrt')
            var closestatus = $(this).data('closestatus')

            $('#closeiuranrt').val(closeiuranrt)
            $('#closestatus').val(closestatus)
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>