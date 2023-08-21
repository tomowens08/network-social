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
  print "<td width='20%'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Groups By Category</h3></td></tr>";

  print "<tr><td colspan='2'>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all categories

     include("includes/class.groups.php");
     
     $group=new groups;
     
     $group_res=$group->get_all_cats();
     $sr_no=0;
     print "<tr>";
     while($group_set=mysql_fetch_array($group_res))
     {
         if($sr_no%2==0)
         {
             print "</tr><tr>";
         }
         
         print "<td width='50%' class='txt_label'>";
               $num_groups=$group->get_num_groups($group_set["id"]);
               
               print "<a href='view_groups.php?cat_id=$group_set[id]'>$group_set[cat_name]</a> ($num_groups groups)";

         print "</td>";
         
         $sr_no=$sr_no+1;

     }
  
  // run loop to display all categories
  print "</td></tr>";
     print "</table>";
  print "</td></tr></table>";
    print "</td></tr></table>";
	
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
