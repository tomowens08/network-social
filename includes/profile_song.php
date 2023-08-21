<?
if ($_GET['del']) {
	$sql = "UPDATE members SET songId = '' WHERE member_id = ".$_SESSION['member_id'];
	mysql_query($sql);
}

if ($_POST['go']) {
	if ($_POST['def']) {
		$sql = "UPDATE music_songs SET def = '1' WHERE id = '".$_POST['def']."'";
		mysql_query($sql);
		$sql = "UPDATE music_songs SET def = '0' WHERE id <> '".$_POST['def']."' AND member_id = ".$_SESSION['member_id'];
		mysql_query($sql);
	} else {
		$sql = "UPDATE music_songs SET def = '0' WHERE member_id = ".$_SESSION['member_id'];
		mysql_query($sql);
	}
}
?>
<table bordercolor=000000 height="80%" cellspacing=0 cellpadding=0 width="100%" bgcolor=ffffff border=0>
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>Edit Profile <b>&gt;&gt;</b> Manage Songs</td>
<td align="right">
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<div align='center'>

<form name="theForm" method="post" action="edit_mprofile1.php?type=songs" enctype='multipart/form-data'>
<table cellpadding="5" cellspacing="0" border="1" class="blue_border" style="border-collapse: collapse;" width="100%">
<tbody>
<tr>
<td class="blue_header" height="10" colspan="3" valign="middle">Upload Song</td>
</tr>
<tr>
<td>
<div align="right"><span class="required">Song Name:</span></div>
</td>
<td><span class="required">
<input type="text" name="song_name" value="" size="40" maxlength="30" onblur="this.value=this.value.replace(/[^A-Za-z0-9\s']/gi, '');">
</span></td>
</tr>

<tr>
<td nowrap>
<div align="right"><span class="required">MP3 File:</span></div>
</td>
<td valign="top" align="left" colspan="2" nowrap>
<input type="file" name="mp3file" size="35">
<br>
</td>
</tr>

<tr>
<td colspan="2">
<div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class=txt_topic type="submit" name="dosubmit" onclick=document.theForm.details.value=idContent.document.body.innerHTML; id="dosubmit" value="Add Song" class=Button><br>
</div>
</td>
</tr>

</form>

</tbody>
</table>
</div>
<br>

<table width="625" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="31%"><font size="2"><b>All Songs</b></font></td>
<td width="69%"></td>
</tr>
</table>

<table width="625" border="0" cellspacing="0" cellpadding="0" align="center">
<tr valign="top">
<td height="131"> <br>
<table width="615" border="0" cellspacing="0" cellpadding="0" align="center">
<tr valign="top">
<td class='txt_label' align="center">Name</td>
<td width="20%" class='txt_label' align="center">Uploaded by</td>
<td width="20%" class='txt_label' align="center">Uploaded date</td>
<td width="20%" class='txt_label' align="center">&nbsp;</td>
<td width="75" align="center" class='txt_label'>Default song</td>
</tr>
</table>
<hr color="#6699CC" width="100%" align="center" size="2" noshade>
<table width="615" border="0" cellspacing="0" cellpadding="0" align="center">
<form action="edit_profile.php?type=song" method="post">
<?php
		include_once 'music.class.php';
		$music = new music;
		include_once 'people.class.php';
		$people = new people;
		
    $show_res = $music->get_user_songs($_SESSION["member_id"]);
    while($show_set=mysql_fetch_array($show_res))
    {
?>
<!-- display_current_shows -->
<tr valign="top">
<td class='txt_label'><b><?=$show_set["song_name"]?></b></td>
<td width="20%" class='txt_label'><?=($show_set['owner_id'] == $_SESSION['member_id'])?'You':$people->get_name($show_set['owner_id']);?></td>
<td width="20%" class='txt_label' align="center"><?=$show_set['date']?gmdate('m-d-Y H:i:s',$show_set['date']+(3600*$settings['gmt'])):''?></td>
<td width="20%" class='txt_label'>
&nbsp;&nbsp;
[<a onMouseOver="window.status='Delete'; return true" onMouseOut="window.status=''; return true" href="delete_song.php?id=<?=$show_set["id"]?>">Delete</a>]
</td>
<td width="75" align="center"><input type="radio" <?if ($show_set['def']) echo 'checked';?> name="def" value="<?=$show_set['id']?>"></td>
</tr>
<!-- display_current_shows -->
<?php
     }
	$sql = "SELECT count(*) as num FROM music_songs WHERE def = 1 AND member_id = ".$_SESSION['member_id'];
	$res = mysql_fetch_array(mysql_query($sql));
?>
<tr class='txt_label'>
	<td align="right" colspan="4">Do not play song in my profile</td>
	<td width="75" align="center"><input type="radio" name="def" <?if (!$res['num']) echo 'checked';?> value="0"></td>
</tr>
</table>
<hr color="#6699CC" width="100%" align="center" size="2" noshade>
<div align="right"><input type="submit" class=txt_topic name="go" value="Update"></div>
</td>
</tr>
</form>
</table>
</td>
</tr>
</td>
</tr>
</table>
