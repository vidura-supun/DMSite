 
<?php
  require_once('admin-logging/connection.php');
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
					
					if(!isset($_SESSION)){
					session_start();
					}
					$_SESSION["NIC"]= 
					$arr['NIC'];
					$_SESSION ['Uname']= 
					$arr['Uname'];
					$_SESSION['P']=
					$arr['permission'];	

					

					header('Location: /DMSite/index.php');
					

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
