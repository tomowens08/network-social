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


	$sql = "SELECT * FROM groups WHERE id = ".$HTTP_GET_VARS[group_id];
	$gr = mysql_fetch_array(mysql_query($sql));
	$group_type = $gr['type'];
	
	$sql = "SELECT status FROM invitations WHERE member_id = ".$_SESSION['member_id']." AND group_id = ".$HTTP_GET_VARS[group_id];
	$res = mysql_fetch_array(mysql_query($sql));
	$status = $res['status'];
  $group_id = $HTTP_GET_VARS["group_id"];

     include("includes/class.groups.php");
     $group = new groups;

	$creator = $group->get_member_id($group_id);
	
	if ($creator == $_SESSION['member_id'])
		$status = 1;
	if ((($group_type == 1 || $group_type == 2) && $status == 1) || !$group_type) {
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Group Forum</h3></td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);

     if($group_info["public_forum"]=="1")
     {
?>

<table cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<tbody>
<tr>
<td vAlign='top' width='50%'><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a></td>
<td vAlign='top' width='50%'>
<?
if ($status == 1) {
?>
<div align='right'>
<a href="post_group_forum_topic.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>"><img src='images/button_start_topic2.gif' border='0'></a>
</div>
<?
}
?>
</td>

</tr>
<tr>
<td colSpan=2>

<!-- view forum -->

<TABLE borderColor=#000000 cellSpacing=2 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD colSpan=4>
<TABLE cellSpacing='0' cellPadding='4' width="100%" border=0>
<TBODY>
<tr vAlign='center' bgColor='#eff3ff' height='20'>
<td width="29%" class='txt_label'><b>&nbsp;Forum Topic</B></TD>
<TD width="7%" class='txt_label'><b>Posts</b></TD>
<TD width="32%" class='txt_label'><b>Last Post</b></TD>
<TD width="32%" class='txt_label'><b>Topic Starter</b></TD></TR>


<?php
     include("includes/people.class.php");
     include("includes/gforums.class.php");
     $forum=new forum;
     $n=$HTTP_GET_VARS["n"];
     if($n==Null)
     {
         $n=1;
     }
     $forum->display_forum($group_id,$n);
?>

</tbody></table></td></tr></tbody></table>

<!-- view forum -->
</td></tr>

</tbody>
</table>
<?php
     }
     else
     {
?>
This forum does not allow public forum post.
<?php
     }

  // run loop to display all my_groups
  print "</td></tr>";
  print "</table>";

  // run loop to display all categories
  print "</td></tr>";
//     print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
	}
include("includes/bottom.php");
}
?>
