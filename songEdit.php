<?php
session_start();
if ($_SESSION["logged_in"]!="yes") {
	header("Location: login.php");
    die();
}


include("includes/profile.class.php");
include("includes/music.class.php");

$profile=new profile;
$music=new music;
?>

<form name="addFriend" action="http://music.myspace.com/index.cfm?fuseaction=music.addSongComplete&Mytoken=F73F94AB-D1DF-4322-889BCEE75B8746291388844046" method="post">
<input type="hidden" name="hashcode" value="MIGLBgorBgEEAYI3WAOYoH0wewYKKwYBBAGCN1gDAaBtMGsCAwIAAQICZgMCAgDABAiVV0+M/4INEwQQbbvoF/4UEAnqCsyhO1fQggRAESCbXFbsqe0cyDv/7P+PHNRmK6P01Vqb2wu/cLxzTGsyiqQDAVzGybe75+xzJbXdKkY/2Mas/R1YQ7DC7mU+tg==">
<input type="hidden" name="songID" value="2118516">
<input type="hidden" name="artist" value="dwele">
<input type="hidden" name="songname" value="Keep On featuring S...">
<input type="hidden" name="ownerID" value="3672102">
<table cellspacing="0" cellpadding="2" border="0" class="blue_border" style="border-collapse: collapse;">
<tr><td>
Do you really want to add this song to your profile?<br><br>
Click "Add" only if you really wish to add this song.<br><br>
<input type="submit" value="Add Song To Profile">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="Cancel" onclick="window.history.back()">
</td></tr>
</table>
</form>
