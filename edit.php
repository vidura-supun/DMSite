<?php
$user=include('authCheck/adminCheck.php');
if($user=='other'){
  header('Location: login.php');
}


?> 

<html><body style="margin-top: 200px; margin:bottom:100px;">
<div style="margin-left:50px">
<?php
require('admin-logging/connection.php');
$subject=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["subject"])));
$dtype=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["dtype"])));
$dead=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["dead"])));
$uid=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["uid"])));
$lng=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["lng"])));
$lat=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["lat"])));
$address=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["address"])));
$description=mysqli_real_escape_string($myConn,trim(stripslashes($_POST["description"])));
echo "Your ID : ".$uid;?><br> <?php
echo "Casualities : ".$dead;?><br> <?php
echo "Disaster : ".$dtype;?><br> <?php
echo "Address  : ".$address;?><br> <?php
echo "Description: ".$description;
$_SESSION["uid"]=$uid;
$_SESSION["description"]=$description;

?>
<form action="db_sample.php" method="post"><div align="left">
<div>
<input style="display:none" id="subject" name="subject" type="textbox" value=<?php echo "$subject"?>> <br>
<input style="display:none" id="dead" name="dead" type="textbox" value=<?php echo "$dead"?>> <br>
<input style="display:none" type="text" id="uid" name="uid" value=<?php echo "$uid"?>><br>
<input style="display:none" type="text" id="dtype" name="dtype" value=<?php echo "$dtype"?>><br>
<input style="display:none" type="text" id="lng" name="lng" value=<?php echo "$lng"?>>
<input style="display:none" type="text" id="lat" name="lat" value=<?php echo "$lat"?>>
<input style="display:none" type="text" id="address" name="address" value=<?php echo "$address"?>><br>
<p>If there is anything you want to change go to the previous page and change the data</p>
</div>
<br>

<input type="submit" name="sumit" value="add images">
<br><br>

</div></form>

</div>
</body>
</html>
<?php include('footer.php')?>