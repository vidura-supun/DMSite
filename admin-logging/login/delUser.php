<?php
    include('../connection.php');
    
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
        $errors = array();
        $NIC = $_GET['id'];
        if(!isset($NIC)){
            $errors[] = 'Empty NIC';
        }
    
        if(!$errors){
        
            $q = "DELETE FROM Users WHERE NIC='$NIC' ";
            $query = @mysqli_query($myConn, $q);
            

        if($query){
    
           header('Location: ../../viewUser.php');
            
        }
        else{
         echo '<div class="alert-box error"><span>error: </span>Sorry, System error.</div>';
        }
    }
    
        }
?>