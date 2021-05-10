<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Pelanggan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PROFIL</b>
									<hr>
									<div class="form-group">
										<label>ID Pelanggan</label>
										<input readonly required type="text" id="nomor_layanan" name="nomor_layanan" class="form-control" placeholder="Nomor Layanan">
									</div>

									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Customer">
									</div>

									<div class="form-group">
										<label>NIK KTP</label>
										<input required type="number" id="ktp" name="ktp" class="form-control" placeholder="NIK KTP">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Email">
									</div>

									<div class="form-group">
										<label>No Telepon</label>
										<input required type="number" id="telp" name="telp" class="form-control" placeholder="No Telepon">
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input type="file" id="foto" name="foto" class="form-control" placeholder="Foto"></input>
									</div>
									<hr>
									<b>DATA TEKNIS</b>
									<hr>
									<div class="form-group">
										<label>Wilayah / Coverage Area</label>
										<select class="form-control select2" style="width: 100%;" name="wilayah" id="wilayah">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mywilayah as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] . ' - ( ' . $value['kode_wilayah'] . ')' ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port OLT</label>
										<input type="number" id="olt" name="olt" class="form-control" placeholder="Nomor Port OLT">
									</div>

									<div class="form-group">
										<label>Kode ODC</label>
										<select class="form-control select2" style="width: 100%;" name="kodc" id="kodc">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Kode ODP</label>
										<select class="form-control select2" style="width: 100%;" name="kodp" id="kodp">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port ODP</label>
										<input type="number" id="odp" name="odp" class="form-control" placeholder="Nomor Port ODP"></input>
									</div>


									<div class="form-group">
										<label>Panjang Kabel</label>
										<input type="number" id="panjangkabel" name="panjangkabel" class="form-control" placeholder="Panjang Kabel">
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="jenisperangkat" id="jenisperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="merekperangkat" id="merekperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="serialnumber" name="serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="macaddress" name="macaddress" class="form-control" placeholder="Mac Address">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA LAYANAN</b>
									<hr>
									<!-- <div class="form-group">
										<label>Jenis Layanan</label>
										<select required class="form-control select2" style="width: 100%;" name="jenislayanan" id="jenislayanan">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenislayanan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['name'] ?></option>
											<?php } ?>
										</select>
									</div> -->

									<div class="form-group">
										<label>Media Koneksi</label>
										<select class="form-control select2" style="width: 100%;" name="mediakoneksi" id="mediakoneksi">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Username POE</label>
										<input type="text" id="usernamepoe" name="usernamepoe" class="form-control" placeholder="Username PPOE">
									</div>

									<div class="form-group">
										<label>Password POE</label>
										<input type="text" id="p_ppoe" name="p_ppoe" class="form-control" placeholder="Password PPOE">
									</div>

									<div class="form-group">
										<label>IP Addeess</label>
										<input type="text" id="ip_address" name="ip_address" class="form-control" placeholder="IP Address">
									</div>


									<div class="form-group">
										<label>Jenis IP Address</label>
										<select class="form-control select2" style="width: 100%;" name="jenisipaddress" id="jenisipaddress">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type IP Address</label>
										<select class="form-control select2" style="width: 100%;" name="typeipaddress" id="typeipaddress">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mytypeip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>


									<hr>
									<b>DATA ADMINISTRASI</b>
									<hr>
									<div class="form-group">
										<label>Tanggal Registrasi</label>
										<input type="date" id="tglregistrasi" name="tglregistrasi" class="form-control">
									</div>
									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input type="date" id="tglaktivasi" name="tglaktivasi" class="form-control" placeholder="Tanggal Aktivasi">
									</div>

									<div class="form-group">
										<label>Jenis Tempat</label>
										<select class="form-control select2" style="width: 100%;" name="jenistempat" id="jenistempat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenistempat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Tempat</label>
										<select class="form-control select2" style="width: 100%;" id="kepemilikantempat" name="kepemilikantempat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>


									<div class="form-group">
										<label>Status Kepemilikan Perangkat</label>
										<select class="form-control select2" style="width: 100%;" d="kepemilikanperangkat" name="kepemilikanperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nama Teknisi</label>
										<input type="text" id="nama_teknisi" name="nama_teknisi" class="form-control" placeholder="Nama Teknisi">
									</div>

									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Ketarangan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Pelanggan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PROFIL</b>
									<hr>
									<div class="form-group">
										<label>ID Pelanggan</label>
										<input readonly type="text" id="e_nomor_layanan" name="e_nomor_layanan" class="form-control" placeholder="Nomor Layanan">
									</div>
									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input required type="hidden" id="e_id" name="e_id">
										<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Customer">
									</div>
									<div class="form-group">
										<label>NIK KTP</label>
										<input required type="number" id="e_ktp" name="e_ktp" class="form-control" placeholder="NIK KTP">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" id="e_email" name="e_email" class="form-control" placeholder="Email">
									</div>

									<div class="form-group">
										<label>No Telepon</label>
										<input required type="number" id="e_telp" name="e_telp" class="form-control" placeholder="No Telepon">
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat"></textarea>
									</div>

									<div class="form-group">
										<label>Foto</label>
										<input type="file" id="e_foto" name="e_foto" class="form-control" placeholder="Alamat"></input>
									</div>
									<hr>
									<b>DATA TEKNIS</b>
									<hr>
									<div class="form-group">
										<label>Wilayah / Coverage Area</label>
										<select class="form-control select2" style="width: 100%;" name="e_wilayah" id="e_wilayah">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mywilayah as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] . ' - ( ' . $value['kode_wilayah'] . ')' ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port OLT</label>
										<input type="number" id="e_olt" name="e_olt" class="form-control" placeholder="Nomor Port OLT">
									</div>

									<div class="form-group">
										<label>Kode ODC</label>
										<select class="form-control select2" style="width: 100%;" name="e_kodc" id="e_kodc">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Kode ODP</label>
										<select class="form-control select2" style="width: 100%;" name="e_kodp" id="e_kodp">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port ODP</label>
										<input type="number" id="e_odp" name="e_odp" class="form-control" placeholder="Nomor Port ODP"></input>
									</div>

									<div class="form-group">
										<label>Panjang Kabel</label>
										<input type="number" id="e_panjangkabel" name="e_panjangkabel" class="form-control" placeholder="Panjang Kabel">
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="e_jenisperangkat" id="e_jenisperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="e_merekperangkat" id="e_merekperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="e_serialnumber" name="e_serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="e_macaddress" name="e_macaddress" class="form-control" placeholder="Mac Address">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA LAYANAN</b>
									<hr>
									<!-- <div class="form-group">
										<label>Jenis Layanan</label>
										<select required class="form-control select2" style="width: 100%;" name="e_jenislayanan" id="e_jenislayanan">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenislayanan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['name'] ?></option>
											<?php } ?>
										</select>
									</div> -->

									<div class="form-group">
										<label>Media Koneksi</label>
										<select class="form-control select2" style="width: 100%;" name="e_mediakoneksi" id="e_mediakoneksi">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Username POE</label>
										<input type="text" id="e_usernamepoe" name="e_usernamepoe" class="form-control" placeholder="Username PPOE">
									</div>

									<div class="form-group">
										<label>Password POE</label>
										<input type="text" id="e_p_ppoe" name="e_p_ppoe" class="form-control" placeholder="Password PPOE">
									</div>

									<div class="form-group">
										<label>IP Addeess</label>
										<input type="text" id="e_ip_address" name="e_ip_address" class="form-control" placeholder="IP Address">
									</div>

									<div class="form-group">
										<label>Jenis IP Address</label>
										<select class="form-control select2" style="width: 100%;" name="e_jenisipaddress" id="e_jenisipaddress">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type IP Address</label>
										<select class="form-control select2" style="width: 100%;" name="e_typeipaddress" id="e_typeipaddress">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mytypeip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<hr>
									<b>DATA ADMINISTRASI</b>
									<hr>
									<div class="form-group">
										<label>Tanggal Registrasi</label>
										<input type="date" id="e_tglregistrasi" name="e_tglregistrasi" class="form-control">
									</div>
									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input type="date" id="e_tglaktivasi" name="e_tglaktivasi" class="form-control" placeholder="Tanggal Aktivasi">
									</div>

									<div class="form-group">
										<label>Jenis Tempat</label>
										<select class="form-control select2" style="width: 100%;" name="e_jenistempat" id="e_jenistempat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenistempat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Tempat</label>
										<select class="form-control select2" style="width: 100%;" id="e_kepemilikantempat" name="e_kepemilikantempat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>


									<div class="form-group">
										<label>Status Kepemilikan Perangkat</label>
										<select class="form-control select2" style="width: 100%; " id="e_kepemilikanperangkat" name="e_kepemilikanperangkat">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nama Teknisi</label>
										<input type="text" id="e_nama_teknisi" name="e_nama_teknisi" class="form-control" placeholder="Nama Teknisi">
									</div>

									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Ketarangan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- Default box -->

	<div id="modalEdit2" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Pelanggan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PROFIL</b>
									<hr>
									<div class="form-group">
										<label>ID Pelanggan</label>
										<input readonly type="text" id="e_nomor_layanan2" name="e_nomor_layanan2" class="form-control" placeholder="Nomor Layanan">
									</div>
									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input required type="hidden" id="e_id2" name="e_id2">
										<input readonly required type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Customer">
									</div>
									<div class="form-group">
										<label>NIK KTP</label>
										<input readonly required type="number" id="e_ktp2" name="e_ktp2" class="form-control" placeholder="NIK KTP">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input readonly type="email" id="e_email2" name="e_email2" class="form-control" placeholder="Email">
									</div>

									<div class="form-group">
										<label>No Telepon</label>
										<input readonly required type="number" id="e_telp2" name="e_telp2" class="form-control" placeholder="No Telepon">
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<textarea readonly type="text" id="e_alamat2" name="e_alamat2" class="form-control" placeholder="Alamat"></textarea>
									</div>

									<hr>
									<b>DATA TEKNIS</b>
									<hr>
									<div class="form-group">
										<label>Wilayah / Coverage Area</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_wilayah2" id="e_wilayah2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mywilayah as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] . ' - ( ' . $value['kode_wilayah'] . ')' ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port OLT</label>
										<input readonly type="number" id="e_olt2" name="e_olt2" class="form-control" placeholder="Nomor Port OLT">
									</div>

									<div class="form-group">
										<label>Kode ODC</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_kodc2" id="e_kodc2">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Kode ODP</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_kodp2" id="e_kodp2">
											<option selected="selected">-- Pilih --</option>
										</select>
									</div>

									<div class="form-group">
										<label>Nomor Port ODP</label>
										<input readonly type="number" id="e_odp2" name="e_odp2" class="form-control" placeholder="Nomor Port ODP"></input>
									</div>

									<div class="form-group">
										<label>Panjang Kabel</label>
										<input readonly type="number" id="e_panjangkabel2" name="e_panjangkabel2" class="form-control" placeholder="Panjang Kabel">
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_jenisperangkat2" id="e_jenisperangkat2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_merekperangkat2" id="e_merekperangkat2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input readonly type="text" id="e_serialnumber2" name="e_serialnumber2" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input readonly type="text" id="e_macaddress2" name="e_macaddress2" class="form-control" placeholder="Mac Address">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA LAYANAN</b>
									<hr>
									<div class="form-group">
										<label>Media Koneksi</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_mediakoneksi2" id="e_mediakoneksi2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Username POE</label>
										<input readonly type="text" id="e_usernamepoe2" name="e_usernamepoe2" class="form-control" placeholder="Username PPOE">
									</div>

									<div class="form-group">
										<label>Password POE</label>
										<input readonly type="text" id="e_p_ppoe2" name="e_p_ppoe2" class="form-control" placeholder="Password PPOE">
									</div>

									<div class="form-group">
										<label>IP Addeess</label>
										<input readonly type="text" id="e_ip_address2" name="e_ip_address2" class="form-control" placeholder="IP Address">
									</div>

									<div class="form-group">
										<label>Jenis IP Address</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_jenisipaddress2" id="e_jenisipaddress2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type IP Address</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_typeipaddress2" id="e_typeipaddress2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mytypeip as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<hr>
									<b>DATA ADMINISTRASI</b>
									<hr>
									<div class="form-group">
										<label>Tanggal Registrasi</label>
										<input readonly type="date" id="e_tglregistrasi2" name="e_tglregistrasi2" class="form-control">
									</div>
									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input readonly type="date" id="e_tglaktivasi" name="e_tglaktivasi2" class="form-control" placeholder="Tanggal Aktivasi2">
									</div>

									<div class="form-group">
										<label>Jenis Tempat</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_jenistempat2" id="e_jenistempat2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myjenistempat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Tempat</label>
										<select readonly class="form-control select2" style="width: 100%;" id="e_kepemilikantempat2" name="e_kepemilikantempat2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>


									<div class="form-group">
										<label>Status Kepemilikan Perangkat</label>
										<select readonly class="form-control select2" style="width: 100%; " id="e_kepemilikanperangkat2" name="e_kepemilikanperangkat2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Nama Teknisi</label>
										<input readonly type="text" id="e_nama_teknisi2" name="e_nama_teknisi2" class="form-control" placeholder="Nama Teknisi">
									</div>

									<div class="form-group">
										<label>Keterangan</label>
										<textarea readonly type="text" id="e_keterangan2" name="e_keterangan2" class="form-control" placeholder="Ketarangan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- Default box -->
	<div id="modalDetail" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formDetail">
					<div class="card card-info">
						<div class="card-body">
							<table id="table_id2" class="table table-bordered table-hover projects">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th class="text-center">
											Nama Layanan
										</th>
										<th class="text-center">
											Description
										</th>
									</tr>
								</thead>
								<tbody id="show_data2">
								</tbody>
							</table>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Kembali
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Pelanggan</h3>
		</div>
		<br>
		<?php
		$session = $this->session->userdata('level');
		if ($session == 1 || $session == 2 || $session == 3) { ?>
			<div class="col-sm-2">
				<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Pelanggan</button>
			</div>
			<br>
		<?php } ?>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th style="width: 1%">
							#
						</th>
						<th style="width: 1%" class="text-center">
							Nama Pelanggan
						</th>
						<th style="width: 20%" class="text-center">
							No Pelanggan
						</th>
						<th style="width: 30%" class="text-center">
							Email
						</th>
						<th class="text-center">
							No WhatsApp
						</th>
						<th style="width: 8%" class="text-center">
							NIK KTP
						</th>
						<th style="width: 8%" class="text-center">
							Alamat
						</th>
						<th style="width: 15%" class="text-center">
							Status User
						</th>
						<th class="text-center">
							Foto
						</th>
						<th style="width: 8%" class="text-center">
							Jenis Layanan
						</th>
						<th style="width: 8%" class="text-center">
							Media Koneksi
						</th>
						<th style="width: 8%" class="text-center">
							Kepemilikan Tempat
						</th>
						<th style="width: 8%" class="text-center">
							Jenis Tempat
						</th>
						<th style="width: 8%" class="text-center">
							Kepemilikan Perangkat
						</th>
						<th style="width: 8%" class="text-center">
							Jenis Perangkat
						</th>
						<th style="width: 8%" class="text-center">
							Merek Perangkat
						</th>
						<th style="width: 8%" class="text-center">
							Panjang Kabel
						</th>
						<th style="width: 8%" class="text-center">
							Serial Number
						</th>
						<th style="width: 8%" class="text-center">
							MAC Addess
						</th>
						<th style="width: 8%" class="text-center">
							Username PPOE
						</th>
						<th style="width: 8%" class="text-center">
							Password PPOE
						</th>
						<th style="width: 8%" class="text-center">
							IP Address
						</th>
						<th style="width: 8%" class="text-center">
							Jenis IP Address
						</th>
						<th style="width: 8%" class="text-center">
							Type IP Address
						</th>
						<th style="width: 8%" class="text-center">
							Tanggal Registrasi
						</th>
						<th style="width: 8%" class="text-center">
							Tanggal Aktivasi
						</th>
						<th style="width: 8%" class="text-center">
							PORT ODP
						</th>
						<th style="width: 8%" class="text-center">
							PORT OLT
						</th>
						<th style="width: 8%" class="text-center">
							Kode ODP
						</th>
						<th style="width: 8%" class="text-center">
							Kode ODC
						</th>
						<th style="width: 8%" class="text-center">
							Nama Teknisi
						</th>
						<th style="width: 16%" class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody id="show_data">
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>

<script type="text/javascript">
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/customer/simpan') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							$("select.select2").select2('data', {}); // clear out values selected
							$("select.select2").select2({
								allowClear: true
							}); // re-init to show default status
							window.location.reload()
						} else {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							$("select.select2").select2('data', {}); // clear out values selected
							$("select.select2").select2({
								allowClear: true
							}); // re-init to show default status
							window.location.reload()

						}
					}
				});
			}
		})
	}

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/customer/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('administrator/customer/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var level = <?= $this->session->userdata('level'); ?>;
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					var foto = '';
					var button = '';
					if (level == 1) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 2) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 3) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 4) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'</td>'
					} else if (level == 5) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> &nbsp' +
							'</td>'
					}
					if (data[i].dokumen != null) {
						foto = '<td ><a href="<?php echo site_url('/assets/customer/') ?>' + data[i].dokumen + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/customer/') ?>' + data[i].dokumen + '""></a></td>'
					} else {
						foto = '<td class="text-left"> No Image</td>'
					}

					if (data[i].status == '1') {
						status = '<td class="text-left">' +
							'   <button  class="btn btn-primary btn-sm item_non"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-check"> </i>  Aktif </button>' +
							'</a> &nbsp' +
							'</td>'
					} else {
						status = '<td class="text-left">' +
							'   <button  class="btn btn-danger btn-sm item_approve"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-times"> </i>  Non Aktif </button>' +
							'</button> &nbsp' +
							'</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].name + '</td>' +
						'<td class="text-left">' + data[i].no_services + '</td>' +
						'<td class="text-left">' + data[i].email + '</td>' +
						'<td class="text-left">' + data[i].no_wa + '</td>' +
						'<td class="text-left">' + data[i].no_ktp + '</td>' +
						'<td class="text-left">' + data[i].address + '</td>' +
						status +
						foto +
						'<td class="text-center">' +
						'   <button  class="btn btn-info btn-sm item_detail"  data-id="' + data[i].no_services + '">' +
						'      <i class="fas fa-eye"> </i>  Detail </a>' +
						'</button> &nbsp' +
						'</td>' +
						'<td class="text-left">' + data[i].nama_media_koneksi + '</td>' +
						'<td class="text-left">' + data[i].nama_kepemilikan_tempat + '</td>' +
						'<td class="text-left">' + data[i].nama_jenis_tempat + '</td>' +
						'<td class="text-left">' + data[i].nama_kepemilikan_perangkat + '</td>' +
						'<td class="text-left">' + data[i].nama_jenis_perangkat + '</td>' +
						'<td class="text-left">' + data[i].nama_merek_perangkat + '</td>' +
						'<td class="text-left">' + data[i].panjang_kabel + 'M</td>' +
						'<td class="text-left">' + data[i].serial_number + '</td>' +
						'<td class="text-left">' + data[i].mac_address + '</td>' +
						'<td class="text-left">' + data[i].usernamepoe + '</td>' +
						'<td class="text-left">' + data[i].p_ppoe + '</td>' +
						'<td class="text-left">' + data[i].ipaddress + '</td>' +
						'<td class="text-left">' + data[i].jenis_ip + '</td>' +
						'<td class="text-left">' + data[i].type_ip + '</td>' +
						'<td class="text-left">' + data[i].tgl_registrasi + '</td>' +
						'<td class="text-left">' + data[i].tgl_aktivasi + '</td>' +
						'<td class="text-left">' + data[i].odp + '</td>' +
						'<td class="text-left">' + data[i].olt + '</td>' +
						'<td class="text-left">' + data[i].kode_odp + '</td>' +
						'<td class="text-left">' + data[i].kode_odc + '</td>' +
						'<td class="text-left">' + data[i].nama_teknisi + '</td>' +
						button +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
						"searching": true,
						"ordering": true,
						"responsive": true,
						"paging": true,
						"dom": "Bfrtip",
						"buttons": [
							"excel"
						],
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/customer/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_approve', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah status pelanggan menjadi aktif",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Aktifkan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/customer/aktif') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'User Telah Aktif',
							'success'
						)
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_non', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah status pelanggan menjadi aktif",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Non Aktifkan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/customer/nonaktif') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'User Telah Non Aktif',
							'success'
						)
					}
				});
			}
		})
	})

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].name);
				$('#e_ktp').val(data[0].no_ktp);
				$('#e_email').val(data[0].email);
				$('#e_nomor_layanan').val(data[0].no_services);
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_telp').val(data[0].no_wa);
				$('#e_alamat').val(data[0].address);
				$('#e_panjangkabel').val(data[0].panjang_kabel);
				$('#e_odp').val(data[0].odp);
				$('#e_olt').val(data[0].olt);
				$('#e_jenisperangkat').val(data[0].jenis_perangkat).select2();
				$('#e_merekperangkat').val(data[0].merek_perangkat).select2();
				$('#e_serialnumber').val(data[0].serial_number);
				$('#e_macaddress').val(data[0].mac_address);
				$('#e_jenislayanan').val(data[0].jenis_layanan).select2();
				$('#e_mediakoneksi').val(data[0].media_koneksi).select2();
				$('#e_usernamepoe').val(data[0].usernamepoe);
				$('#e_p_ppoe').val(data[0].p_ppoe);
				$('#e_ip_address').val(data[0].ipaddress);
				// $('#e_kodc').val(data[0].kodc);
				$('#e_jenisipaddress').val(data[0].jenis_ipaddress).select2();
				$('#e_wilayah').val(data[0].wilayah).select2();
				$('#e_tglregistrasi').val(data[0].tgl_registrasi);
				$('#e_tglaktivasi').val(data[0].tgl_aktivasi);
				$('#e_jenistempat').val(data[0].jenis_tempat).select2();
				$('#e_kepemilikanperangkat').val(data[0].kepemilikan_perangkat).select2();
				$('#e_kepemilikantempat').val(data[0].kepemilikan_tempat).select2();
				$('#e_typeipaddress').val(data[0].typeipaddress).select2();
				$('#e_nama_teknisi').val(data[0].nama_teknisi);
				console.log(data[0].kode_odc)
				show_data_eodc(data[0].wilayah, function(a) {
					$('#e_kodc').val(data[0].kodc);
				});
				show_data_eodp(data[0].wilayah, function(a) {
					$('#e_kodp').val(data[0].kodp);
				});
			}
		});
	});

	//get data for update record
	$('#show_data').on('click', '.item_prev', function() {
		document.getElementById("formEdit2").reset();
		var id = $(this).data('id');
		$('#modalEdit2').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_nama2').val(data[0].name);
				$('#e_ktp2').val(data[0].no_ktp);
				$('#e_email2').val(data[0].email);
				$('#e_nomor_layanan2').val(data[0].no_services);
				$('#e_keterangan2').val(data[0].keterangan);
				$('#e_telp2').val(data[0].no_wa);
				$('#e_alamat2').val(data[0].address);
				$('#e_panjangkabel2').val(data[0].panjang_kabel);
				$('#e_odp2').val(data[0].odp);
				$('#e_olt2').val(data[0].olt);
				$('#e_jenisperangkat2').val(data[0].jenis_perangkat).select2();
				$('#e_merekperangkat2').val(data[0].merek_perangkat).select2();
				$('#e_serialnumber2').val(data[0].serial_number);
				$('#e_macaddress2').val(data[0].mac_address);
				$('#e_jenislayanan2').val(data[0].jenis_layanan).select2();
				$('#e_mediakoneksi2').val(data[0].media_koneksi).select2();
				$('#e_usernamepoe2').val(data[0].usernamepoe);
				$('#e_p_ppoe2').val(data[0].p_ppoe);
				$('#e_ip_address2').val(data[0].ipaddress);
				// $('#e_kodc').val(data[0].kodc);
				$('#e_jenisipaddress2').val(data[0].jenis_ipaddress).select2();
				$('#e_wilayah2').val(data[0].wilayah).select2();
				$('#e_tglregistrasi2').val(data[0].tgl_registrasi);
				$('#e_tglaktivasi2').val(data[0].tgl_aktivasi);
				$('#e_jenistempat2').val(data[0].jenis_tempat).select2();
				$('#e_kepemilikanperangkat2').val(data[0].kepemilikan_perangkat).select2();
				$('#e_kepemilikantempat2').val(data[0].kepemilikan_tempat).select2();
				$('#e_typeipaddress2').val(data[0].typeipaddress).select2();
				$('#e_nama_teknisi2').val(data[0].nama_teknisi);
				console.log(data[0].kode_odc)
				show_data_eodc(data[0].wilayah, function(a) {
					$('#e_kodc2').val(data[0].kodc);
				});
				show_data_eodp(data[0].wilayah, function(a) {
					$('#e_kodp2').val(data[0].kodp);
				});
			}
		});
	});


	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/customer/update') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						}
					}
				});
			}
		})
	}

	//get data for update record
	$('#show_data').on('click', '.item_detail', function() {
		var id = $(this).data('id');
		$('#id_p').val(id);
		$('#modalDetail').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/tampil_layanan_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].name + '</td>' +
						'<td>' + data[i].description + '</td>' +
						'</tr>';
					no++;

				}
				$("#table_id2").dataTable().fnDestroy();
				var a = $('#show_data2').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id2').dataTable({
						"bPaginate": true,
						"bLengthChange": false,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": false
					});
				}
			}
		});
	});

	$(document).ready(function() {
		show_data();
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
			"dom": "Bfrtip",
			"buttons": [
				"excel"
			],
		});
	});

	$("#wilayah").change(function() {
		var id = $('#wilayah').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/generate') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#nomor_layanan").val(data);
		});
	});

	$("#wilayah").change(function() {
		var id = $('#wilayah').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showodc') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#kodc").html(data);
		});
	});

	$("#wilayah").change(function() {
		var id = $('#wilayah').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showodp') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#kodp").html(data);
		});
	});

	function show_data_odc(id, callback) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showodc') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#e_kodc").html(data);
			callback()
		});
	}

	function show_data_eodc(id, callback) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showEditodc') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#e_kodc").html(data);
			callback()
		});
	}

	function show_data_eodp(id, callback) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showEditodp') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#e_kodp").html(data);
			callback()
		});
	}

	function show_data_odp(id, callback) {
		var id = id;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/customer/showodp') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#e_kodp").html(data);
			callback()
		});
	}
</script>
