
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', 'Deaths');
        data.addColumn('string', 'type');

        data.addRows([
          
            <?php
            require('admin-logging/connection.php');
            $q = mysqli_query($myConn, "SELECT type, deaths, date_format(date, '%Y, %m, %d') as d FROM markers");
            

            while($arr=mysqli_fetch_array($q, MYSQLI_ASSOC)){
               
                
                echo '[new Date(' . $arr["d"] . '), ' . $arr["deaths"] . ', \'' . $arr["type"] . '\'],';


            }
            ?>

        ]);

        var chart = new google.visualization.AnnotationChart(document.getElementById('chart_div'));

        var options = {
          displayAnnotations: true
        };

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id='chart_div' style='width: 900px; height: 500px; padding: 50px'></div>
  </body>
</html>
