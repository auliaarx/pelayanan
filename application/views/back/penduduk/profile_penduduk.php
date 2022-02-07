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

								<tr>
									<td style="width: 150px">
										<b>NIK</b>
									</td>
									<td>:
										<?= $pend->nik ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Nama</b>
									</td>
									<td>:
										<?= $pend->nama ?>
									</td>
								</tr>

								<tr>
									<td style="width: 200px">
										<b>Tempat/Tanggal Lahir</b>
									</td>
									<td>:
										<?= $pend->tempat_lh ?>
										/
										<?= $pend->tgl_lh ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Jenis Kelamin</b>
									</td>
									<td>:
										<?= $pend->jekel ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Alamat</b>
									</td>
									<td>:
										<?= $pend->desa ?>, RT
										<?= $pend->rt ?>/ RW
										<?= $pend->rw ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Agama</b>
									</td>
									<td>:
										<?= $pend->agama ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Status </b>
									</td>
									<td>:
										<?= $pend->kawin ?>
									</td>
								</tr>

								<tr>
									<td style="width: 150px">
										<b>Pekerjaan</b>
									</td>
									<td>:
										<?= $pend->pekerjaan ?>
									</td>
								</tr>

							</tbody>
						</table>

						<div class="card-footer">
							<a href="<?= base_url('penduduk') ?>" class="btn btn-warning float-left">
								Back</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>