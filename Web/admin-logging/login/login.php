<?php
	session_start();

							include('../connection.php');
						$connection = new createConnection();
						$connection_ref = $connection->connectToDatabase();

  if (isset($_POST['submit']))
	{

		if (empty($_POST['username']) || empty($_POST['password']))
		{
			header("Location: index.php");
		}
		else

		{
			$username=$_POST['username'];
			$password=$_POST['password'];

			//this is used to prevent sqli
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($connection_ref,$username);
			$password = md5(mysqli_real_escape_string($connection_ref,$password));


			$query = mysqli_query($connection_ref, "select * from admin_log where password='$password' AND username='$username' ")or die(mysql_error());
			$rows = mysqli_num_rows($query);

			if ($rows == 1)
			{
				$_SESSION['login_user']=$username;
				header("Location: ../");
			}
			else
			{

				header("Location: index.php");
			}
			mysql_close($connection);
		}
	}
?>
