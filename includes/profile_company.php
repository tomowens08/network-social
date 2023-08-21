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
<td class='txt_label'><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<table border="0" cellpadding="0" width='100%' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>Currently Listed Companies</td>
</tr>

<tr>
<td>
<table border="0" cellpadding="2" bgcolor='#FFFFFF'>
<?php
    $school_res=$profile->get_companies($_SESSION["member_id"]);
    $sr_no=1;
    while($school_set=mysql_fetch_array($school_res))
    {
?>
<tr>
<td width='10%' class='txt_label'><?=$sr_no?>.</td>
<td width='50%' class='txt_label'><?=$school_set["company_name"]?></td>
<td width='20%' class='txt_label'><a href='edit_company.php?id=<?=$school_set["id"]?>' class='style9'>Edit</a></td>
<td width='20%' class='txt_label'><a href='delete_company.php?id=<?=$school_set["id"]?>' class='style9'>Delete</a></td>
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
<td class='dark_blue_white2'>&nbsp;Add New Company:
</td>
</tr>
<tr valign="top">
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">

<tr>
<td>
<form name='interests' action='edit_profile1.php?type=companies' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td colspan='2'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td align="right" width="145"><b><font size="2" color="356BA2" face="verdana" face="verdana">Company Name:&nbsp;&nbsp;</font></b></td>
<td>
<input type="text" name="company_name" size="40"><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145"><b><font color="356BA2" face="verdana" size="2">City:&nbsp;&nbsp;</font></b></td>
<td>
<input type="text" name="city" size="40"><br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="145"><font color="356BA2" face="verdana"><b><font size="2" color="356BA2" face="verdana">State/Region</font><font size="2">:&nbsp;&nbsp;</font></b></font></td>
<td><input type="text" name="state" size="40"><br><br></td>
</tr>
<tr valign="top">
<td align="right" width="145"><b><font color="356BA2" face="verdana" size="2">Country:&nbsp;&nbsp;</font></b></td>
<td><input type="text" name="country" size="40"><br><br></td>
</tr>

<tr valign="top">
<td align="right" width="145"><font color="356BA2" face="verdana"><b><font size="2" color="356BA2" face="verdana">Dates Employed </font><font size="2">:&nbsp;&nbsp;</font></b></font></td>
<td><input type="text" name="dates" size="50" maxlength="255"><br><br></td>
</tr>
<tr valign="top">
<td align="right" width="145"><font color="356BA2" face="verdana"><b><font size="2" color="356BA2" face="verdana">Title/Position</font><font size="2">:&nbsp;&nbsp;</font></b></font></td>
<td><input type="text" name="title" size="40"><br><br></td>
</tr>
<tr valign="top">
<td align="right" width="145" height="6"><b><font color="356BA2" face="verdana" size="2">Division:&nbsp;&nbsp;</font></b></td>
<td height="6"><input type="text" name="division" size="40"><br><br></td>
</tr>
</table>


</td>
</tr>

<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" name='submit' value="Add New Company">
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
