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

<?php

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_import.php");
  print "</td>";

?>
<td width='80%' valign='top'>
<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='style9' valign='top'>

<?php

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<b><p align='center'>Import your address book</b></p></td></tr>";

  print "<form name='UploadImages' action='import1.php' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";
  print "<input type='file' size='40' name='file'><br>";
  print "</td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";
  print "<p align='center'><input type='submit' name='submit' value='Import Address Book'></p>";
  print "</td></tr>";
  print "</form>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";
  print "<p align='center'><a class='style11' href=javascript:winopen('help_import.php')>Help</a></p>";
  print "</td></tr>";

  print "</table>";
  print "</p></td></tr>";


  print "</table>";
  print "</td>";
  print "</tr></table>";

?>

</td>
</tr>
<!-- middle_content -->
</blockquote>


<?php
print "</td>";
?>
</tr>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
