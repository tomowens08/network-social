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
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' width='100%' class='dark_blue_white2'>";
  print "<h3>Comment Settings</h3>";
  print "</td></tr>";

  include("includes/profile.class.php");
  $profile = new profile;
  $comment_setting = $HTTP_POST_VARS["comment_setting"];
	$res = $profile->update_comment_status($_SESSION["member_id"],$comment_setting);
	$settings = array('view_online','notif_message','notif_journal','notif_comment','notif_friend_request','notif_group_invitation', 'gmt');
	$sql = array();
	
	foreach ($settings as $setting) {
		$sql[] = $setting.' = '.intval($HTTP_POST_VARS[$setting]);
	}
	$sql = "UPDATE members SET ".implode(',',$sql)." WHERE member_id = ".$_SESSION['member_id'];
	mysql_query($sql);
	


// Upload Image Code
   if($res==1)
   {
    print "<tr>";
    print "<td width='100%' colspan='2' class='txt_label'>";
    print "<p align='center'>Setting has been changed successfully!</p>";
    print "</td></tr>";
   }
   else
   {
    print "<tr>";
    print "<td width='100%' colspan='2' class='txt_label'>";
    print "<p align='center'>There was an error and the setting was not changed at this time, please try again later!</p>";
    print "</td></tr>";
   }
// Upload Image Code


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
