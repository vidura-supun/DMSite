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

						<form action="register.php" method="POST">

					

						<table width="400" border="10" align="center" bgcolor="white">

							<tr>
								<td bgcolor="white" colspan="4" align="center"><h1>Admin Login form</h1></td>
							</tr>

							<tr>
							<td> NIC </td>
							<td> <input type="text" name="username" placeholder="username"  value="admin"> </td>
							</tr>

						<br>
                        <tr>
								<td bgcolor="white" colspan="4" align="center"><h1>Admin Login form</h1></td>
							</tr>

							<tr>
							<td> Full Name:</td>
							<td> <input type="text" name="Uname" placeholder="Full name"  value="admin"> </td>
							</tr>
                        <br>
                        <tr>
								<td bgcolor="white" colspan="4" align="center"><h1>Admin Login form</h1></td>
							</tr>

							<tr>
							<td> District: </td>
							<td> <input type="text"  name="District" placeholder="username"  value="admin"> </td>
							</tr>
                        <br>

							<tr>
							<td>Password </td>
							<td><input type="password" id="password" name="Password" placeholder="*******"  value="admin" ></td>
						  </tr>

						<br>

                        <tr>
								<td bgcolor="white" colspan="4" align="center"><h1>Admin Login form</h1></td>
							</tr>

							<tr>
							<td> Confirm Password: </td>
							<td> <input type="text" id="name" name="" placeholder="username"  value="admin"> </td>
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
