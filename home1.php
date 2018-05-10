<?php
	session_start(); 
	if((!isset($_SESSION["logined"])))
	{
		header("location:index1.php");
		exit();
	}
	$_SESSION["CSRF"] = md5(mt_rand()."qwertyuiop");
	
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
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				var form = document.getElementById("logout");
				var token = document.createElement("input");
				token.setAttribute("type", "hidden");
				token.setAttribute("name", "csrf");
				token.setAttribute("value", this.responseText);
				form.appendChild(token);
			  }
			};
			xhttp.open("POST", "token1.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("token");
		}
	</script>
</html>