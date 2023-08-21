<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

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
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font size="2"><b>Videos<br>Upload Video</b></font>
</td>
<td class='txt_label' align="right" valign="bottom">
<a href="videos.php">Back to Videos &gt;&gt;</a>
</td>
</tr>
</table>

<form name='AddListing' action='upload_video_action.php' method='post' enctype='multipart/form-data'>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">

<tr bgcolor="ffffff" valign="middle">
<td width="20%" class='txt_label'>Video Album:</td>
<td width="80%">
<select name='album_id' size='1'>
<option value='0'> ~ Choose One ~ </option>
<?php
     $album_res=$videos->get_member_albums($_SESSION["member_id"]);
     while($album_set=mysql_fetch_array($album_res))
     {
?>
<option value='<?=$album_set["id"]?>'><?=stripslashes($album_set["album_title"])?></option>
<?php
     }
?>
</select> &nbsp; [<a href='create_album.php'>Create New Album</a>]
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Video File:</td>
<td width="86%" class='txt_label'>
<input type='file' name='video_file' size='40'>
<br>
Allowed Formats: *.mpg, *.mpeg,*.asf,*.avi,*.wmv,*.asx
<br><br><font size=2>Max file size: 100 MB. No copyrighted or obscene material.
After uploading, you can edit or remove this video at anytime under the "My Videos" link</font>
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Video Thumbnail:</td>
<td width="86%" class='txt_label'>
<input type='file' name='video_thumbnail' size='40'>
<br>
Allowed Formats: *.jpg, *.jpeg,*.png,*.bmp
<br><br>
<a target="_blank" href="http://images.google.ca/imghp?hl=en">Don't have a picture? Find a pic here.</a>
</td>
</tr>


<tr bgcolor="ffffff" valign="middle">
<td width="20%" class='txt_label'>Video Category:</td>
<td width="80%">
<select name='category' size='1'>
<?php
     $cat_res=$videos->get_all_cat();
     while($cat_set=mysql_fetch_array($cat_res))
     {
?>
<option value='<?=$cat_set["id"]?>'><?=stripslashes($cat_set["cat_name"])?></option>
<?php
     }
?>
</select>
</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Title:</td>
<td width="86%">
<input type='text' name='video_title' size='40'>
</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Caption: (optional)</td>
<td width="86%">
<textarea name="video_caption" rows="5" cols="50" class="verdana12">
</textarea>
</span>
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Tags/Keywords:<br>(use,to separate multiple tags/ keywords)</td>
<td width="86%" class='txt_label'>
<textarea name="video_tags" rows="5" cols="50" class="verdana12"></textarea>
<br>
Ex: enter vacation, hawaii as tags for your Hawaii vacation video.
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Type:</td>
<td width="86%" class='txt_label'>
<input type='radio' value='1' name='video_type' checked>&nbsp;Public<br>
<input type='radio' value='2' name='video_type'>&nbsp;Private ( Circle of Friends & Invitation )<br>
</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Video Codes:</td>
<td width="86%" class='txt_label'>
<input type='radio' value='1' name='video_codes' checked>&nbsp;Yes, it is OK to display video codes <br>
<input type='radio' value='2' name='video_codes'>&nbsp;No, DO NOT display video codes
</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="100%" colspan='2' class='txt_label'>
<?=$site_name?> does not condone activities and actions that breach the rights of copyright owners and absolutely no nudity,
hate or otherwise indecent materials Prior to uploading any material to this website,
please remember that your use of <?=$site_name?> and any material that you upload is subject to this site's <a href='tos.php' target='_blank'>Terms of Use</a>.
It is your responsibility to obey all laws, including laws governing copyright, in each country.
You are uploading from this IP address <?=$_SERVER['REMOTE_ADDR']?>.
</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="100%" colspan='2' class='txt_label'>
<b>Note: don't waste your time uploading pornographic or hate material because we will delete it anyway
( along with you <?=$site_name?> account. )</b>
</td>
</tr>




</table>
<br>
<input type="submit" name="submit" value="- I Agree, Upload My File -"><br>
<br>PLEASE BE PATIENT, THIS MAY TAKE SEVERAL MINUTES.
ONCE COMPLETED, YOU WILL SEE A CONFIRMATION MESSAGE.
</td>
</tr>
</form>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
