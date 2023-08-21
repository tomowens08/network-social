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

  print "<td width='100%' valign='top'>";
  print "<table width='70%' align='left' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='login' bgcolor='#FF6600'><b><p align='center'><span class='style18'>Add a board</span></b></p></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";

        $sql="select * from board_main where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  if ($RSUser["member_id"]==$_SESSION["member_id"])
  {
        $sql="delete from board_main where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $sql="delete from board_sub where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $sql="delete from board_reply where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        print "<p align='center'><font face='Arial' size='2'>Your board has been deleted.<br><a href='message_board.php'>Back</a>";
  }
  else
  {
        print "<p align='center'><font face='Arial' size='2'>You cannot delete this board.<br><a href='message_board.php'>Back</a>";
  }


print "</p></td></tr>";


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
