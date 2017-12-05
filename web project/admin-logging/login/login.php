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
			
			if ($q){
			
				if($arr['NIC']==$username && $arr['Password'] . $arr['Salt']==$password . $arr['Salt']){
					echo "bit";


				}else{
					echo "wrong";
				}
			}


		}

	}
?>
