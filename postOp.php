<?php 
    $user=include('authCheck/adminCheck.php');
    include('admin-logging/connection.php');
    
    
    
    
        $query = "SELECT uid, id, subject, description, type, approval, image1, Date_format(date, '%d') as day, Date_format(date, '%M') as month from markers";
        $q = @mysqli_query($myConn, $query);
        
        
        if($q){
            echo '<!DOCTYPE html>
            <html >
            <head>
              <meta charset="UTF-8">
              <title>Reported Dissasters</title>
              <script src="//use.typekit.net/xyl8bgh.js"></script>
            <script>try{Typekit.load();}catch(e){}</script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
            
              <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link rel="stylesheet prefetch" href="css/__codepen_io_andytran_pen.css">
            
                  <link rel="stylesheet" href="css/style1.css">
                  <link rel="stylesheet" href="css/admin.css">
            
              
            </head>
            
            <body><div style="margin-top:200px">
            <div class="info"  style="margin: 0 0 15px;
            padding: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333333"; ">
            <h1 style="text-align:center">Reported Dissasters</h1>
            <br><br>
          </div>
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          
           <script src="js/index.js"></script>';
              
            
              while($arr=mysqli_fetch_array($q, MYSQLI_ASSOC)){

                if($user!='admin' && $arr['approval']=="n"){
                  continue;
                }else{
                echo'<br><div class="container" style="height: 500px margin-top:100px">
                
                <div class="demo-title"></div>
                <!-- Normal Demo--><div class="column" style="width: 500px; margin-top:50px">
                <div class="post-module">
                  <!-- Thumbnail-->
                  <div class="thumbnail">
                    <div class="date">
                      <div class="day">' .$arr['day']. '</div>
                      <div class="month">' .substr($arr['month'],0,3). '</div>
                    </div><img src="data:imagetmp;base64, '.$arr['image1'].'">
                  </div>
                  <!-- Post Content-->
                  <div class="post-content">
                    <div class="category">Photos</div>
                    <h1 class="title">' .$arr['subject']. '</h1>
                    <h2 class="sub_title">' .$arr['type']. '</h2>
                    <p class="description">' .$arr['description'].'</p>
                   
                    
                  </div>
                </div>
              </div>
              <div>
              <br><br><br><br><br><br>';
              
              if($user=='admin'){
              echo '<a><button id="button1">Edit</button></a>
              <a href="#"><button id="button2">Delete</button></a>
              <a href="approval.php?id=' .$arr['id'].'&approval=y"><button id="button3">Approve</button></a></div>';
              }

              if($user=='user' && isset($_SESSION['NIC'])){
                if($_SESSION['NIC']==$arr['uid']){
                echo '<a><button id="button1">Edit</button></a>
                <a href="#"><button id="button2">Delete</button></a>';
                }
                else{
                  header("Location: postOp.php");
                }
                }
             
              
            
            echo '</body>
            </html>';
           
            
                }

     
        
            }  
            echo '<br></div></div>';         
        }else{
            echo 'connection error';
        }
    
        

    

    


    include_once('footer.php');
?>