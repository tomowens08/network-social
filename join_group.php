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
  print "<h3>Join a Group</h3></td></tr>";

  print "<form name='Search' action='confirm_join.php?group_id=$HTTP_GET_VARS[group_id]' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  print "<table width='100%'>";
?>
<table border="0" cellspacing="0" cellpadding="10" width="100%" bordercolor="#000000">
<tr>
<td colspan="2"><br><br><span class="blacktext12">Confirm Join Group</span><br><br></td>
</tr>
<tr>
<td valign="top">
<table width="100%" cellspacing="0" cellpadding="10" border="1" class="blue_border" style="border-collapse: collapse;">
<tr>
<td width="370" align="left">Do you really want to join ?<br>
<br>Click "Join" only if you really wish to be a member of the group.<br><br>
<input type="submit" value="Join">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="Cancel" onclick="window.location.href='view_group.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>';">
</td>
</tr>
</table>
</td>
</tr>
</table>
<?php
  print "</form>";
  print "</table>";
  print "</p></td></tr>";


//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
