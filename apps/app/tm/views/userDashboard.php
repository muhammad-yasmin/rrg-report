		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h5 class="panel-title">Form Control : <small>Template Monster</small></h5>
				</div>
				<div class="panel-body container-fluid" id="formControl"></div>
			</div>
		</div>
		<div class="col-md-12">
			<div id="widget"></div>
		</div>
		<div class=col-md-12>
			<div class="panel" id="panelLoad">
				<div class="panel-heading">
					<h5 class="panel-title">Data Transaksi</h5>
					<ul class="panel-actions panel-actions-keep">
						<li><button class="btn btn-info" data-target="#exampleNiftySuperScaled" data-toggle="modal"
					  type="button">Import File .CSV <i class="icon md-plus"></i></button></li>
					</ul>
				</div>
				<div class="panel-body" id="panelLoadData"></div>
			</div>
		</div>

		<?php 
		require 'modalHelper.php'; 
		require 'controller/home.controller.php';
		?>