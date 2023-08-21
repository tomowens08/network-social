<div align="center">
  <table width="800" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td bgcolor="6698CB">
			<table width="800" border="0" cellpadding="5">
				<tr>
				  <td><div align='left'>
			<a href="http://www.mydatinglounge.com">myDatingLounge.com</a></div>
				  </td>
				  <td>  <div align='right'>
			<a href="http://www.mylounges.com">myLounges.com</a></div>
				  </td>
				</tr>
			  </table>
	  </td>
    </tr>
	

	<tr>
      <td height="96" align="center" valign="middle" bgcolor="003399">
	  <?php include("ad_top.php");
		?>
</td>
    </tr>
    
	<tr>
			<td width="800" bgcolor="6698CB">
	
			<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr valign="middle">
					
					 <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="navbar" href="logincomplete.php">Home</font></a>&nbsp;|
            <?php
}
else
{
?>
            <a class="navbar" href="index.php">Home</a>&nbsp;|
            <?php
}
?>
            <a class="navbar" href="browse.php">Browse</a>&nbsp;|
            <a class="navbar" href="rate_photos.php">Rate Photos</a>&nbsp;|
            <a class="navbar" href="blog.php">Blog</a>&nbsp;|
            <a class="navbar" href="view_bookmarks.php?page=1">Bookmarks</a>&nbsp;|
            <a class="navbar" href="message_board.php">Forum</a>&nbsp;|
            <a class="navbar" href="groups.php">Groups</a>&nbsp;|
            <a class="navbar" href="events.php">Events</a>&nbsp;|
            <a class="navbar" href="classified.php">Classifieds</a>&nbsp;|
            <a class="navbar" href="view_all_journal.php">Journal</a>&nbsp;|
            <a class="navbar" href="videos.php">Videos</a>&nbsp;|
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="navbar" href="music.php">Music</a>&nbsp;|
            <?php
}
else
{
?>
            <a class="navbar" href="music_signup.php">Music</a>&nbsp;|
            <?php
}
?>
            
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="navbar" href="logout.php">Log Off</a>
            <?php
}
else
{
?>
            <a class="navbar" href="join_us.php">Join Us</a> |
            <a class="navbar" href="login.php">Login</a>
            <?php
}
?>
					
					
				</tr>
			</table>
	
		</td>
	</tr>
  </table>
</div>