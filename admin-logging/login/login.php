<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../css/nortification.css">
</head> 
<body>
<?php
	session_start();

	include('../connection.php');
					

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$errors = array();

		if (empty($_POST['username']))
		{
			$errors[] = 'You forgot to enter your username';
			
		}

		if (empty($_POST['password']))
		{
			$errors[] = "you forgot to enter your password";
		}
		
		if (empty($errors)){

			$username=$_POST['username'];
			$password=$_POST['password'];

			//this is used to prevent sql injections

			$username = mysqli_real_escape_string($myConn,trim(stripslashes($username)));
			$password = mysqli_real_escape_string($myConn,trim(stripslashes($password)));
			$password = hash('sha256', $password);

			$q = "select * from Users where NIC='$username' ";
			$query = mysqli_query($myConn, $q);
			$arr =  mysqli_fetch_array($query);
			//checking number of rows affected
			
			if ($q && mysqli_affected_rows($myConn)==1){
			
				if($arr['NIC']==$username && $arr['Password'] . $arr['Salt']==$password . $arr['Salt']){
					//hashing nic 
					setcookie('NIC', 
					md5($arr['NIC']));
					setcookie('Uname', $arr['Uname']);

					header('Location: ../../index.php');
					echo '<div class="alert-box success"><span> Login Successful!: </span>Write your success message here.</div>';


				}else{
					$errors[] = "NIC and Password does not match";
					
				}
			}
			


		}

		echo '<div class="alert-box error"><span>error: </span>';
		foreach ($errors as $e) {
			echo "$e <br>\n";
		
		}
		echo "</div>";

	}
?>


</body>
</html>
