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
  print "<h3>Send Reply</h3></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  if ($HTTP_POST_VARS["subject"]=="" || $HTTP_POST_VARS["message"]=="")
  {
    print "You did not enter both the fields.";
  }
    else
  {

    $date_posted = date("y-m-d");
    $sql="insert into admin_reply";
    $sql.="(member_id";
    $sql.=", message";
    $sql.=", subject";
    $sql.=", posted_on)";
    $sql.=" values($_SESSION[member_id]";
    $sql.=", '$HTTP_POST_VARS[message]'";
    $sql.=", '$HTTP_POST_VARS[subject]'";
    $sql.=", '$date_posted')";
    $result=mysql_query($sql);

  print "<p align='center'><font face='Arial' size='2'>Your reply has been posted.";
} 

print "</p></td></tr>";


print "</table>";
print "</td>";
print "</tr></table>";


print "<table width='100%' align='center'>";
print "<tr>";
print "<td width='100%'>&nbsp;</td>";
print "</tr>";
print "</table>";
?>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
