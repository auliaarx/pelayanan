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
                        <h4 class="card-title">
                            <i class="fa fa-user"></i> Detail Penduduk
                            </h3>
                            </h3>
                            <div class="card-tools">
                            </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <?php
                                foreach ($infouser as $view) { ?>
                                    <tr>
                                        <td style="width: 150px">
                                            <b>NIK</b>
                                        </td>
                                        <td>:
                                            <?= $view->nik ?>
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