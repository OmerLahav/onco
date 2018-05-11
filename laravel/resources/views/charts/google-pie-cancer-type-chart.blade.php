<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var visitor = <?php echo $visitor; ?>;
        console.log(visitor);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(visitor);
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
<div id="linechart" style="width: 300px; height: 300px;"></div>



</body>
</html>