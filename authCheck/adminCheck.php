<?php
    if(!isset($_SESSION)){
    session_start();
    }
    $a='admin';
    $u='user';
    $o='other';
    if(isset($_SESSION['P']) && is_numeric($_SESSION['P'])){
        if($_SESSION['P']==1){
            include_once('header.php');
            return $a;

        


        }
        if($_SESSION['P']==0){
            include('navbar.php');
            return $u;


        }
    }else{
        
        include('navbar.php');
        return $o;
    }
    
   
?>