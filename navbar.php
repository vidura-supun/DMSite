<!DOCTYPE html>
<html>
<head>
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
        <link href="css/admin.css" rel="stylesheet">

  <title></title>
</head>
<body>
<nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation" style="opacity: 0.7;   background-color:black;">
          <div class="container">
              <!-- Vipathlk and responsive toggle -->
              <div class="navbar-header" ">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php">
                      <span class="glyphicon glyphicon-fire"></span> 
                      Vipathlk
                  </a>
              </div>
              <!-- Navbar links -->
              <div class="collapse navbar-collapse" id="navbar">
                  <ul class="nav navbar-nav navbar-right">
                      <li class="active">
                          <a href="index.php">Home</a>
                      </li>
                      <li class="active">
                          <a href="#">about us</a>
                      </li>
                      <li class="dropdown">
                          <a style="color:yellowGreen;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Disasters <span class="caret"></span></a>
                          <ul class="dropdown-menu" aria-labelledby="about-us">
                              <li><a href="droughts or water cuts.php">Drougts</a></li>
                              <li><a href="floods.php">Floods</a></li>
                              <li><a href="fires.php">Fires</a></li>
                              <li><a href="landslides.php">Landslides</a></li>
                              <li><a href="powercuts.php">Power Outages</a></li>
                              <li><a href="storms.php">Storms</a></li>
                              <li><a href="tsunami.php">Tsunami</a></li>
                              <li><a href="accidents.php">Roadside Accidents</a></li>
                          <</ul>
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
              echo '<div style="text-align:left"><a href="/DMSite/users/listPosts.php"><p  style="color:#f1c40f; "><b>Hi! ' . $_SESSION["Uname"] . '<b> </p></a>
              <a href="editUser.php" style="color:white; "><button id="button1"> Edit</button></a> </div>';
              } 
              ?>
          </nav>
              </div><!-- /.container -->
</body>
</html>

 