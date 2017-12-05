<?php
session_start();
$selected_table_name=$_GET['test'];
$_SESSION["tableName"]= base64_decode($selected_table_name);
header('Location:edit/');

?>
