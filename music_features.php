<?php
  session_start();
?>
<?php
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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/music_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='0'>";
  print "<tr><td colspan='2'>";
  $sql="select music_features from pages";
  $res=mysql_query($sql);
  $data_set=mysql_fetch_array($res);
  print stripslashes($data_set["music_features"]);
  print "</td></tr>";


  // run loop to display all categories
  print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
