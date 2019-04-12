	
	<script type="text/javascript" src="../../../dist/global/vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript">

		// 
		// R A N G E
		//


		function loadDataRange(range){
			$.ajax({
				url: 'models/loadTableRange.php',
				type: 'post',
				data: {
					rangenya: range
				},
				success: function(data){
					$("#panelLoadData").html(data);
				},
				error: function(xhr){
					alert("Gagal Data Range");
				}
			});
		}

		function loadWidgetRange(range){
			$.ajax({
				url: 'models/loadWidgetRange.php',
				type: 'post',
				data: {
					rangenya: range
				},
				success: function(data){
					$("#widget").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}

		//
		//	D A T E
		//

		function loadData(from,to){
			$.ajax({
				url: 'models/loadTabelData.php',
				type: 'post',
				data: {
					dari : from,
					hingga : to
				},
				success: function(data){
					$("#panelLoadData").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}

		function loadWidget(from,to){
			$.ajax({
				url: 'models/loadWidgetData.php',
				type: 'post',
				data: {
					dari : from,
					hingga : to
				},
				success: function(data){
					$("#widget").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}


		//
		//	W I T H O U T  C O N D I T I O N
		//


		function loadDataBiasa(){
			$.ajax({
				url: 'models/loadTabelBiasa.php',
				type: 'post',
				data: {},
				success: function(data){
					$("#panelLoadData").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}
		loadDataBiasa();

		function loadWidgetBiasa(){
			$.ajax({
				url: 'models/loadWidgetBiasa.php',
				data: {},
				success: function(data){
					$("#widget").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}
		loadWidgetBiasa();

		//
		//	F U N G S I  O N  C H A N G E
		//

		function changeData(){
			var range = $("#rangeData").val();
			var from = $("#from").val();
			var to = $("#to").val();
			
			if (range == 30 || range == 90 || range == 1) {
				loadDataRange(range);
				loadWidgetRange(range);
			} else {
				if (from != "" && to != "") {
					loadData(from,to);
					loadWidget(from,to);
				} else {
					alert("Gagal ambil data");
				}
			}
			// loadData(from,to,year);
			// loadWidget(from,to,year);
		}

		function loadControl(){
			$.ajax({
				url : 'models/loadFormControl.php',
				data : {},
				success: function(data){
					$("#formControl").html(data)
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}
		loadControl();
		
		function loadPreview(name,range,from,to){
			$.ajax({
				url: 'models/previewData.php',
				type: 'post',
				data: {
					nameItem : name,
					rangenya : range,
					dari : from,
					hingga : to
				},
				success: function(data){
					$("#dataPreview").html(data);
				},
				error: function(xhr){
					alert("Gagal");
				}
			});
		}

		function preview(name,range,from,to){
			//alert(from);
			loadPreview(name,range,from,to);
		}

		function backToPreview(){
			$("#panelPreview").hide('slow', function(){
				$("#panelLoad").show('slow');
			});
		}

		function toPreview(){
			$("#panelLoad").slideUp('slow', function(){
				$("#panelPreview").slideDown('slow');
			});
		}

		$("#kembali").click(function(){
			backToPreview();
		});

	</script>