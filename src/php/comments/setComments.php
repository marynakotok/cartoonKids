<?php
	 include 'connect.php';

	if (isset($_POST['submit']))
	{
		$message = $_POST['message'];
		$nickname = $_POST['nickname'];
		$date = $_POST['date'];
		$idVideo = $_POST['idVideo'];

		$errorEmpty = false;

		if (empty($message))
		{
			echo "<span class='error-message'>Fill in all fields! </span>";
			$errorEmpty = true;
		}
		else {

				$sql = "INSERT INTO comment (nickname, date, message, idVideo) 
			    VALUES ('$nickname', '$date', '$message', '$idVideo')";
			    $connect->query($sql); 
			echo "<span class='success-message'>Your comment is added!</span>";

		}
	}
			    	
?>

<script >
$(document).ready(function() 
 {
	var errorEmpty = "<?php echo $errorEmpty ?>";
 	if (errorEmpty == false)
 	{
 		$("#commentMessage").val("");
 	}
 });
</script>
