<?php

// Left Column

  print "<table width='100%'>";
  print "<tr>";
  print "<td>";
  print "<table width='100%' class='dark_b_border2' cellpadding='4' bordercolor='#000000'>";


// Links Message

print "<tr><td width='100%' class='txt_label'><b>Groups Center</b></td></tr>";
print "<tr><td width='100%'><b><a href='groups.php' class='style11'>Groups Home</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='my_groups.php' class='style11'>My Groups</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='create_group.php' class='style11'>Create Group</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='search_group.php' class='style11'>Search Group</a></b></td></tr>";

$expired = time() - (3600*24*15);

$sql = "SELECT count(*) as num FROM groups g, invitations gf WHERE g.id = gf.group_id AND g.type = 1 AND NOT status AND not is_invited AND g.member_id = ".$_SESSION['member_id']." AND gf.date > ".$expired;

$num_appr = mysql_fetch_array(mysql_query($sql));
print "<tr><td width='100%'><a href='request_group.php' class='style11'>".($num_appr[num]?'<font color="#ff0000"><b>':'')."Requests ($num_appr[num])</a></b></td></tr>";

	include_once('includes/profile.class.php');
	$profile = new profile;
	
	$group_ids = $profile->get_groups($_SESSION['member_id']);
if (count($group_ids)) {
$sql = "SELECT g.id num FROM groups g, invitations gf WHERE
					g.id = gf.group_id AND 
					g.id IN (".implode(',',$group_ids).") AND 
					gf.is_invited AND 
					gf.friend_id = ".$_SESSION['member_id']." AND 
					gf.date > ".$expired." AND 
					NOT gf.status 
					GROUP BY gf.id ORDER BY gf.date DESC";
$q = mysql_query($sql);
$num_pen = mysql_num_rows($q);
}
print "<tr><td width='100%'><a href='invitation_group.php' class='style11'>".($num_pen?'<font color="#ff0000"><b>':'')."Invitations ($num_pen)</a></b></td></tr>";
print "</table>";


// Links Message



  print "</td></tr>";
  print "</table>";
?>
