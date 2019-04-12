	<script type="text/javascript" src="../../../dist/global/vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript">

		function loadSite(){
			$.ajax({
				url: 'models/site/loadSite.php',
				data: {},
				success: function(data){
					$("#loadSite").html(data);
				},
				error: function(xhr){
					alert("gagal");
				}
			});
		}
		loadSite();
	</script>