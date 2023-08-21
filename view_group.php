<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
&nbsp;&nbsp;<a href="./groups.php">Back to Groups</a>
<!-- middle_content -->

<?php

  print "<table width='800'>";
  print "<tr>";
  print "<td width='100%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  print "<tr>";
  
	$sql = "SELECT * FROM groups WHERE id = ".$HTTP_GET_VARS[group_id];
	$gr = mysql_fetch_array(mysql_query($sql));
	$group_type = $gr['type'];
	
	$sql = "SELECT status FROM invitations WHERE member_id = ".$_SESSION['member_id']." AND group_id = ".$HTTP_GET_VARS[group_id];
	$res = mysql_fetch_array(mysql_query($sql));
	$status = $res['status'];


	
	
  $group_id = $HTTP_GET_VARS["group_id"];

     include("includes/class.groups.php");
     $group = new groups;

		 
	$creator = $group->get_member_id($group_id);
	
	if ($creator == $_SESSION['member_id'])
		$status = 1;
	
  $group_name = $group->get_group_name($group_id);

  print "<td width='100%' colspan='2' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<b><p align='left'><span class='style18'><h3>$group_name</h3></span></b></p></td></tr>";
  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  
        // images
        $num_images=$group->get_group_num_images($group_id);
        if($num_images==0)
        {
            $image="<img src='images/no_pic.gif' wifth='90' border='0'>";
        }
        else
        {
            $image_url=$group->get_group_image($group_id);

						$pic_name = str_replace('user_images/', '', $image_url);
						$image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
        }
        
        $group_info=$group->get_group_info($group_id);
        
        $cat_info=$group->get_cat($group_info["category"]);

?>

<TR vAlign=top bgColor=#ffffff>
<TD colSpan=2 height=28>
<TABLE cellSpacing=0 cellPadding='5' width="100%" border=0>
<TBODY>
<TR vAlign=top>
<TD width=170>
<div align=center>
<a href="view_group_images.php?group_id=<?=$group_id?>">
<?=$image?>
</a>
<P></P>
<?
if ((($group_type == 1 || $group_type == 2) && $status == 1) || !$group_type) {
?>
<P><strong><font color=#cc0000>» </font></strong>
<font color=#ffffff><a href="view_group_images.php?group_id=<?=$group_id?>">View Group Photos</A></FONT></P>
<?
}
?>
</DIV></TD>
<TD width=1>&nbsp;</TD>
<TD vAlign=top width=265 class='txt_label'>
<DIV align=left>
<p><strong><font color=#000099>Category: <a href="view_groups.php?cat_id=<?=$group_info["category"]?>"><?=$cat_info["cat_name"]?></a></font></STRONG></P>
<P><STRONG><font color=#000099>Type:</FONT></STRONG><font color=#000099>
<?php
	switch ($group_info["type"]) {
		case 0:
			echo 'Public Membership';
		break;
		case 1:
			echo 'Private Membership';
		break;
		case 2:
			echo 'Invitation Only Membership';
		break;
	}
?>

<?php
     $country_name=$group->get_country($group_info["country"]);
?>
<BR><STRONG>Founded:</STRONG><?=$group_info["posted_on"]?><BR>
<STRONG>Location:</STRONG> <?=$group_info["city"]?>,<BR><?=$group_info["state"]?> - <?=$country_name?>
<br>
<?php
     $num_members = $group->get_group_members($group_id);
     $num_members = $num_members+1;
?>
<strong>Members:</strong> <?=$num_members?>
</FONT></P></DIV></TD>
<td width=191>
<div align=left>
<?php
if($_SESSION["member_id"]!=Null)
{
     $check=$group->check_group_member($group_id,$_SESSION["member_id"]);
     if($check!=1 && $gr['type'] != 2)
     {
?>
<a href="join_group.php?group_id=<?=$group_id?>">Join Group
</a>
<?php
     }
     else
     {
?>
<?php
     if($group_info["members_invite"]=="1")
     {
?>
<a href="group_invite.php?group_id=<?=$group_id?>">Invite Others
</a>
<?php
     }
     else
     {
         $creator=$group->get_member_id($group_id);
         if($creator==$_SESSION["member_id"])
         {
?>
<a href="group_invite.php?group_id=<?=$group_id?>">Invite Others
</a>
<?php
         }
     }
}
?>
<br>
<?php
     $creator=$group->get_member_id($group_id);
     if($creator==$_SESSION["member_id"])
     {
?>
<a href="edit_group.php?group_id=<?=$group_id?>">
Edit Group</A>
<?php
     }
?>

<?php
     if($group_info["post_images"]=="1" && (($group_type == 0 || $group_type == 1 || $group_type == 2) && $status == 1))
     {
?>
<br><A href="upload_group_image.php?group_id=<?=$group_id?>">Upload Image
</a>
<?php
     }
     else
     {
         $creator=$group->get_member_id($group_id);
         if($creator==$_SESSION["member_id"])
         {
?>
<br><A href="upload_group_image.php?group_id=<?=$group_id?>">Upload Image
</a>
<?php
         }
     }
?>

<?php
     if($group_info["post_bulletins"]=="1" && (($group_type == 0 || $group_type == 1 || $group_type == 2) && $status == 1))
     {
?>
<br><a href="post_group_bulletin.php?group_id=<?=$group_id?>">Post Bulletin
</a>
<?php
     }
?>

<?php
     if($group_info["public_forum"]=="1" && (($group_type == 0 || $group_type == 1 || $group_type == 2) && $status == 1))
     {
?>
<br><a href="post_group_forum_topic.php?group_id=<?=$group_id?>">Post Topic
</a>
<?php
     }
?>

<?php
     // check if ends
     }
?>

<br><a href="chat_group.php?group_id=<?=$group_id?>">
Chat</a></div>

</td>
<?php
     $creator = $group->get_member_id($group_id);
     include("includes/people.class.php");
     
     $people=new people;
     
     $num_images = $people->get_num_images($creator);
     if($num_images==0)
     {
         $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($creator);
	  			$pic_name = str_replace('user_images/', '', $image_url);
         $image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
     }
     $leader_name=$people->get_name($creator);
?>
<td align=middle class='txt_label'>
<A class=leaderLink id=leaderLink href="view_profile.php?member_id=<?=$creator?>">
<?=$image?></a>
Group Leader:
<BR>
<A class='style9' id=leaderLink href="view_profile.php?member_id=<?=$creator?>"><?=$leader_name?></a>
<?if ($people->check_online($creator)) echo '<center><font color="#ff0000">Online</font></center>';?>
</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE><BR>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<tr>
<td class='txt_label'>
<?=$group_info["description"]?>
</td></tr></tbody></table>

<?php
  print "</td></tr>";
  print "</table>";
?>

<br>
<!-- group members section -->

<table cellSpacing=1 cellPadding=3 width="100%" class='dark_b_border2' border=0>
<tbody>
<TR>
<TD colSpan=2>
<TABLE width="100%" border=0 cellPadding=0 cellSpacing=0 bgcolor="#eff3ff">
<TBODY>
<TR vAlign=top class='dark_blue_white2'>
<TD><B><?=$group_name?> (<?=$num_members?> Members)</B></TD>

<td align=right><font color=#000099 size=2>
<?php
     $creator=$group->get_member_id($group_id);
     if($creator==$_SESSION["member_id"])
     {
?>
[<a href="edit_group_members.php?group_id=<?=$group_id?>"><font color=#000099 size=2>Edit Members</FONT></a>]</font>
<?php
     }
?>
</td></tr></tbody></table></td></tr>

<tr vAlign=top bgColor=#ffffff>
<td colSpan=2>
<table cellSpacing=0 cellPadding=5 width="100%" border=0>
<tbody>
<tr vAlign=top align=middle>
<td width="20%" class="txt_label">
<a href="view_profile.php?member_id=<?=$creator?>">
<?php
     $creator_name=$people->get_name($creator);
     print $creator_name;
?>
</a><br><img height=3 src="images/1by1.gif" width=75><br>
<a href="view_profile.php?member_id=<?=$creator?>">
<?=$image?></a>
<?if ($people->check_online($creator)) echo '<center><font color="#ff0000">Online</font></center>';?>
<div class=DataPoint=OnlineNow;UserID=4885511; id=UserDataNode0 style="WIDTH: 80px; HEIGHT: 20px"></div></td>
<?php
     $sr_no=2;
     $sql="select * from invitations where group_id = $HTTP_GET_VARS[group_id] AND status = 1 GROUP BY member_id ORDER BY date DESC limit 0,9";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {

     $num_images=$people->get_num_images($data_set["member_id"]);
     if($num_images==0)
     {
         $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($data_set["member_id"]);
	  			$pic_name = str_replace('user_images/', '', $image_url);
         $image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
     }
     $leader_name=$people->get_name($data_set["member_id"]);

         if($sr_no%5==0)
         {
             print "</tr><tr>";
         }
?>

<td width="20%">
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>"><?=$leader_name?></a><br>
<img height=3 src="images/1by1.gif" width=75><br>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?></a>
<?if ($people->check_online($data_set["member_id"])) echo '<center><font color="#ff0000">Online</font></center>';?>
</td>
<?php
       $sr_no=$sr_no+1;
     }
?>
</tbody>
</table></td></tr></tbody></table>
<div align=right><a href="view_group_members.php?group_id=<?=$group_id?>">View All Members</a>
<b> <font color=#cc0000>»</font></b></div><br>
<!-- group members section -->

<?php
     include("includes/gforums.class.php");
     $gforums = new forum;
if ((($group_type == 1 || $group_type == 2) && $status == 1) || !$group_type) {

     if($group_info["public_forum"]=="1")
     {
?>

<!-- forum -->
<table cellSpacing=1 cellPadding=3 width="100%" class='dark_b_border2' border=0>
<tbody>
<tr>
<td colSpan=2>

<table cellSpacing=0 cellPadding=0 width="100%" border=0>
<tbody>
<tr vAlign=top class='dark_blue_white2'>
<td width="29%"><b><FONT face='Verdana' color='#000099' size=2>&nbsp;Forum </font></b></td>
<td width="71%">
<div align=right><b>
<?
if ($status == 1) {
?>
<a href="post_group_forum_topic.php?group_id=<?=$group_id?>">
<font face='Verdana' color='#000099'>Post a New Topic</font></a>&nbsp;&nbsp;
<font face='Verdana' color='#000099'>|&nbsp;
<?
}
?>
</font>
<font face='Verdana' color='#000099' size=2>&nbsp;</font>
<a href="view_group_forum.php?group_id=<?=$group_id?>">
<font face='Verdana' color=#000099>View All Topics »</font></a>
<font face='Verdana' color=#000099 size=2>&nbsp;</font></b></div></td></tr></tbody></table></td></tr>

<tr vAlign=top bgColor=#ffffff><td colSpan=2>
<table cellSpacing=1 cellPadding=5 width="100%" align=center bgColor=#6699cc border=0>
<tbody>
<tr>
<td bgColor=#ffffff colSpan=4>
</td></tr>

<tr vAlign=center bgColor=#eff3ff>
<td width="29%" bgcolor="#eff3ff"><b>
<font face='Verdana' color=#000099 size=2>&nbsp;Forum Topic</font></b></td>
<td width="7%"><div align=center><b>
<font face='Verdana' color=#000099 size=2>Posts</font></b></div></td>
<td width="32%"><b>
<font face='Verdana' color=#000099 size=2>Last Post</font></b></td>
<td width="32%"><b>
<font face='Verdana' color=#000099 size=2>Topic Starter</font></b></td></tr>
<tr>
<td bgColor=#ffffff colSpan=4>
</td></tr>

<?php

     $gforums -> display_forum_group($group_id);
?>


</tbody></table></td></tr></tbody></table><br><br>

<!-- forum -->

<?php
	}
	
?>
<!-- bulletin -->


<table cellSpacing=1 cellPadding=3 width="100%" class='dark_b_border2' border=0>
<tbody>
<tr>
<td colSpan=2>
<table cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR vAlign=top class='dark_blue_white2'>
<TD width="29%"><B><font face='Verdana' color=#000099 size=2>&nbsp;Bulletins </FONT></B></TD>
<TD width="71%">
<DIV align=right>
<?
if ($status == 1 && ($group_info["post_bulletins"]=="1" || $creator == $_SESSION['member_id'])) {
?>
<B><a href="post_group_bulletin.php?group_id=<?=$group_id?>">
<font face='Verdana' color=#000099>Post a New Bulletin</font></a>&nbsp;&nbsp;
<font face='Verdana' color=#000099>|&nbsp;</FONT>
<?
}
?>
<font color=#000099 size=2>&nbsp;</FONT>
<a href="view_group_bulletins.php?group_id=<?=$group_id?>">
<font face='Verdana' color=#000099>View All Group Bulletins »</font></a>
<font face='Verdana' color=#000099 size=2>&nbsp;</font></b>
</div></td></tr></tbody></table></td></tr>

<tr vAlign=top bgColor=#ffffff>
<td colSpan=2>
<table cellSpacing=1 cellPadding=5 width="100%" align=center bgColor=#639ace border=0>
<tbody>

<tr bgColor=#eff3ff>
<td height=24><b><font face='Verdana' size='2' color='#000099'>From</font></b></td>
<td align=middle><b><font face='Verdana' size='2' color='#000099'>Date</font></b></td>
<td><b><font face='Verdana' size='2' color='#000099'>Subject</font></b>
</td>
</tr>

<?php

     include("includes/gbulletins.class.php");
     $gbulletins = new bulletin;

     $gbulletins->display_forum_bulletin($group_id);

?>
</tbody>
</table>
</td></tr>
</TBODY></TABLE>

<!-- bulletin -->
<?php
	}

  print "</table>";
  print "</td></tr></table>";
?>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
