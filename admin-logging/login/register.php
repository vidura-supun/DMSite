<?php
    include('../connection.php');

    $NIC = $_POST['username'];
    $uname = $_POST['Uname'];
    $district = $_POST['District'];
    $pass = hash('sha256',$_POST['Password']);
    $salt = md5(random_int(1, 10000));

    $q = "INSERT INTO Users(NIC, Uname, District, Password, Salt ) VALUE('$NIC', '$uname', '$district', '$pass', '$salt') ";
    $query = @mysqli_query($myConn, $q);
     
    if($query){
        echo strlen($pass);

    }
    else{
        echo "<p class = errors> Sorry something is wrong!";
    }
