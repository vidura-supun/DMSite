<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>
<?php

$description=$_SESSION["description"];
$subject=$_POST["subject"];
$dead=$_POST["dead"];
$dtype=$_POST["dtype"];
$uid=$_POST["uid"];
$lng=$_POST["lng"];
$lat=$_POST["lat"];
$address=$_POST["address"];

require("admin-logging/db_connection.php");

$sql = "INSERT INTO markers (uid ,subject, description , address, lat,lng, type, approval, deaths)
VALUES ('$uid', '$subject' ,'$description' ,'$address', $lat, $lng,'$dtype', 'n', '$dead')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

 <?php header('Location: load.php');?>