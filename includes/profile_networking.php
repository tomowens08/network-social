<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td class='txt_label'>
Edit Profile
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

<table border="0" cellpadding="0" width='100%' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>Currently Listed Networks</td>
</tr>

<tr>
<td>
<table border="0" cellpadding="2">
<?php
    $school_res=$profile->get_networking($_SESSION["member_id"]);
    $sr_no=1;
    while($school_set=mysql_fetch_array($school_res))
    {
?>
<tr>
<td width='10%' valign='top' class='txt_label'><?=$sr_no?>.</td>
<td width='50%' valign='top' class='txt_label'>
<b>Field:</b> <?=$school_set["field"]?>
<br>
<b>Sub-Field:</b> <?=$school_set["sub_field"]?>
<br>
<b>Role:</b> <?=$school_set["role"]?>
<br>

<b>Description:</b> <?=$school_set["description"]?>
<br>

</td>
<td width='20%' valign='top' class='txt_label'><a href='edit_networking.php?id=<?=$school_set["id"]?>' class='style9'>Edit</a></td>
<td width='20%' valign='top' class='txt_label'><a href='delete_networking.php?id=<?=$school_set["id"]?>' class='style9'>Delete</a></td>
</tr>
<?php
        $sr_no=$sr_no+1;
    }
?>
</table>
</td></tr>
</table>

<br>

<table border="0" cellspacing="0" cellpadding="2" class="dark_b_border2">
<tr valign="top">
<td class='dark_blue_white2'>&nbsp;Add New Network
</td>
</tr>
<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">

<tr>
<td>
<form name='interests' action='edit_profile1.php?type=networking' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td colspan='2'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td align="right" width="145"><b><font size="2" color="356BA2" face="verdana" face="verdana">Field:&nbsp;&nbsp;</font></b></td>
<td>
<input type="text" name="field" size="40"><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145"><b><font color="356BA2" face="verdana" size="2">Sub-Field:&nbsp;&nbsp;</font></b></td>
<td>
<input type="text" name="sub_field" size="40"><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145"><font color="356BA2" face="verdana"><b><font size="2" color="356BA2" face="verdana">Role:</font><font size="2">:&nbsp;&nbsp;</font></b></font></td>
<td><input type="text" name="role" size="40"><br><br></td>
</tr>

<tr valign="top">
<td align="right" width="145"><font color="356BA2" face="verdana"><b><font size="2" color="356BA2" face="verdana">Description:</font><font size="2">&nbsp;&nbsp;</font></b></font></td>
<td><textarea name="desc" rows="10" cols='50'></textarea><br><br></td>
</tr>

</table>


</td>
</tr>

<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" name='submit' value="Add New Networking">
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
