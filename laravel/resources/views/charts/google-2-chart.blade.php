<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var activeChartData = <?php echo $activeChartData; ?>;
        console.log(activeChartData);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(activeChartData);
            var options = {
                title: 'Patients types of cancer',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('linechart2'));
            chart.draw(data, options);


        }


    </script>
</head>
<body>
<div id="linechart2" style="width: 300px; height: 300px;" ></div>

{{--@include('charts.google-pie-cancer-type-chart');--}}



</body>
</html>