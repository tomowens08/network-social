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
  print "<h3>Delete a Message</h3></td></tr>";

  if ($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
  {
        $sql="update messages set deleted = 1 where mess_id = ".$HTTP_GET_VARS["mess_id"];
        $result1=mysql_query($sql);
  }

  if ($HTTP_GET_VARS["folder"]=="sent")
  {
        $sql="update messages_sent set deleted = 1 where mess_id = ".$HTTP_GET_VARS["mess_id"];
        $result1=mysql_query($sql);
  }



print "<tr>";
print "<td width='100%' colspan='2' class='login'><p align='center'>The message has been deleted and has been stored in your deleted folder.</p></td></tr>";
print "<td width='100%' colspan='2' class='login'><p align='center'><a href='view_folder.php?folder=".$HTTP_GET_VARS["folder"]."&page=1'>Back</a></p></td></tr>";

print "</table>";
print "</td></tr></table>";


print "<table width='100%' align='center'>";
print "<tr>";
print "<td width='100%'>&nbsp;</td>";
print "</tr>";
print "</table>";
?>

</td>
</tr>


</table>

<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
