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
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Post a Topic</h3></td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group=new groups;
     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);

     if($group_info["public_forum"]=="1")
     {
?>

<table cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<tbody>
<tr>
<TD vAlign=top colSpan=2><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a> </td></tr>

<tr>
<td colSpan=2><span class='txt_label'><b>Message Board: Start New Topic</b></span><br>
</td></tr>
<tr>
<td align=middle>
<form action='post_group_topic_action.php?group_id=<?=$group_id?>' method=post>
<table cellSpacing=1 cellPadding=5 bgColor=#6699cc border=0>
<tbody>
<tr>
<td noWrap bgColor=#eff3ff class='txt_label' colSpan=2><B>Enter Your New Topic</B></td></tr>
<tr>
<td bgColor=#ffffff class='txt_label'><b>Subject:&nbsp;</b></td>
<td bgColor=#ffffff><input maxLength='255' size='80' name='subject'></td></tr>
<tr>
<td vAlign=top bgColor=#ffffff class='txt_label'><b>Body:&nbsp;</b></td>
<td bgColor=#ffffff><textarea name='body' rows='10' cols='65'></textarea>
</td></tr></tbody></table></td></tr>

<tr>
<td align=middle bgColor=#ffffff colSpan=2><input type=image src="images/postTopicButton.gif">&nbsp;&nbsp;
<a href="view_group.php?group_id=<?=$group_id?>"><img src="images/cancelButton.gif" border=0></a>
</td></tr>
</form>
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
