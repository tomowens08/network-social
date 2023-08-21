<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>
<?php
    include("includes/class.class.php");
    include("includes/people.class.php");
    include("includes/events.class.php");

    $class=new classified;
    $people=new people;
    $events=new events;

    $people_info=$people->get_info($_SESSION["member_id"]);
?>

<!-- Classified Entry -->

<table height="100%" width="720" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table border="0" cellspacing="0" cellpadding="0" bgcolor="FFFFFF" align="center">
<tr>
<td valign="top">
<table border="0" cellspacing="0" cellpadding="5" align="center">
<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor=white>
<tr>
<td><font class="blacktext10">Events </td>
<td width="50%" align="right">
<a class="man" href="events.php">Events Home</a> &nbsp;|&nbsp;
Create Event</a> &nbsp;
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td valign="top">
<table cellspacing="0" cellpadding="10" border=1 bordercolor="6699CC" width="100%" align="center">
<tr>
<td valign="top">

<form method="post" name="createEvent" action="edit_event1.php?event_id=<?=$HTTP_GET_VARS["event_id"]?>">
<table border="2" cellpadding="0" cellspacing="0" width="100%" align="center" bordercolor="#FFFFFF">
<tr>
<td>
<table border="2" cellpadding="0" cellspacing="0" width="95%" align="center" bordercolor="#FFFFFF">
<tr>
<td>
<p><STRONG>Edit An Event</STRONG> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><font color=gray><A href="invite_event.php?event_id=<?=$HTTP_GET_VARS["event_id"]?>">Invite Friends</a><strong></font></p>
</td>
<td align=right>
</td>
</tr>
</table>
<br>
<?php
     $event_set=$events->get_event($HTTP_GET_VARS["event_id"]);
?>
<table border="0" cellpadding="5" cellspacing="0" width="95%" align="center">
<tr>
<td valign="top" width="45%">
<table border="0" cellpadding="5" cellspacing="0">
<tr bgcolor="#6699CC" height="20">
<td colspan="2"><b><font color="#FFFFFF">&nbsp;What's Going On?</font></b></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td colspan="2">
Event Name: *<br>
<input type="text" size="30" maxlength="50" name="event_name" value="<?=$event_set["event_name"]?>">
</td>
</tr>
<tr>
<td colspan="2">
Event Organizer: *<br>
<input type="text" size="30" maxlength="50" name="event_organizer" value="<?=$event_set["organizer"]?>">
</td>
</tr>
<tr>
<td colspan="2">
Contact E-mail:<br>
<input type="text" size="30" maxlength="50" name="email" value="<?=$event_set["email"]?>">
</td>
</tr>

<tr>
<td nowrap>
Event Type:<br>
<?php
if($event_set["event_type"]==1)
{
?>
<input type="radio" name="type" value="1" checked> Public<br>
<input type="radio" name="type" value="2"> Private
</td>
<td valign="top">
Category: *<br>
<div id="category_public" class="divclass_1">
<select name="category">
<option value=""></option>
<?php
     $cats_res=$events->get_all_cats();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($event_set["cat_id"]==$cats_set["id"])
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
</div>
<div id="category_private" class="divclass">
<select name="category_private">
<option value=""></option>
<?php
     $cats_res=$events->get_all_cats_private();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($HTTP_GET_VARS["cat_id"]==$cats_set["id"])
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
</div>

<?php
     }
     else
     {
?>
<input type="radio" name="type" value="1"> Public<br>
<input type="radio" name="type" value="2" checked> Private
</td>
<td valign="top">
Category: *<br>
<div id="category_public" class="divclass_1">
<select name="category">
<option value=""></option>
<?php
     $cats_res=$events->get_all_cats();
     while($cats_set=mysql_fetch_array($cats_res))
     {
?>
  <option value="<?=$cats_set["id"]?>"><?=$cats_set["cat_name"]?></option>
<?php
     }
?>

</select>
</div>
<div id="category_private" class="divclass">
<select name="category_private">
<option value=""></option>
<?php
     $cats_res=$events->get_all_cats_private();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($event_set["cat_id"]==$cats_set["id"])
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
</div>

<?php
     }
?>
</td>
</tr>

<tr>
<td colspan="2">
Short Description (no HTML):<br>
<textarea name="description" rows="2" cols="45"><?=$event_set["short_desc"]?></textarea>
</td>
</tr>
<tr>
<td colspan="2">
Long Description (HTML OK):<br>
<textarea name="long_description" rows="4" cols="45"><?=$event_set["long_desc"]?></textarea><br><br><br>
<font size=1>* Required fields</font>
</td>
</tr>
</table>
</td>
<td width="3%">&nbsp;&nbsp;</td>
<td valign="top" width="52%">
<table border="0" cellpadding="5" cellspacing="0">
<tr bgcolor="#6699CC" height="20">
<td colspan="3"><b><font color="#FFFFFF">&nbsp;When &amp; Where?</font></b></td>
</tr>
<tr height="10"><td colspan="3"></td>
</tr>
<tr>
<td colspan="3">
Start Date:<br>
<select name="month">
<?php
  $sr_no=1;
  $count=count($month);
  while($sr_no!=13)
  {
      if($event_set["start_month"]==$sr_no)
      {
?>
<option value="<?=$sr_no?>" selected><?=$month[$sr_no]?></option>
<?php
      }
      else
      {
?>
<option value="<?=$sr_no?>"><?=$month[$sr_no]?></option>
<?php
      }
      $sr_no=$sr_no+1;
  }
?>

</select>/
<select name="day">
<?php
     $sr_no=1;
     while($sr_no!=31)
     {
         if($event_set["start_day"]==$sr_no)
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
</select>/
<select name="year">
<?php
     $sr_no=2005;
     while($sr_no!=2015)
     {
         if($event_set["start_year"]==$sr_no)
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
</select>
</td>
</tr>
<tr>
<td colspan="3">
Start Time:<br>
<select name="hour">
<?php
     $sr_no=1;
     while($sr_no!=12)
     {
         if($sr_no==$event_set["start_hour"])
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
</select>:
<select name="minute">
<?php
     $sr_no=0;
     while($sr_no!=60)
     {
      if($sr_no==$event_set["start_minute"])
      {

         if($sr_no<10)
         {
?>
<option value="<?=$sr_no?>" selected>0<?=$sr_no?></option>
<?php
         }
         else
         {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
         }
       }
       else
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
       }
         $sr_no=$sr_no+5;
     }
?>
</select>
<select name="marker">
<?php
if($event_set["start_marker"]=="AM")
{
?>
<option value="AM" selected>AM</option>
<option value="PM">PM</option>
<?php
}
else
{
?>
<option value="AM">AM</option>
<option value="PM" selected>PM</option>
<?php
}
?>
</select>
</td>
</tr>
<tr height="10">
<td colspan="2"></td>
</tr>
<tr>
<td colspan="3">
Place/Venue:<br>
<input type="text" name="location" value="<?=$event_set["place"]?>" size="30" maxlength="50">
</td>
</tr>
<tr>
<td colspan="3">
Address:<br>
<input type="text" name="address" value="<?=$event_set["address"]?>" size="30" maxlength="50">
</td>
</tr>
<tr>
<td colspan="3">
City: **<br>
<input type="text" name="city" value="<?=$event_set["city"]?>" size="30" maxlength="50">
</td>
</tr>
<tr>
<td>
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

<td>
Zip: **<br>
<input type="text" name="zip_code" value="<?=$event_set["zip"]?>" size="5" maxlength="5">
</td>
<td>
Country:<br>
<select name="country" class="normalarial" style="width: 120px;">
<option value="">Select A Country:</option>
<?php
  $sr_no=0;
  $count=count($country);
  while($sr_no!=$count)
  {
      if($country[$sr_no]==$event_set["country"])
      {
?>
<option value="<?=$country[$sr_no]?>" selected><?=$country[$sr_no]?></option>
<?php
      }
      else
      {
?>
<option value="<?=$country[$sr_no]?>"><?=$country[$sr_no]?></option>
<?php
      }
     $sr_no=$sr_no+1;
   }
?>
</select>
</td>
</tr>
<tr>
<td colspan="3">** EITHER City/State OR valid Zip required for US/Canada</td>
</tr>
<tr height="15"><td colspan="3"></td></tr>
<tr>
<td colspan="3" valign="middle">
<input type="submit" name="save" value="Edit Event" style="background-color:#6699CC; border-width:1px; width:131 px; border-left-color:#AEE4FF; border-top-color:#AEE4FF; border-bottom-color:#003366; border-right-color:#003366; color:#FFFFFF; font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold;">
</td>
</tr>
</table>
</form>
</table>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
 }
     include("includes/bottom.php");
?>
