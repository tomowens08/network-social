<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td class='txt_label'>
Edit Profile
<font size="2">&gt;&gt; <font color="003399">Schools</font></font></span>
<br><br>You may enter HTML/DHTML or CSS in any text field.<br>
Javascript is not allowed.<br>
Do not use HTML/CSS to cover <?=$site_name?> advertisements.<br>
</td>
<td align="right"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<table class="dark_b_border2" border="0" cellpadding="0" width='100%'>
<tr>
<td class='dark_blue_white2'>Currently Listed Schools</font></td>
</tr>
<tr>
<td>
<table border="0" cellpadding="2" bgcolor='#FFFFFF' width='100%'>
<?php
    $school_res=$profile->get_schools($_SESSION["member_id"]);
    $sr_no=1;
    while($school_set=mysql_fetch_array($school_res))
    {
?>
<tr>
<td width='10%' class="txt_label"><?=$sr_no?>.</td>
<td width='50%' class="txt_label"><?=$school_set["school_name"]?></td>
<td width='20%' class="txt_label"><a href='edit_school.php?id=<?=$school_set["id"]?>' class="txt_label">Edit</a></td>
<td width='20%' class="txt_label"><a href='delete_school.php?id=<?=$school_set["id"]?>' class="txt_label">Delete</a></td>
</tr>
<?php
        $sr_no=$sr_no+1;
    }
?>
</table>
</td></tr>
</table>

<br>

<table border="0" cellspacing="0" cellpadding="2" width='100%' class="dark_b_border2">
<tr valign="top">
<td class='dark_blue_white2'>&nbsp;Delete School:<br>
</td>
</tr>
<tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">

<?php
    $school_set=$profile->get_school($HTTP_GET_VARS["id"]);
?>
<tr>
<td>
<form name='interests' action='delete_school1.php?id=<?=$HTTP_GET_VARS["id"]?>' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td colspan='2'>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td><font color="356BA2" size="2"><b>School Name:</b></font></td>
<td><input type="text" name="school_name" size='40' value='<?=$school_set["school_name"]?>'>
</td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>City:</b></font></td>
<td><input type="text" name="city" size='40' value='<?=$school_set["school_city"]?>'>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>State:</b></font></td>
<td><input type="text" name="state" size='30' value='<?=$school_set["school_state"]?>'>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Student Status:</b></font></td>
<td class='txt_label'>
<?php
    if($school_set["status"]=="Currently Attending")
    {
?>
<input type="radio" name="status" value="Currently Attending" checked>&nbsp;Currently Attending&nbsp;&nbsp;
<input type="radio" name="status" value="Alumni">&nbsp;Alumni
<?php
    }
    else
    {
?>
<input type="radio" name="status" value="Currently Attending">&nbsp;Currently Attending&nbsp;&nbsp;
<input type="radio" name="status" value="Alumni" checked>&nbsp;Alumni
<?php
    }
?>
</td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Dates Attended:</b></font></td>
<td>
<select name="fyear">
<option value="">Select year</option>
<?php
    $sr_no=date("Y");
    $sr_to=$sr_no-100;
    while($sr_no>=$sr_to)
    {
      if($school_set["date_from"]==$sr_no)
      {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
      }
      else
      {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
      }
        $sr_no=$sr_no-1;
    }
?>
</select> to <select name="eyear">
<option value="">Select year</option>
<?php
    $sr_no=date("Y");
    $sr_to=$sr_no-100;
    while($sr_no>=$sr_to)
    {
      if($school_set["date_to"]==$sr_no)
      {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
      }
      else
      {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
      }
        $sr_no=$sr_no-1;
    }
?>
</select>
</td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Year Graduated</b></font></td>
<td>
<select name="graduation_year">
<option value="0000">Select year</option>
<?php
    $sr_no=date("Y");
    $sr_to=$sr_no-100;
    while($sr_no>=$sr_to)
    {
      if($school_set["graduation_year"]==$sr_no)
      {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
      }
      else
      {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
      }

        $sr_no=$sr_no-1;
    }
?>
</select>
</td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Degree Type:</b></font></td>
<td>
<select name="degree">
<option value="">Select type</option>
<option value="In Progress">In Progress</option>
<option value="High School Diploma">High School Diploma</option>
<option value="Associate's Degree">Associate's Degree</option>
<option value="Bachelor's Degree">Bachelor's Degree</option>
<option value="Master's Degree">Master's Degree</option>
<option value="Ph.D.">Ph.D.</option>
<option value="Postdoctoral">Postdoctoral</option>
<option value="Professional">Professional</option>
<option value="Other">Other</option>
<option value="None">None</option>
</select>
</td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Major/Concentration:</b></font></td>
<td><input type="text" size="40" name="major" value='<?=$school_set["major"]?>'></td>
</tr>

<tr>
<td><font color="356BA2" size="2"><b>Current Courses:</b></font></td>
<td><input type="text" size="40" name="courses" value='<?=$school_set["current_courses"]?>'></td>
</tr>
<tr>
<td><font color="356BA2" size="2"><b>Clubs/Organizations:</b></font></td>
<td><textarea cols="40" rows="10" name="clubs"><?=$school_set["clubs_organizations"]?></textarea></td>
</tr>
</table>

</td>
</tr>

<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" name='submit' value="Delete School">
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
