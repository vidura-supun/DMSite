<?php
session_start();

    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'demo';

    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }

    $name=$_POST['name'];
    //Get image data from database
    function displayimage()
    {
      $con = mysqli_connect("localhost", "root", "","demo");
      $qry="SELECT image FROM images WHERE name = '$name'";
      $result=mysqli_query($con,$qry);
      while ($row = @mysqli_fetch_array($result))
      {
        echo '<img height="300" width="300" src="data:imagetmp;base64, '.$row['image']. ' ">';
      }

    }
displayimage();

?>
