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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Add an address to address book</h3></td></tr>";

  print "<form name='Search' action='add_address1.php' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  print "<table width='100%'>";
  print "<tr><td width='30%' class='txt_label'>Name:</td>";
  print "<td width='70%'><input type='text' name='name' size='20'></td>";
  print "</tr>";
  print "<tr><td width='30%' class='txt_label'>E-Mail:</td>";
  print "<td width='70%'><input type='text' name='email' size='20'></td>";
  print "</tr>";
  print "<tr><td width='30%'>&nbsp;</td>";
  print "<td width='70%'><input type='submit' name='submit' value='Add Address'></td>";
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
