<?php
	session_start();
	include "connect.php";

	//header('Location: playlists.php');
	$_SESSION['click'] = $_POST['click']; //uncomment

	$idVideo = $_POST['idVideo'];
	$result = $connect -> query ("SELECT * FROM videos WHERE idVideos='$idVideo'");
	if (!$result) throw new Exception($connect->error);
	if (isset($_SESSION['logged']))
	{
		$result2 = $connect -> query ("SELECT nickname FROM users WHERE id='".$_SESSION['id']."'");
	    if (!$result2) throw new Exception($connect->error);
	    $row2 = $result2->fetch_assoc();
	}
	
    $row = $result->fetch_assoc();
    $descriptionPieces = explode("*", $row["description"]);
    $size = sizeof($descriptionPieces);
	    	echo 
	    	"<div id='main'><img id='mainV' src='".$row["path"]."' ></div>
		     <div id='informVideo'><br><span id='title'>title: ".$row["title"]."<span><br><br>
		     views: <span id='views'>".$row["views"]."<span>
		     likes: <span id='likes'>".$row["likes"]."<span>
		     dislikes: <span id='dislikes'>".$row["dislikes"]."<span>
		     <img id='share' src='../img/share.png'><img id='addTo' src='../img/add.png'><br><br>
		     description: ";
		        for ($i = 0; $i < $size; $i++)
		        {
			    	echo $descriptionPieces[$i]."<br>";
		        }
		    echo "<br><br></div><div id='comments'></div>";

	        if (isset($_SESSION['logged']))
				{
					echo "<form id='form-set'>
					<input type='hidden' name='nickname' id='nickname' value='".$row2['nickname']."'>";
				}
				  else 
				  {
				  	echo "<form method='post' action='in/signIn.php' id='form-set2'>
				  	<input type='hidden' name='nickname' id='nickname' value='anonymous'>";
				  }
	        
	            echo "<input type='hidden' name='date' id='date' value='".date('Y-m-d H:i:s')."'>
	                  <input type='hidden' name='idVideo' id='idVideo' value='".$idVideo."'>
	                  <textarea name='message' id='commentMessage' placeholder='Write a comment...'></textarea><br><br>
	                  <button class='button' id='commentButton' type='submit' name='commentSubmit'>Comment</button>
	                  <p id='form-message'> </p>
	                  </form>";
	        echo "<div class='box' id='box'></div>";
	        echo "<button class='btn_more' id='btn_more'>More comments</button>
			</div>";    
	
	//$connect->close();	   	
?>