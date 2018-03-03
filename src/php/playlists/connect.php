<?php

	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "cartoon_users";

	$connect = mysqli_connect($host, $db_user, $db_password, $db_name);

		if (!$connect)
		{
			die("Connection failed: ".mysql_connect_error());
		}

?>