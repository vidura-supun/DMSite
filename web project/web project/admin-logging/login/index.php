<?php
	session_start();
	if(isset($_SESSION['login_user'])){
header("location: ../");
}
else
{
?>

<html>
<head>

	<title>Vipath.lk</title>

</head>
<body >

						<form action="login.php" method="POST">

						<!-- front end html starts from here -->

						<table width="400" border="10" align="center" bgcolor="white">

							<tr>
								<td bgcolor="white" colspan="4" align="center"><h1>Admin Login form</h1></td>
							</tr>

							<tr>
							<td> User Name </td>
							<td> <input type="text" id="name" name="username" placeholder="username"  value="admin"> </td>
							</tr>

						<br>

							<tr>
							<td>Password </td>
							<td><input type="password" id="password" name="password" placeholder="*******"  value="admin" ></td>
						  </tr>

						<br>

							<tr align="center" >
						  <td colspan="2"><input type='submit' name='submit' class="info "  value="LOGIN"> </td>
							</tr>
						<br>
					</table>
					</form>
  </div>
</body>
</html>
<?php
}
?>
