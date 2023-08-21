<?
include("includes/top.php");
include("includes/conn.php");
include("includes/people.class.php");
include("includes/profile.class.php");
include("includes/music.class.php");

$people=new people;
$profile=new profile;
$music=new music;
$basic_info=$profile->get_basic($HTTP_GET_VARS["member_id"]);
$profile_back=$profile->get_back($HTTP_GET_VARS["member_id"]);

if($basic_info["music"]!=1)	{
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0" height=100>
<tr>
<td valign='top' bgcolor="FFFFFF" class="text" colspan="3" align="left" valign="bottom" style="word-wrap:break-word">
<?php
	$name = $people->get_name($HTTP_GET_VARS["member_id"]);
?>
<span class="nametext"><b><?=$name?></span>
</td>
</tr>
<tr><td valign='top'>

<table cellpadding=0 cellspacing=0 width=300 align="center">
<tr>
<td valign='top' width="75" height="75" bgcolor="ffffff" class="text">
<?php
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($HTTP_GET_VARS["member_id"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $image_url = $people->get_image($HTTP_GET_VARS["member_id"]);
        $pic_name = str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
?>
<a href='gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>
<?=$image?>
</a>
</td>
<td width="15" height="75" bgcolor="ffffff" class="text">
<img src="images/clear.gif" width="15" height="8" border="0" alt=""></td>
<td width="193" height="75" bgcolor="ffffff" class="text">
<?php
if($int["headline"]!=Null)
{
?>
"<?=stripslashes($int["headline"])?>"<br>
<?php
}
?>

<?=$basic_info["gender"]?><br>
<?php
        $days = datediff($basic_info["dob"], GetTodayDate(0));
        $years = $days/365;
        $years = substr($years,0,2);
?>
<?=$years?> years old<br>
<?=$basic_info["city"]?>
<?php
     if($basic_info["city"]!=Null)
     {
?>
,
<?php
     }
?>
<?=$basic_info["current_state"]?>
 <?=$basic_info["zip_code"]?><br>
<?php
if($basic_info["country"]!=Null)
{
 if(is_numeric($basic_info["country"]))
 {
  $sql = "select * from states where state_id = $basic_info[country]";
  $country_res = mysql_query($sql);
  $country_set = mysql_fetch_array($country_res);
 }
?>
<?=$country_set["state_name"]?> <?php
 }
?>
<?php
     if($basic_info["last_login"]!=Null)
     {
?>
<br>
<b>Last Login:</b>
<?=strftime("%B %d %Y",strtotime($basic_info["last_login"]))?>
<br>
<?php
     }
     else
     {
?>
<br><b>Last Login:</b> <?=date("m/d/Y")?><br>
<?php
     }
		 if ($people->check_online($HTTP_GET_VARS["member_id"]))
		 	echo '<b><font color="#ff0000">Online</font></b>';
?>
</td>
</tr>
</table></td></tr>
</table>
<?
} else {
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0" height=100>
<tr>
<td valign='top' bgcolor="FFFFFF" class="text" colspan="3" align="left" valign="bottom" style="word-wrap:break-word">
<?php
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
     $int = $profile -> get_interests($HTTP_GET_VARS["member_id"]);
		 $code = $int['interests'];
?>

<?php
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
     $int=$music->get_band_details($HTTP_GET_VARS["member_id"]);
     $basic_info=$music->get_basic($HTTP_GET_VARS["member_id"]);

?>
<span class="nametext"><b><?=$name?></span>
</td>
</tr>
<tr><td valign='top'>
<table cellpadding=0 cellspacing=0 width=300 align="center">
<tr>
<td valign='top' width="75" height="75" bgcolor="ffffff" class="text">
<?php
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
        $image_url=$people->get_image($HTTP_GET_VARS["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
?>
<a href='gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>
<?=$image?>
</a>
</td>
<td width="15" height="75" bgcolor="ffffff" class="text">
<img src="images/clear.gif" width="15" height="8" border="0" alt=""></td>
<td width="193" height="75" bgcolor="ffffff" class="text">
<?php
if($int["headline"]!=Null)
{
?>
"<?=$int["headline"]?>"<br>
<?php
}
?>
<?=$basic_info["website"]?><br>
<?=$basic_info["city"]?><br>
<br>
<?php
if($basic_info["country"]!=Null)
{
 if(is_numeric($basic_info["country"]))
 {
  $sql="select * from states where state_id = $basic_info[country]";
  $country_res=mysql_query($sql);
  $country_set=mysql_fetch_array($country_res);
 }
?>
<?=$country_set["state_name"]?>
<?php
 }
?>
<?php
     if($basic_info["last_login"]!=Null)
     {
?>
<br>Last Login: <?=$basic_info["last_login"]?><br>
<?php
     }
     else
     {
?>
<br>Last Login: <?=date("m/d/Y")?><br>
<?php
     }
		 if ($people->check_online($HTTP_GET_VARS["member_id"]))
		 	echo '<b><font color="#ff0000">Online</font></b>';
?>
</td>
</tr>
<tr align="center" valign="middle">
</table></td></tr>
</table>

<?php
     $sql="select display_name from members where member_id = $HTTP_GET_VARS[member_id]";
     $mem_res=mysql_query($sql);
     $mem_set=mysql_fetch_array($mem_res);
?>
<?php
     if($mem_set["display_name"]==Null)
     {
?>
<table cellspacing="0" cellpadding="0" width="300">
<tr>
<td width="300" height="15" class='text' class="text" align="left" style="word-wrap:break-word">
<!--My URL: <a href='<?=$site_url?><?=$HTTP_GET_VARS["member_id"]?>.html'><?=$site_url?><?=$HTTP_GET_VARS["member_id"]?>.html</a>-->
</td></tr>
<tr><td>
</table>
<?php
     }
     else
     {
?>
<table cellspacing="0" cellpadding="0" width="300">
<tr>
<td width="300" height="15" class='text' class="text" align="left" style="word-wrap:break-word">
My URL: <a href='<?=$site_url?><?=$mem_set["display_name"]?>.html'><?=$site_url?><?=$mem_set["display_name"]?>.html</a>
</td></tr>
<tr><td>
</table>
<?php
     }
}
?>
<table width="100%" border="0" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr align="center" valign="middle">
<td class="txt_label">
<label onclick="opener.document.location.replace('./view_profile.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>');window.close();" title="Click to view full profile" style="cursor:pointer">View full profile</label>&nbsp;&nbsp;&nbsp;<label onclick="window.close();" style="cursor:pointer" title="Click to close window">Close Window</label></td>
</tr>
</table>