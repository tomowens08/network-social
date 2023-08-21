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

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "Groups By Category</td></tr>";

  print "<tr><td colspan='2'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group=new groups;
     $n=$HTTP_GET_VARS["n"];
     if($n==Null)
     {
         $n=1;
     }

     $group_res=$group->display_groups($HTTP_GET_VARS["cat_id"],$n);


  // run loop to display all my_groups

  print "</td></tr>";
  print "</td></tr></table>";
?>
</table>
</table>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
