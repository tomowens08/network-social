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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Add a new board</h3></td></tr>";

  print "<form name='Search' action='add_board1.php' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  print "<table width='100%'>";
  print "<tr><td width='30%'>Board Name:</td>";
  print "<td width='70%'><input type='text' name='board_name' size='20'></td>";
  print "</tr>";
  print "<tr><td width='30%'>Board Desc.:</td>";
  print "<td width='70%'><input type='text' name='board_desc' size='20'></td>";
  print "</tr>";
  print "<tr><td width='30%'>&nbsp;</td>";
  print "<td width='70%'><input type='submit' name='submit' value='Add'></td>";
  print "</tr>";
  print "</form>";
  print "</table>";
  print "</p></td></tr>";


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
