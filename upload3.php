<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
$uid=$_SESSION["uid"];
$id= $_SESSION["id"];


?>
</head>
<body>
		<p>edit the third image</p>
<form  method="post" enctype="multipart/form-data">
	<br/>
	<input type="text" name="uid" id="uid" value=<?php echo "$uid"?> readonly>
	<input type="file" name="image3" required/>
	<br/><br/>
	<input type="submit" name="sumit" value="upload">
	</form>
<?php

require("edit_image3.php");

require("display_func.php");

include('footer.php');
?>
</body>
</html>
