<?php

	include '../../../config/db_connect.php';
	$sql = mysqli_query($connect,"SELECT tanggal from tbl_em ORDER BY tanggal DESC LIMIT 1");
	$site = mysqli_query($connect,"SELECT * FROM site_configuration");
	$mp = "Envato Market";
?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">
	<title>Marketplace :  Envato Market</title>
	<link rel="apple-touch-icon" href="../../../dist/assets/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="../../../dist/assets/images/favicon.ico">
	<link rel="stylesheet" href="../../../dist/global/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../dist/global/css/bootstrap-extend.min.css">
	<link rel="stylesheet" href="../../../dist/assets/css/site.min.css">
	<link rel="stylesheet" href="../../../dist/global/vendor/animsition/animsition.css">
	<link rel="stylesheet" href="../../../dist/global/vendor/jquery-mmenu/jquery-mmenu.css">
	<link rel="stylesheet" href="../../../dist/global/vendor/waves/waves.css">
		<link rel="stylesheet" href="../../../dist/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../../../dist/global/vendor/dropify/dropify.css">
		<link rel="stylesheet" href="../../../dist/assets/examples/css/tables/datatable.css">
		<link rel="stylesheet" href="../../../dist/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="../../../dist/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
		<link rel="stylesheet" href="../../../dist/assets/examples/css/dashboard/v1.css">
	<link rel="stylesheet" href="../../../dist/global/fonts/material-design/material-design.min.css">
	<script src="../../../dist/global/vendor/breakpoints/breakpoints.js"></script>
	<script>
	  Breakpoints();
	</script>
  	</head>
  	<body class="animsition site-navbar-small dashboard">
		<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
				data-toggle="menubar">
					<span class="sr-only">Toggle navigation</span>
					<span class="hamburger-bar"></span>
				</button>
				<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
				data-toggle="collapse">
					<i class="icon md-more" aria-hidden="true"></i>
				</button>
				<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
					<img class="navbar-brand-logo" src="../../../dist/assets/images/logo.png" title="Remark">
					<span class="navbar-brand-text hidden-xs-down">Envato Market</span>
				</div>
			</div>

			<div class="navbar-container container-fluid">
				<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
					<ul class="nav navbar-toolbar">
						<li class="nav-item hidden-float" id="toggleMenubar">
							<a class="nav-link" data-toggle="menubar" href="#" role="button">
								<i class="icon hamburger hamburger-arrow-left">
								<span class="sr-only">Toggle menubar</span>
								<span class="hamburger-bar"></span>
								</i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" data-toggle="dropdown" title="Data terakhir" aria-expanded="false" data-animation="scale-up" role="button" disabled>
								<?php 
									foreach ($sql as $key) {
										echo "Data terakhir : ".date("l, d - M - Y", strtotime($key['tanggal']));
									}
								 ?>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
								role="button">Marketplace</a>
							<div class="dropdown-menu" role="menu">
								<?php 
									foreach ($site as $key) {
										?>
											<a class="dropdown-item" href="../<?php echo $key['link']; ?>/" role="menuitem"><?php echo $key['site']; ?></a>
										<?php
									}
								 ?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
								<span class="avatar avatar-online">
									<img src="../../../dist/global/portrait/1.jpg" alt="...">
									<i></i>
								</span>
							</a>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a>
								<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Billing</a>
								<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../../../config/logout.php" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="site-menubar">
			<ul class="site-menu">
				<?php require 'views/userSideBar.php'; ?>
			</ul>
		</div>
		<!-- Page -->
		<div class="page">
			<div class="page-content container-fluid">
				<div class="row" data-plugin="matchHeight" data-by-row="true">
					<?php 
						extract($_GET);
						if (empty($_GET['halaman'])) {
							require 'views/userDashboard.php';
						} else if($_GET['halaman'] == 'dashboard') {
							require 'views/userDashboard.php';
						} else if($_GET['halaman'] == 'listitem') {
							require 'views/listItem.php';
						} else if($_GET['halaman'] == 'salereversal') {
							require 'views/salereversal.php';
						} else if($_GET['halaman'] == 'country') {
							require 'views/negara.php';
						} else if($_GET['halaman'] == 'site_config') {
							require 'views/site_config.php';
						} else {
							require 'views/404.php';
						}
					?>
				</div>
			</div>
		</div>
		<footer class="site-footer">
			<div class="site-footer-legal">© 2019 <a href="mailto:muhammad.yasmin21@gmail.com">NawakMail</a> | <?php echo $_SESSION['usernya']; ?></div>
				<div class="site-footer-right">
				Dibuat dengan  <i class="red-600 icon md-favorite"></i>  &  <i class="icon md-headset"></i>  oleh <a href="mailto:muhammad.yasmin21@gmail.com">Majelis Koding</a>
			</div>
		</footer>
		<script src="../../../dist/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
		<script src="../../../dist/global/vendor/jquery/jquery.js"></script>
		<script src="../../../dist/global/vendor/popper-js/umd/popper.min.js"></script>
		<script src="../../../dist/global/vendor/bootstrap/bootstrap.js"></script>
		<script src="../../../dist/global/vendor/animsition/animsition.js"></script>
		<script src="../../../dist/global/vendor/chartjs/chart.js"></script>
		<script src="../../../dist/global/vendor/mousewheel/jquery.mousewheel.js"></script>
		<script src="../../../dist/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
		<script src="../../../dist/global/vendor/asscrollable/jquery-asScrollable.js"></script>
		<script src="../../../dist/global/vendor/waves/waves.js"></script>
		
		<script src="../../../dist/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
		<script src="../../../dist/global/vendor/switchery/switchery.js"></script>
		<script src="../../../dist/global/vendor/intro-js/intro.js"></script>
		<script src="../../../dist/global/vendor/slidepanel/jquery-slidePanel.js"></script>
	        <script src="../../../dist/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
			<script src="../../../dist/global/vendor/dropify/dropify.min.js"></script>
			<script src="../../../dist/global/vendor/datatables.net/jquery.dataTables.js"></script>
	        <script src="../../../dist/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	        <script src="../../../dist/global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
	        <script src="../../../dist/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
		<script src="../../../dist/global/js/Component.js"></script>
		<script src="../../../dist/global/js/Plugin.js"></script>
		<script src="../../../dist/global/js/Base.js"></script>
		<script src="../../../dist/global/js/Config.js"></script>
		
		<script src="../../../dist/assets/js/Section/Menubar.js"></script>
		<script src="../../../dist/assets/js/Section/Sidebar.js"></script>
		<script src="../../../dist/assets/js/Section/PageAside.js"></script>
		<script src="../../../dist/assets/js/Section/GridMenu.js"></script>
		
		<!-- Config -->
		<script src="../../../dist/global/js/config/colors.js"></script>
		<script src="../../../dist/assets/js/Site.js"></script>
		<script src="../../../dist/global/js/Plugin/asscrollable.js"></script>
		<script src="../../../dist/assets/examples/js/dashboard/v1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tabelnya").dataTable();
			});
		</script>
  	</body>
</html>