<?php

$approval=$_POST["approval"];
$id=$_POST["id"];


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
<?php header('Location: admin.php');?>