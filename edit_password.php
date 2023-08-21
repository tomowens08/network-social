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
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Edit Password</h3></td></tr>";

// Upload Image Code
  print "<form name='UploadImages' action='edit_password1.php' method='post'>";
  print "<tr>";
  print "<td width='30%' class='login'>Current Password:</td>";
  print "<td width='70%' class='login'><input type='text' SIZE='40' name='current_password'></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%' class='login'>New Password:</td>";
  print "<td width='70%' class='login'><input type='text' SIZE='40' name='new_password'></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
  print "</form>";

// Upload Image Code


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
