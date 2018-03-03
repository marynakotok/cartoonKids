<?php
 include 'connect.php';
$commentNewto = $_POST['commentNewto'];
$sql = "SELECT * FROM comment LIMIT $commentNewto";
  	$result = mysqli_query($connect, $sql);
  	if (mysqli_num_rows($result) > 0 )  
  	{
  		while($row = mysqli_fetch_assoc($result))
	  	{
	  		  echo "<div class='".$row['idComment']."' id='comment_box'> <p>";
		  		echo "<span class='Ucomment'>".nl2br($row['nickname'])."</span><br>";
		  		echo "<span class='Dcomment'>".nl2br($row['date'])."</span><br>";
		  		echo "<span class='Mcomment'>".nl2br($row['message'])."</span></div>";
	  	}
  	}
  	else {
  		echo "No comments yet!";
  	}	
?>