<?php
    require('../admin-logging/connection.php');
    $post = $_GET['id'];
    $q = "DELETE * FROM markers where id='$post";
    if(isset($_SESSION['P'])){
        if($_SESSION['P']==1 || $_SESSION['NIC']==$_GET['uid']){
            @mysqli_query($myConn, $q);
        }else{
            header('Location:../index.php');
        }


    }else{
        header('Location:../index.php');
    }

?>