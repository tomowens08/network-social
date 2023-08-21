<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td class='txt_label'>Edit Profile
<font size="2">&gt;&gt; <font color="003399">Background & Lifestyle</font></font></span>
<br><br>You may enter HTML/DHTML or CSS in any text field.<br>
Javascript is not allowed.<br>
Do not use HTML/CSS to cover <?=$site_name?> advertisements.<br>
</td>
<td align="right"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<table border="0" cellspacing="0" cellpadding="2">
<tr valign="top">
<td><b><font color="FFFFFF" size="3" face="verdana">&nbsp;<br>&nbsp;Change Display Name:</font></b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">

<tr>
<td>
<form name='interests' action='edit_profile1.php?type=name' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td colspan='2'>
<?php
     $sql="select * from members where member_id = $_SESSION[member_id]";
     $res=mysql_query($sql);
     $data_set=mysql_fetch_array($res);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="right" class='txt_label'>Display Name:&nbsp;&nbsp;</span>
<td class='txt_label'><input type="Text" name="display_name" value="<?=$data_set["display_name"]?>"></td>
<td align="right" class='txt_label'>(This appears on <?=$site_name?> for everyone to see.)</td>
</tr>

<tr>
<td colspan="3"><br></td>
</tr>

<tr>
<td align="right" class='txt_label'>First Name:&nbsp;&nbsp;</td>
<td class='txt_label'><input type="Text" name="first_name" value="<?=$data_set["member_name"]?>"></td>
<td class='txt_label' align="right">(First name is private and is used for search only.)</td>
</tr>

<tr>
<td align="right" class='txt_label'>Last Name:&nbsp;&nbsp;</td>
<td class='txt_label'><input type="Text" name="last_name" value="<?=$data_set["member_lname"]?>"></td>
<td align="right" class='txt_label'>(Last name is private and is used for search only.)</td>
</tr>

<tr>
<td colspan="3"><br></td>
</tr>
</table>

</td>
</tr>

<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" name='submit' value="Edit Name">
</td>
</tr>
</table>
</form>
</td>
</tr>

</table>
</td>
</tr>
</table>
</div>
</table>
