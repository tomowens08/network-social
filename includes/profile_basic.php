<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td class='txt_label'>
Edit Profile
<font size="2">&gt;&gt; <font color="003399">Basic Information</font></font></span>
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
<td><b><font color="FFFFFF" size="3" face="verdana">&nbsp;<br>&nbsp;Change Profile Basic:</font></b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">

<tr>
<td>
<form name='interests' action='edit_profile1.php?type=basic' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td colspan='2'>
<?php
     $sql="select * from members where member_id = $_SESSION[member_id]";
     $res=mysql_query($sql);
     $data_set=mysql_fetch_array($res);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td height="190">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td align="right"><span class="txt_label">Gender:&nbsp;&nbsp;</span></td>
<td class="spacetext">
<?php
     if($data_set["gender"]=="Male")
     {
?>
<input type="radio" name="gender" value="Male" checked>Male
<input type="radio" name="gender" value="FeMale">Female&nbsp;
<?php
     } else {
?>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="FeMale" checked>Female&nbsp;
<?php
     }
?>
</td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td align="right"><span class="txt_label">Date Of Birth:&nbsp;&nbsp;</span></td>
<td class="spacetext">
<select class="normalarial" name="month" size="1">
<?php
     $sr_no=0;
     while($sr_no<=11)
     {
         $sr_no1=$sr_no+1;
         if($data_set["birth_month"]==$sr_no1)
         {
?>
<option value='<?=$sr_no1?>' selected><?=$month[$sr_no]?></option>
<?php
         }
         else
         {
?>
<option value='<?=$sr_no1?>'><?=$month[$sr_no]?></option>
<?php
         }
      $sr_no=$sr_no+1;
     }
?>
</select>
<b>/</b>
<select name='day' size='1'>
<?php
     $sr_no=1;
     while($sr_no!=32)
     {
         if($data_set["birth_day"]==$sr_no)
         {
          print "<option value='$sr_no' selected>$sr_no</option>";
         }
         else
         {
          print "<option value='$sr_no'>$sr_no</option>";
         }
         $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;/&nbsp;
<select name='year' size='1'>
<?php
     $sr_no=2005;
     while($sr_no!=1904)
     {
         if($data_set["birth_year"]==$sr_no)
         {
          print "<option value='$sr_no' selected>$sr_no</option>";
         }
         else
         {
          print "<option value='$sr_no'>$sr_no</option>";
         }
         $sr_no=$sr_no-1;
     }
?>
</select>
</td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td align="right"><span class="txt_label">Occupation:&nbsp;&nbsp;</span></td>
<td class="spacetext">
<input type='text' name='occupation' size='40' value='<?=$data_set["occupation"]?>'>
</td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>
<tr>
<td align="right"><span class="txt_label">City:&nbsp;&nbsp;</span></td>
<td class="spacetext">
<input type='text' name='city' size='40' value='<?=$data_set["city"]?>'>
</td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td align="right"><span class="txt_label">State/Region:&nbsp;&nbsp;</font></b></td>
<td class="spacetext">
<select name='us_state'>
<option value='0'>Non-US State</option>
<?php
$yes=0;
     $sr_no=0;
     while($sr_no<=62)
     {
         if($data_set["current_state"]==$state[$sr_no])
         {
             $yes=1;
?>
<option value='<?=$state[$sr_no]?>' selected><?=$state[$sr_no]?></option>
<?php
         }
         else
         {
?>
<option value='<?=$state[$sr_no]?>'><?=$state[$sr_no]?></option>
<?php
         }
  $sr_no=$sr_no+1;
}
?>
</select>
</td>
</tr>

<tr>
<td align="right"><span class="txt_label">Non-US State:</span></td>
<td><font face="verdana" size="1">
<?php
     if($yes!=1)
     {
?>
<input type='text' name='other_state' size='25' value='<?=$data_set["current_state"]?>'>
<?php
     }
     else
     {
?>
<input type='text' name='other_state' size='25'>
<?php
     }
?>
</font></td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td align="right"><span class="txt_label">Country:&nbsp;&nbsp;</font></b></td>
<td class="spacetext">
<select name="country">
<?
$sql="select * from states order by state_name";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
    if($data_set["country"]==$RSUser["state_id"])
    {
     print "<option value='$RSUser[state_id]' selected>".$RSUser["state_name"]."</option>";
    }
    else
    {
     print "<option value='$RSUser[state_id]'>".$RSUser["state_name"]."</option>";
    }
}
?>
</select>
</td>
</tr>

<tr><td colspan="2"><br></td></tr>
<tr>
<td align="right"><span class="txt_label">Zip/Postal Code</font><font size="2">:&nbsp;&nbsp;</font></b></font></td>
<td class="spacetext">
<input type='text' name='postal_code' size='25' value='<?=$data_set["zip_code"]?>'>
</td>
</tr>

<tr><td colspan="2"><br></td></tr>
<tr>
<td align="right"><span class="txt_label">Ethnicity:&nbsp;&nbsp;</font></b></td>
<td class="spacetext">

<select name="ethnicity">
<?php
     $sr_no=0;
     $count=count($ethnicity);
     while($sr_no<=$count)
     {
         if($data_set["ethnicity"]==$ethnicity[$sr_no])
         {
?>
<option value="<?=$ethnicity[$sr_no]?>" selected><?=$ethnicity[$sr_no]?></option>
<?php
         }
         else
         {
?>
<option value="<?=$ethnicity[$sr_no]?>"><?=$ethnicity[$sr_no]?></option>
<?php
         }
      $sr_no=$sr_no+1;
    }
?>
</select>
</td>
</tr>


<tr><td colspan="2"><br></td></tr>
<tr>
<td align="right"><span class="txt_label">Body Type:&nbsp;&nbsp;</font></b></td>
<td class="spacetext">
<select name="body_type" size='1'>
<?php
     if($data_set["body_type"]=="Slim / Slender")
     {
?>
<option value="Slim / Slender" selected>Slim / Slender</option>
<?php
     }
     else
     {
?>
<option value="Slim / Slender">Slim / Slender</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]=="Athletic")
     {
?>
<option value="Athletic" selected>Athletic</option>
<?php
     }
     else
     {
?>
<option value="Athletic">Athletic</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]=="Average")
     {
?>
<option value="Average" selected>Average</option>
<?php
     }
     else
     {
?>
<option value="Average">Average</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]=="Some extra baggage")
     {
?>
<option value="Some extra baggage" selected>Some extra baggage</option>
<?php
     }
     else
     {
?>
<option value="Some extra baggage">Some extra baggage</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]=="More to love!")
     {
?>
<option value="More to love!" selected>More to love!</option>
<?php
     }
     else
     {
?>
<option value="More to love!">More to love!</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]=="Body builder")
     {
?>
<option value="Body builder" selected>Body builder</option>
<?php
     }
     else
     {
?>
<option value="Body builder">Body builder</option>
<?php
     }
?>

<?php
     if($data_set["body_type"]==Null)
     {
?>
<option value="No Answer" selected>No Answer</option>
<?php
     }
     else
     {
?>
<option value="No Answer">No Answer</option>
<?php
     }
?>
</select>
</td>
</tr>

<tr><td colspan="2"><br></td></tr>
<tr>
<td align="right"><span class="txt_label">Height:&nbsp;&nbsp;</font></b></td>
<td class="spacetext">

<select name="height_feet">
<?php
     $sr_no=0;
     while($sr_no<=8)
     {
         if($data_set["height_feet"]==$sr_no)
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
      $sr_no=$sr_no+1;
    }
?>
</select>&nbsp;Feet

<select name="height_inch">
<?php
     $sr_no=0;
     while($sr_no<=11)
     {
         if($data_set["height_inch"]==$sr_no)
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
      $sr_no=$sr_no+1;
    }
?>
</select>&nbsp;Inches
</td>
</tr>
<tr>
<td colspan="2"><br></td>
</tr>
<tr>
<td align="right" valign="top"><span class="txt_label">I would like to&nbsp;&nbsp; <br>make space for:&nbsp;&nbsp;</b></font></span></td>
<td class="txt_label">
<?php
     $here_for=explode(",", $data_set["here_for"]);
?>

<?php
     if(in_array("Dating", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Dating' checked>&nbsp;Dating<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Dating'>&nbsp;Dating<br>
<?php
     }
?>

<?php
     if(in_array("Networking", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Networking' checked>&nbsp;Networking<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Networking'>&nbsp;Networking<br>
<?php
     }
?>
<?php
     if(in_array("Relationships", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Relationships' checked>&nbsp;Relationships<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Relationships'>&nbsp;Relationships<br>
<?php
     }
?>
<?php
     if(in_array("Friends", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Friends' checked>&nbsp;Friends<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Friends'>&nbsp;Friends<br>
<?php
     }
?>
<?php
     if(in_array("Connect with Artists", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Connect with Artists' checked>&nbsp;Connect with Artists<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Connect with Artists'>&nbsp;Connect with Artists<br>
<?php
     }
?>
<?php
     if(in_array("Discover New Music", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Discover New Music' checked>&nbsp;Discover New Music<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Discover New Music'>&nbsp;Discover New Music<br>
<?php
     }
?>
<?php
     if(in_array("Rate Music", $here_for))
     {
?>
<input type='checkbox' name='here_for[]' value='Rate Music' checked>&nbsp;Rate Music<br>
<?php
     }
     else
     {
?>
<input type='checkbox' name='here_for[]' value='Rate Music'>&nbsp;Rate Music<br>
<?php
     }
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" name='submit' value="Edit Basic Information">
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
