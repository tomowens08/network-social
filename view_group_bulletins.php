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


	$sql = "SELECT * FROM groups WHERE id = ".$HTTP_GET_VARS[group_id];
	$gr = mysql_fetch_array(mysql_query($sql));
	$group_type = $gr['type'];
	
	$sql = "SELECT status FROM invitations WHERE member_id = ".$_SESSION['member_id']." AND group_id = ".$HTTP_GET_VARS[group_id];
	$res = mysql_fetch_array(mysql_query($sql));
	$status = $res['status'];

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
  print "<h3>Group Bulletins</h3></td></tr>";

  print "<tr><td colspan='2' class='txt_label'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group = new groups;
     $group_id = $HTTP_GET_VARS["group_id"];
     $group_info = $group->get_group_info($group_id);
		 $creator = $group->get_member_id($group_id);
?>

<table cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<tbody>
<tr>
<td vAlign='top' width='50%'><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a></td>
<td vAlign='top' width='50%'>
<?
if ($status == 1 && ($group_info["post_bulletins"]=="1" || $creator == $_SESSION['member_id'])) {
?>
<div align='right'>
<a href="post_group_bulletin.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>"><img src='images/button_start_topic2.gif' border='0'></a>
</div>
<?
}
?>
</td>

</tr>
<tr>
<td colSpan=2>

<!-- view forum -->

<table border="0" cellspacing="0" cellpadding="0" width="100%"  bgcolor="#ffffff">
<tr>
<td colspan="2" align="left">
<table border="0" cellspacing="0" cellpadding="10" width="100%" bgcolor="#ffffff">
<tr>
<td align="left"><br><span class="blacktext12">Group Bulletin Board</span><br><br>Post a bulletin and your message will show up on the group board, and in the group members bulletin board space. You can delete the bulletins you post; you can't delete others bulletins. Bulletins will expire in 10 days.</td>
</tr>
</table>
</td>
</tr>

<tr>
<td valign="top"><br><br>&nbsp;&nbsp;</td>
<td valign="top">
<table border="0" align="center" cellspacing="0" cellpadding="0" width="630">
<tr>
<td>
<?
if (($group_type == 1 || $group_type == 2) && $status == 1 && ($group_info["post_bulletins"]=="1" || $creator == $_SESSION['member_id'])) {
?>
<a href="post_group_bulletin.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>"></P>Post Group Bulletin</a>
<?
}
?>
</td>
<td align="right">
<a href="view_group.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>"></P>Return to Group</a></td>
</tr>

<tr>
<td height="8"></td>
</tr>
</table>
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="#639ACE" width="630">

<tr bgcolor="#EFF3FF">
<td height="24"><b>From</b></td>
<td align="center"><b>Date</b></td>
<td><b>Subject</b></td>
</tr>

<?php
     include("includes/people.class.php");
     $people=new people;

     include("includes/gforums.class.php");
     $gforums=new forum;

     include("includes/gbulletins.class.php");
     $gbulletins=new bulletin;

     $gbulletins->display_forum_bulletin($group_id);
?>
</table>
</td></tr>
</table>
<!-- view forum -->
<?php
  // run loop to display all my_groups
  print "</td></tr>";
  print "</table>";

  // run loop to display all categories
  print "</td></tr>";
     print "</table>";
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
