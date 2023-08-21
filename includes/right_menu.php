<?php
//convert tables
/*
$sql = "SELECT * FROM member_friends";
$q = mysql_query($sql);
while ($f = mysql_fetch_array($q)) {
	$sql = "SELECT count(*) as num FROM invitations WHERE friend_id = $f[friend_id] and member_id = $f[member_id]";
	$res = mysql_fetch_array(mysql_query($sql));
	if (!$res['num']) {
		$sql = "INSERT INTO invitations SET
						friend_id = '$f[friend_id]',
						member_id = '$f[member_id]',
						approve = '$f[approve]',
						deleted = '$f[deleted]',
						date = '".time()."'";
		mysql_query($sql);
	}
}


// Left Column

  print "<table width='100%'>";
  print "<tr>";
  print "<td>";
  print "<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>";


// Links Message

print "<tr><td width='100%' class='txt_label'><b><div align='center'>Communications</td></tr>";

        $sql="select count(*) as a from messages where mess_to = ".$_SESSION["member_id"]." and mess_read = 0 and deleted <> 1";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

        $sql="select count(*) as a from admin_message where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

print "<tr><td width='100%'><b><a href='my_messages.php'>My Mail Box";
  print "&nbsp;(";
  print $RSUser["a"]+$RSUser1["a"].")";
print "</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='message_board.php'>Message Board</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='my_journal.php'>My Journal</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='invite.php' class='style11'>Invite A Friend</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='browse.php' class='style11'>Meet New People</a></b></td></tr>";
        
				$expired = time() - (3600*24*15);

				$sql = "SELECT count(*) as num FROM invitations WHERE member_id = '".$_SESSION['member_id']."' AND ((NOT status AND is_invited) OR (NOT approve AND friend_id AND NOT group_id AND NOT deleted)) AND date > ".$expired;
				$res = mysql_fetch_array(mysql_query($sql));

				$total_friends = $res['num'];
				

print "<tr><td width='100%' class='txt_label'><b><a href='invitation_member.php?page=1' class='style11'>".($total_friends?'<font color="#ff0000"><b>':'')."Invitations</a> </b>(".$total_friends.")</td></tr>";

				$sql = "SELECT count(*) as num FROM invitations WHERE  ((group_id and member_id = ".$_SESSION['member_id']." and not status AND NOT is_invited) or (friend_id = ".$_SESSION['member_id']." and not approve AND NOT group_id AND NOT deleted)) AND date > ".$expired;
				$res = mysql_fetch_array(mysql_query($sql));

				$total_friends = $res['num'];

print "<tr><td width='100%' class='txt_label'><b><a href='request_member.php' class='style11'>".($total_friends?'<font color="#ff0000"><b>':'')."Requests</a> </b>(".$total_friends.")</td></tr>";

print "<tr><td width='100%'><b><a href='approved_groups.php?page=1' class='style11'>Approved Groups</a> </b></td></tr>";

print "<tr><td width='100%'><b><a href='view_bookmarks.php?page=1' class='style11'>My Favourites</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='view_profile.php?member_id=$_SESSION[member_id]' class='style11'>View My Profile</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='gallery.php?member_id=$_SESSION[member_id]' class='style11'>View My Gallery</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='manage_photos.php' class='style11'>Manage Photos</a></b></td></tr>";

print "</table>";

  print "<tr>";
  print "<td>";
  print "&nbsp;";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td>";
  print "<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>";


  print "<tr><td width='100%' class='txt_label'><b>Manage Account</td></tr>";
  print "<tr><td width='100%'><b>";
  print "<a href='edit_profile.php'>Edit Profile</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  print "<tr><td width='100%' class='txt_label'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "(".$RSUser1["a"].")";
  print "</td></tr>";
  print "<tr><td width='100%'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='mybands.php?page=1' class='style11'>Edit Favorite Bands</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='mygroups.php?page=1' class='style11'>Edit Groups</a></b></td></tr>";
  print "</td>";
  print "</tr>";

// Links Message

  print "</table>";



  print "</td></tr>";
  print "</table>";
*/
?>
<div align="left">
<?php include("ad_side.php");
?>



  
</div>
