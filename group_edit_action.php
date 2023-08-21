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
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Edit Group</h3></td></tr>";

  print "<tr><td class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";


     include("includes/class.groups.php");
     $group=new groups;


     $group_name=$HTTP_POST_VARS["group_name"];
     $group_cat=$HTTP_POST_VARS["group_cat"];
     $type=$HTTP_POST_VARS["type"];
     $hidden_group=$HTTP_POST_VARS["hidden_group"];
     $members_invite=$HTTP_POST_VARS["members_invite"];
     $public_forum=$HTTP_POST_VARS["public_forum"];
     $post_bulletins=$HTTP_POST_VARS["post_bulletins"];
     $post_images=$HTTP_POST_VARS["post_images"];
     $country=$HTTP_POST_VARS["country"];
     $city=$HTTP_POST_VARS["city"];
     $state=$HTTP_POST_VARS["state"];
     $zip_code=$HTTP_POST_VARS["zip_code"];
     $description=$HTTP_POST_VARS["description"];
$hide_from_all = $HTTP_POST_VARS["hide_from_all"];

if($group_name==Null||$city==Null||$state==Null||$zip_code==Null||$description==Null)
{
  print "<form name='send_back' action='edit_group.php?group_id=$HTTP_GET_VARS[group_id]&err=1' method='post'>";
  print "<input type='hidden' name='group_name' value='$group_name'>";
  print "<input type='hidden' name='group_cat' value='$group_cat'>";
  print "<input type='hidden' name='open_join' value='$open_join'>";
  print "<input type='hidden' name='hidden_group' value='$hidden_group'>";
  print "<input type='hidden' name='members_invite' value='$members_invite'>";
  print "<input type='hidden' name='public_forum' value='$group_name'>";
  print "<input type='hidden' name='post_bulletins' value='$post_bulletins'>";
  print "<input type='hidden' name='post_images' value='$post_images'>";
  print "<input type='hidden' name='country' value='$country'>";
  print "<input type='hidden' name='city' value='$city'>";
  print "<input type='hidden' name='state' value='$state'>";
  print "<input type='hidden' name='zip_code' value='$zip_code'>";
  print "</form>";

  print "<script language='JavaScript'>";
        print "document.send_back.submit();";
  print "</script>";
}
else
{
    $res=$group->edit_group($HTTP_GET_VARS["group_id"],$group_name,$group_cat,$type,$hidden_group,$members_invite,$public_forum,$post_bulletins,$post_images,$country,$city,$state,$zip_code,$description,$_SESSION["member_id"],$hide_from_all);

     if($res==1)
     {
         print "<tr>";
         print "<td width='100%' colspan='2' class='txt_label'>";
         print "Your group has been updated successfully.<br>";
         print "</td>";
         print "</tr>";
         print "<tr>";
         print "<td width='100%' colspan='2' class='txt_label'>";
         print "<a href='upload_group_image.php?group_id=$_GET[group_id]'>Upload Photographs</a>";
         print "</td>";
         print "</tr>";
         print "<tr>";
         print "<td width='100%' colspan='2' class='txt_label'>";
         print "<a href='view_group.php?group_id=$_GET[group_id]'>Back to Group</a>";
         print "</td>";
         print "</tr>";
     }
     else
     {
         print "<tr>";
         print "<td width='100%' colspan='2' class='txt_label'>";
         print "An error occured and group was not added at this time.<br>";
         print "Please check back at a later time.";
         print "</td>";
         print "</tr>";
     }
}


  print "</td></tr>";
  print "</table>";

  print "</table>";
  print "</td>";

  print "</td></tr>";
//print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
