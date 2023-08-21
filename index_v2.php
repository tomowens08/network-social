<?php
@session_start();
if ($_SESSION['member_id']) {

	header('Location: logincomplete.php');
	exit;
}

include("includes/conn.php");

?>
<link href="master.css" rel="stylesheet" type="text/css">
<link href="splashNew.css" rel="stylesheet" type="text/css">


<body id="splash" bgcolor="#E5E5E5" text="#000000" alink="#003399" vlink="#003399" link="#003399"  class="">

<div id="wrap">

  <div id="top">
  
  Content for  id "top" Goes Here
  
  </div>
  <div id="header">
  
  </div>
  
  <div id="topnav">
  
  <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="white" href="logincomplete.php"><font color="#FFFFFF" size="2" face="MS Sans Serif">Home</font></a>&nbsp;|
            <?php
}
else
{
?>
            <a class="nav" href="index.php">Home</a>&nbsp;|
            <?php
}
?>
            <a class="nav" href="browse.php">Browse</a>&nbsp;|
            <a class="nav" href="rate_photos.php">Rate Photos</a>&nbsp;|
            <a class="nav" href="most_popular.php">Popular</a>&nbsp;|
            <a class="nav" href="blog.php">Blog</a>&nbsp;|
            <a class="nav" href="view_bookmarks.php?page=1">Bookmarks</a>&nbsp;|
            <a class="nav" href="message_board.php">Forum</a>&nbsp;|
            <a class="nav" href="groups.php">Groups</a>&nbsp;|
            <a class="nav" href="events.php">Events</a>&nbsp;|
            <a class="nav" href="classified.php">Classifieds</a>&nbsp;|
            <a class="nav" href="view_all_journal.php">Journal</a>&nbsp;|
            <a class="nav" href="videos.php">Videos</a>&nbsp;|
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="nav" href="music.php">Music</a>&nbsp;|
            <?php
}
else
{
?>
            <a class="nav" href="music_signup.php">Music</a>&nbsp;|
            <?php
}
?>
            
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="nav" href="logout.php">Log Off</a>
            <?php
}
else
{
?>
            <a class="nav" href="join_us.php">Join Us</a> |
            <a class="nav" href="login.php">Login</a>
            <?php
}
?>
            
  

  <!-- Nav.php -->
  
  </div>
  
  
  
  
  <div id="main">
  
  	<div id="nav">
	
	
	</div>
	
	
    <div id="content">
	
	  <div id="contentWrap">
	  
	  		<div id="splash_login" class="section">


	<h5 class="heading">Member Login</h5>
	<form name="frm" method="post" action="login1.php">
		<div class="row">
			<label for="email">E-Mail:</label>
			<INPUT value="<?=$_COOKIE['member_email']?>" name="email">
		</div>
		<div class="row">
			<label for="password">Password:</label>
			<INPUT type=password name="password"><br />
		</div>
		<div class="clear" style="margin-left:-8px; margin-bottom:3px;">
			<input type="checkbox" name="remember_me" checked value="1">
			<label for="checkbox">Remember Me</label><br />
		</div>
		<div style="margin-left:21%">
			<INPUT class=txt_topic style="WIDTH: 70px" type=submit value="Login" name="btnsubmit">
			<input class=txt_topic style="WIDTH: 80px" onClick="document.location.href='join_us.php';return false;" type=button value="Sign Up" name=btnreg><br />
			<div style="margin-top:10px"><a href=""forgot_password.php"" class="alignC">Forgot your password?</a></div>
			<div class="clear"></div>
		</div>
	</form>
</div>
	  
	  </div>
	</div>
	
  </div>
</div>

</body>