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
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
/*
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  print "<tr>";
  print "<td>";
  include("includes/comm1.php");

  print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Manage Account</span></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_profile.php' class='style11'>Edit Profile</a></b></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "(".$RSUser1["a"].")";
  print "</td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
  print "</table>";
  print "</td>";
  print "</tr>";

// Links Message



  print "</table>";

  print "</td>";
*/

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='login' bgcolor='#FF6600'><b><p align='center'><span class='style18'>Delete a message</span></b></p></td></tr>";

  if ($HTTP_GET_VARS["folder"]=="inbox")
  {
        $sql="delete from messages where mess_id = ".$HTTP_GET_VARS["mess_id"];
        $result1=mysql_query($sql);
  }

  if ($HTTP_GET_VARS["folder"]=="sent")
  {
        $sql="delete from messages_sent where mess_id = ".$HTTP_GET_VARS["mess_id"];
        $result1=mysql_query($sql);
  }



print "<tr>";
print "<td width='100%' colspan='2' class='login'><p align='center'>The message has been deleted permanently.</p></td></tr>";
print "<td width='100%' colspan='2' class='login'><p align='center'><a href='view_folder.php?folder=deleted&page=1'>Back</a></p></td></tr>";


print "</table>";
print "</td></tr></table>";

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
