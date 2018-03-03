<?php
	session_start();

	session_unset();
	header("Location: in/signIn.php");

?>