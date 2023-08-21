  <link rel="stylesheet" title="classic" type="text/css" href="style3_chat.css" />
  <link rel="stylesheet" title="classic" type="text/css" href="style4_chat.css" />
  <style type="text/css">
<!--
.style1 {
	font-family: Tahoma;
	font-size: 12px;
}
-->
  </style>
  <div id="top">
  <table width="800" border="0" cellpadding="5">
    <tr>
      <td><div align='left'>
<a href="http://www.ruskidom.com" class="style1">Revellin.com</a></div>
      </td>
      <td>  <div align='right'></div>
      </td>
    </tr>
  </table>

  
</div>

<div id="header_chat" align='center' vertical-align='middle';>
<?php
include("ad_top.php");
?>
</div>
<div class="style1" id="topnav">
  
  <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a href="logincomplete.php" class="white "><font size="2" face="MS Sans Serif">Home</font></a>&nbsp;|
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


