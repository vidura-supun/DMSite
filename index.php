<?php 
    session_start();
?>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
        <title>Vipathlk</title>
    
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
    
        <!-- Navigation -->
        <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Vipathlk and responsive toggle -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <span class="glyphicon glyphicon-fire"></span> 
                        Vipathlk
                    </a>
                </div>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="..\web project\index.html">Home</a>
                        </li>
                        <li>
                           <a href="#"><font color="yellowgreen">about us</font> </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="yellowgreen">Disasters</font> <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="about-us">
                                <li><a href="..\web project\droughts or water cuts.html">Drougts</a></li>
                                <li><a href="..\web project\floods.html">Floods</a></li>
                                <li><a href="..\web project\fires.html">Fires</a></li>
                                <li><a href="..\web project\landslides.html">Landslides</a></li>
                                <li><a href="..\web project\powercuts.html">Power Outages</a></li>
                                <li><a href="..\web project\storms.html">Storms</a></li>
                                <li><a href="..\web project\tsunami.html">Tsunami</a></li>
                                <li><a href="..\web project\accidents.html">Roadside Accidents</a></li>
                            </ul>
                        </li>
                        <li>
                        <?php 
                            
                        
                            if(isset($_SESSION['NIC'])){
                                echo '<a href="/DMSite/admin-logging/login/logout.php"><p style="color:yellowgreen">Logout</p></a></li>';
                                
                        }else{
                            echo '<a href="login.php"><p style="color:yellowgreen">Login</p></a></li>';
                        }    

                        ?>
                          
                        
                        
                    </ul>
                    
                </div><!-- /.navbar-collapse -->
                <?php
            if(isset($_SESSION['NIC'])){
            echo '<div style="text-align:left"><a href="/DMSite/users/listPosts.php"><p  style="color:#f1c40f">Hi! '. $_SESSION['Uname'] . '</p></a></div>';}
            ?>
        </nav>
            </div><!-- /.container -->
            
    
        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1>Vipathlk</h1>
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
    
    
        <footer class="page-footer">
    
    
            <div class="contact">
                <div class="container">
                    <h2 class="section-heading">Contact Us</h2>
                    <p>
                        <span class="glyphicon glyphicon-earphone"></span>
                        <br> +94 112 456 7890</p>
                    <p>
                        <span class="glyphicon glyphicon-earphone"></span>
                        <br> +94 112 976 7890</p>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span>
                        <br> info@Vipath.lk</p>
                </div>
            </div>
    
    
            <!--
            <div class="small-print">
                <div class="container">
                    <p>Copyright &copy; Vipath.lk 2017</p>
                </div>
            </div>
    -->
        </footer>
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>
    
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    
        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        
        <!-- Custom Javascript -->
        <script src="js/custom.js"></script>
        
    
    <?php include 'footer.php'; ?>
    </body>
    
    </html>