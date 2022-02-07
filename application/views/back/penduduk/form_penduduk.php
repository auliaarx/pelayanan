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
							<b class="fas fa-user-plus"></b> Tambah Data
						</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div>
								<a href="<?= base_url('penduduk') ?>" class="btn btn-warning float-right">
									<i class=""></i> Back</a>
							</div>

							<br>
							<?= validation_errors() ?>

							<form action="<?= base_url('penduduk/save_penduduk') ?> " method="POST">

								<div class="card-body">

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">NIK</label>
										<div class="col-sm-6">
											<input type="text" name="nik" class="form-control" placeholder="NIK">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama</label>
										<div class="col-sm-6">
											<input type="text" name="nama" class="form-control" placeholder="Nama lengkap">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
										<div class="col-sm-3">
											<input type="text" name="tempat_lh" class="form-control" placeholder="Tempat lahir">
										</div>
										<div class="col-sm-3">
											<input type="date" name="tgl_lh" class="form-control" placeholder="Tanggal lahir">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-3">
											<select name="jekel" class="form-control">
												<option>- Pilih -</option>
												<option> Laki-Laki</option>
												<option> Perempuan</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Desa</label>
										<div class="col-sm-6">
											<input type="text" name="desa" class="form-control" placeholder="Desa">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">RT/RW</label>
										<div class="col-sm-3">
											<input type="text" name="rt" class="form-control" placeholder="RT">
										</div>
										<div class="col-sm-3">
											<input type="text" name="rw" class="form-control" placeholder="RW">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Agama</label>
										<div class="col-sm-6">
											<input type="text" name="agama" class="form-control" placeholder="Agama">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Status Pernikahan</label>
										<div class="col-sm-3">
											<select name="kawin" class="form-control">
												<option>- Pilih -</option>
												<option>Sudah Menikah</option>
												<option>Belum Menikah</option>
												<option>Cerai Mati</option>
												<option>Cerai Hidup</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Pekerjaan</label>
										<div class="col-sm-6">
											<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
										</div>
									</div>


									<div class="card-footer">
										<button type="submit" class="btn btn-primary"> Save </button>
										<button type="reset" class="btn btn-danger"> Reset </button>
									</div>

								</div>

							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>