<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Laporan</h3>
		</div>
		<br>
		<form class="form-horizontal" target="_blank" method="POST" 
        role="form" id="formSearch" action="<?php echo base_url() ?>administrator/report/laporan">
			<div class="card card-info">
				<div class="modal-header">
					<h4 class="modal-title">Pilih Periode Laporan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Periode Awal</label>
						<input required type="date" id="awal" name="awal" class="form-control">
					</div>

					<div class="form-group">
						<label>Periode Akhir</label>
						<input required type="date" id="akhir" name="akhir" class="form-control">
					</div>

				</div>
				<!-- /.card-body -->
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Cetak
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
		</form>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>
