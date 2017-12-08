<?php
    $user=require('authCheck/adminCheck.php');
    if($user=='admin'){
        require('admin-logging/login/editAdmin.php');
    }

    if($user=='user'){
        require('admin-logging/login/editUser.php');
    }
	if($user!='admin' && $user!='user'){
		header('Location: index.php');

	}
?>
<!DOCTYPE html>
<html>
	<head>	
		<style> body {
			background-color:rgb(150, 153, 144)
		}
		</style>
		<title>Registration</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href="css/nortification.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' ' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family='Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
		<!--webfonts-->
	</head>
	<body style="background-color: rgb(150, 153, 144)">	
			<!--start-login-form-->
				<div class="main" style="margin-top:100px; background-color: rgb(150, 153, 144)">

					<style>
							h1.sansserif {
								font-family: Arial, Helvetica, sans-serif;}
					</style>
			    	<div class="login-head">
					    <h1 class="sansserif">Vipathlk User Registration</h1>
					</div>
					<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Register</h2>
						 	 </div>
						  	<form action="editUser.php" method="POST">
						  		<input type="text" name="Uname" value="Full Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}" >
						  		<input type="text" name="District" value="Postal Zip Code and City " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'eg-Maharagama,10280';}" >
						  		
								<input type="password" id="password" placeholder="password" name="Password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<input type="password" id="confirm_password" placeholder="Confirm password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = ' Confirm Password';}" >
                                <?php if($user=='admin'){
                                    echo '<input type="hidden" name="id" value=' . $_GET['id'] . ' />';
                                    }
                                ?>
                                <div class="Remember-me">
								<div class="p-container">
								
								<div class ="clear"></div>
							</div>
												 
								<div class="submit">
									<input type="submit" onclick="myFunction()" value="Register" >
								</div>
									<div class="clear"> </div>
								</div>
											
						  </form>
					</div>
<script>
var password = document.getElementById("password")
  confirm_password = document.getElementById("confirm_password");
function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
							</script>

					
						
			
						
			  </div>
	</body>
</html>
<?php
	include('footer.php');
?>