
<div id="top">
  <table width="800" border="0" cellpadding="5">
    <tr>
      <td bgcolor="#EBEBEB"><div align='left'>
<a href="http://www.fusn.ons2.com">communitysite.com</a></div>
      </td>
      <td>  <div align='right'></div>
      </td>
    </tr>
  </table>

  
</div>

<div id="header" align='center' vertical-align='middle';>
  <?php
include("ad_top.php");
?>

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
            <a class="nav" href="polls.php">Polls - New</a>&nbsp;|
            <a class="nav" href="blog.php">Blog</a>&nbsp;|
            <a class="nav" href="chat.php">Chat</a>&nbsp;|
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


