<?php
	session_start(); 
	if((!isset($_SESSION["logined"])))
	{
		header("location:index1.php");
		exit();
	}
	if(isset($_POST['csrf'])){
		if($_POST['csrf'] == $_SESSION['CSRF']){
			echo "Logout Success";
			session_destroy();
		}
		else{
			echo "CSRF Check Failed";
		}
	}
	
?>