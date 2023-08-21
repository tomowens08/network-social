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
  print "<h3>Reply Admin</h3></td></tr>";


  print "<form name='AddTestimonial' action='reply_admin1.php?member_id=".$_SESSION["member_id"]."' method='post'>";

  print "<tr>";
  print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>To:</td><td width='60%' class='login'>Administrator";
  print "</td></tr>";

  print "<tr>";
  print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Subject:</td><td width='60%' class='login'>";
  print "<input type='text' name='subject' size='30'>";
  print "</td></tr>";


  print "<tr>";
  print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Message:</td><td width='60%' class='login'>";

  print "<textarea name='message' rows='5' cols='30'></textarea>";

  print "</td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Send Message'></p></td></tr>";
  print "</form>";


  print "</table>";
  print "</td>";

  print "</tr></table>";

?>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
