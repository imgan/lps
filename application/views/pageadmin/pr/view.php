<section class="content">
    <div id="modalTambah" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" id="formTambah">
                    <div class="card card-info">
                        <div class="modal-header">
                            <h4 class="modal-title">Add PR</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>PR Number</label>
                                <input required type="text" id="pr" name="pr" class="form-control" placeholder="PR Number">
                            </div>
                            <div class="form-group">
                                <label>Lop Number</label>
                                <select class="form-control select2" style="width: 100%;" name="lop" id="lop">
                                    <option value="" selected="selected">-- Pilih --</option>
                                    <?php foreach ($my_data as $value) { ?>
                                        <option value=<?= $value['LopId'] ?>><?= $value['LopNo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="hidden" id="reqno" name="reqno" class="form-control" placeholder="reqno">
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
                            <h4 class="modal-title">Edit Department</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Department</label>
                                <input type="hidden" id="e_id" name="e_id" class="form-control">
                                <input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Department">
                            </div>
                        </div>
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
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar PR</h3>
        </div>
        <br>
        <div class="col-sm-2">
            <button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary">
                <a class="ace-icon fa fa-plus bigger-120"></a> Add PR</button>
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
                            Request No
                        </th> 
                        <th class="text-center">
                            LOP No
                        </th>
                        <th class="text-center">
                            PR No
                        </th>
                        <th class="text-center">
                            Start
                        </th>
                        <th class="text-center">
                            End
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
                nama: {
                    required: "Wajib diisi!"
                },
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('administrator/pr/simpan') ?>",
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
                    url: "<?php echo base_url('administrator/pr/delete') ?>",
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
            url: '<?php echo site_url('administrator/pr/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    var status = '';
                    var button = '';
                    if (data[i].ReqStatus == 1) {
                        button = '<td class="text-center">' +
                            '   <button  class="btn btn-danger btn-sm item_non"  data-id="' + data[i].PrId + '">' +
                            '      <i class="fas fa-stop"> </i>  Stop </button>' +
                            '</a> &nbsp' +
                            '</td>';
                        status = '<td class="project-state"><span class="badge badge-info"> Process PR Input .. </span></td>';
                    } else {
                        button = '<td class="text-center">' +
                            '</td>';
                            status = '<td class="project-state"><span class="badge badge-success"> Finish PR.. </span></td>';
                    }

                    html += '<tr>' +
                        '<td class="text-left">' + no + '</td>' +
                        '<td class="text-left">' + data[i].ReqNos + '</td>' +
                        '<td class="text-left">' + data[i].LopNos + '</td>' +
                        '<td class="text-left">' + data[i].Prno + '</td>' +
                        '<td class="text-left">' + data[i].StartedAt + '</td>' +
                        '<td class="text-left">' + data[i].EndedAt + '</td>' +
                        status+
                        button+
                    '</td>';
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

    $("#lop").change(function() {
		var id = $('#lop').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/pr/showreqno') ?>",
			data: {
				id: id
			}
		}).done(function(data) {
			$("#reqno").val(data);
		});
	});

    $('#show_data').on('click', '.item_non', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda mengubah status menjadi Aktif",
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
                    url: "<?php echo base_url('administrator/pr/nonaktif') ?>",
                    async: true,
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        show_data();
                        Swal.fire(
                            'Terupdate!',
                            'Telah Non Aktif',
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
            text: "Anda mengubah status Department menjadi aktif",
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
                    url: "<?php echo base_url('administrator/department/aktif') ?>",
                    async: true,
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        show_data();
                        Swal.fire(
                            'Terupdate!',
                            'Department Telah Aktif',
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
            url: "<?php echo base_url('administrator/department/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].Id);
                $('#e_nama').val(data[0].Name);
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
                    url: "<?php echo base_url('administrator/pr/update') ?>",
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