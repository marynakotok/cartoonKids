<?php
	session_start();
  
	if (!isset($_SESSION['logged']))
	{
		header('Location: in/signIn.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cartoons-PLAYLISTS</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/playlists.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <!-- Modal Box -->
	<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&#x2718;</span>
      <h1>Create a new playlist</h1>
    </div>
    <div class="modal-body">
    <form method="post" action="#" id="form">
    <br>
      <input type="text" name="title" id="title" placeholder="Enter the title of new playlist">
      <br>
      <input type="radio" name="type" id="type1" value="Private">
      <label for="type1">Private</label><br>
      <input type="radio" name="type" id="type2" value="Public">
      <label for="type2">Public</label><br>
      <input type="radio" name="type" id="type3" value="Collaborative list">
      <label for="type3">Collaborative list</label><br>
			<span id="result"></span>
      <input type="submit" class="button" name="add" id="add" value="Add"><br><br>
    </form>
    </div>
  </div>
</div>

<!-- Navigation bar -->
    <ul>
      <?php
    if (!isset($_SESSION['logged']))
    	 { echo "<img class='nav' id='profile' src='../img/profile_pic.png'>";}
    else { echo "<img class='nav' id='profile' src='".$_SESSION['photopath']."'>"; }

		echo "<a href='index.php'><img class='nav' id='logo' src='../img/logo.png'></a>";
		echo "<img class='nav' id='menu' src='../img/options.png'>";

	if (!isset($_SESSION['logged']))
	     { echo "<a href='in/signIn.php'><img class='nav' id='login' src='../img/login.png'></a>";}

	else { echo "<a href='signOut.php'><img class='nav' id='login' src='../img/signout.png'></a>";}

	?>
    </ul>

  <!-- Menu -->
  <div class="menu">
  <form>
    <button class="option" id="home" formaction="index.php"><i class="fa fa-home"></i> HOME</button><br>
    <?php
		if (isset($_SESSION['logged']))
	    echo "<button class='option' id= 'list' formaction='playlists.php'><i class='fa fa-list-alt'></i> MY PLAYLISTS</button><br>";
	    else echo "<button class='option' id= 'list' formaction='in/signIn.php'><i class='fa fa-list-alt'></i> MY PLAYLISTS</button><br>";
    ?>
    <button class="option" id="help" formaction="https://support.google.com/?hl=es"><i class="fa fa-question-circle"></i> HELP</button>
  </form>
</div>

  <div class="menu">
    <img class="person" id="boy1" src="../img/boy1.png"><br>
    <img class="person" id="girl" src="../img/girl.png"><br>
    <img class="person" id="boy2" src="../img/boy2.png">
  </div>


    <div class="row">
      <br>
  <!--Search engine -->
  <div class="search-container">
   <form action="index.php">
     <input type="text" placeholder="LET'S EXPLORE!" name="search">
     <button type="submit"><i class="fa fa-search"></i></button>
   </form>
 </div>

<!--Playlists -->
<div id="listPlaylist" >
	<div  class= "PL" id="myPlaylist">
		<h2>My Playlists</h2>
		<button id="addPlaylist" formaction=""><i class="fa fa-plus-circle"></i>Add New Playlist</button><br>
		<div class="videoList" id="listMy"></div>
	</div>

	<div class="PL" id="followPlaylist">
	<h2>Following Playlists</h2>
		<div class="videoList" id="listFollow"></div>
	</div>
</div>

<div id="currentPlaylist">
	  <div id="selectPL">Select your playlist to see videos here!</div>
	   <div id="videos">
		 <!-- <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		 <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		 <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		 <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		<img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		<img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		<img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		<img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">
		<img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"> -->
	 </div>
</div>

    </div>

  <!-- Footer -->
    <div class="footer col-12 col-m-12">
      <br>
        <p><a class="link" href="index.php">FAQs</a> &emsp; | &emsp; <a class="link" href="index.php">About Us</a> &emsp; | &emsp; <a class="link" href="index.php">Contact</a></p>
    </div>
<script src="../script/playlists.js"></script>
<script src="../script/betweenExternal.js"></script>
</body>
</html>
