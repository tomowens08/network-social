<?php
ob_start("ob_gzhandler");
/*
  Author Ankur Jain (ankurjain@vastal.com)
  version 1.0.1
  created on 17/06/2006

  Copyright Vastal I-Tech & Co. (www.vastal.com)
  All rights reserved.

  This software is the confidential and proprietary property of Vastal I-Tech & Co.. ("Confidential Information").
  You shall not disclose such Confidential Information and
  shall use it only in accordance with the terms of the license agreement
  you entered into with Vastal I-Tech & Co..
*/
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
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

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  $group_id=$HTTP_GET_VARS["group_id"];
  $topic_id=$HTTP_GET_VARS["topic_id"];
  
  if($group_id==Null||!is_numeric($group_id)||$topic_id==Null||!is_numeric($topic_id))
  {
      exit("Invalid group selected, script execution exited");
  }


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "Group Forum</td></tr>";

  print "<tr><td colspan='2' class='txt_label'>";
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
<td vAlign='top' width='50%'><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a></td>
<td vAlign='top' width='50%'>
<div align='right'>
<a href="post_group_forum_topic.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>"><img src='images/button_start_topic2.gif' border='0'></a>
</div>
</td>

</tr>
<tr>
<td colSpan=2>

<!-- view forum -->

<table class='dark_b_border2' cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<TBODY>

<TR>
<TD noWrap bgColor=#eff3ff height=10 class='txt_label'>
<b>Author</b>
</td>
<TD bgColor=#eff3ff>
<?php
     include("includes/gforums.class.php");
     include("classes/moderators.class.php");

     include("includes/people.class.php");
     $forum=new forum;
     $creator=$forum->get_topic_creator($HTTP_GET_VARS["topic_id"]);
?>
<TABLE cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD bgColor='#eff3ff' class='txt_label'>
<b>Message
</TD>
<td align=right>
<?php
     if($creator==$_SESSION["member_id"])
     {
?>
<B><A href="delete_forum_topic.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>&topic_id=<?=$HTTP_GET_VARS["topic_id"]?>">Delete Topic</a>
</B>
<?php
     }
?>
</td></tr></tbody></table></td></tr>

<?php
     $forum->display_topic($HTTP_GET_VARS["topic_id"],$HTTP_GET_VARS["group_id"],$_SESSION["member_id"]);
?>
</tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</td></tr></tbody></table>

<table cellSpacing=0 cellPadding=5 width="100%" border=0>
<tbody>
<tr>
<td vAlign=top>
<div align=right>
<a href="group_topic_reply.php?topic_id=<?=$HTTP_GET_VARS["topic_id"]?>&group_id=<?=$HTTP_GET_VARS["group_id"]?>">
<img height=24 src="images/button_post_reply.gif" width=80 border=0></a>
</div></td></tr></tbody></table>

<?php
     }
     else
     {
?>
This forum does not allow public forum post.
<?php
     }

  // run loop to display all my_groups
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
