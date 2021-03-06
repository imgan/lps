<section class="content">
    <div id="modalTambah" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" id="formTambah">
                    <div class="card card-info">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Request</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        $noreq = $this->db->query('SELECT
									ReqNo as maxno from "TxRequest" order by ReqId desc')->result_array();
                        if (count($noreq) < 1) {
                            $urutan = 'R00001';
                        } else {
                            $no = $noreq[0]['maxno'];
                            $urutan =  (int)substr($no, 1, 6);
                            $urutan = $urutan + 1;
                            $urutan = 'R' . sprintf("%05s", $urutan);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Request No</label>
                                <input required readonly type="text" id="nama" value="<?= $urutan ?>" name="nama" class="form-control" placeholder="Status">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Request Description</label>
                                <textarea required type="text" id="desc" name="desc" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control select2" style="width: 100%;" name="department" id="department">
                                    <option value="" selected="selected">-- Pilih --</option>
                                    <?php foreach ($mydepartment as $value) { ?>
                                        <option value=<?= $value['Id'] ?>><?= $value['Name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
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
                            <h4 class="modal-title">Edit Request</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Request No</label>
                                <input required readonly type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Status">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Request Description</label>
                                <textarea required type="text" id="e_desc" name="e_desc" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control select2" style="width: 100%;" name="e_department" id="e_department">
                                    <option value="" selected="selected">-- Pilih --</option>
                                    <?php foreach ($mydepartment as $value) { ?>
                                        <option value=<?= $value['Id'] ?>><?= $value['Name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
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
            <h3 class="card-title">Daftar Budget Request</h3>
        </div>
        <br>
        <!-- <div class="col-sm-2">
            <button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary">
                <a class="ace-icon fa fa-plus bigger-120"></a> Add Request</button>
        </div> -->
        <br>
        <div class="card-body p-0">
            <table id="table_id" class="table table-bordered table-hover projects">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th class="text-center">
                            Request No
                        </th>
                        <th class="text-center">
                            Description
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th style="width: 25%;" class="text-center">
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
            rules: {
                nama: {
                    required: true
                },
            },
            messages: {

                name: {
                    required: "Wajib diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('administrator/request/simpan') ?>",
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
                        } else {
                            swalInputFailed("Data Duplicate");
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
                    url: "<?php echo base_url('administrator/request/delete') ?>",
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
            url: '<?php echo site_url('administrator/budgetrequest/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    var status = '';
                    var button = '';
                    if (data[i].Status == 1) {
                        button = '<td class="project-actions">' +
                            '   <button  class="btn btn-success btn-sm item_start"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-play"> </i>  Start </button>' +
                            '</button> &nbsp' +
                            '   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-folder"> </i>  Edit </a>' +
                            '</button> &nbsp' +
                            '   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-trash"> </i>  Hapus </a>' +
                            '</button> ' +
                            '</td>';
                        status = '<td class="project-state"><span class="badge badge-warning"> Pending.. </span></td>'
                    } else if(data[i].Status == 2) {
                        button = '<td class="project-actions text-left">' +
                            '   <button  class="btn btn-danger btn-sm item_stop"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-stop"> </i>  Stop </button>' +
                            '</button> &nbsp' +
                            '   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-folder"> </i>  Edit </a>' +
                            '</button> &nbsp' +
                            '   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-trash"> </i>  Hapus </a>' +
                            '</button> ' +
                            '</td>';
                        status = '<td class="project-state"><span class="badge badge-info"> Processing.. </span></td>'
                    } else if(data[i].Status == 3) {
                        button = '<td class="project-actions text-left">' +
                            '   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-folder"> </i>  Edit </a>' +
                            '</button> &nbsp' +
                            '   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].ReqNo + '">' +
                            '      <i class="fas fa-trash"> </i>  Hapus </a>' +
                            '</button> ' +
                            '</td>';
                        status = '<td class="project-state"><span class="badge badge-success"> Selesai.. </span></td>'
                    }  else  {
                        button = '<td class="project-actions text-left">' +
                           
                            '</td>';
                        status = '<td class="project-state"><span class="badge badge-danger"> Kosong.. </span></td>'
                    }

                    html += '<tr>' +
                        '<td class="text-left">' + no + '</td>' +
                        '<td class="text-left">' + data[i].ReqNoB + '</td>' +
                        '<td class="text-left">' + data[i].Description + '</td>' +
                        status +
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
                    });
                }
                /* END TABLETOOLS */
            }

        });
    }

    $('#show_data').on('click', '.item_stop', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah Request menjadi Selesai",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Selesaikan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/budgetrequest/stop') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'Reqest Telah Selesai',
							'success'
						)
					}
				});
			}
		})
	})

    $('#show_data').on('click', '.item_start', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah Request menjadi aktif",
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
					url: "<?php echo base_url('administrator/budgetrequest/aktif') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'Reqest Telah Aktif',
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
            url: "<?php echo base_url('administrator/request/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].Id);
                $('#e_nama').val(data[0].ReqNo);
                $('#e_desc').val(data[0].ReqDesc);
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

                e_desc: {
                    required: true
                },

            },
            messages: {
                e_nama: {
                    required: "Wajib diisi!"
                },

                e_desc: {
                    required: "Wajib diisi!"
                },

            },
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('administrator/request/update') ?>",
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