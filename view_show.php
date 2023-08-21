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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
   include("includes/music_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Shows in your area!</h3></td></tr>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";

$sql="select * from music_shows";
$sql.=" where id = $HTTP_GET_VARS[id]";
$res=mysql_query($sql);
$show_info=mysql_fetch_array($res);

         $sql="select * from members where member_id = $show_info[member_id]";
         $mem_res=mysql_query($sql);
         $mem_set=mysql_fetch_array($mem_res);

?>

<table borderColor=#000000 cellSpacing=0 cellPadding=0 width='100%' bgColor=#ffffff border=0>
<tbody><tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td valign="top" bgcolor="#6699cc"><table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
<td valign="top" class='txt_label' bgcolor="#FFFFFF">
<p><strong><font size="3"><?=$mem_set["member_name"]?></font></strong></p>
<p><strong><font size="2"><?=$show_info["show_month"]?>, <?=$show_info["show_day"]?> <?=$show_info["show_year"]?> at <?=$show_info["venue"]?><br>
<?=$show_info["address"]?>, <?=$show_info["city"]?>, <?=$show_info["state"]?> <?=$show_info["zip_code"]?><br>
Cost: <?=$show_info["cost"]?></font></strong></p>
<p>
<?=$show_info["description"]?>
</p>
</td>
</tr>
</table>
</td>
</tr>
</table>

</table></table></table></table>
</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");
}
?>
