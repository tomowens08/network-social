<script language="JavaScript" type="text/javascript">
<!--

function checkcountry() {
	var CONT = document.form1.countries;
	var countryname = CONT.options[CONT.selectedIndex].value;
	if ((countryname == '1'))
   {
		document.form1.countries.disabled = false;
		document.form1.distances.disabled = false;
		document.form1.postal.disabled = false;
		//document.getElementById('orderby1').disabled = false;
	}
    else
    {
		document.form1.countries.disabled = false;
		document.form1.distances.disabled = true;
		document.form1.postal.disabled = true;
		//document.getElementById('orderby1').disabled = true;
	}
}
//-->
</script>

<form name="form1" action="browse.php" method="post">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="6" width="90%">
<tr>
<td class='txt_label'><span class="style2"><b>Browse Users</b>&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
</td>
</tr>

<tr>
<td align="center"><table width="800" border="0" cellspacing="0" cellpadding="2" bgcolor="ffffff">
  <tr valign="middle">
    <td width="450">&nbsp;</td>
    <td width="70" height="20"  align="center" class='style4'><a href="browse.php">&nbsp;<b>Basic</b></a></a></td>
    <td width="74" height="20" align="center"><a href='advanced_search_browse.php' class="style4">Advanced</a></td>
  </tr>
</table>
  <table width="802" cellspacing="0" cellpadding="2" class='dark_b_border2'>
<tr valign="top">
<td width="40%" class='dark_blue_white2 style3 style8'>Set  Browse Criteria</td>
<td width="60%" class='dark_blue_white2'>&nbsp;

</td>

</tr>
</table>

<table width="800" class='dark_b_border2' cellspacing="0" cellpadding="0">

<tr valign="top">
<td height="98">

<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr valign="top">
<td class='txt_label' width="13%" height="74">
<span class="style1">Browse for:</span><br>

<span class="style2">
<input type="Radio" name="gender" <?if($_SESSION['browse']["gender"]=="Both" || !$_SESSION['browse']["browse_gender"]) echo 'checked';?> value="Both"> 
All<br>
<input type="Radio" name="gender" <?if($_SESSION['browse']["gender"]=="Female") echo 'checked';?> value="Female"> 
Women<br>
<input type="Radio" name="gender" <?if($_SESSION['browse']["gender"]=="Male") echo 'checked';?> value="Male"> 
Men</span><br></td>


<td height="74" width="17%" class='txt_label'>
<b><span class="style2">Between Ages:</span><br>
<br>
<select name="agefrom" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
if (!$_SESSION['browse']['agefrom']) $_SESSION['browse']['agefrom'] = 15;
if (!$_SESSION['browse']['ageto']) $_SESSION['browse']['ageto'] = 100;

     $sr_no=15;
     while($sr_no<=100)
     {
?>
<option <?if ($_SESSION['browse']['agefrom'] == $sr_no) echo 'selected';?> value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
     $sr_no=$sr_no+1;
     }
?>
</select></font></b> <span class="style3">and</span> <b>
<font color="#336699">
<select name="ageto" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
     $sr_no=18;
     while($sr_no<=100)
     {
?>
<option <?if ($_SESSION['browse']['ageto'] == $sr_no) echo 'selected';?> value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
     $sr_no=$sr_no+1;
     }
?>
</select></font></b></td>
<td class='txt_label' width="15%" height="74"><span class="style2"><b>who are:</b></span><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td class='txt_label'>
<?
$type = array(
	'Any' => 'All',
	'Single' => 'S',
	'Married' => 'M',
	'Divorced' => 'D',
	'In a Relationship' => 'R'
);
if (!count($_SESSION['browse']['type'])) $_SESSION['browse']['type'] = array('All');
foreach ($type as $text => $val) {
	if (in_array($val,$_SESSION['browse']['type']))
		echo '<input checked type="Checkbox" name="type[]" value="'.$val.'">'.$text.'<br>';
	else
		echo '<input type="Checkbox" name="type[]" value="'.$val.'">'.$text.'<br>';
}
?></td>
</tr>
</table></td>
<td class='txt_label' width="15%" height="74"><b><span class="style2">and are here for</span>:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td class='txt_label'>
<?
$status = array(
	'Any' => 'All',
	'Dating' => 'Dating',
	'Relationships' => 'Relationships',
	'Networking' => 'Networking',
	'Friends' => 'Friends'
);
if (!count($_SESSION['browse']['status'])) $_SESSION['browse']['status'] = array('All');
foreach ($status as $text => $val) {
	if (in_array($val,$_SESSION['browse']['status']))
		echo '<input checked type="Checkbox" name="status[]" value="'.$val.'">'.$text.'<br>';
	else
		echo '<input type="Checkbox" name="status[]" value="'.$val.'">'.$text.'<br>';
}
?></td>
</tr>
</table>
</td>
<td align="right">
<table cellpading="0" cellspacing="0" border="0">

<tr>
<td colspan='2' class='txt_label'><span class="style1">located within:</span></td>
</tr>
<tr>
<td width="70" class='txt_label'><span class="style1">Country:</span></td>
<td><span class="style3" style="font-family: Arial, Helvetica, sans-serif">
  <select name="countries" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif" onChange="checkcountry()">
    <option value='0'>Choose Country</option>
    <?
$sql="select * from states order by state_name";
$result = mysql_query($sql);
while($RSUser = mysql_fetch_array($result))
{
    if($_SESSION['browse']["countries"] == $RSUser["state_id"])
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
</span> </td>
</tr>
<tr valign="top">
<td valign='top' class='txt_label style8 style3'><b>Distance:</b><br>(US Only)</td>
<td class='txt_label style8 style3'>
<select name="distances">
<option value="" selected>Any</option>
<?php
$distances = array(5,10,20,50,100,250);
foreach ($distances as $num) {
	if ($_SESSION['browse']['distances'] == $num)
		echo '<option selected value="'.$num.'">'.$num;
	else
		echo '<option value="'.$num.'">'.$num;
}
?>
</select>
<b>miles of</b>
<input type="text" name="postal" size="10" maxlength="10" value="<?=$_SESSION['browse']['postal']?>"><br></td>
</tr>

<tr>
<td class='txt_label'><span class="style2"><b>City:</b></span></td>
<td><input name="city" type="text" value="<?=$_SESSION['browse']["city"]?>" size="20"></td>
</tr>
<script>checkcountry();</script>
</table>
<?
if (!isset($_SESSION['browse']['with_photo'])) $_SESSION['browse']['with_photo'] = 1;
?>
</td>
<td class="txt_label"><span class="style2"><b>with photo:</b><br>
    <input <?if (($_SESSION['browse']['with_photo'])) echo 'checked';?> type="checkbox" name="with_photo" value="1">
    &nbsp;Yes <br>
    <br>
	<b>online only:</b><br>
	<input <?if (($_SESSION['browse']['view_online'])) echo 'checked';?> type="checkbox" name="view_online" value="1">
	&nbsp;Yes</span></td>
</tr>

</table>
</td>
</tr>

</table>
</td>
</tr>

</table>
</td>
</tr>

<!-- personal info -->
<!--
<tr valign="top">
<td width="800">

<table width="800" border="0" cellspacing="0" cellpadding="0" class='dark_b_border2'>
<tr valign="middle">
<td width="100%" colspan='3' class='dark_blue_white2'>&nbsp;Personal Info</td>
</tr>

<tr valign="middle">

<td width="33%">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Ethnicity:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<?php
     if($_SESSION['browse']["ethnicity1"]==Null)
     {
?>
<?php
     $sr_no=0;
     $count=count($ethnicity);
     while($sr_no<$count)
     {
         if($sr_no%6==0)
         {
             print "</td><td class='txt_label' valign='top'>";
         }
?>
<input type="checkbox" name="ethnicity[]" value='<?=$ethnicity[$sr_no]?>'><font face='Tahoma' size='1'><?=$ethnicity[$sr_no]?></font><br>
<?php
       $sr_no=$sr_no+1;
     }
?>
<?php
     }
     else
     {
?>
<?php
     $sr_no=0;
     $count=count($ethnicity);
     while($sr_no<$count)
     {
         if($sr_no%6==0)
         {
             print "</td><td class='txt_label' valign='top'>";
         }
?>
<?php
     if(in_array($ethnicity[$sr_no],$_SESSION['browse']["ethnicity1"]))
     {
?>
<input type="checkbox" name="ethnicity[]" value='<?=$ethnicity[$sr_no]?>' checked><font face='Tahoma' size='1'><?=$ethnicity[$sr_no]?></font><br>
<?php
     }
     else
     {
?>
<input type="checkbox" name="ethnicity[]" value='<?=$ethnicity[$sr_no]?>'><font face='Tahoma' size='1'><?=$ethnicity[$sr_no]?></font><br>
<?php
     }
?>
<?php
       $sr_no=$sr_no+1;
     }
?>
<?php
     }
?>

</td>
</tr>
</table>
</td>


<td width="33%">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' valign='top' colspan='2'><b>Body Type:</b></td>
</tr>

<tr>
<td class='txt_label'>
<?php
     if($_SESSION['browse']["body"]==Null)
     {
?>
<input type="checkbox" name="body[]" value='Slim / Slender'>Slim/Slender<BR>
<input type="checkbox" name="body[]" value='Athletic'>Athletic<BR>
<input type="checkbox" name="body[]" value='Average'>Average<BR>
<input type="checkbox" name="body[]" value='Some extra baggage'>Some extra baggage<BR>
<input type="checkbox" name="body[]" value='More to love!'>More to love!<BR>
<input type="checkbox" name="body[]" value='Body builder'>Body builder<BR>
<?php
     }
     else
     {
?>
<?php
     if(in_array("Slim / Slender",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='Slim / Slender' checked>Slim/Slender<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='Slim / Slender'>Slim/Slender<BR>
<?php
     }
?>

<?php
     if(in_array("Athletic",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='Athletic' checked>Athletic<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='Athletic'>Athletic<BR>
<?php
     }
?>

<?php
     if(in_array("Average",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='Average' checked>Average<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='Average'>Average<BR>
<?php
     }
?>

<?php
     if(in_array("Some extra baggage",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='Some extra baggage' checked>Some extra baggage<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='Some extra baggage'>Some extra baggage<BR>
<?php
     }
?>

<?php
     if(in_array("More to love!",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='More to love!' checked>More to love!<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='More to love!'>More to love!<BR>
<?php
     }
?>

<?php
     if(in_array("Body builder",$_SESSION['browse']["body"]))
     {
?>
<input type="checkbox" name="body[]" value='Body builder' checked>Body builder<BR>
<?php
     }
     else
     {
?>
<input type="checkbox" name="body[]" value='Body builder'>Body builder<BR>
<?php
     }
?>
<?php
     }
?>
</td>
</tr>
</table>
</td>


<td width="33%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' valign='top' colspan='2'><b>Height:</b></td>
</tr>

<tr>
<TD class='txt_label'>
<?php
     if($_SESSION['browse']["heightBetween"]==Null)
     {
?>
<input type="radio" name="Height" value="heightBetween">Between</TD>
<?php
     }
     else
     {
?>
<input type="radio" name="Height" value="heightBetween" checked>Between</TD>
<?php
     }
?>
<TD class='txt_label'>
<select name="min_foot">
<?php
     $sr_no=3;
     while($sr_no<=7)
     {
     if($_SESSION['browse']["min_foot"]==$sr_no)
     {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?>'</option>
<?php
     }
     else
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?>'</option>
<?php
     }
?>
<?php
        $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;ft.&nbsp;
<select name="min_inch">
<?php
     $sr_no=0;
     while($sr_no<=11)
     {
?>
<?php
     if($_SESSION['browse']["min_inch"]==$sr_no)
     {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?>&quot;</option>
<?php
     }
     else
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?>&quot;</option>
<?php
     }
?>
<?php
        $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;in. </TD></TR>

<TR>
<TD class='txt_label' align=right>and</TD>
<TD>
<select name="max_foot">
<?php
     $sr_no=3;
     while($sr_no<=7)
     {
     if($_SESSION['browse']["max_foot"]==$sr_no)
     {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?>'</option>
<?php
     }
     else
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?>'</option>
<?php
     }
?>
<?php
        $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;ft.&nbsp;

<select name="max_inch">
<?php
     $sr_no=0;
     while($sr_no<=11)
     {
?>
<?php
     if($_SESSION['browse']["max_inch"]==$sr_no)
     {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?>&quot;</option>
<?php
     }
     else
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?>&quot;</option>
<?php
     }
?>
<?php
        $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;in. </TD>
</td>
</tr>
</table>
</td>




</tr>


</table>

</td>
</tr>
-->
<!-- personal info -->



<!-- background and lifestyle -->
<!--
<tr valign="top">
<td width="800">

<table width="800" border="0" cellspacing="0" cellpadding="0" class='dark_b_border2'>
<tr valign="middle">
<td width="100%" colspan='4' class='dark_blue_white2'>&nbsp;Background and Lifestyle</td>
</tr>

<tr valign="middle">

<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Smoker:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<?php
     if($_SESSION['browse']["smoker"]==0||$_SESSION['browse']["smoker"]==Null)
     {
?>
<input type='radio' name='smoker' value='' checked>&nbsp;Both<br>
<input type='radio' name='smoker' value='1'>&nbsp;No<br>
<input type='radio' name='smoker' value='2'>&nbsp;Yes<br>
<?php
     }
?>
<?php
     if($_SESSION['browse']["smoker"]==1)
     {
?>
<input type='radio' name='smoker' value=''>&nbsp;Both<br>
<input type='radio' name='smoker' value='1' checked>&nbsp;No<br>
<input type='radio' name='smoker' value='2'>&nbsp;Yes<br>
<?php
     }
?>
<?php
     if($_SESSION['browse']["smoker"]==2)
     {
?>
<input type='radio' name='smoker' value=''>&nbsp;Both<br>
<input type='radio' name='smoker' value='1'>&nbsp;No<br>
<input type='radio' name='smoker' value='2' checked>&nbsp;Yes<br>
<?php
     }
?>
</td>
</tr>
</table>
</td>


<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Drinker:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top' valign='top'>
<?php
     if($_SESSION['browse']["drinker"]==0||$_SESSION['browse']["drinker"]==Null)
     {
?>
<input type='radio' name='drinker' value='' checked>&nbsp;Both<br>
<input type='radio' name='drinker' value='1'>&nbsp;No<br>
<input type='radio' name='drinker' value='2'>&nbsp;Yes<br>
<?php
     }
?>
<?php
     if($_SESSION['browse']["drinker"]==1)
     {
?>
<input type='radio' name='drinker' value=''>&nbsp;Both<br>
<input type='radio' name='drinker' value='1' checked>&nbsp;No<br>
<input type='radio' name='drinker' value='2'>&nbsp;Yes<br>
<?php
     }
?>
<?php
     if($_SESSION['browse']["drinker"]==2)
     {
?>
<input type='radio' name='drinker' value=''>&nbsp;Both<br>
<input type='radio' name='drinker' value='1'>&nbsp;No<br>
<input type='radio' name='drinker' value='2' checked>&nbsp;Yes<br>
<?php
     }
?>

</td>
</tr>
</table>
</td>


<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Orientation:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<?php
     if($_SESSION['browse']["orientation"]==Null)
     {
?>
<input type='radio' name='orientation' value='1'>&nbsp;Straight<br>
<input type='radio' name='orientation' value='2'>&nbsp;Gay<br>
<input type='radio' name='orientation' value='3'>&nbsp;Bi<br>
<input type='radio' name='orientation' value='4'>&nbsp;Not Sure<br>
<input type='radio' name='orientation' value='' checked>&nbsp;No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["orientation"]==1)
     {
?>
<input type='radio' name='orientation' value='1' checked>&nbsp;Straight<br>
<input type='radio' name='orientation' value='2'>&nbsp;Gay<br>
<input type='radio' name='orientation' value='3'>&nbsp;Bi<br>
<input type='radio' name='orientation' value='4'>&nbsp;Not Sure<br>
<input type='radio' name='orientation' value=''>&nbsp;No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["orientation"]==2)
     {
?>
<input type='radio' name='orientation' value='1'>&nbsp;Straight<br>
<input type='radio' name='orientation' value='2' checked>&nbsp;Gay<br>
<input type='radio' name='orientation' value='3'>&nbsp;Bi<br>
<input type='radio' name='orientation' value='4'>&nbsp;Not Sure<br>
<input type='radio' name='orientation' value=''>&nbsp;No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["orientation"]==3)
     {
?>
<input type='radio' name='orientation' value='1'>&nbsp;Straight<br>
<input type='radio' name='orientation' value='2'>&nbsp;Gay<br>
<input type='radio' name='orientation' value='3' checked>&nbsp;Bi<br>
<input type='radio' name='orientation' value='4'>&nbsp;Not Sure<br>
<input type='radio' name='orientation' value=''>&nbsp;No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["orientation"]==4)
     {
?>
<input type='radio' name='orientation' value='1'>&nbsp;Straight<br>
<input type='radio' name='orientation' value='2'>&nbsp;Gay<br>
<input type='radio' name='orientation' value='3'>&nbsp;Bi<br>
<input type='radio' name='orientation' value='4' checked>&nbsp;Not Sure<br>
<input type='radio' name='orientation' value=''>&nbsp;No Answer<br>
<?php
     }
?>
</td>
</tr>
</table>
</td>


<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Education:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<?php
     if($_SESSION['browse']["EducationID"]==Null)
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="" checked>No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="High school")
     {
?>
<input type="radio" name="EducationID" value="High school"  checked>High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="Some college")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college" checked>Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="In college")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college" checked>In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="College graduate")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate" checked>College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="Grad / professional school")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school" checked>Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="Post grad")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad" checked>Post grad<br>
<input type="radio" name="EducationID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["EducationID"]=="No Answer")
     {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="" checked>No Answer<br>
<?php
     }
?>

</td>
</tr>
</table>
</td>





</tr>


</table>

</td>
</tr>
-->
<!-- background and lifestyle -->


<!-- religion, income and children -->
<!--
<tr valign="top">
<td width="800">

<table width="800" border="0" cellspacing="0" cellpadding="0" class='dark_b_border2'>

<tr valign="middle">

<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Religion:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<select name="ReligionID">
<option value=''>Select Religion</option>
<?php
     if($_SESSION['browse']["ReligionID"]==Null)
     {
?>
<?php
    $sr_no=1;
    while($sr_no<=15)
    {
?>
        <option value='<?=$sr_no?>'><?=$religion[$sr_no]?></option>
<?php
        $sr_no=$sr_no+1;
    }
?>
<?php
     }
     else
     {

    $sr_no=1;
    while($sr_no<=15)
    {
        if($_SESSION['browse']["ReligionID"]==$sr_no)
        {
?>
        <option value='<?=$sr_no?>' selected><?=$religion[$sr_no]?></option>
<?php
        }
        else
        {
?>
        <option value='<?=$sr_no?>'><?=$religion[$sr_no]?></option>
<?php
        }
        $sr_no=$sr_no+1;
    }
?>
<?php
     }
?>
</select>
</td>
</tr>
</table>
</td>


<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Income:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top' valign='top'>
<select name="IncomeID">
<option value=''>Select Income</option>
<?php
     if($_SESSION['browse']["IncomeID"]==Null)
     {
?>
<?php
    $sr_no=0;
    while($sr_no<=8)
    {
?>
<option value="<?=$sr_no?>"><?=$income[$sr_no]?></option>
<?php
        $sr_no=$sr_no+1;
    }
    }
    else
    {
    $sr_no=0;
    while($sr_no<=8)
    {
?>
<?php
     if($_SESSION['browse']["IncomeID"]==$sr_no)
     {
?>
<option value="<?=$sr_no?>" selected><?=$income[$sr_no]?></option>
<?php
     }
     else
     {
?>
<option value="<?=$sr_no?>"><?=$income[$sr_no]?></option>
<?php
     }
?>
<?php
        $sr_no=$sr_no+1;
    }
    }
?>
</select>
</td>
</tr>
</table>
</td>


<td width="25%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td class='txt_label' colspan='2'><b>Children:</b></td>
</tr>

<tr>
<td class='txt_label' valign='top'>
<?php
     if($_SESSION['browse']["ChildrenID"]==Null)
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="" checked>No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["ChildrenID"]=="I do not want kids")
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids" checked>I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["ChildrenID"]=="Someday")
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday" checked>Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["ChildrenID"]=="Undecided")
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided" checked>Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="">No Answer<br>
<?php
     }
?>

<?php
     if($_SESSION['browse']["ChildrenID"]=="Love kids, but not for me")
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me" checked>Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="">No Answer<br>
<?php
     }
?>


<?php
     if($_SESSION['browse']["ChildrenID"]=="Proud parent")
     {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent" checked>Proud parent<br>
<input type="radio" name="ChildrenID" value="">No Answer<br>
<?php
     }
?>


</td>
</tr>
</table>
</td>

</tr>


</table>

</td>
</tr>
-->
<!-- religion, income and children -->


</table>
</td>
</tr>



<tr>
<td align="center">
<table width="802" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr valign="middle">
<td width="600" class='dark_blue_white2 style3 style8'>
&nbsp;Sort Results by:
<?
if (!$_SESSION['browse']['orderby']) $_SESSION['browse']['orderby'] = 2;
?>
<input type="radio" id="orderby1" name="orderby" <?if ($_SESSION['browse']['orderby'] == 1) echo 'checked';?> value="1"> Closest to you &nbsp;&nbsp;&nbsp;
<input type="radio" name="orderby" <?if ($_SESSION['browse']['orderby'] == 2) echo 'checked';?> value="2"> Most Connected<b>
 &nbsp;&nbsp;&nbsp;
<input type="radio" name="orderby" <?if ($_SESSION['browse']['orderby'] == 3) echo 'checked';?> value="3"> New to <?=$site_name?></td>
<td width="131" class='dark_blue_white2'><div align="right">
<input value="Update" class="txt_topic" type="submit" width="70" height="26" border="0"></div></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff">&nbsp;</td>
</tr>
</form>

