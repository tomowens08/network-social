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
  print "<h3>Post a reply</h3></td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group=new groups;
     $group_id=$HTTP_GET_VARS["group_id"];
     $topic_id=$HTTP_GET_VARS["topic_id"];
     
     $group_info=$group->get_group_info($group_id);

     if($group_info["public_forum"]=="1")
     {
         $body=$HTTP_POST_VARS["body"];
         $subject=$HTTP_POST_VARS["subject"];
?>
<table cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<tbody>
<tr>
<TD vAlign=top colSpan=2><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a> </td></tr>

<?php
         if($body==Null)
         {
?>
<tr>
<td colSpan=2><span class='txt_label'><b>Err</b>:: You did not enter subject or body.</span>
</td></tr>

<?php
         }
         else
         {
             include("includes/gforums.class.php");
             $forum=new forum;
             $add=$forum->add_topic_reply($topic_id, $subject,$body,$HTTP_GET_VARS["group_id"],$_SESSION["member_id"]);
             if($add)
             {
?>
<tr>
<td colSpan=2><span class='txt_label'>Your topic was added successfully.</span>
</td></tr>
<tr>
<td colSpan=2><span class='txt_label'><a href='view_group.php?group_id=<?=$group_id?>'>Back to Group</a></span>
</td></tr>

<?php
             }
             else
             {
?>
<tr>
<td colSpan=2><span class='txt_label'>There was an error and topic could not be posted at this time, please try again later.</span>
</td></tr>
<?php
             }
         }
?>

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
