<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var visitorChartData = <?php echo $visitorChartData; ?>;
        console.log(visitorChartData);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(visitorChartData);
            var options = {
                title: 'Patients types of cancer',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.PieChart(document.getElementById('linechart'));
            chart.draw(data, options);

        }


    </script>
   




</head>
<body>
<div id="linechart" style="min-height:500px;height: 100%;width: 100%;margin:auto;text-align:center;" ></div>



</body>
</html>