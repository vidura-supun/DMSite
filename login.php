<!DOCTYPE html>
<html>
	<head>	
		<title>login</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' ' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
		<!--webfonts-->
	</head>
	<body>
	<?php 
    include('admin-logging/connection.php');
    require_once('admin-logging/login/login.php')
	?>	
		
					<div class="Login">
							<div class="Login-head">
						    	<h3>LOGIN</h3>
						 	</div>

						<form action='login.php' method="POST">
								<div class="ticker">
									<h4>Username</h4>
						  			<input type="text" value="NIC" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NIC';}" ><span> </span>
						  			<div class="clear"> </div>
						  		</div>
						  		<div>
						  		<h4>Password</h4>
								<input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								  			<div class="clear"> </div>
								</div>
								<div class="checkbox-grid">
									<div class="inline-group green">
									<label class="radio"><input type="radio" name="radio-inline"><i> </i>Remember me</label>
									<div class="clear"> </div>
									</div>

								</div>
												 
								<div class="submit-button">
									<input type="submit" onclick="myFunction()" value="LOGIN  >" >
								</div>
									<div class="clear"> </div>
								</div>
											
						  </form>
					</div>
			</div>
				
						
			  </div>
	</body>
</html>
