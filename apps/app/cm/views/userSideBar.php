	  	<?php 
	  	require '../../../config/db_connect.php';
	  	$user = $_SESSION['usernya'];
	  	$sql = mysqli_query($connect,"SELECT * FROM user WHERE username = '$user'");
	  	 ?>
	  	<li class="site-menu-item">
			<a class="animsition-link" href="?halaman=dashboard">
			  <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
			  <span class="site-menu-title">Dashboard</span>
			</a>
		</li>
		<li class="site-menu-item">
			<a class="animsition-link" href="?halaman=listitem">
			  <i class="site-menu-icon md-format-list-bulleted" aria-hidden="true"></i>
			  <span class="site-menu-title">Daftar Item</span>
			</a>
		</li>
		<?php foreach ($sql as $key) {
			if ($key['level'] == 'admin') {
				?>
				<li class="site-menu-item">
					<a class="animsition-link" href="?halaman=site_config">
					  <i class="site-menu-icon md-settings" aria-hidden="true"></i>
					  <span class="site-menu-title">Konfigurasi Site</span>
					</a>
				</li>
				<?php
			}
		} ?>