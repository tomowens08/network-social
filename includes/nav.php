

<title>REVELLIN - social network , grow your friends and contacts</title>
<style type="text/css">
<!--
#topnav {
	background-color: #000000;
}
.style1 {color: #FF9900}
-->
</style>
<div id="top">
  <table width="100%" border="0" align="center" cellpadding="5">
    <tr>
      <td><div align='left'>
<a href="http://www.idevinteractive.com/socialnetwork" class="style1">YPN</a></div>      </td>
    </tr>
  </table>

  
</div>

<div id="header" align='centre' valign='middle';>
 
<table width="100%" border="0" align="center">
  <tr>
    <td width="306" align="left" valign="middle">	<!-- Google CSE Search Box Begins  -->
<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-" style="background-color:#;color:#">
  <div class="cse-branding-form">
    <form action="http://www.google.com/cse" id="searchbox_009603306008850351757:dzmmfeaqrmu">
      <input type="hidden" name="cx" value="009603306008850351757:dzmmfeaqrmu" />
      <input type="text" name="q" size="25" />
      <input type="submit" name="sa" value="Search" />
    </form>
  </div>
  <div class="cse-branding-text">Search</div>
</div>
<!-- Google CSE Search Box Ends --></td>
    <td width="484" align="center" valign="middle"><?php 
	include ("ad_top.php");
	?></td>
  </tr>
</table>
</div>
  
<div id="topnav">
  
  <div align="center">
    <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
    <span class="nav"><a class="nav" href="index.php">Home</a></span> <span class="style1">|</span>    <a href="logincomplete.php" class="nav"> EditMe</font></a>&nbsp;<span class="style1">|</span> <span class="nav"><a class="nav" href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">Your Profile</a></span> <span class="style1">|</span>
    <a href="../search.php" class="nav">Find</a> <span class="style1">|</span> <?php
}
else
{
?>
    <span class="nav"><a class="nav" href="index.php">Home</a>&nbsp;<span class="style1">|</span></span>
    <?php
}
?>
    <span class="nav"><a class="nav" href="browse.php">Browse</a>&nbsp;<span class="style1">|</span> <a href="rate_photos.php" class="nav">Rate Photos</a> <span class="style1">|</span> <a class="nav" href="polls.php">Polls</a>&nbsp;<span class="style1">| <a class="nav" href="invite.php">Invite</a> |</span> <a class="nav" href="blog.php">Blog</a>&nbsp;<span class="style1">|</span> <a class="nav" href="chat.php">Chat</a>&nbsp;<span class="style1">|</span> <a class="nav" href="message_board.php">Forum</a>&nbsp;<span class="style1">|</span> <a class="nav" href="groups.php">Groups</a>&nbsp;<span class="style1">|</span> <a class="nav" href="events.php">Events</a>&nbsp;<span class="style1">|</span> <a class="nav" href="classified.php">Classifieds</a>&nbsp;<span class="style1">|</span> <a class="nav" href="view_all_journal.php">Journal</a>&nbsp;<span class="style1">|</span> <a class="nav" href="videos.php">Videos</a>&nbsp;</span><span class="style1">|</span>
    <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
    <span class="nav"><a class="nav" href="music.php">Bands</a>&nbsp;<span class="style1">|</span></span>
    <?php
}
else
{
?>
    <span class="nav"><a class="nav" href="music_signup.php">Bands</a>&nbsp;<span class="style1">|</span></span>
    <?php
}
?>
    
    <span class="nav"><a class="nav" href="commingsoon.html">More</a> </span><span class="style1">|</span>
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
    <span class="nav"><a class="nav" href="join_us.php">Join Us</a> <span class="style1">|</span>
      <a class="nav" href="login.php">Login</a></span>
    <?php
}
?>
    
    
    
    <!-- Nav.php -->
  </div>
</div>


