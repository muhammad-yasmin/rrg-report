<div class="container-fluid row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Item</h3>
				<ul class="panel-actions panel-actions-keep">
					<li><button class="btn btn-info" data-target="#modalSiteConfig" data-toggle="modal"
				  type="button">Buat Site Baru<i class="icon md-plus"></i></button></li>
				</ul>
			</div>
			<div class="panel-body">
				<div id="loadSite"></div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel" id="panelCreate">
			<div class="panel-heading">
				<h3 class="panel-title">Buat Site Baru</h3>
			</div>
			<div class="panel-body">
				<div id="">
					<!-- <iframe src="#" id="iframe_upload" name="iframe_upload" style="display: none;" frameborder="0"></iframe> -->
					<form method="post" enctype="multipart/form-data" action="models/site/prosesUpload.php">
						<div class="form-group form-material row">
							<label class="col-md-3 col-form-label">Nama </label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="name" placeholder="Full Name" autocomplete="off" />
							</div>
						</div>
						<div class="form-group form-material row">
							<label class="col-md-3 col-form-label">Site </label>
							<div class="col-md-9">
								<select class="form-control" name="site">
									<option value="em">Envato Market</option>
									<option value="cm">Creative Market</option>
									<option value="tm">Template Monster</option>
								</select>
							</div>
						</div>
						<div class="form-group form-material row">
							<label class="col-md-3 col-form-label">Upload Data </label>
							<div class="col-md-9">
								<input type="file" id="input-file-now" name="inputFile" data-plugin="dropify" data-default-file=""/>
							</div>
						</div>
						<div class="col-md-3">
							<button type="submit" class="btn btn-primary" id="uploadData">Upload</button>
						</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	require 'modalHelper.php';
	require 'controller/site.controller.php'; 
?>
