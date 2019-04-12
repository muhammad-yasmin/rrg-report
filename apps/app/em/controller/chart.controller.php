<script type="text/javascript" src="../../../dist/global/vendor/chartjs/Chart.min.js"></script>
<script type="text/javascript" src="../../../dist/global/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

	var data = <?php echo json_encode($data); ?>;
	var labels = <?php echo json_encode($minggu); ?>;

	function renderData(labels,data){
        var ctx = document.getElementById("myChart").getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Grafik",
                    fill: true,
                    lineTension: 0.2,
                    backgroundColor : "rgba(75,192,192,0.4)",
                    borderColor : "rgba(75,192,192,1)",
                    data: data
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }
        });
    }

    renderData(labels,data);
</script>