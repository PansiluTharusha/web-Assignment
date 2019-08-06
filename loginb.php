<?php

$error="";

if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];
	if (!empty($username) && !empty($password)) {

		$con=mysqli_connect("localhost","root","");
		if($con)
		{
			$db=mysqli_select_db($con,"login");
			$query="SELECT*FROM users WHERE username='".$username."'";


			$result=mysqli_query($con,$query);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);

			    if ($row["password"]==$password) {
			    	header("Location: buddhismpage.html");
			    } else {
			    	$error="Invalid Passsword";
			    }
			}

			mysqli_close($con);
		} 
		else
		{
			$error="Database connection is failed";
		}
		
	} 
	else 
	{
		$error="Enter valid details";
	}
} 



 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
</head>
<body>
	<div class="loginbox">
		
		<h1>Log in here</h1>
		<form action="" method="POST">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter your Username">
			<p>Passsword</p>
			<input type="password" name="password" placeholder="Enter the password">
			<a href=""><input type="submit" value="login"></a>
			
			<label><?php echo $error;?></label>

		</form>
	</div>
</body>
</html>
