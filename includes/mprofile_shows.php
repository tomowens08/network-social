<table bordercolor="000000" height="80%" cellspacing="0" cellpadding="0" width="100%" bgcolor="ffffff" border="0">
<tbody>
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>Music <b>&gt;&gt; </b>Edit Upcoming Shows
</span>
</td>
<td align="right">
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View Band Profile</a>
</td>
</tr>
</table>
</td>
</tr>


<form name="insert_company_form" method="post" action="edit_mprofile1.php">
<input type='hidden' name='type' value='<?=$HTTP_GET_VARS["type"]?>'>

<table cellspacing=0 cellpadding=10 width="100%" bgcolor=#ffffff border=0>
<tbody>
<tr valign=top>
<td height=210>
<table border="0" cellpadding="0" cellspacing="0" width="600" height="30">
<tr>
<td width="350" height="20" valign="top" align="left">
<b><font face="verdana" size="2">&nbsp;&nbsp;&nbsp;Add a New Show</font></b>
</td>
<td width="250" valign="top" align="right">
&nbsp;&nbsp;&nbsp;<b><font face="verdana" size="2">*Required Fields</font></b>
</td>
</tr>
<tr>
<td colspan="2" valign="top">&nbsp;&nbsp;<span class="redtext"></span>
</td>
</tr>
</table>

<table cellspacing="2" cellpadding="0" width="100%" border=0>
<tbody>
<tr valign="top">
<td align="right" width="100" class='txt_label'>
<b>Show Date:&nbsp;&nbsp;</b>
</td>
<td width="501" colspan="2">
<select name="month" class="normalarial">
<?php
    $sr_no=0;
    $count=count($month);
    $cur_month=date("M");
    while($sr_no<$count)
    {
      if($cur_month==$month["$sr_no"])
      {
?>
<option value="<?=$month["$sr_no"]?>" selected><?=$month["$sr_no"]?></option>
<?php
      }
      else
      {
?>
<option value="<?=$month["$sr_no"]?>"><?=$month["$sr_no"]?></option>
<?php
      }
      $sr_no=$sr_no+1;
    }
?>
</select>
<b>/</b>
<select name="day" class="normalarial">
<?php
    $sr_no=1;
    $cur_day=date("d");
    while($sr_no<=31)
    {
      if($cur_day==$sr_no)
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
<b>/</b>
<select name="year" class="normalarial">
<option value="2005" selected>2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
</select>
<b>
<font face=verdana color="#356ba2" size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show Time:&nbsp;</font></b>
<select name="hour" class="normalarial">
<?php
    $sr_no=1;
    while($sr_no<=12)
    {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
        $sr_no=$sr_no+1;
    }
?>
</select>
<b>:</b>
<select name="min" class="normalarial">
<?php
    $sr_no=0;
    while($sr_no<=60)
    {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
        $sr_no=$sr_no+15;
    }
?>
</select>
&nbsp;&nbsp;
<select name="marker" class="normalarial">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br><br>
</td>
</tr>

<tr valign="top">
<td align="right" width="100" class='txt_label'>
<b>*Venue:&nbsp;&nbsp;</b>
</td>
<td width="501" colspan="2" class='txt_label' nowrap>
<input type="text" name="venue" size="30" value="">
<b>&nbsp;&nbsp;Cost:&nbsp;</b>
<input type="text" name="cost" size="14" value="" maxlength="100">
</td>
</tr>

<tr valign="top">
<td align="right" width="100" class='txt_label'>
<b>Address:&nbsp;&nbsp;</b>
</td>
<td width="501" colspan="2">
<input type="text" name="address" size="50" value=""><br>
</td>
</tr>

<tr valign="top">
<td align=right width=100 class='txt_label'>
<b>City:&nbsp;&nbsp;</b>
</td>
<td colspan="2" nowrap>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<input type="text" name="city" size="40" value="">
</td>
<td width="168" class='txt_label' valign="top">
<b>&nbsp;Zip Code:
</b><input type="text" name="zip_code" size="10" value="" maxlength="10" title="For Searching">
</td>
</tr>
<tr>
<td colspan="2" class='txt_label'>
<input type="radio" name="regional" value="state"  onClick="changeselect2();"  checked>
<b>State:&nbsp;</b>
<select name="state">
<option value="">Select</option>
<?php
     $count=count($state);
     $sr_no=0;
     while($sr_no<=$count)
     {
?>
  <option value="<?=$state[$sr_no]?>"><?=$state[$sr_no]?></option>
<?php
          $sr_no=$sr_no+1;
     }
?>
</select>
<input type="radio" name="regional" onClick="changeselect();" checked >
<b>Non-US:&nbsp;</b>
<select name="country" class="normalarial" style="width:150px">
<option value="">Select</option>
<?
$sql="select * from states";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
    if($HTTP_POST_VARS["country"]==$RSUser["state_name"])
    {
     print "<option value='$RSUser[state_name]' selected>".$RSUser["state_name"]."</option>";
    }
    else
    {
     print "<option value='$RSUser[state_name]'>".$RSUser["state_name"]."</option>";
    }
}
?>
</select>
</td>
</tr>
<tr>
<td width="322" colspan="2" height="30" valign="top" class='txt_label'>
*US users should enter a zip code
</td>
</tr>
</table>
</td>
</tr>
<tr valign="top">
<td align="right" width="100" class='txt_label'>
<b>Description:&nbsp;&nbsp;</b>
</td>
<td nowrap>
<textarea name="description" cols="50" rows="5"></textarea>
&nbsp;&nbsp;
</td>
<td valign="bottom" align="center">
<input class="txt_topic" id=formSubmit type='submit' value=Update border=0 name=formSubmit height="26" width="70">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</form>

<table width="625" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="31%" class='txt_label'><b>All Shows</b></td>
<td width="69%"></td>
</tr>
</table>

<table width="625" border="0" cellspacing="0" cellpadding="0" align="center">
<tr valign="top">
<td height="131"> <br>
<hr color="#6699CC" width="100%" align="center" size="2" noshade>

<table width="615" border="0" cellspacing="0" cellpadding="0" align="center">
<?php
     $show_res=$music->get_user_shows($_SESSION["member_id"]);
     while($show_set=mysql_fetch_array($show_res))
     {
?>
<!-- display_current_shows -->
<tr valign="top">
<td width="79%" class='txt_label'><b><?=$show_set["show_month"]?>/<?=$show_set["show_day"]?>/<?=$show_set["show_year"]?> <?=$show_set["show_hour"]?>:<?=$show_set["show_min"]?> <?=$show_set["show_marker"]?></b>
&nbsp;-&nbsp;<b><?=$show_set["venue"]?></b>
</td>
<td width="21%">
[<a onMouseOver="window.status='Edit'; return true" onMouseOut="window.status=''; return true" href="edit_show.php?id=<?=$show_set["id"]?>">Edit</a>]
&nbsp;&nbsp;
[<a onMouseOver="window.status='Delete'; return true" onMouseOut="window.status=''; return true" href="delete_show.php?id=<?=$show_set["id"]?>">Delete</a>]
</td>
</tr>
<tr valign="top">
<td colspan="2" class='txt_label'>
<?=$show_set["city"]?>,<?=$show_set["state"]?> ,  <?=$show_set["zip_code"]?>,<?=$show_set["country"]?>&nbsp;- &nbsp;<br>asd
</td>
</tr>
<!-- display_current_shows -->
<?php
     }
?>
</table>
<hr color="#6699CC" width="100%" align="center" size="2" noshade>
</td>
</tr>
</table>
