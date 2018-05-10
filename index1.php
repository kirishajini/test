<?php
	session_start();
	
	if((isset($_SESSION["logined"])))
	{
		header("location:home1.php");
		exit();
	}
	if((isset($_POST["user"]))&&(isset($_POST["password"])))
	{
		$user = $_POST["user"];
		$pass = $_POST["password"];
	
		if ($user == "kirishajini" && $pass == "kirishajini0106")
			{
				
				$_SESSION["logined"] = true ;
				$_SESSION["name"] = "kirishajini" ;
				header ("location:home1.php");
				
			}
		else 
			{
				$message = "incorect username or password";
			}

	}
?>
<html>
	<head>
		<title>LogIN</title>
	</head>
	<body>
		<form method = "post"><br><br><br><br><br>
				<div align = "center">
				username <input type = "text" name = "user" /> <br><br>
				password <input type = "password" name = "password"/> <br><br>
				<input type = "submit" value = "log In" /><br>
				<?php
						if((isset ($message)))
						{
							echo $message;
						}
				?>
				</div>
		</form>
	</body>
</html>