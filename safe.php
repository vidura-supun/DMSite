<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$danger=$_POST["danger"];


// Opens a connection to a MySQL server
$connection=mysql_connect ($servername, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($dbname, $connection);
if (!$db_selected) {
  die ('Can\'t use db :' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT address,approval FROM markers WHERE address LIKE '%$danger%'";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: ");

// Start XML file, echo parent node


// Iterate through the rows, printing XML nodes for each
if($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  if ($row['approval']=='n') {
  }else{
  echo "You are in danger";
}
}else{
  echo "You are safe";
}




?>
