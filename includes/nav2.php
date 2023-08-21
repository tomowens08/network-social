<!-- Nav.php -->
<title>YPN - Your Personal Network | a social network</title><TABLE cellSpacing=0 cellPadding=0 width=100% align=center border=0>
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

<TABLE cellPadding=0 width="100%" align=right border=0 cellspacing="0">
<TBODY>
<TR></TR>

<table width="100%" border="0" align="right" background-color="#4682B4">
  <tr>
    <th colspan="2" bgcolor="#4682B4" scope="col"><div align="right"><a href="http://www.idevinteractive.com" class="nav">idevinteractive.com</a></div></th>
  </tr>
  <tr bgcolor="#4682B4">
    <th width="37%" height="64" align="left" valign="middle" scope="col">
<!-- START CODE --> 
	<div id="ysrchForm" style="border:1px solid #7E9DB9;
                               background:#FFFFFF;
                               width:300px;
                               margin:0 auto;
                               padding:20px; 
                               position:relative;
                             ">
          <form id="searchBoxForm_U0c208bfb8affb15908f1" action="http://builder.search.yahoo.com/a/bouncer" style="padding:0;">
                        <input name="mobid" value="U0c208bfb8affb15908f1" type="hidden">
			<input name="ei" value="UTF-8" type="hidden"><input name="fr" value="ystg-c" type="hidden"><div style="padding:0 80px 0 0;zoom:1;">
					<input type="text" id="searchTerm"
						onFocus="this.style.background='#fff';"
						onBlur="if(this.value=='')this.style.background='#fff url(http://us.i1.yimg.com/us.yimg.com/i/us/sch/gr/horiz_pwrlogo_red2.gif) 3px center  no-repeat'"
						name="p" style=" margin:1px 0; width:100%; border:1px solid #7E9DB9; color:#666666; height:18px; padding:0px 3px; background:#fff url(http://us.i1.yimg.com/us.yimg.com/i/us/sch/gr/horiz_pwrlogo_red2.gif) 3px center no-repeat; position:relative;">
					<input type="submit" id="btn_U0c208bfb8affb15908f1" value="Search" 
						style=" padding-bottom:2px; position:absolute; right:20px; top:20px; margin:0px; height:22px; width:65px; ">
</div><ul style="color:#666666;
           font:11px/11px normal Arial, Helvetica, sans-serif;
	   margin:0;
	   padding:0;
	   text-align:left;
	   list-style-type:none;"><li style="display:inline;padding-right:10px;">
<input name="mobvs" id="site_U0c208bfb8affb15908f1" value="1" onclick='displayPopSearch("site","U0c208bfb8affb15908f1");'  checked="checked" type="radio" style="vertical-align:middle;margin-right:5px; ">
<label for="site_U0c208bfb8affb15908f1" style="display:inline;vertical-align:middle; padding-top:2px;">this Site</label>
</li><li style="display:inline;padding-right:10px;">
<input name="mobvs" id="news_U0c208bfb8affb15908f1" value="news" onclick='displayPopSearch("news","U0c208bfb8affb15908f1");'   type="radio" style="vertical-align:middle;margin-right:5px; ">
<label for="news_U0c208bfb8affb15908f1" style="display:inline;vertical-align:middle; padding-top:2px;">News</label>
</li></ul></form></div>
<!-- END CODE --> 

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
          <TD align=middle vAlign=center bgcolor="#4682B4 " class="nav">
            
            <div align="center">
              <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
              <a href="index.php" class="nav">Home</a>&nbsp;| <a href="logincomplete.php" class="nav">EditMe</font></a>&nbsp;| <span class="nav"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">Your Profile</a></span> | <?php
}
else
{
?>
              <span class="nav"><a href="index.php" class="nav">Home</a>&nbsp;</span>|
              <?php
}
?>
              <span class="nav"><a href="browse.php" class="nav">Browse</a>&nbsp;| <a href="rate_photos.php" class="nav">Rate Photos</a> | <a class="nav" href="polls.php">Polls - New</a>&nbsp;|</span> <span class="nav"><a href="most_popular.php" class="nav">Popular</a>&nbsp;| <a href="blog.php" class="nav">Blog</a></span>&nbsp;|
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
            </div></TD>
      </TR></TBODY></TABLE></TD>
  </TR>
  
  <?php
   // include("includes/right_all_menu.php");
?>
  <!-- Nav.php -->
 
