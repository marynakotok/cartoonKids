<?php
	session_start();
	include "connect.php";
	//echo "correct";

	if (isset($_POST['submit']))
	{
		$title = $_POST['title'];
		

		$error = false;
	    $errorLen = false;

			if (!isset($_POST['type']))
			{
				$error=true;
			}
			if (empty($title))
			{
				$error = true;
			} 
			if((strlen($title)<3) || (strlen($title)>15))
			{
			  $errorLen = true;
			}
			if (ctype_alnum($title) == false)
				   $errorLen = true;

			if ($error == true)
				echo "<span class='error-message'>Fill in all fields! </span>";
			elseif ($errorLen == true) {
				echo "<span class='error-message'>Title has to include from 3 to 15 signs and just numbers or letters! </span>";
			}
			else 
			{
				$type = $_POST['type'];
				$idUser = $_SESSION['id'];

					$sql = "INSERT INTO playlists (title, amVid, type, idUser) 
				    VALUES ('$title', '0', '$type', '$idUser')";
				    $connect->query($sql); 

				echo "<span class='success-message'>Playlist is added!</span>";

			}

			//reset box


	}
	$connect->close();		    	
?>

<script >
	
$(document).ready(function() 
 {
	var error = "<?php echo $error ?>";
	var errorLen = "<?php echo $errorLen ?>";
 	if (error == false)
 	{
 		$("#result").val("");
 	}
 	if (errorLen == false)
 	{
 		$("#result").val("");
 	}
 	    $("#title").val("");
 		$("#type1").prop('checked', false);
 		$("#type2").prop('checked', false);
 		$("#type3").prop('checked', false);

 });

</script>