<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<table>
<tr>
<td width='750' height='232' valign='middle' colspan='2'>
<p align='center'>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "<font face='verdana' size='2'><b>You need to login before you can view this page.</b></font>";
}
  else
{

  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";

  print "</table>";

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='100%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Delete Event</b></p></td></tr>";

          $sql = "delete from events_comments where event_id = $HTTP_GET_VARS[event_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from events_rsvp where event_id = $HTTP_GET_VARS[event_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from events where id = $HTTP_GET_VARS[event_id]";
          $result=mysql_query($sql);
          print mysql_error();

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";
  print "<p align='center'>The event has been deleted successfully.</p>";
  print "</td></tr>";

print "</table>";
print "</td></tr></table>";


print "<table width='100%' align='center'>";
print "<tr>";
print "<td width='100%'>&nbsp;</td>";
print "</tr>";
print "</table>";
}
?>
</td>
</tr>
</body>
</html>
