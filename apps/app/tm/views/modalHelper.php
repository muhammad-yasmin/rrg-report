			<div class="modal fade modal-super-scaled" id="exampleNiftySuperScaled" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
				<div class="modal-dialog modal-simple">
					<iframe src="#" id="iframe_upload" name="iframe_upload" style="display: none;" frameborder="0"></iframe>
					<form autocomplete="off" id="formnya" method="post" enctype="multipart/form-data" action="models/prosesUpload.php" target="iframe_upload">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<h4 class="modal-title">Import file .csv</h4>
							</div>
							<div class="modal-body">
								<div class="row row-lg">
									<div class="col-md-12">
										<div class="example-wrap">
											<h4 class="example-title">*Format harus bertipe .CSV</h4>
											<div class="example">
												<div class="form-row">
													<div class="form-group form-material col-md-12">
														<label class="form-control-label" for="input-file-now">Upload</label>
														<!-- <input type="text" name="id"> -->
														<input type="file" id="input-file-now" name="inputFile" data-plugin="dropify" data-default-file=""/>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary" id="uploadData">Upload</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal fade example-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
			<!-- <div class="modal fade modal-fill-in" id="exampleFillIn" aria-hidden="false" aria-labelledby="exampleFillIn" role="dialog" tabindex="-1"> -->
				<div class="modal-dialog modal-simple modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="exampleFillInModalTitle">Grafik Penjualan</h4>
						</div>
						<div class="modal-body" id="dataPreview"></div>
					</div>
				</div>
			</div>