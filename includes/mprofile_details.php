<table border="0" cellspacing="0" cellpadding="0" width="100%" bordercolor="000000" bgcolor="ffffff">
<tr>
<td valign="top">

<form name="interestForm" method="post" action="edit_mprofile1.php?type=details">
<input type="hidden" name="interestLabel">
<?php
     $det=$music->get_band_details($_SESSION["member_id"]);
?>
<table bordercolor="#000000" cellspacing="0" cellpadding="0" width="100%" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>Edit Band Profile <b>&gt;&gt;</b> Edit Band Bio
</td>
<td align="right">
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a>
</td>
</tr>
</table>
</td>
</tr>


<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Headline:&nbsp;&nbsp;</STRONG>
</td>
<td height="9">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td class="text">
<input type='text' name='headline' size='60' value='<?=$det["headline"]?>'>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Bio:&nbsp;&nbsp;</STRONG>
</td>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td class="text">
<textarea cols="47" name="bio" rows="5"><?=$det["bio"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Members:&nbsp;&nbsp;</STRONG>
</td>
<td height="9">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="500" class="text">
<textarea cols="47" name="members" rows="5"><?=$det["members"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Influences:&nbsp;&nbsp;</STRONG>
</td>
<td height="9">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="500" class="text">
<textarea cols="47" name="influences" rows="5"><?=$det["influences"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Sounds Like:&nbsp;&nbsp;</STRONG>
</td>
<td height="9">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="500" class="text">
<textarea cols="47" name="sounds_like" rows="5"><?=$det["sounds_like"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Website:&nbsp;&nbsp;</STRONG>
</td>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="500" style="word-wrap:break-word">
<input type='text' name='website' size='60' value='<?=$det["website"]?>'>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Record Label:&nbsp;&nbsp;</STRONG>
</td>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="500" class="text" style="word-wrap:break-word">
<textarea cols="47" name="record_label" rows="5"><?=$det["record_label"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
<tr valign="top">
<td align="right" width="145" class='txt_label'>
<STRONG>Label Type:&nbsp;&nbsp;</STRONG>
</td>
<td height="12">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="F3F9FE">
<tr valign="top">
<td width="600" class="text" style="word-wrap:break-word">
<textarea cols="47" name="label_type" rows="5"><?=$det["label_type"]?></textarea>
</td>
</tr>
</table>
</td>
</tr>
</table>
<div align="right"></div><br><br>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<input type='submit' name='submit' value='Update'>
</td>
</tr>
</table>

