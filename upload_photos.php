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
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Upload Photographs</h3></td></tr>";

// Upload Image Code
  print "<form name='UploadImages' action='upload_photos1.php' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";

  print "<INPUT TYPE='FILE' SIZE='40' NAME='image'><BR>";
  print "Allowed Formats: *.jpg,*.jpeg,*.png,*.tif,*.gif";
  print "</td></tr>";

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
