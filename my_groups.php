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
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>My Groups</h3>";
  print "</td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";
  
	 include_once ("includes/class.groups.php");
	include_once ('includes/profile.class.php');
	$profile = new profile;
  $group = new groups;

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";
	
	$rec_per_row = 5;
	
  $group_ids = $profile->get_groups($_SESSION['member_id']);
	if (count($group_ids)) {
	$sql = "SELECT * FROM groups WHERE id IN (".implode(',',$group_ids).")";
	$q = mysql_query($sql);
?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
<?
	$i=0;
	while ($gr = mysql_fetch_array($q)) {
		if ($i%$rec_per_row==0)
			echo '</tr><tr class="txt_label" valign="top">';
?>
<td width="<?(100/$rec_per_row)?>%" align="center">
<?=$gr['group_name']?><br>
<?
		$num_images = $group->get_group_num_images($gr["id"]);
		if ($num_images==0) {
			$image_url = "images/no_pic.gif";
		} else {
			$image_url = $group->get_group_image($gr["id"]);
    }
?>
<a href="./view_group.php?group_id=<?=$gr['id']?>"><img border="0" width="75" height="75" src="<?=$image_url?>"></a>
<?
		if ($gr['member_id'] == $_SESSION['member_id']) {
?>
<a href="./edit_group.php?group_id=<?=$gr['id']?>"><img border="0" src='images/mod.bmp'></a>
<?
		}
?>
</td>		
<?
		$i++;
	}
	}

?>
	</table>
<?
  // run loop to display all my_groups

  print "</td></tr>";
  print "</table>";

  print "</td></tr>";
//  print "</table>";
  print "</td>";
//    print "</table>";
//    print "</td></tr></table>";
?>
</table>
</table>
</table>
<!-- middle_content -->
<?php
include("includes/bottom.php");
}
?>
