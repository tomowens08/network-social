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
  print "<h3>Add a new post!</h3></td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  if ($HTTP_POST_VARS["subject"]=="" || $HTTP_POST_VARS["message"]=="")
  {
    print "You did not enter both the fields.";
  }
    else
  {
        $date_posted = date("y-m-d");

        $sql="insert into board_sub";
        $sql.="(board_id";
        $sql.=", member_id";
        $sql.=", message";
        $sql.=", subject";
        $sql.=", posted_on)";
        $sql.=" values($HTTP_GET_VARS[board_id]";
        $sql.=", $_SESSION[member_id]";
        $sql.=", '$HTTP_POST_VARS[message]'";
        $sql.=", '$HTTP_POST_VARS[subject]'";
        $sql.=", '$date_posted')";
        $result=mysql_query($sql);

  print "<p align='center'><font face='Arial' size='2'>Your message has been posted.<br><a href='view_board.php?page=1&board_id=".$HTTP_GET_VARS["board_id"]."'>Back</a>";
} 

print "</p></td></tr>";


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
