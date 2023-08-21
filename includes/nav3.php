<!-- Nav.php -->
<TABLE cellSpacing=0 cellPadding=0 width=700 align=center border=0>
<TBODY>
<TR>
<TD vAlign=top align=middle>
<!--<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="717" height="94" valign="top"><img src="images/logo.gif" style="margin-top:1px"></table>
-->
<TABLE cellSpacing=0 cellPadding=0 width="780" align=center border=0>
<TBODY>
<TR>
<TD><div align="left"><a href="http://www.mydatinglounge.com">myDatingLounge.com</a></div></TD>
</TR></TBODY></TABLE>
</TD>
</TR>
<TR>
<TD vAlign=top>
<TABLE width="100%"><!-- #BeginEditable "CODE" -->
<TBODY>
<TR>
<TD width="100%">

<TABLE cellPadding=0 width="780" align=center border=0 cellspacing="0">
<TBODY>
<TR>

</TR><div align="center">

<!-- AdSpeed.com Serving Code 7.6 -->
<script type="text/javascript">var a=new Date();var q='&tz='+a.getTimezoneOffset()/60 +'&ck='+(navigator.cookieEnabled?'Y':'N') +'&jv='+(navigator.javaEnabled()?'Y':'N') +'&scr='+screen.width+'x'+screen.height+'x'+screen.colorDepth +'&r='+Math.random() +'&ref='+escape(document.referrer.substr(0,80)) +'&uri='+escape(document.URL.substr(0,80));document.write('<ifr'+'ame width="728" height="90" src="http://g.adspeed.net/ad.php?do=html&zid=9053&wd=728&ht=90&target=_top'+q+'" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"></ifr'+'ame>');</script>
<noscript><iframe width="728" height="90" src="http://g.adspeed.net/ad.php?do=html&zid=9053&wd=728&ht=90&target=_top" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"><a href="http://g.adspeed.net/ad.php?do=clk&zid=9053&wd=728&ht=90&pair=as" target="_top"><img style="border:0px;" src="http://g.adspeed.net/ad.php?do=img&zid=9053&wd=728&ht=90&pair=as" height="90" width="728"/></a></iframe>
</noscript><!-- AdSpeed.com End -->

</div><TBODY><TR><TD><TABLE class=white width="100%" bgColor=#333333 border=0>
<tbody>
<tr>
<TD vAlign=center class="nav" align=middle>

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
<a class="nav" href="help.php"></TD>
</TR></TBODY></TABLE>

</TD>
</TR>

<?php
    include("includes/right_all_menu.php");
?>
<!-- Nav.php -->
