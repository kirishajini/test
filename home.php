<?php
	session_start(); 
	if((!isset($_SESSION["logined"])))
	{
		header("location:index.php");
		exit();
	}
	setcookie("CSRF-Token", ""); //Delete Existing Cookie
	setcookie("CSRF-Token", md5(mt_rand()."qwertyuiop"));

?>

<html>
	<head>
		<title>LogOUT</title>
	</head>
	<body> 
		<form id = "logout" method = "post" action = "logout.php">
			<div align = "center">
			<?php echo " Welcome ".$_SESSION["name"]; ?> <br>
			<input type = "submit" value = "log Out" /><br>
				
		<?php
				if((isset ($message)))
					{
						echo $message;
					}
		?>
			</div>
		</form>
	</body>
	<script>
		window.onload=getToken();
		function getToken(){
			var form = document.getElementById("logout");
			var token = document.createElement("input");
			token.setAttribute("type", "hidden");
			token.setAttribute("name", "csrf");
			token.setAttribute("value", getCookie("CSRF-Token"));
			form.appendChild(token);
		}
		
		function getCookie(name) {
			var value = "; " + document.cookie;
			var parts = value.split("; " + name + "=");
			if (parts.length == 2){
				return parts.pop().split(";").shift();
			}
		}

	</script>
</html>