<?php
require('login/session.php');
?>

<html>
<head>
  	   	<title>ADMIN Panel</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<style>
		html,body{width:100%;height:100%;}
                .fix_nav{margin-top:10%;}
		.win_by_vipath{padding:3em 0em;text-align: center;margin:1.5em 1em;text-shadow:5px 5px 10px black;font-size:18px; background-color: grey;}
.wrapper{line-height:12;}
a:hover{text-decoration:none;}

	</style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" style="background:#eeefc6">


      		</button>
	      	<a class="navbar-brand" href="http://nsbm.lk/">
          		<span class="glyphicon glyphicon-globe" style="font-size:3em"></span>
      		</a>
		<a class="navbar-brand" href="#">
          		<span><b style="font-size:12px;letter-spacing:5px"> whats happening in the country at the moment </b><br>ADMIN AT VIPATH</span>
      		</a>
 	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
	      	<ul class="nav navbar-nav navbar-right">
        		<li ><p style="margin-top:10%;">ADMINSTARTOR LOGGED IN<br><b style="font-size:12px;letter-spacing:5px">vipath admin backend</b></p></li>
        		<li><a href="login/logout.php"><span class="glyphicon glyphicon-off" style="font-size:2.5em"></span></a></li>
      		</ul>
    	</div>
  	</div>
</nav>

<div class="fix_nav">

</div>
<div class="container">
<div class="row ">

  <?php
    include('connection.php');
    $connection = new createConnection();
    $connection_ref = $connection->connectToDatabase();

      $result = mysqli_query($connection_ref, 'SHOW TABLES');
      if($result)
    {
      $break_line=0;
      while($table = mysqli_fetch_array($result))
      {
        echo "<div class='col-md-4 win_by_vipath' ><a  href='choice.php?test=".base64_encode($table[0])."' class='text-uppercase win_by_vipath' style='color:black;'>".$table[0]."</a></div>";

        $break_line++;

        if($break_line==4 || $break_line==8 || $break_line==12)
        {
          echo "</div><div class='row'>";
        }
      }
    }
    else
    {
      echo 'Error displaying tables';
    }

  ?>


</div>
</div>
</body>
</html>
