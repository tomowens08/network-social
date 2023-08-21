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
  print "<h3>Add a new board</h3></td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  if ($HTTP_POST_VARS["board_name"]=="" || $HTTP_POST_VARS["board_desc"]=="")
  {
    print "You did not enter both the fields.";
  }
    else
  {

        $sql="insert into board_main";
        $sql.="(member_id";
        $sql.=", subject";
        $sql.=", body)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", '$HTTP_POST_VARS[board_name]'";
        $sql.=", '$HTTP_POST_VARS[board_desc]')";
        
        $result=mysql_query($sql);
        print mysql_error();

  print "Your board has been created.";
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
