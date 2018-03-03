<?php
	session_start();
  
  include "connect.php";
  $amount = 1;
  $result = $connect -> query ("SELECT path, title, idVideos FROM videos");
        if (!$result) throw new Exception($connect->error);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cartoons-HOME</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
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
<div class="playlists">
  <h1>Recommended Videos</h1>

  <?php
        
        if ($result->num_rows > 0) 
        {
              while($row = $result->fetch_assoc()) 
              {   
                  if ($amount<4)
                  {
                    echo "<img id='".$row["idVideos"]."' class='video' src='".$row["path"]."' frameborder='0' a>
                    <!--<span id='title'>".$row["title"]."</span>-->";
                    $amount = $amount + 1;
                    if ($amount>3) break;
                  }
              } 
        }  

  ?>

 <!-- <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png">-->

  <h1>Movies</h1>

 <!-- <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"> -->
  <?php
        
        if ($result->num_rows > 0) 
        {
              while($row = $result->fetch_assoc()) 
              {   
                  if ($amount<7)
                  {
                    echo "<img id='".$row["idVideos"]."' class='video' src='".$row["path"]."' frameborder='0' a>
                    <!--<span id='title'>".$row["title"]."</span>-->";
                    $amount = $amount + 1;
                    if ($amount>6) break;
                  }
              } 
        }  

  ?>

  <h1>TV Series</h1>
 <!--  <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"> -->
  <?php
        
        if ($result->num_rows > 0) 
        {
              while($row = $result->fetch_assoc()) 
              {   
                  if ($amount<10)
                  {
                    echo "<img id='".$row["idVideos"]."' class='video' src='".$row["path"]."' frameborder='0' a>
                    <!--<span id='title'>".$row["title"]."</span>-->";
                    $amount = $amount + 1;
                    if ($amount>9) break;
                  }
              } 
        }  

  ?>

  <h1>Trending</h1>
  <!-- <img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"><img class="video" src="../img/v1.png"> -->
   <?php
        
        if ($result->num_rows > 0) 
        {
              while($row = $result->fetch_assoc()) 
              {   
                  if ($amount<13)
                  {
                    echo "<img id='".$row["idVideos"]."' class='video' src='".$row["path"]."' frameborder='0' a>
                    <!--<span id='title'>".$row["title"]."</span>-->";
                    $amount = $amount + 1;
                    if ($amount>12) break;
                  }
              } 
        }  
  ?>
</div>

    </div>

  <!-- Footer -->
    <div class="footer col-12 col-m-12">
      <br>
        <p><a class="link" href="index.php">FAQs</a> &emsp; | &emsp; <a class="link" href="index.php">About Us</a> &emsp; | &emsp; <a class="link" href="index.php">Contact</a></p>
    </div>
<script src="../script/index.js"></script>
<script src="../script/betweenExternal.js"></script>
</body>
</html>
