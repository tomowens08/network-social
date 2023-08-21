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

<p align='center'>
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
  print "<table width='50%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='login' bgcolor='#FF6600'><b><p align='center'><span class='style18'>Add a new post</span></b></p></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  if ($HTTP_POST_VARS["subject"]=="" || $HTTP_POST_VARS["message"]=="")
  {
    print "You did not enter both the fields.";
  }
    else
  {
        $date_posted = date("y-m-d");

        $sql="insert into board_reply";
        $sql.="(board_id";
        $sql.=", board_sub_id";
        $sql.=", member_id";
        $sql.=", message";
        $sql.=", subject";
        $sql.=", posted_on)";
        $sql.=" values($HTTP_GET_VARS[board_id]";
        $sql.=", $HTTP_GET_VARS[message_id]";
        $sql.=", $_SESSION[member_id]";
        $sql.=", '$HTTP_POST_VARS[message]'";
        $sql.=", '$HTTP_POST_VARS[subject]'";
        $sql.=", '$date_posted')";

        $result=mysql_query($sql);
        print mysql_error();

  print "<p align='center'><font face='Arial' size='2'>Your reply has been posted.<br><a href='view_bmessage.php?page=1&board_id=".$HTTP_GET_VARS["board_id"]."&message_id=".$HTTP_GET_VARS["message_id"]."'>Back</a>";
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
