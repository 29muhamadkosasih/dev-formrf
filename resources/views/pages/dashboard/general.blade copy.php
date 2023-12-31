<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php echo $chartData ?>
        ]);

        var options = {
            title: 'P',
            is3D: true,
            colors: ['#FF5733', '#FFC300', '#DAF7A6', '#FF5733', '#C70039'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>


<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>