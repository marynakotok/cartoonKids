<?php
	session_start();

	if(isset($_SESSION['logged']) && ($_SESSION['logged'] == true))
	{
		header('Location: ../index.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cartoons - sign in</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="../../style/signIn.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<form action="include.php" method="post">
	
	<input type="text" name="login" placeholder="E-MAIL"><br> 
	<input type="password" name="password" placeholder="PASSWORD"> <br> 
	<input type="submit" name="signIn" class="button" value="Sign In" ><br> <br>

</form>

<?php
if (isset($_SESSION['error'])) echo "<div class='error'>". $_SESSION['error'] ."</div>";
echo "<br><br>"

?>

<a href="../up/signUp.php" class="down">Sign Up</a><br> <br>
<a href="../index.php">Go to Home!</a>
</body>
</html>