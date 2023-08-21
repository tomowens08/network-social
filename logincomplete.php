<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?php
include("includes/top.php");
include("includes/nav.php");
//include("includes/right.php");
include("includes/conn.php");
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
<tr>

<!-- middle_content -->

<?php
		include("includes/people.class.php");
    $people=new people;
		include("includes/profile.class.php");
		$profile=new profile;
    
		 $name=$people->get_name($_SESSION["member_id"]);
     $num_images=$people->get_num_images($_SESSION["member_id"]);
     if($num_images==0)
	   {
			$sql = "select uploaded_img from members where member_id = $member_id";
			$upl = mysql_fetch_array(mysql_query($sql));
			if (!$upl['uploaded_img']) {
?>
<table align="center" width="400" border="0" bgcolor="#ff0000" cellpadding="5" cellspacing="1">
<tr bgcolor="#ffffff">
	<td align="center">
<span class="txt_label">You have not uploaded any pictures yet. Please <a href="./upload_photos.php">click here</a> to upload a picture.</span>
	</td>
</tr>
</table>
<br>
<?
			}
        $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($_SESSION["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
     $people_info=$people->get_info($_SESSION["member_id"]);
     $profile_info=$people->get_profile($_SESSION["member_id"]);
		 $sql = "select added_about from members where member_id = ".$_SESSION['member_id'];
		 $about = mysql_fetch_array(mysql_query($sql));
		 if (!$about['added_about'] && !$people_info['music']) {
?>
<table align="center" width="400" border="0" bgcolor="#ff0000" cellpadding="5" cellspacing="1">
<tr bgcolor="#ffffff">
	<td align="center">
<span class="txt_label">You have not added anything to the 'About me'. Please <a href="./edit_profile.php">click here</a> to add.</span>
	</td>
</tr>
</table>
<br>
<?
			}
?>
<table border="0" cellspacing="0" cellpadding="0" width="800" height="100%" bordercolor="000000">
<tr>
<td width="800" height="5" bgcolor="ffffff" colspan="5"><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr>
<td width="20" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>
<td width="300" height="33" bgcolor="ffffff" valign="top" align="center">

<table cellspacing="0" cellpadding="0" width="100%" height=100 class="dark_b_border2">
<tr>
<td width="100%" height='20' class='dark_blue_white2' colspan="3" align="left" valign="middle">&nbsp;&nbsp;&nbsp;
<font size='3'>Hello, <?=$name?>!</font>
</td>
</tr>

<tr>
<td width="100%"> <br>
<table cellpadding='4' cellspacing=0 width=100% align="center">
<tr>
<td width="20%" height="75"  class="text">
<?php
     $num_images=$people->get_num_images($_SESSION["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($_SESSION["member_id"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($_SESSION["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
?>
<?=$image?>

</td>
<td width="2%" height="75" class="text">
<img src="<?=image_url?>" width="15" height="8" border="0" alt=""></td>
<td width="78%" height="75" class="text">
<table border="0" cellpadding="4" cellspacing="0" style='border-collapse: collapse' bordercolor='#000000'>
<tr>
<td class='txt_label'>
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a>
</td>
</tr>
<tr>
<td class='txt_label'>
<?php
     $sql="select music from members where member_id = $_SESSION[member_id]";
     $res=mysql_query($sql);
     $data_set=mysql_fetch_array($res);
     if($data_set["music"]=="1")
     {
?>
<a href="edit_mprofile.php">Edit My Profile</a>
<?php
     }
     else
     {
?>
<a href="edit_profile.php">Edit My Profile</a>
<?php
     }
?>
</td>
</tr>
<tr><td class='txt_label'>
<a href="manage_photos.php">Manage Photos</a>
</td></tr>

<tr><td class='txt_label'>
<a href="edit_password.php">Edit My Password</a>
</td></tr>

<tr><td class='txt_label'>
<a href="comment_settings.php">Settings</a>
</td></tr>

<!--
<tr><td class='style9'>
++ <a style="COLOR: #000000; TEXT-DECORATION: none" href="acc_settings.php">Account Settings</a>
</td>
</tr>
<tr>
<td class='style9'>
++ <a style="COLOR: #000000; TEXT-DECORATION: none" href="profile_safe_mode.php">Safe Mode</a>
</td>
</tr>
-->
</table>
</td></tr>
</table>
<br>
</td></tr>
</table><br>


<br>
<table cellspacing="0" cellpadding="4" width="100%" class="dark_b_border2">
<tr>
<td width="100%" height="20" class='dark_blue_white2' align="left" wrap valign="middle">&nbsp;&nbsp;&nbsp;Mail Box</span></td>
</tr>
<tr>
<td>
<table width='90%' align='center' border="0" cellpadding="4" cellspacing="0" style='border-collapse: collapse' bordercolor='#000000'>
<tr>
<td width="50%" align="center" valign="middle" class='txt_label' height="33">
<?php
        $sql="select count(*) as a from messages where mess_to = ".$_SESSION["member_id"]." and mess_read = 0 and deleted <> 1";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

        $sql="select count(*) as a from admin_message where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
        $total_mails=$RSUser["a"]+$RSUser1["a"];
        
        if($total_mails==0)
        {
?>
<a href='my_messages.php'>My Mail Box</a>
<?php
        }
        else
        {
?>
<a href='my_messages.php'><font color='red'><b>My Mail Box(<?=$total_mails?>)</b></font></a>
<?php
        }
?>
</td>
<td width="50%" height="33" align="center" class='txt_label'>
<?php
				$expired = time() - (3600*24*15);
				$sql = "SELECT count(*) as num FROM invitations WHERE member_id = '".$_SESSION['member_id']."' AND ((NOT status AND is_invited) OR (NOT approve AND friend_id AND NOT group_id AND NOT deleted)) AND date > ".$expired;
				$res = mysql_fetch_array(mysql_query($sql));

				$total_friends = $res['num'];
        if($total_friends==0)
        {
?>
<a href='invitation_member.php' class='style11'>Approve</a> </b>(0)</a>
<?php
        }
        else
        {
?>
<a href='invitation_member.php' class='style11'><font color='red'><b>Approve</a> </b>(<?=$total_friends?>)</a></font>
<?php
        }
?>
</td>
</tr>

<tr>
<td width="50%" class='txt_label' align="center" valign="middle">
<a href="view_folder.php?folder=sent&page=1">Sent</a>
</td>
<td width="50%" class='txt_label' align="center" valign="middle">
<?php
				$sql = "SELECT count(*) as num FROM invitations WHERE  ((group_id and member_id = ".$_SESSION['member_id']." and not status AND NOT is_invited) or (friend_id = ".$_SESSION['member_id']." and not approve AND NOT group_id AND NOT deleted)) AND date > ".$expired;
				$res = mysql_fetch_array(mysql_query($sql));

				$total_friends = $res['num'];
        if($total_friends==0)
        {
?>
<a href='request_member.php' class='style11'>Requests</a> </b>(0)</a>
<?php
        }
        else
        {
?>
<a href='request_member.php' class='style11'><font color='red'><b>Requests</a> </b>(<?=$total_friends?>)</a></font>
<?php
        }
?>
</td>
</tr>

<tr>
<td width="50%" class='txt_label' align="center" valign="middle" height="33">
<a href="./add_to_journal.php">Post Journal</a>
</td>
<td width="50%" class='txt_label' height="33" align="center" valign="middle">
<?php
  print "<b><a href='edit_testimonials.php'>Approve Comments</a></b>&nbsp;";

				$num = 0;
				$sql = "select count(*) as num from testimonials where member_id = $_SESSION[member_id] AND approved = 0";
				$res = mysql_fetch_array(mysql_query($sql));
				$num += $res['num'];
				$sql = "select count(*) as num from photo_rating where member_id = $_SESSION[member_id] AND approved = 0";
				$res = mysql_fetch_array(mysql_query($sql));
				$num += $res['num'];
				$sql = "select count(*) as num from blog_comments where member_id = $_SESSION[member_id] AND approved = 0";
				$res = mysql_fetch_array(mysql_query($sql));
				$num += $res['num'];
				$result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "(".$RSUser1["a"].")";
?>
</td>
</tr>

</table>
</td>
</tr>

</table>
<br>

<!-- My Bulletin Space -->

<table cellspacing="0" cellpadding="0" width="100%" class="dark_b_border2">
<tr>
<td height='20' class='dark_blue_white2' align="left">
&nbsp;&nbsp;&nbsp;Journals</td>
</tr>
<tr>
<td>
<table border="0" cellspacing="0" cellpadding="3" width="100%" bordercolor="000000" align="center">
<tr>
<td bgcolor="ffffff" class='txt_label' valign="center">
<table border="0" cellspacing="3" cellpadding="1" width="100%" bordercolor="000000" align="center">
<tr>
<td width="20%" bgcolor="ffffff" align="left" height="23" nowrap><span class="txt_label">From</span></td>
<td width="20%" bgcolor="ffffff" align="left" height="23" nowrap><span class="txt_label">Date</span></td>
<td width="70%" bgcolor="ffffff" valign="center" height="23"><span class="txt_label">Text</span></td>
</tr>

<?php
     $sr_no=$sr_no+1;
		 $friend_res = $profile->get_friends($_SESSION["member_id"]);
		 
		 if (count($friend_res)) {
		 
     $sql = "select * from journal b where journal_of IN (".implode(',',$friend_res).") order by journal_id desc limit 0,8";
     $friend_res = mysql_query($sql);
     print mysql_error();
     while($data_set = mysql_fetch_array($friend_res))
     {
?>
<tr>
<?php
     $name=$people->get_name($data_set["journal_of"]);
?>
<td width="20%" bgcolor="D5E8FB" align="left" class='txt_label' height="23" nowrap>
<a href='view_profile.php?member_id=<?=$data_set["journal_of"]?>'><?=$name?></a>
</td>
<td width="20%" bgcolor="D5E8FB" align="left" class='txt_label' height="23" nowrap>
<?=myDate($data_set["journal_date"])?>
</td>
<td width="70%" bgcolor="D5E8FB" valign="center" height="23" style="word-wrap:break-word">
<span class="txt_label"><a href='view_journal.php?journal_id=<?=$data_set["journal_id"]?>'><?=$data_set["subject"]?></a></td>
</tr>
<?php
       $sr_no=$sr_no+1;
}

}
?>
</table>
<br><br>
</span>
<?php
    if($sr_no==1)
    {
?>
<span class="txt_label">You do not have any Journal yet.</span><br><span class="blacktext10nb">
Journals are messages from and to all your friends at once. You can use Journals to alert your friends about a party, things for sale, job hunts, etc.
<br><br>
</span>
<?php
    }
?>
(<a href="add_to_journal.php">Post a Journal Here</a>)
<br>
<a href='view_all_journal.php'>View All Journal Posts</a>
<br>
<a href='my_journal.php'>View All My Journal Posts</a>
</td>
</tr>
<tr>
<td width="100%" bgcolor="ffffff" valign="center" height="23"><span class="bluebtext">&nbsp;</span></td>
</tr>
<tr>
<td colspan="3" width="100%" bgcolor="ffffff" valign="center"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<br>&nbsp; <br>
  <!-- ad code -->

<!-- My Address Book -->

</td>

<!-- ad_code -->
<td width="15" bgcolor="ffffff" valign="top"><img src="images/clear.gif" width="20" height="1" border="0"></td>
<td width="435" bgcolor="ffffff" valign="top" class="text" wrap align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td align="center">
<!-- ad code -->

<!-- ad code -->

<!-- AdSpeed.com Serving Code 7.6 -->
<?php
	include("ad_box.php");
?>
</noscript><!-- AdSpeed.com End -->

</td>
<td width="120">



<!-- ad_code -->

<!-- my_stats -->
<table width="100" border="0" cellspacing="0" cellpadding="1" class="dark_b_border2">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr valign="top">
<td class='dark_blue_white2'>
<div align="center"><b><font color="#FFFFFF"><?=date("M d,Y")?></font></b></div>
</td>
</tr>
</table>
<?php
    $last_login=$profile->get_last_login($_SESSION["member_id"]);
    $total_network=$profile->get_total_members($_SESSION["member_id"]);
    $total_views=$profile->get_total_views($_SESSION["member_id"]);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
<tr valign="top">
<td class='txt_label' align="center">
<p><b>Your Network:</b><br>
<font color="CC0000"><?=$total_network?></font><br><br>
<b>Profile Views:</b><br>
<font color="CC0000"><?=$total_views?></font><br><br>
<b>Last Login:</b><br>
<font color="CC0000"><?=strftime("%B %d %Y",strtotime($last_login))?></font></p>



<p><b>Show My:</b><br>
<a href="view_bookmarks.php?page=1">Favorites</a><br>
<a href="past_invites.php">Invite History</a><br>
<a href="my_listings.php">Classified Posts</a><br>
<a href="my_journal.php?id=<?=$_SESSION["member_id"]?>">Journal Posts</a><br>
<a href="my_groups.php">My Groups</a></p>

</td>
</tr>
</table>
</td>
</tr>
</table><br>
</td>
</tr>
</table>
<br>

<!-- my_stats -->
<?php
     $sql="select admin_message from pages";
     $admin_res=mysql_query($sql);
     $admin_set=mysql_fetch_array($admin_res);
?>
<?php
     if($admin_set["admin_message"]!=Null)
     {
?>
<!-- admin message -->
<table width="300" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td>

<table cellpadding=0 cellspacing=0 width=435 height=23>
<tr>
<td class='dark_blue_white2'>&nbsp;&nbsp;&nbsp;<span class="orangetext15">Message from Admin</span></td>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="3" width="435" bordercolor="000000">
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr>
<td width="20%" bgcolor="ffffff" class='txt_label'>
<?php
               $friend_id=$profile->get_default_friend();
               
     $num_images=$people->get_num_images($friend_id);
     if($num_images==0)
     {
         $gender=$people->check_gender($friend_id);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='95' height='125' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='95' height='125' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($friend_id);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($friend_id);
     $profile_info=$people->get_profile($friend_id);
     $new_name=$people->get_name($friend_id);

?>

<a href="view_profile.php?member_id=<?=$friend_id?>" id="coolNewPersonURLa1"><span id="coolNewPersonName1">
<?=$new_name?>
</span></a><br><br>
<a href="view_profile.php?member_id=<?=$friend_id?>" id="coolNewPersonURLb1">
<?=$image?>


</td>
<td width="80%" bgcolor="ffffff" class='txt_label'>
<?=stripslashes($admin_set["admin_message"]);?>
</td>
</tr>
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<?php
     }
?>


<!-- cool new users -->
<table width="300" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td>

<table cellpadding=0 cellspacing=0 width=435 height=23>
<tr>
<td class='dark_blue_white2'>&nbsp;&nbsp;&nbsp;<span class="orangetext15">Cool New People</span></td>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="3" width="435" bordercolor="000000">
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr>
<td width="15" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>
<?php

    $new_members = $profile->get_new_people();
    while($new_set=mysql_fetch_array($new_members))
    {
     $num_images=$people->get_num_images($new_set["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($new_set["member_id"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='95' height='125' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='95' height='125' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($new_set["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($new_set["member_id"]);
     $profile_info=$people->get_profile($new_set["member_id"]);
     $new_name=$people->get_name($new_set["member_id"]);

?>
<!-- person 1 -->
<td width="130" class='txt_label' height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a href="view_profile.php?member_id=<?=$new_set["member_id"]?>" id="coolNewPersonURLa1"><span id="coolNewPersonName1">
<?=$new_name?>
</span></a><br><br>
<a href="view_profile.php?member_id=<?=$new_set["member_id"]?>" id="coolNewPersonURLb1">
<?=$image?>
<?
if ($people->check_online($new_set["member_id"]))
	echo '<br><font color="#ff0000">Online</font>';
?>
</a>
</td>
<!-- person 1 -->
<?php
    }
?>

<td width="15" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>
</tr>
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr align="right" valign="middle">
<td width=435 colspan=10>
<a href="browse.php">Browse Users</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="search.php">Search</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="view_bookmarks.php?page=1">Favorites</a> &nbsp;</td>
<tr>
</table>
</td>
</tr>
</table>
<br>
<!-- cool new users -->





<!-- my_friends -->
<table width="300" cellspacing="0" cellpadding="0"  class="dark_b_border2">
<tr>
<td width="100%" height="20" bgcolor="ffffff" class="text" align="left">
<table cellpadding=0 cellspacing=0 width="100%" height=23 border="0">
<tr>
<td class='dark_blue_white2'>&nbsp;&nbsp;&nbsp;My Friends&nbsp;&nbsp;&nbsp;
[<a href="myfriends.php?page=1" class='nav'>Edit Friends</a>]&nbsp;&nbsp;</td>
</tr>
</table>
<br>
<?php
    $friend_ids = $profile->get_friends($_SESSION["member_id"]);
?>
&nbsp;&nbsp;<b>You have <?=count($friend_ids)?> friends</b>

<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>

<?php
  $sr_no=0;
	if (count($friend_ids)) {
		/*
    $sql = "SELECT member_id FROM members WHERE member_id IN (".implode(',',$friend_ids).")";
		
		$friends = mysql_query($sql);
    while($friend_set = mysql_fetch_array($friends))
		*/
		foreach ($friend_ids as $friend_set)
    {
     $fname = $people->get_name($friend_set);

      $num_images=$people->get_num_images($friend_set);
     if($num_images==0)
     {
         $gender=$people->check_gender($friend_set);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='95' height='125' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='95' height='125' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($friend_set);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
     
     $people_info=$people->get_info($friend_set);
     $profile_info=$people->get_profile($friend_set);
     
     if($sr_no%4==0)
     {
       print "</tr><tr>";
     }
?>
<td bgcolor="FFFFFF" align="center" valign="top" width="1">
<table border="0" cellspacing="0" align="center">
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word;">
&nbsp;<a href="view_profile.php?member_id=<?=$friend_set?>"><?=$fname?></a>&nbsp;
</td>
</tr>
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" NOWRAP>
<a href="view_profile.php?member_id=<?=$friend_set?>">
<?=$image?></a>
</td>
</tr>
<?
if ($people->check_online($friend_set)) {
?>
<tr>
	<td align="center"><font color="#ff0000" size="2">Online</font></td>
</tr>
<?
}
?>
</table>
</td>
<?php
        $sr_no++;
				if ($sr_no >= 12) break;
    }
	}
?>

</tr>
</table>
<div align="right">
<a href="view_friends.php?member_id=<?=$_SESSION["member_id"]?>&page=1">View All of My Friends</a>&nbsp;&nbsp; </div>
<br>
</td>
</tr>
</table>
<br>

<!-- my friends -->


<!-- my favorite bands -->
<?php
    $friend_ids = $profile->get_bands($_SESSION["member_id"]);
		if (count($friend_ids)) {
?>
<table width="300" cellspacing="0" cellpadding="0"  class="dark_b_border2">
<tr>
<td width="100%" height="20" bgcolor="ffffff" class="text" align="left">
<table cellpadding=0 cellspacing=0 width="100%" height=23 border="0">
<tr>
<td class='dark_blue_white2'>&nbsp;&nbsp;&nbsp;My Favorite Bands&nbsp;&nbsp;&nbsp;
[<a href="mybands.php?page=1" class='nav'>Edit Bands</a>]&nbsp;&nbsp;</td>
</tr>
</table>
<br>

&nbsp;&nbsp;<b>You have <?=count($friend_ids)?> Favorite Bands</b>

<table width="100%" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>

<?php
  $sr_no=0;

		/*
    $sql = "SELECT member_id FROM members WHERE member_id IN (".implode(',',$friend_ids).")";
		
		$friends = mysql_query($sql);
    while($friend_set = mysql_fetch_array($friends))
		*/
		foreach ($friend_ids as $friend_set)
    {
     $fname = $people->get_name($friend_set);

      $num_images=$people->get_num_images($friend_set);
     if($num_images==0)
     {
         $gender=$people->check_gender($friend_set);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='95' height='125' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='95' height='125' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($friend_set);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
     
     $people_info=$people->get_info($friend_set);
     $profile_info=$people->get_profile($friend_set);
     
     if($sr_no%4==0)
     {
       print "</tr><tr>";
     }
?>
<td bgcolor="FFFFFF" align="center" valign="top" width="1">
<table border="0" cellspacing="0" align="center">
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word;">
&nbsp;<a href="view_profile.php?member_id=<?=$friend_set?>"><?=$fname?></a>&nbsp;
</td>
</tr>
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" NOWRAP>
<a href="view_profile.php?member_id=<?=$friend_set?>">
<?=$image?></a>
</td>
</tr>
<?
if ($people->check_online($friend_set)) {
?>
<tr>
	<td align="center"><font color="#ff0000" size="2">Online</font></td>
</tr>
<?
}
?>
</table>
</td>
<?php
        $sr_no++;
				if ($sr_no >= 8) break;
    }
?>

</tr>
</table>
<div align="right">
<a href="view_bands.php?member_id=<?=$_SESSION["member_id"]?>&page=1">View All of My Favorite Bands</a>&nbsp;&nbsp; </div>
<br>
</td>
</tr>
</table>
<br>
<?
}
?>
<!-- my favorite bands -->


<table width="100%" border="0" cellspacing="0" cellpadding="7" class="dark_b_border2">
<tr>
<td width="71%"><span class="blacktext10">Visit Your Profile to View Comments<br></span></td>
<td width="29%" nowrap align="right">[<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a>]</td>
</tr>
</table>
<br>
</td>
<td width="20" bgcolor="ffffff" valign="top"></td>
</tr>
</table>
<br>
<!-- my_stats -->



</table>
</td>
</tr>
</table>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
