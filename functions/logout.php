<?php
	if(isset($_POST["logout"])){
		session_start();
		// code below disable/remove the sesion start
		session_unset();

		header("Location: ../index.php");
	}
	else{
		header("Location: ../add-user.php");
	}
?>