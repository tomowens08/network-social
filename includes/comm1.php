<?
print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#E3E4E9'>";
print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Communications Center</span></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='my_messages.php' class='style11'>My Mail Box</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='message_board.php' class='style11'>Message Board</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='my_journal.php' class='style11'>My Journal</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='invite.php' class='style11'>Invite A Friend</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='browse.php' class='style11'>Meet New People</a></b></td></tr>";
        $sql="select member_id from invitations where member_id=".$_SESSION["member_id"]." and approve = 0";
        $result=mysql_query($sql);
        $total_friends=mysql_num_rows($result);
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='pending_requests.php?page=1' class='style11'>Approve Friends</a> </b>(".$total_friends.")</td></tr>";

        $sql="select member_id from invitations where member_id=".$_SESSION["member_id"]." and approve = 0";
        $result=mysql_query($sql);
        $total_friends=mysql_num_rows($result);
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='pending_group_requests.php?page=1' class='style11'>Approve Groups</a> </b>(".$total_friends.")</td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='approved_groups.php?page=1' class='style11'>Approved Groups</a> </b></td></tr>";

print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='view_bookmarks.php?page=1' class='style11'>My Favorites</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='view_profile.php?member_id=$_SESSION[member_id]' class='style11'>View My Profile</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='gallery.php?member_id=$_SESSION[member_id]' class='style11'>View My Gallery</a></b></td></tr>";
print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_pics.php' class='style11'>Edit Photos</a></b></td></tr>";
print "<tr><td width='100%'>&nbsp;</td></tr>";
?>
