<?php

$approval=$_GET["approval"];
$id=$_GET["id"];


require("admin-logging/db_connection.php");

$sql = "UPDATE markers
SET  approval='$approval'
WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php //header('Location: postOp.php');?>