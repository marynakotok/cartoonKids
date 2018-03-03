<?php
	//variables will be seen in every document by using this function
	session_start();

	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: signIn.php');
		exit();
	}
	require_once "connect.php";
              // @ - wycisznie php echo off
	$connect = @new mysqli($host, $db_user, $db_password, $db_name);

	if ($connect -> connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
		//if we have connecton with the database
		$login = $_POST['login'];
     	$password = $_POST['password'];

     	//for security from database
     	//all what we get from user just use these functions
     	$login = htmlentities($login, ENT_QUOTES, "UTF_8");
     	//$password = htmlentities($passwor, ENT_QUOTES, "UTF_8");

     	if ($result = @$connect->query(sprintf("SELECT * FROM users WHERE login='%s'", 
     		mysqli_real_escape_string($connect, $login)))) // send to database
     	{
     		$amount_users = $result -> num_rows;
     		if($amount_users>0)
     		{
                    $row = $result -> fetch_assoc();
                    if (password_verify($password, $row['password']))
                    {

          			$_SESSION['logged']=true;
          			 // table with results from database
          			$_SESSION['id'] = $row['id'];
          			$_SESSION['user'] = $row['login'];
          			$_SESSION['photopath'] = $row['photopath'];

          			unset($_SESSION['error']);
          			$result->close();

          			header("Location: congratulation.php");
                    }
                    else
                    {
                         //if doesnt exist the user in database
                         //password is incorrect
                         $_SESSION['error'] = '<span style="color:red">The login or password is uncorrect!</span>';
                         header("Location: signIn.php");
                    }
     		}
          	else
          	{
          		//if doesnt exist the user in database
                    //login is incorrect
          		$_SESSION['error'] = '<span style="color:red">The login or password is incorrect!</span>';
          		header("Location: signIn.php");
          	}
     	}

     	$connect->close();
	}

?>
