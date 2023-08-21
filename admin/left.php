<?php
  session_start();
?>
<html>
<head>
<SCRIPT language=Javascript src='fade.js'>
</SCRIPT>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<link rel=stylesheet href=style.css type=text/css>
<title>Administrator Section : Left Panel</title>
</head>
<body>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login as administrator in order to use this page";
}
  else
{

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Manage Users</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='disabled_members.php' target='main'>Disabled Members</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='members.php' target='main'>See who has signed up</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='member_pictures.php' target='main'>Member Pictures</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='member_invites.php' target='main'>Member Invites</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='member_friends.php' target='main'>Member Friends</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='flag_profiles.php' target='main'>Flagged Profiles</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='spam_profiles.php' target='main'>Spammer Profiles</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='send_message.php' target='main'>Message to all users</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='send_one_message.php' target='main'>Message to specific user</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='received.php' target='main'>Received Messages</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='featured_profiles.php' target='main'>Feature/Unfeature Users</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='featured_music_profiles.php' target='main'>Feature/Unfeature Musicians</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_member_id.php' target='main'>Search By Member ID</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_member_email.php' target='main'>Search By Member Email</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_member_display_name.php' target='main'>Search By Member Display Name</a></td></tr>";

  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Ban IP Address</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_ip_address.php' target='main'>Add IP Address</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_ip_address.php' target='main'>Edit/Delete IP Address</a></td></tr>";
  print "</tr></table>";

/*
  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Membership Packages</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_package.php' target='main'>Add Package</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_package.php' target='main'>Edit/Delete Packages</a></td></tr>";
  print "</tr></table>";
*/

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Group Category</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_group_cat.php' target='main'>Add Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_cat.php' target='main'>Edit/Delete Category</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Blog Mood</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_mood.php' target='main'>Add Mood</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_mood.php' target='main'>Edit/Delete Mood</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Classified Cats</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_classified_cat.php' target='main'>Add Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_classified_cat.php' target='main'>Edit/Delete Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_classified_sub_cat.php' target='main'>Add Sub Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_classified_sub_cat.php' target='main'>Edit/Delete Sub Category</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Events Cats</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_event_cat.php' target='main'>Add Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_event_cat.php' target='main'>Edit/Delete Category</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Music Genre</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_genre.php' target='main'>Add Genre</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_genre.php' target='main'>Edit/Delete Genre</a></td></tr>";
  print "</tr></table>";


  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Forums</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_main_cat.php' target='main'>Add Main Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_main_cat.php' target='main'>Edit/Delete Main Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_sub_cat.php' target='main'>Add Sub Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_sub_cat.php' target='main'>Edit/Delete Sub Category</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Groups</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_all_groups.php' target='main'>Display All Groups</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_member_groups.php' target='main'>Display Member Groups</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_group_id.php' target='main'>Search By Group ID</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_group_name.php' target='main'>Search By Group Name</a></td></tr>";
  print "</tr></table>";


  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Events</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_all_events.php' target='main'>Display All Events</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_member_events.php' target='main'>Display Member Events</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_event_id.php' target='main'>Search By Event ID</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_event_name.php' target='main'>Search By Event Name</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Classifieds</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_all_classifieds.php' target='main'>Display All Classifieds</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_member_classifieds.php' target='main'>Display Member Classifieds</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_class_id.php' target='main'>Search By Classified ID</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_class_name.php' target='main'>Search By Classified Name</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Documents</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='music_features.php' target='main'>Music Features</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='invite.php' target='main'>Invite Message</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='main_page.php' target='main'>Main Page Text</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='about_us.php' target='main'>About Us</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='privacy.php' target='main'>Privacy Policy</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='terms.php' target='main'>Terms Of Service</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='disclaimer.php' target='main'>Promote Our Site</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='login_page.php' target='main'>Contact Us</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='support_sponsors.php' target='main'>Support Our Sponsors</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='help.php' target='main'>Help</a></td></tr>";
  print "</tr></table>";


  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Moderators</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_moderator.php' target='main'>Add a Forum Moderator</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_blog_moderator.php' target='main'>Add a Blog Moderator</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_pics_moderator.php' target='main'>Add a Moderator For Pictures</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_groups_moderator.php' target='main'>Add a Moderator For Groups</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_events_moderator.php' target='main'>Add a Moderator For Events</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_classified_moderator.php' target='main'>Add a Moderator For Classifieds</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_music_moderator.php' target='main'>Add a Moderator For Music</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Videos</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_video_cat.php' target='main'>Add Video Category</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_video_cat.php' target='main'>Modify Video Category</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Member Videos</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_all_videos.php' target='main'>Display All Videos</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='display_member_videos.php' target='main'>Display Member Videos</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_video_id.php' target='main'>Search By ID</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='search_video_name.php' target='main'>Search By Video Name</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>News</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='add_news.php' target='main'>Add News</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='modify_news.php' target='main'>Modify News</a></td></tr>";
  print "</tr></table>";

  print "<table border='0' cellpadding='0' cellspacing='0' height='28' width='100%'>";
  print "<tr><td class='headcell' height='20'>Misc.</td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='delete_events.php' target='main'>Delete Expired Events</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='delete_shows.php' target='main'>Delete Expired Shows</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='image_size.php' target='main'>Image Size</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='admin_message.php' target='main'>Admin Message to Users</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='invite_status.php' target='main'>Invite Status</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='default_friend_profile.php' target='main'>Change Default Friend Profile</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='manage_admin.php' target='main'>Manage Admin Users</a></td></tr>";
  print "<tr><td height='15' class='textcell'><b>:&nbsp;</b><a href='logout.php' target='_top'>Logout</a></td></tr>";
  print "</tr></table>";
} 

?>
</body>
</html>
