<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>NIK</label>
								<input required type="text" id="nik" name="nik" class="form-control" placeholder="NIK Karyawan">
							</div>
							<div class="form-group">
								<label>Nama User</label>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama User">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input required type="password" id="password" name="password" class="form-control" placeholder="Nama User">
							</div>
							<div class="form-group">
								<label>Password Confirm</label>
								<input required type="password" id="password_c" name="password_c" class="form-control" placeholder="Nama User">
							</div>
							<div class="form-group">
								<label>Department</label>
								<select class="form-control select2" style="width: 100%;" name="department" id="department">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mydepartment as $value) { ?>
										<option value=<?= $value['Id'] ?>><?= $value['Name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Level</label>
								<select class="form-control select2" style="width: 100%;" name="level" id="level">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mylevel as $value) { ?>
										<option value=<?= $value['Id'] ?>><?= $value['Name'] ?></option>
									<?php } ?>
								</select>
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
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama User</label>
								<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Nama User">
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama User">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" id="e_password" name="e_password" class="form-control" placeholder="Kosongkan Jika TIdak ingin dirubah">
							</div>
							<div class="form-group">
								<label>Password Confirm</label>
								<input type="password" id="e_passwordconfirm" name="e_passwordconfirm" class="form-control" placeholder="Kosongkan Jika TIdak ingin dirubah">
							</div>
							<div class="form-group">
								<label>Department</label>
								<select class="form-control select2" style="width: 100%;" name="e_department" id="e_department">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mydepartment as $value) { ?>
										<option value=<?= $value['Id'] ?>><?= $value['Name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Level</label>
								<select class="form-control select2" style="width: 100%;" name="e_level" id="e_level">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mylevel as $value) { ?>
										<option value=<?= $value['Id'] ?>><?= $value['Name'] ?></option>
									<?php } ?>
								</select>
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

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar User</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary">
				<a class="ace-icon fa fa-plus bigger-120"></a> Add User</button>
		</div>
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							NIK
						</th>
						<th class="text-center">
							Nama User
						</th>
						<th class="text-center">
							Department
						</th>
						<th class="text-center">
							Level
						</th>
						<th class="text-center">
							Status
						</th>
						<th style="width:16%" class="text-center">
							Actions
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
			rules: {
				nama: {
					required: true
				},

				keterangan: {
					required: true
				},
			},
			messages: {

				nama: {
					required: "Wajib diisi!"
				},

				keterangan: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/user/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else if (response == 400) {
							swalNotMatch();
						} else {
							swalInputFailed();
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
					url: "<?php echo base_url('administrator/user/delete') ?>",
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
			url: '<?php echo site_url('administrator/user/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var level = '';
					if (data[i].Level == 3) {
						level = '<td class="project-state"><span class="badge badge-success"> MRO </span></td>'
					} else if (data[i].Level == 2) {
						level = '<td class="project-state"><span class="badge badge-info"> User </span></td>'
					} else if (data[i].Level == 1) {
						level = '<td class="project-state"><span class="badge badge-warning"> Administrator </span></td>'
					} else {
						level = '<td class="project-state"><span class="badge badge-warning"> Tidak ada Level  </span></td>'
					}
					var status = '';
					if (data[i].IsActive == '1') {
						status = '<td class="text-center">' +
							'   <button  class="btn btn-success btn-sm item_non"  data-id="' + data[i].IdUser + '">' +
							'      <i class="fas fa-check"> </i>  Aktif </button>' +
							'</a> &nbsp' +
							'</td>'
					} else {
						status = '<td class="text-center">' +
							'   <button  class="btn btn-danger btn-sm item_approve"  data-id="' + data[i].IdUser + '">' +
							'      <i class="fas fa-times"> </i>  Non Aktif </button>' +
							'</button> &nbsp' +
							'</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].Nik + '</td>' +
						'<td class="text-left">' + data[i].Username + '</td>' +
						'<td class="text-left">' + data[i].DepartmentName + '</td>' +
						level +
						status +
						'<td class="project-actions text-right">' +
						'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].IdUser + '">' +
						'      <i class="fas fa-folder"> </i>  Edit </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].IdUser + '">' +
						'      <i class="fas fa-trash"> </i>  Hapus </a>' +
						'</button> ' +
						'</td>' +
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
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	$('#show_data').on('click', '.item_approve', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah status menjadi aktif",
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
					url: "<?php echo base_url('administrator/user/aktif') ?>",
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
			text: "Anda mengubah status menjadi Non aktif",
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
					url: "<?php echo base_url('administrator/user/nonaktif') ?>",
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
			url: "<?php echo base_url('administrator/user/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].IdUser);
				$('#e_nama').val(data[0].Username);
				$('#e_level').val(data[0].Level).select2();
				$('#e_department').val(data[0].Department).select2();
			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true
				},

				e_keterangan: {
					required: true
				},

			},
			messages: {
				e_nama: {
					required: "Wajib diisi!"
				},

				e_keterangan: {
					required: "Wajib diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/user/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
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
						} else if (response == 400) {
							swalNotMatch();
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}

	$(document).ready(function() {
		show_data();
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>