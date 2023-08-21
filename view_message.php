<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu_messages.php");
  print "</td>";

  if($HTTP_GET_VARS["folder"]!="sent")
  {
   $sql="update messages set mess_read=1 where mess_id=$HTTP_GET_VARS[mess_id]";
   $upd=mysql_query($sql);
  }
  else
  {
   $sql="update messages_sent set mess_read=1 where mess_id=$HTTP_GET_VARS[mess_id]";
   $upd=mysql_query($sql);
  }

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
?>
<?php
  if ($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
  {
        $sql = "select * from messages where mess_id = '".$HTTP_GET_VARS["mess_id"]."' AND (mess_to = '".$_SESSION['member_id']."' OR mess_by = '".$_SESSION['member_id']."')";
				$result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        $RSUser1=mysql_fetch_array($result1);
  }


  if ($HTTP_GET_VARS["folder"]=="sent")
  {
        $sql="select * from messages_sent where mess_id = ".$HTTP_GET_VARS["mess_id"]." AND (mess_to = ".$_SESSION['member_id']." OR mess_by = ".$_SESSION['member_id'].")";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        $RSUser1=mysql_fetch_array($result1);
  }
    include("includes/people.class.php");
    $people=new people;
		if ($num_rows) {
?>

<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">
<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="E8F1FA" class='txt_label'>
<?php
    if ($HTTP_GET_VARS["folder"]=="sent")
    {
?>
To:
<?php
    }
    else
    {
?>
From:
<?php
     }
?>
</td>

<td width="86%">
<?php
if($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
{
     $num_images=$people->get_num_images($RSUser1["mess_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($RSUser1["mess_by"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($RSUser1["mess_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $name=$people->get_name($RSUser1["mess_by"]);
}
else
{
     $num_images=$people->get_num_images($RSUser1["mess_to"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($RSUser1["mess_to"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($RSUser1["mess_to"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $name=$people->get_name($RSUser1["mess_to"]);
}
?>
<?php
     if($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
     {
?>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_by"]?>'><?=$image?></a>
<br>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_by"]?>'><?=$name?></a>
<?php
     }
     else
     {
?>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_to"]?>'><?=$image?></a>
<br>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_to"]?>'><?=$name?></a>
<?php
     }
?>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA" class='txt_label'>Date:</td>
<td width="86%" class='txt_label'>
<?=myDate($RSUser1["date_posted"]);?>
</font>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA" class='txt_label'>Subject:</td>
<td width="86%" class='txt_label'><?=$RSUser1["subject"]?></font></td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA" class='txt_label'>Body:</td>
<td width="86%" class='txt_label'>
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
<tr><td>
<?=trim(stripslashes($RSUser1["mess_text"]))?>
</td></tr>
</table>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="middle" align="left">
<br>
<?php
    if ($HTTP_GET_VARS["folder"]!="sent")
    {
?>
<form name='reply' method='post' action='reply.php?mess_id=<?=$HTTP_GET_VARS["mess_id"]?>&folder=<?=$HTTP_GET_VARS["folder"]?>'>
<input type='hidden' name='subject' value='<?=$RSUser1["subject"]?>'>
<input type='hidden' name='posted_on' value='<?=$RSUser1["date_posted"]?>'>
<input type='hidden' name='message' value="<?=htmlspecialchars($RSUser1["mess_text"])?>">
<input type="submit" name='Submit' value="-Reply-">&nbsp;&nbsp;
</form>
<?php
     }
?>
</td>
</tr>
</table>
</table>
</table>
<?php
  print "</table>";
  print "</td>";

//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
	}
include("includes/bottom.php");
}
?>
