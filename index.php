<?php 
    include_once('authCheck/adminCheck.php');
    
?>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
        <title>Vipath.lk</title>
    
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
        <link href="css/custom.css" rel="stylesheet">
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    
        <!-- Custom Fonts from Google -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
            rel='stylesheet' type='text/css'>
    
    </head>
    
    <body>

            
    
        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1>Vipath.lk</h1>
                    <p><font size="90" color="white">Stay Alert! Be Safe!</font>
                    </p>
                    <a href="#" class="btn btn-primary btn-lg">Report now</a>
                </div>
            </div>
        </header>
    
    
    
    
    
  
    
        <section class="content content-3">
            <div class="container">
                <h2 class="section-header">
                    <span class="glyphicon glyphicon-pushpin text-primary"></span>
                    <br>Check if you're safe</h2>
                <p class="lead text-muted">send your location to us and know that if you're safe from any natural disaster or incident from your area</p>
                <form action="safe.php" method="post">
                	<table align="center">
                		<tr>
                			<td><h2><input type="text" name="danger"></h2></td>
                			<td><p>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
                			<td><input type="submit" name="" class="btn btn-primary btn-lg" value="Check Now"></td>
                		</tr>
                	</table>
                </form>
            </div>
            </div>
        </section>
        <?php include('footer.php'); ?>
    </body>
    
        
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>
    
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    
        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        
        <!-- Custom Javascript -->
        <script src="js/custom.js"></script>
        
    
    
    
    </html>