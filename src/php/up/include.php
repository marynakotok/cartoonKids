<?php
	session_start();
	require_once "../in/connect.php";

	if (isset($_POST['email']))
	{
		//Everything is ok
		$eth_ok = true;

		// Check if the nickname is correct
		$nickname = $_POST['nickname'];

		if ((strlen($nickname)<3) || (strlen($nickname)>15))
		{
			$eth_ok = false;
			$_SESSION['e_nickname']="Nickname has to include from 3 to 15 signs";
		}

		if (ctype_alnum($nickname) == false)
		{
			$eth_ok = false;
			$_SESSION['e_nickname']="Nickname has to include only numbers or letters"; 
		}

		// Check login = email

		$email = $_POST['email'];

		//safe email = clear email
		$emailS = filter_var($email, FILTER_SANITIZE_EMAIL);

		if ((filter_var($emailS, FILTER_VALIDATE_EMAIL) == false) || ($emailS!=$email))
		{
			$eth_ok=false;
			$_SESSION['e_email'] = "Email is incorrect!";
		}

		//Check if the password is ok

		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		if ((strlen($password1)<8) || (strlen($password1)>20))
		{
			$eth_ok=false;
			$_SESSION['e_password']="Password has to include from 8 to 20 signs";
		}

		if ($password1!=$password2)
		{
			$eth_ok=false;
			$_SESSION['e_repeat']="Passwords are different!";
		}

		$password1_hash = password_hash($password1, PASSWORD_DEFAULT);
		//echo $password1_hash; exit();

		// Check checkbox

		if (!isset($_POST['rules']))
		{
			$eth_ok=false;
			$_SESSION['e_rules']="Accept rules to continue!";
		}

		//bot or not?

		$secret = "6Ld1fjoUAAAAAAyRsLn1LOrmAoHH78iBv-7jBZBm";

		$check_bot = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

		$answer = json_decode($check_bot);

		if ($answer -> success == false)
		{
			$eth_ok=false;
			$_SESSION['e_bot']="Prove that you are not a bot!";
		}

		//to check photo

		if (isset($_POST['yesOrNo']))
		{
			$file = $_FILES['file'];
			//print_r($file);
			$fileName = $file['name'];
			$fileTmpName = $file['tmp_name'];
			$fileSize = $file['size'];
			$fileError = $file['error'];

			$fileExt = explode('.', $fileName);
			$fileActExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png');
			


				if (!in_array($fileActExt, $allowed)) 
				{
					$eth_ok=false;
					$_SESSION['e_file']="There was an error uploading your file! ";
				}

				if ($fileError === 1 )
				{
					$eth_ok=false;
				    $_SESSION['e_file']="You cannot upload files of this type! Just .jpg, .jpeg, .png! ";
				}

				if ($fileSize > 1000000) 
				{
					$eth_ok=false;
				    $_SESSION['e_file']="Your file is too big! ";
				}	

		}

	//Try to connect with database
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		try
		{
			$connect = new mysqli($host, $db_user, $db_password, $db_name);
			
			if ($connect -> connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//If email has alreasy exist
				$result = $connect -> query ("SELECT id FROM users WHERE login='$email'");
				if (!$result) throw new Exception($connect->error);

				$amount_email = $result -> num_rows;
				if($amount_email>0)
				{
					$eth_ok= false;
					$_SESSION['e_email'] = "This email is already existed!";
				}

				if ($eth_ok==true)
				{
					if (isset($_POST['yesOrNo']))
						{
							$status = 1; // image was uploaded by user
						}

					if ($connect-> query("INSERT INTO users VALUES (NULL, '$nickname', '$email', '$password1_hash', '')"))
						{
							$photoId = $connect -> query ("SELECT * FROM users WHERE login='$email'");
							$row = mysqli_fetch_assoc($photoId);
							$id = $row['id']; 
							$fileNameNew = $id.".".$fileActExt;
							$fileDestination = '../img/profile_images/'.$fileNameNew;
							if ($status == 1)
							{
								//file is moved after adding to database
								move_uploaded_file($fileTmpName, "../".$fileDestination);
							}
							if($status == 1) $path = $fileDestination;
					        else $path = "../img/profile_pic.png";

					        $sqlpath = "UPDATE users SET photopath='$path' WHERE id='$id';";
					        $resultPath = mysqli_query($connect, $sqlpath);
							$_SESSION['success'] = true;
							header("Location: congratulation.php");
						}
							else
							{
								throw new Exception($connect->error);
							}
				}
					else 
					{
						header("Location: signUp.php");
						exit();
					}

				$connect-> close();
			}
		}
		catch(Exception $e)
		{
			$_SESSION['e_data']="Error of server! Sorry, sign up later, please";
			//<br> Developer's information: ".$e;
		}
	}

?>