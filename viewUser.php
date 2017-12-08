<?php 
    $user=include('authCheck/adminCheck.php');
    include('admin-logging/connection.php');
    echo $user;
    if ($user!='admin'){
        header('Location: index.php');
    }
    
        $query = "SELECT * FROM Users";
        $q = @mysqli_query($myConn, $query);
        
        
        if($q){
            echo '<!DOCTYPE html>
            <html lang="en">
                
            <head>
                <link rel="stylesheet" href="css/admin.css">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>view users</title>
            </head>
            <body>
                <div id="vu">
                       
                        
                        
                        <table id="a">
                          <tr id="a">
                            <th id="a">Name</th>
                            <th id="a">Location</th>
                           
            
                          </tr>';
        while($arr = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
           
        echo '<tr id="a">
                <td id="a">' . $arr['Uname'] . '</td>
                <td id="a">' . $arr['District'] . '</td>
                <td id="a"><a href="editUser.php?id=' . $arr['NIC'] . '"><button class="button" id="button1">Edit</button></a></td>
                <td id="a"><a href="admin-logging/login/delUser.php?id=' . $arr['NIC'] . '"><button class="button" id="button2">Delete</button></a></td>
                        
                </tr>';
        }
        echo '</table></div>';
                    
        }else{
            echo 'connection error';
        }
    
        

    

    


    include_once('footer.php');
?>