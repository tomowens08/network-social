<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_events.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Events
</td></tr>

<tr><td>

<!-- middle_content -->
<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;

     include("includes/events.class.php");
     $events=new events;

?>

<!-- Events Entry -->
<!-- event main table -->


<table cellspacing="0" cellpadding="10" width="100%" align="center">
<tr>
<td valign="top">

<form method="post" name="createEvent" action="add_event.php">
<table border="2" cellpadding="0" cellspacing="0" width="100%" align="center" bordercolor="#FFFFFF">
<tr>
<td>
<table border="2" cellpadding="0" cellspacing="0" width="95%" align="center" bordercolor="#FFFFFF">
<tr>
<td class='txt_label'>
<p><STRONG>Create An Event</STRONG> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td align=right>
</td>
</tr>
</table>
<br>

<table border="0" cellpadding="5" cellspacing="0" width="95%" align="center">
<tr>
<td valign="top" width="45%">
<table border="0" cellpadding="5" cellspacing="0">
<tr height="20">
<td colspan="2" class='txt_label'><b>&nbsp;Whats Going On?</b></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td colspan="2" class='txt_label'>
Event Name: *<br>
<input type="text" size="30" maxlength="50" name="event_name" value="">
</td>
</tr>
<tr>
<td colspan="2" class='txt_label'>
Event Organizer: *<br>
<input type="text" size="30" maxlength="50" name="event_organizer" value="<?=$people_info["member_lname"]?>">
</td>
</tr>
<tr>
<td colspan="2" class='txt_label'>
Contact E-mail:<br>
<input type="text" size="30" maxlength="50" name="email" value='<?=$people_info["member_email"]?>'>
</td>
</tr>
<iframe name="options" align="options" width="0" height="0"></iframe>
<tr>
<td nowrap colspan="2" class='txt_label'>
Event Type:&nbsp;
<input type="radio" onclick="document.getElementById('options').src='./get_event_categories.php?type=1&time=<?=time()?>';" name="type" value="1" checked> Public&nbsp;&nbsp;
<input type="radio" onclick="document.getElementById('options').src='./get_event_categories.php?type=2&time=<?=time()?>';" name="type" value="2"> Private
</td>
</tr>
<tr>
<td colspan="2" valign="top" class='txt_label'>
Category: *&nbsp;
<SPAN id="asd">
<select name="category">
<option value=''></option>
<?php
     $cats_res=$events->get_all_cats();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($HTTP_GET_VARS["cat_id"]==$cats_set["id"] || $cats_set['def'])
         {
?>
  <option value="<?=$cats_set["id"]?>" selected><?=$cats_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
  <option value="<?=$cats_set["id"]?>"><?=$cats_set["cat_name"]?></option>
<?php
         }
     }
?>

</select>
</span>
</td>
</tr>

<tr>
<td colspan="2" class='txt_label'>
Short Description (no HTML):<br>
<textarea name="description" rows="2" cols="30"></textarea>
</td>
</tr>
<tr>
<td colspan="2" class='txt_label'>
Long Description (HTML OK):<br>
<textarea name="long_description" rows="4" cols="30"></textarea><br><br><br>
<font size=1>* Required fields</font>
</td>
</tr>
</table>
</td>
<td width="3%" class='txt_label'>&nbsp;&nbsp;</td>
<td valign="top" class='txt_label' width="52%">
<table border="0" cellpadding="5" cellspacing="0">
<tr height="20">
<td colspan="3" class='txt_label'><b>&nbsp;When &amp; Where?</b></td>
</tr>
<tr height="10"><td colspan="3"></td>
</tr>
<tr>
<td class='txt_label' colspan="3">
Start Date:<br>
<select name="month">
<option value="1">Jan </option>
<option value="2">Feb </option>
<option value="3">Mar </option>
<option value="4" selected>Apr </option>
<option value="5">May </option>
<option value="6">Jun </option>
<option value="7">Jul </option>
<option value="8">Aug </option>
<option value="9">Sep </option>
<option value="10">Oct </option>
<option value="11">Nov </option>
<option value="12">Dec </option>
</select>/
<select name="day">
<?php
     $sr_no=1;
     while($sr_no!=31)
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
         $sr_no=$sr_no+1;
     }
?>
</select>/
<select name="year">
<?php
     $sr_no=2005;
     while($sr_no!=2015)
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
         $sr_no=$sr_no+1;
     }
?>
</select>
</td>
</tr>
<tr>
<td class='txt_label' colspan="3">
Start Time:<br>
<select name="hour">
<?php
     $sr_no=1;
     while($sr_no!=12)
     {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
         $sr_no=$sr_no+1;
     }
?>
</select>:
<select name="minute">
<?php
     $sr_no=0;
     while($sr_no!=60)
     {
         if($sr_no<10)
         {
?>
<option value="<?=$sr_no?>">0<?=$sr_no?></option>
<?php
         }
         else
         {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
         }
         $sr_no=$sr_no+5;
     }
?>
</select>
<select name="marker">
<option value="AM">AM</option>
<option value="PM" selected>PM</option>
</select>
</td>
</tr>
<tr height="10">
<td colspan="2"></td>
</tr>
<tr>
<td class='txt_label' colspan="3">
Place/Venue:<br>
<input type="text" name="location" value="" size="30" maxlength="50">
</td>
</tr>
<tr>
<td class='txt_label' colspan="3">
Address:<br>
<input type="text" name="address" value="" size="30" maxlength="50">
</td>
</tr>
<tr>
<td class='txt_label' colspan="3">
City: **<br>
<input type="text" name="city" value="" size="30" maxlength="50">
</td>
</tr>
<tr>
<td class='txt_label'>
State:**
<select name="state" class="normalarial">
<option value=""> </option>
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AB">AB</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="BC">BC</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MB">MB</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NB">NB</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NF">NF</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="NS">NS</option>
<option value="NU">NU</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="ON">ON</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="PE">PE</option>
<option value="QC">QC</option>
<option value="RI">RI</option>
<option value="SK">SK</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>
<option value="YT">YT</option>
</select>
</td>

<td class='txt_label'>
Zip: **<br>
<input type="text" name="zip_code" value="" size="5" maxlength="5">
</td>
<td class='txt_label'>
Country:<br>
<select name="country" class="normalarial" style="width: 120px;">
<option value="">Select A Country:</option>
<?php
  $sr_no=0;
  $count=count($country);
  while($sr_no!=$count)
  {
?>
<option value="<?=$country[$sr_no]?>"><?=$country[$sr_no]?></option>
<?php
     $sr_no=$sr_no+1;
   }
?>
</select>
</td>
</tr>
<tr>
<td class='txt_label' colspan="3">** EITHER City/State OR valid Zip required for US/Canada</td>
</tr>
<tr height="15"><td colspan="3"></td></tr>
<tr>
<td class='txt_label' colspan="3" valign="middle">
<input type="submit" name="save" value="Save Event" style="background-color:#6699CC; border-width:1px; width:131 px; border-left-color:#AEE4FF; border-top-color:#AEE4FF; border-bottom-color:#003366; border-right-color:#003366; color:#FFFFFF; font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold;">
</td>
</tr>
</table>
</form>
</table>
</table></table>


<!-- middle_content -->
<!-- middle_content -->
</table>
</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>

<!-- Middle Text -->
<?php
}
include("includes/bottom.php");
?>
