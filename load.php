<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>  
<html>
<?php
$uid=$_SESSION["uid"];


?>
	<body style="margin-top:200px">
<div style="margin-left:50px">
	<form action="edit_image.php" method="post" enctype="multipart/form-data">
	<br/>
	<input type="text" name="uid" id="uid" readonly value=<?php echo "$uid"?> <br><br><br>
	<input type="file" name="image1" />
	<input type="file" name="image2" />
	<input type="file" name="image3" />
	<br/><br/>
	<input type="submit" name="sumit" value="upload">
	</form>

</div>

	</body>
	<br><br><br>
</html>
<?php 


  require("post_id.php");
  include('footer.php');

?>
