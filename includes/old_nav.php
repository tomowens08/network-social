<!-- Nav.php -->
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=700 align=center border=0>
<TBODY>
<TR>
<TD vAlign=top align=middle>
<TABLE cellSpacing=0 cellPadding=0 width="780" align=center border=0>
<TBODY>
<TR>
<TD><a class='bold_gray' href="http://www.mydatinglounge.com"  target='_blank'>myDatingLounge.com</a></TD>
</TR></TBODY></TABLE>
<p align="center">

<!-- Max Media Manager Javascript Tag
  --
  -- Generated with Max v0.3.20-alpha
  --
  -- The noscript section of this tag has been generated for use on a
  -- non-SSL page. If this tag is to be placed on an SSL page, change the
  --   'http://www.ruskidom.com/max/www/delivery/...'
  -- to
  --   'https://www.ruskidom.com/max/www/delivery/...'
  --
  -- This noscript section of this tag only shows image banners. There
  -- is no width or height in these banners, so if you want these tags to
  -- allocate space for the ad before it shows, you will need to add this
  -- information to the <img> tag.
  --
  -- If you do not want to deal with the intricities of the noscript
  -- section, delete the tag (from <noscript>... to </noscript>). On
  -- average, the noscript tag is called from less than 1% of internet
  -- users.
  -->

<!-- AdSpeed.com Serving Code 7.6 -->
<script type="text/javascript">var a=new Date();var q='&tz='+a.getTimezoneOffset()/60 +'&ck='+(navigator.cookieEnabled?'Y':'N') +'&jv='+(navigator.javaEnabled()?'Y':'N') +'&scr='+screen.width+'x'+screen.height+'x'+screen.colorDepth +'&r='+Math.random() +'&ref='+escape(document.referrer.substr(0,80)) +'&uri='+escape(document.URL.substr(0,80));document.write('<ifr'+'ame width="728" height="90" src="http://g.adspeed.net/ad.php?do=html&zid=9053&wd=728&ht=90&target=_top'+q+'" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"></ifr'+'ame>');</script>
<noscript><iframe width="728" height="90" src="http://g.adspeed.net/ad.php?do=html&zid=9053&wd=728&ht=90&target=_top" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"><a href="http://g.adspeed.net/ad.php?do=clk&zid=9053&wd=728&ht=90&pair=as" target="_top"><img style="border:0px;" src="http://g.adspeed.net/ad.php?do=img&zid=9053&wd=728&ht=90&pair=as" height="90" width="728"/></a></iframe>
</noscript><!-- AdSpeed.com End -->

&nbsp;</p></TD></TR>
<TR>
<TD vAlign=top>
<TABLE width="100%"><!-- #BeginEditable "CODE" -->
<TBODY>
<TR>
<TD width="100%">

<TABLE cellPadding=0 width="780" style="background-color:#000000" align=center border=0 cellspacing="0">
<TBODY>
<TR>
<TD>
<TABLE width="100%" border=0>
<tbody>
<tr>
<TD vAlign=center class="nav" align=middle>

<?php
if ($_SESSION["logged_in"]=="yes")
{
?>
<span class="style1"><a class="white" href="logincomplete.php"><font size="2" face="MS Sans Serif">Home</font></a>&nbsp;</span>|
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
<a class="nav" href="help.php"></TD>
</TR></TBODY></TABLE>

</TD>
</TR>

<?php
    include("includes/right_all_menu.php");
?>
<!-- Nav.php -->
