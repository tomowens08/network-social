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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='80%' align='center' cellpadding='4' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";

   include("includes/people.class.php");
   $people = new people;
   $name = $people->get_name($HTTP_GET_VARS["member_id"]);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'>";
  print "<span class='style18'>Add $name to Group</span></b></p></td></tr>";
  print "<form name='AddTestimonial' action='add_group1.php?member_id=$HTTP_GET_VARS[member_id]' method='post'>";

  print "<tr>";
  print "<td width='100%' class='txt_label'>";
  print "Do you really want to add $name to one of your groups?<br>";
  print "This will reveal your email address to $name.<br>";
  print "Select the group you wish to add $name to.<br>";
  print "Click \"Add\" only if you really wish to add $name.<br>";
  print "</td></tr>";

     include("includes/class.groups.php");
     $group = new groups;


  print "<tr>";
  print "<td width='100%' class='txt_label'>";
  print "Add $name to:<br>";
		$sql = "SELECT g.group_name, g.id FROM groups g LEFT JOIN invitations i ON g.id = i.group_id WHERE
						(g.member_id = '".$_SESSION['member_id']."' 
						OR
						(i.member_id = '".$_SESSION['member_id']."' AND i.status = 1 AND g.members_invite = 1)) GROUP BY g.id ORDER BY g.group_name";
		$group_res = mysql_query($sql);

  print "<select name='group_id' value='1'>";
        while($group_set = mysql_fetch_array($group_res))
        {
            print "<option value='$group_set[id]'>$group_set[group_name]</option>";
        }
  print "</select>";
  print "</td></tr>";


  print "<tr>";
  print "<td width='100%' class='login'>";
  print "<p align='center'><input type='submit' name='submit' value='Add to Group'></p></td></tr>";
  print "</form>";

  print "</td></tr></table>";

  print "</table>";
  print "</td>";
  print "</tr>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
