<?php
	session_start();

	//add to all pages wich can be se by logged user
	if (!isset($_SESSION['logged']))
	{
		header('Location: signIn.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cartoons - congratulation</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="../../style/signIn.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!--Also this page inform user that he/she is logged now , so we need use here a template of design  -->
<?php

echo "<p style='font-size:25px'>Congratulations! You are logged to the system</p>";
//echo "Your email: ".$_SESSION['user']."<br>";
//echo "Your photo path: ".$_SESSION['photopath']."<br><br>";
?>
<a href="../signOut.php" style="margin-left: 130px">Sign Out</a>
<a href="../index.php">Go to Home!</a>
</body>
</html>