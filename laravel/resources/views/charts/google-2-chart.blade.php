<html>
<head>
    <style>
            /*----tablet----*/
@media (max-width: 768px) {

#linechart{width: 100px; height: 100px} 

}

/*----mobile----*/
@media( max-width: 585px) {
   #linechart{width: 100px; height: 100px} 

}
</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var activeChartData = <?php echo $activeChartData; ?>;
        console.log(activeChartData);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(activeChartData);
            var options = {
                title: 'Patients health status',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.PieChart(document.getElementById('linechart2'));
            chart.draw(data, options);


        }


    </script>
</head>
<body>
<div id="linechart2" style="min-height:500px;height: 100%;width: 100%;margin:auto;text-align:center;" ></div>


</body>
</html>