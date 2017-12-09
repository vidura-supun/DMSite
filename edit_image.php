<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>
<?php

$id=$_SESSION["id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table width="100%">
	<tr>
		<td>
		<?php require("edit_image1.php"); ?>
		</td>
		<td>
		<?php require("edit_image2.php"); ?>
		</td>
		<td>
		<?php require("edit_image3.php"); ?>
		</td>
	</tr>
</table>
<?php require("display_func.php"); ?>

</body>
</html>
