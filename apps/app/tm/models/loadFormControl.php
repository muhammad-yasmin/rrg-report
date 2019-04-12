<?php 
	include '../../../../config/db_connect.php';
?>
<div class="row">
	<div class="col-md-6 col-xl-3">
		<div class="example-wrap">
			<h4 class="example-title"></h4>
			<p>Pilih range data</p>
			<div class="form-group" style="margin-top: 20px;">
				<select class="form-control" name="diTahun" id="rangeData">
					<option>--- Range ---</option>
					<option value="30">30 hari</option>
					<option value="90">90 hari</option>
					<option value="1">1 tahun</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3">
	<!-- Example Default Datepicker -->
		<div class="example-wrap">
			<h4 class="example-title"></h4>
			<p>Mengambil data dari tanggal : </p>
			<div class="example" id="formnya">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="icon md-calendar" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control" id="from" data-plugin="datepicker">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3">
		<div class="example-wrap">
			<h4 class="example-title"></h4>
			<p>Mengambil data hingga tanggal : </p>
			<div class="example" id="formnya">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="icon md-calendar" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control" id="to" data-plugin="datepicker">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3">
		<div class="example-wrap">
			<h4 class="example-title"></h4>
			<p>Proses</p>
			<div class="example" id="formnya">
				<div class="input-group">
					<button class="btn btn-success" onclick="changeData();">Proses <i class="icon md-arrow-right"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>