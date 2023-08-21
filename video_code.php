<?php
session_start();
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<?php
    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
?>

<!-- Classified Entry -->

<table height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<table border="0" cellspacing="0" cellpadding="0" width="760" align="center">
<tr><td>
<img src="images/videocodes.gif" alt="" width="85" height="15" border="0">
</td>
<td align="right">
<a href="view_video.php?id=<?=$HTTP_GET_VARS["id"]?>"><img src="images/left.gif" alt="" width="15" height="11" border="0" align="middle"></a> &nbsp;<a href="view_video.php?id=<?=$HTTP_GET_VARS["id"]?>">Go Back</a> </td>
</tr>
</table>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function copyit(theField)
{
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
therange=tempval.createTextRange()
therange.execCommand("Copy")
}
//  End -->
<!-- Begin
function copyit2(theField)
{
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
therange=tempval.createTextRange()
therange.execCommand("Copy")
}
//  End -->
</script>
<br>


<table  width="750"   border="0" align="center" cellspacing="01" cellpadding="0" >
<tr>
<td class='txt_label'>
Follow instructions below to get HTML codes for this video. <br>
<strong>Please DO NOT alter HTML codes,
<u>altering HTML  codes  will result in video not being played correctly on your webpage</u></strong>.
</td>
</tr>
</table>
<br>
<?php
     $video_set=$videos->get_video($HTTP_GET_VARS["id"]);
?>

<table  width="750"   border="0" align="center" cellspacing="1" cellpadding="4" bgcolor="ffcc99" >
<tr><td class='txt_label'>
1) <strong>Share this video</strong> - click on text box below and copy URL to forward via email or IM to friends
</td>
</tr>
<form name=it>
<tr bgColor="ffffcc">
<td valign="top" class='txt_label'>
<table class="size11" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" >
<tr><td class='txt_label'>
<textarea onclick="copyit('it.url1')" readonly cols="50" rows="2" class="inp" style="width:740px;height:60 " name="url1" >
<?=$site_url?>view_video.php?id=<?=$HTTP_GET_VARS["id"]?>
</textarea>
<img src="images/spacer.gif" alt="" width="1" height="2" border="0"><br>
</td></tr>
</table>
</td>
</tr>
</table>
<img src="images/spacer.gif" alt="" width="1" height="8" border="0"><br>
<table  width="750"  border="0" align="center" cellspacing="1" cellpadding="4" bgcolor="ffcc99" >
<tr><td class='txt_label'>
2) <strong>Codes to play video from your website</strong> - click on text box below, copy codes and insert to your web page or online journal where HTML codes are allowed.
</td></tr>
<tr bgColor="ffffcc">
<td valign="top" >
<table class="size11" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" >
<tr><td>
<textarea onclick="copyit('it.url3')" readonly cols="50" rows="2" class="inp" style="width:740px;height:90 " name="url3" >
<table border="0"  bgcolor="ffffff" cellpadding="0" cellspacing="0"><tr><td>
<embed src="<?=$site_url?><?=$video_set["asx_file"]?>" AutoStart=1 ShowStatusBar=1 volume=-1 HEIGHT=320 WIDTH=303>
</embed>
</td></tr>
<tr><td align="right">
<font face="arial" size="1">
<strong>Free  video hosting, video codes at <a href="<?=$site_url?>"><font face="arial" size="1"><?=$site_name?></a></strong>
<br><font face='arial' size='1'>All Copyrights, All trademarks and Copyrights Held By Respective Owners.</font>
</font></td></tr></table>
</textarea>
<img src="images/spacer.gif" alt="" width="1" height="5" border="0"><br>
<br><img src="images/spacer.gif" alt="" width="1" height="5" border="0"><br>
</td></tr>
</table>
</td>
</tr>
</form>
</table>

<!-- video details -->


</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
$aa=$videos->update_last_viewed($video_id,$_SESSION["member_id"]);
include("includes/bottom.php");
?>
