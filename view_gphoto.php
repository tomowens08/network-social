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
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>View Photo</h3></td></tr>";


  print "<tr><td colspan='2' class='txt_label'>";
  print "<table>";

  print "<tr><td>";
   print "<a href='view_group.php?group_id=$HTTP_GET_VARS[group_id]'>Back to group >>></a>";
  print "</td></tr>";

  print "<tr><td>";
   print "<a href='view_group_images.php?group_id=$HTTP_GET_VARS[group_id]'>Back to gallery >>></a>";
  print "</td></tr>";


        $sql="select * from group_photos where photo_id = ".$HTTP_GET_VARS["photo_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "<tr>";
  print "<td width='100%'class='txt_label'>";
  print "<p align='center'>";
  print "<img src='$RSUser1[photo_url]'></p>";
  print "</td>";
  print "</table>";
  print "</td></tr>";
  print "</table>";
  print "</td>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>"
