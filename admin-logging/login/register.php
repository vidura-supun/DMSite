<?php
    include('admin-logging/connection.php');

    if($user=='admin' && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $errors = array();

    

    $NIC = $_POST['username'];
    $uname = $_POST['Uname'];
    $district = $_POST['District'];
    $pass = hash('sha256',$_POST['Password']);
    $salt = md5(random_int(1, 10000));

    $NIC = mysqli_real_escape_string($myConn,trim(stripslashes($NIC)));
    $uname = mysqli_real_escape_string($myConn,trim(stripslashes($uname)));
    $district = mysqli_real_escape_string($myConn,trim(stripslashes($district)));
    $pass = mysqli_real_escape_string($myConn,trim(stripslashes($pass)));

    if(!isset($NIC)){
        $errors[] = 'Empty NIC';
    }

    if(!isset($uname)){
        $errors[] = 'Empty User name';
    }

    if(!isset($district)){
        $errors[] = 'Empty distric';
    }

    if(!isset($pass)){
        $errors[] = 'Empty password';
    }

    if(!$errors){
    
    $q = "INSERT INTO Users(NIC, Uname, District, Password, Salt ) VALUE('$NIC', '$uname', '$district', '$pass', '$salt') ";
    $query = @mysqli_query($myConn, $q);
    

   
    
    
    if($query){

        echo '<div class="alert-box success"><span>success: </span>User added successfully.</div>';
        
    }
    else{
     echo '<div class="alert-box error"><span>error: </span>Sorry, System error.</div>';
    }
}

    }
