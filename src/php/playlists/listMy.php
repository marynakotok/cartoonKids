<?php
	session_start();
	include "connect.php";
	$idUser = $_SESSION['id'];

	$result = $connect -> query ("SELECT title, idPlaylist FROM playlists WHERE idUser='$idUser'");
	if (!$result) throw new Exception($connect->error);
	
	if ($result->num_rows > 0) {

	    while($row = $result->fetch_assoc()) {
	        echo "<span id='".$row["idPlaylist"]."' class='getVideos'>".$row["title"]."</span><br>";
	    }

	}  else 
			  {
			    echo "No playlists!";
			  }
		

	//echo "correct";
	$connect->close();		    	
?>