<?php
	session_start();
	include "connect.php";
	$idUser = $_SESSION['id'];


	$result1 = $connect -> query ("SELECT idPlaylist FROM favlists WHERE idUser='$idUser'");
	if (!$result1) throw new Exception($connect->error);
	if ($result1->num_rows > 0) {
	    while($row1 = $result1->fetch_assoc()) 
	    {
	        $idList = $row1["idPlaylist"];
			$result2 = $connect -> query ("SELECT title FROM playlists WHERE idPlaylist='$idList'");
				if (!$result2) throw new Exception($connect->error);
				
				if ($result2->num_rows > 0) 
				{

				    while($row2 = $result2->fetch_assoc()) {
				        echo "<span id='".$row1["idPlaylist"]."' class='getVideos'>".$row2["title"]."</span><br>";
				    }
				}  
	    }
	}  else 
			  {
			    echo "No playlists!";
			  }

	
		

	//echo "correct";
	$connect->close();
			    	
?>