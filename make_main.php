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
  print "<h3>Change Main Image</h3></td></tr>";

  include("includes/people.class.php");
  $people=new people;
  $photo_id=$HTTP_GET_VARS["photo_id"];
  $member_id=$_SESSION["member_id"];
  
  $res=$people->make_main($photo_id,$member_id);
  if($res==1)
  {
   print "<tr>";
   print "<td width='100%' colspan='2' class='login'><p align='center'>The Image has been changed as main image.</p></td></tr>";
  }
  else
  {
  }
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
