<?php
session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
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
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
  
/*
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  print "<tr>";
  //print "<td>";

  //include("includes/groups.php");

  //print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Manage Account</span></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_profile.php' class='style11'>Edit Profile</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

        //$sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
        //$result1=mysql_query($sql);
        //$RSUser1=mysql_fetch_array($result1);
  //print "(".$RSUser1["a"].")";
  //print "</td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
  //print "</table>";
  //print "</td>";
  //print "</tr>";

// Links Message



  //print "</table>";

  //print "</td>";
  
*/

  print "<td width='100%' valign='top'>";
  print "<table width='70%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='login' bgcolor='#FF6600'><b><p align='center'><span class='style18'>Post a Topic</span></b></p></td></tr>";
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
?>
<table cellSpacing=0 cellPadding=5 width="100%" bgColor=#ffffff border=0>
<tbody>
<tr>
<TD vAlign=top colSpan=2><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a> </td></tr>
<?php
             include("includes/gforums.class.php");
             $forum=new forum;
             $creator=$forum->get_topic_creator($HTTP_GET_VARS["topic_id"]);
             
             if($creator!=$_SESSION["member_id"])
             {
?>
<tr>
<td colSpan=2><br><br><span class='style9'>You are not the creator of this topic.</span><br><br><br>
</td></tr>
<?php
             }
             else
             {
             $add=$forum->delete_topic($topic_id);
             if($add)
             {
?>
<tr>
<td colSpan=2><br><br><span class='style9'>Your topic was added successfully.</span><br><br><br>
</td></tr>
<tr>
<td colSpan=2><br><br><span class='style9'><a href='view_group.php?group_id=<?=$group_id?>'>Back to Group</a></span><br><br><br>
</td></tr>

<?php
             }
             else
             {
?>
<tr>
<td colSpan=2><br><br><span class='style9'>There was an error and topic could not be posted at this time, please try again later.</span><br><br><br>
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
  print "</td></tr>";
  print "</table>";

  print "</table>";
  print "</td></tr></table>";


}
?>
<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
