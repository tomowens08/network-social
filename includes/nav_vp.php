<!-- Nav.php -->
<title>YPN - a social network</title><TABLE cellSpacing=0 cellPadding=0 width=700 align=center border=0>
<TBODY>
<TR>
<TD vAlign=top align=middle>&nbsp;</TD>
</TR>
<TR>
<TD vAlign=top>
<TABLE width="100%"><!-- #BeginEditable "CODE" -->
<TBODY>
<TR>
<TD width="100%">

<TABLE cellPadding=0 width="780" align=center border=0 cellspacing="0">
<TBODY>
<TR></TR>

<table width="100%" border="0" align="center">
  <tr>
    <th colspan="2" scope="col"><div align="left"><a href="http://www.revellin.com" class="nav">revellin.com</a></div></th>
  </tr>
  <tr>
    <th width="37%" height="64" align="left" valign="middle" scope="col">
<!-- Google CSE Search Box Begins  -->
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
<!-- Google CSE Search Box Ends --> 

      </div></th>
    <th width="63%" align="center" valign="middle" scope="col"><div align="center">
	  <?php 
	include ("ad_top.php");
	?>
	  </div></th>
    </tr>
</table>
<TBODY>
  <TR>
    <TD><TABLE width="100%" border=0 align="center" class=white>
      <tbody>
        <tr>
          <th align=middle vAlign=center bgcolor="#FFFFFF" class="nav">
            
            <div align="center">
              <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
              <a href="index.php" class="nav">Home</a>&nbsp;| <a href="logincomplete.php" class="nav">EditMe</font></a>&nbsp;| <span class="nav"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">Profile</a></span> | <?php
}
else
{
?>
              <span class="nav"><a href="index.php" class="nav">Home</a>&nbsp;</span>|
              <?php
}
?>
              <span class="nav"><a href="browse.php" class="nav">Browse</a>&nbsp;| <a href="rate_photos.php" class="nav">Rate</a> | <a class="nav" href="polls.php">Polls</a>&nbsp;| <a class="nav" href="invite.php">Invite</a> |</span> <span class="nav"><a href="most_popular.php" class="nav">TMC</a>&nbsp;| <a href="blog.php" class="nav">Blog</a></span>&nbsp;|
              <?php
if ($_SESSION["logged_in"]=="yes")
{
?>            
              <a href="chat.php"> </a>                        <a href="chat.php" class="nav">Chat</a>
              |
              <?php
}
else
{
?> 
              <a href="chat_signup.php" class="nav">Chat</a> |
              <?php
}
?>            
              <a href="view_bookmarks.php?page=1" class="nav">Bookmarks</a><span class="nav">&nbsp;| </span><span class="nav"><a href="message_board.php" class="nav">Forum</a>&nbsp;| <a href="groups.php" class="nav">Groups</a>&nbsp;| <a href="events.php" class="nav">Events</a></span><span class="nav">&nbsp;|</span> <span class="nav"><a class="nav" href="classified.php">Classifieds</a>&nbsp;| <a class="nav" href="view_all_journal.php">Journal</a>&nbsp;| <a class="nav" href="videos.php">Videos</a>&nbsp;|</span>
              <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
              <span class="nav"><a href="music.php" class="nav ">Bands</a></span><span class="nav">&nbsp;| </span>
              <?php
}
else
{
?>
              <span class="nav"><a href="music_signup.php" class="nav">Bands</a></span><span class="nav">&nbsp;|</span>
              <?php
}
?>
              <span class="nav"><a href="commingsoon.html" class="nav">More</a></span><span class="nav"> | </span>
              <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
              <a href="logout.php" class="nav">Log Off</a>
              <?php
}
else
{
?>
              <span class="nav"><a href="join_us.php" class="nav">Join Us</a></span>
              <?php
}
?>
            </div></th>
      </TR></TBODY></TABLE></TD>
  </TR>
  
  <?php
   // include("includes/right_all_menu.php");
?>
  <!-- Nav.php -->
 
