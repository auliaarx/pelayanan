<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
                <div class="col-8">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-tittle"> Pendatang </h3>
                        </div>
                        <form action="<?= base_url('suketdatang/cetak_datang') ?> " method="POST" target="_blank">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penduduk</label>
                                    <div class="col-sm-10">
                                        <select name="id_datang" id="id_datang" class="selectpicker" data-live-search="true" data-width="75%">
                                            <option selected="selected">- Pilih Data -</option>
                                            <?php foreach ($suketdatang as $key => $view) { ?>
                                                <option value="<?= $view->id_datang ?>">
                                                    <?= $view->nik_datang ?> -
                                                    <?= $view->nama_datang ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-sm btn-primary"> PRINT </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
</script>

</html>