<table bordercolor=000000 height="80%" cellspacing=0 cellpadding=0 width="100%" bgcolor=ffffff border=0>
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>Edit Profile <b>&gt;&gt;</b> Profile Code</td>
<td align="right">
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<table width="625" border="0" cellspacing="0" cellpadding="2">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<?php
$sql = "SELECT code FROM member_profile WHERE member_id = ".$_SESSION['member_id'];
$code = mysql_fetch_array(mysql_query($sql));
?>
<form enctype="multipart/form-data" name="profile" method="post" action="edit_profile1.php?type=code">

<tr valign="top">
	<td width="50" class="txt_label"><b>Code:</b></td>
	<td><TEXTAREA Rows="10" Cols="60" id="codetext" name="codetext">
<?=stripslashes($code['code'])?>
</TEXTAREA></td>
</tr>

<tr>
<td align="center"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<input class=txt_topic type="Button" value="Update" onclick="this.form.submit();">&nbsp;&nbsp;<input onclick="this.form.reset();" class=txt_topic type="button" value="&nbsp;Reset&nbsp;">
<br><br></td></tr>

<tr>
	<td><?
include 'profileeditor.php';
?></td>
</tr>
</table>


