<?
if (is_array($int)) {
	foreach ($int as $k => $v) {
		$int[$k] = str_replace('<!--','',$v);
	}
}
?>
<form name='interests' action='edit_profile1.php' method='post'>

<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td>
<span class="txt_label">Edit Profile
&gt;&gt; <font color="003399">Edit Interests &amp; Personality</font>
<br><br>You may enter HTML/DHTML or CSS in any text field.<br>
Javascript is not allowed.<br>
Do not use HTML/CSS to cover <?=$site_name?> advertisements.<br>
</span>
</td>
<td align="right"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td class="txt_label">
Please separate all interests with comma.
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="10">

<tr valign="top">
<td width='20%' align="right" class='txt_label'>
Headline:&nbsp;&nbsp;
</td>
<td width='80%' height="9">
<input type='text' name='headline' size='60' value='<?=stripslashes($int["headline"])?>'></p></td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>About Me:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='about_me' cols='45' rows='4'><?=stripslashes($int["about_me"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Like to Meet:&nbsp;&nbsp;
</td>
<td height="9" width='80%' class='txt_label'>
<textarea name='like_to_meet' cols='45' rows='4'><?=stripslashes($int["meet"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Interests:&nbsp;&nbsp;
</td>

<td width='80%'>
<textarea name='interests' cols='45' rows='4'><?=stripslashes($int["interests"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Music:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='music' cols='45' rows='4'><?=stripslashes($int["music"])?></textarea></p>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Movies:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='movies' cols='45' rows='4'><?=stripslashes($int["movies"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Television:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='television' cols='45' rows='4'><?=stripslashes($int["television"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Heroes:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='heroes' cols='45' rows='4'><?=stripslashes($int["heroes"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" width="20%" class='txt_label'>Books:&nbsp;&nbsp;
</td>
<td width='80%'>
<textarea name='books' cols='45' rows='4'><?=stripslashes($int["books"])?></textarea>
</td>
</tr>

<tr valign="top">
<td align="right" colspan='2'>
<div align='center'>
<input type='submit' name='submit' value='Edit Interests and Personality'>
</div>
</td></tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</form>

