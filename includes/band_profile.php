<link href="/csss/style5.css" rel="stylesheet" type="text/css">
<link href="/csss/style6.css" rel="stylesheet" type="text/css">

<table border="0" cellspacing="0" cellpadding="0" height=100>
<tr>
<td valign='top' bgcolor="FFFFFF" class="text" colspan="3" align="left" valign="bottom" style="word-wrap:break-word">
<?php
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
     $int = $profile -> get_interests($HTTP_GET_VARS["member_id"]);
		 $code = $int['interests'];
?>

<?php
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
     $int=$music->get_band_details($HTTP_GET_VARS["member_id"]);
     $basic_info=$music->get_basic($HTTP_GET_VARS["member_id"]);

?>
<span class="nametext"><?=$name?></span>
</td>
</tr>
<tr><td valign='top'>
<table cellpadding=0 cellspacing=0 width=300 align="center">
<tr>
<td valign='top' width="75" height="75" bgcolor="ffffff" class="text">
<?php
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
        $image_url=$people->get_image($HTTP_GET_VARS["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
?>
<a href='gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>
<?=$image?>
</a>
</td>
<td width="15" height="75" bgcolor="ffffff" class="text">
<img src="images/clear.gif" width="15" height="8" border="0" alt=""></td>
<td width="193" height="75" bgcolor="ffffff" class="text">
<?php
if($int["headline"]!=Null)
{
?>
"<?=$int["headline"]?>"
<?php
}
?>
<br><br>
<?=$basic_info["website"]?><br>
<?=$basic_info["city"]?><br>
<br>
<?php
if($basic_info["country"]!=Null)
{
 if(is_numeric($basic_info["country"]))
 {
  $sql="select * from states where state_id = $basic_info[country]";
  $country_res=mysql_query($sql);
  $country_set=mysql_fetch_array($country_res);
 }
?>
<?=$country_set["state_name"]?>
<?php
 }
?>
<?php
     if($basic_info["last_login"]!=Null)
     {
?>
<br>Last Login: <?=$basic_info["last_login"]?><br>
<?php
     }
     else
     {
?>
<br>Last Login: <?=date("m/d/Y")?><br>
<?php
     }
		 if ($people->check_online($HTTP_GET_VARS["member_id"]))
		 	echo '<b><font color="#ff0000">Online</font></b>';
?>
</td>
</tr>
<tr align="center" valign="middle">
<td>
<a class='text' href="gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View more pics</a> </td>
</tr>
</table></td></tr>
</table><br>

<?php
     $sql="select display_name from members where member_id = $HTTP_GET_VARS[member_id]";
     $mem_res=mysql_query($sql);
     $mem_set=mysql_fetch_array($mem_res);
?>
<?php
     if($mem_set["display_name"]==Null)
     {
?>
<table cellspacing="0" cellpadding="0" width="300">
<tr>
<td width="300" height="15" class='text' class="text" align="left" style="word-wrap:break-word">
<!--My URL: <a href='<?=$site_url?><?=$HTTP_GET_VARS["member_id"]?>.html'><?=$site_url?><?=$HTTP_GET_VARS["member_id"]?>.html</a>-->
</td></tr>
<tr><td>
</table>
<?php
     }
     else
     {
?>
<table cellspacing="0" cellpadding="0" width="300">
<tr>
<td width="300" height="15" class='text' class="text" align="left" style="word-wrap:break-word">
My URL: <a href='<?=$site_url?><?=$mem_set["display_name"]?>.html'><?=$site_url?><?=$mem_set["display_name"]?>.html</a>
</td></tr>
<tr><td>
</table>
<?php
     }
?>

<br>


<table cellspacing="0" cellpadding="0" width="300" class='dark_b_border2'>
<tr>
<td width="300" height="25" class='text' bgcolor="#999999" align="left" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="whitetext12">Contacting <?=$name?></span></td></tr>
<tr><td>

<table border="0" cellspacing="0" cellpadding="0" width="300" bordercolor="000000">
<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>

<tr>
<td width="120" height="5" nowrap align="center" class="text">
<a href="send_message.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/sendMailIcon.gif" border="0" align="middle"></a>
</td>

<td width="15" height="5">
<img src="images/clear.gif" width="15" height="8" border="0"></td>
<td width="150" nowrap height="5" align="center" class="text" valign="top">
<a href="forward_friend.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/forwardMailIcon.gif" border="0" align="middle"></a>
</td>
</tr>
<tr>
<td colspan="3">
<img src="images/clear.gif" width="1" height="2" border="0">
</td>
</tr>

<tr>
<td width="130" nowrap height="5" align="center" class="text" valign="top">
<a href="invite_friend.php?friend_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/addFriendIcon.gif" border="0" align="middle"></a>
</td>

<td width="15" height="5">
<img src="images/clear.gif" width="15" height="1" border="0"></td>
<td width="150" nowrap height="2" bgcolor="ffffff" align="center" class="text" valign="middle">
<a href="add_bookmark.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/addFavoritesIcon.gif" border="0" align="middle">
</td>
</tr>

<tr><td colspan="3">
<img src="images/clear.gif" width="1" height="2" border="0">
</td></tr>

<tr>
<td width="130" nowrap height="5" align="center" class="text" valign="top">
<a href="add_group.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>"> Add to Group </a></td>
</td>

<td width="15" height="5"><img src="images/clear.gif" width="1" height="5" border="0"></td>
<td width="150" nowrap height="2" bgcolor="ffffff" align="center" class="text" valign="middle">
<a href='flag.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>Flag for review</a>
</td>
</tr>

<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>
</table>
</td>
</tr>
</table><br>

<!-- friend or not -->

<table bordercolor="000000" height="75" cellspacing="0" cellpadding="0" width="300" border="1">
<tr>
<td valign="center" align="middle" class='btext' width="435" style="word-wrap:break-word">
<?php
     if($_SESSION["member_id"]!=Null)
     {
      $sql="select * from invitations where member_id = $_SESSION[member_id] and friend_id = $HTTP_GET_VARS[member_id] and approve = '1'";
      $res=mysql_query($sql);
      $num_rows=mysql_num_rows($res);
     }
     else
     {
         $num_rows=0;
     }
     if($num_rows==1)
     {
?>
<span class='btext'><h2><?=$name?> is your friend.</h2><br></span>
<?php
     }
     else
     {
?>
<span class='btext'><h4><?=$name?> is in your extended network.</h4><br></span>
<?php
     }
?>
</td></tr>
</table><br>
<!-- friend or not -->
<?
$group_ids = $profile->get_groups($HTTP_GET_VARS["member_id"]);
if ($int["members"] || $int["influences"] || $int["sounds_like"] || $int["website"] || $int["record_label"] || $int["label_type"] || count($group_ids)) {
?>
<!-- interests -->
<table cellspacing="0" cellpadding="0" width="300" class='dark_b_border2'>
<tr>
<td valign="center" align="left" width="300" class='text' bgcolor="#999999" height="25">
&nbsp;&nbsp;&nbsp;<span class="whitetext12"><?=$name?>'s Interests</span>
</td>
</tr>
<tr valign="top">
<td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" bgcolor="ffffff" border="0">

<?php
     if($int["members"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Members</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["members"]?>
</td>
</tr>
<?php
     }
?>

<?php
     if($int["influences"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Influences</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["influences"]?>
</td>
</tr>
<?php
     }
?>

<?php
     if($int["sounds_like"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Sounds Like</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["sounds_like"]?>
</td>
</tr>
<?php
     }
?>

<?php
     if($int["website"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Website</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["website"]?>
</td>
</tr>
<?php
     }
?>


<?php
     if($int["record_label"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Record Label</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["record_label"]?>
</td>
</tr>
<?php
     }
?>

<?php
     if($int["label_type"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Label Type</b>:
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" class='text'>
<?=$int["label_type"]?>
</td>
</tr>
<?php
     }
     $group_ids = $profile->get_groups($HTTP_GET_VARS["member_id"]);
		 if (count($group_ids)) {
?>

<tr>
<td valign="top" align="left" width="100" class='text'>
<b>Groups:</b>
</td>
<td style="WORD-WRAP: break-word" width="175" class='text'>
<?php
     $sql = "SELECT group_name, id FROM groups WHERE id IN (".implode(',',$group_ids).")";
		 $res = mysql_query($sql);
		 while($group_set = mysql_fetch_array($res))
     {
?>
     <a href='view_group.php?group_id=<?=$group_set["id"]?>'><?=$group_set["group_name"]?></a>,
<?php
     }
		 
		 }
?>
<br><br>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
<?
}
?>

<!-- interests -->



<?php
     $num_companies=$music->get_num_shows($HTTP_GET_VARS["member_id"]);
     if($num_companies!=0)
     {
?>
<!-- company -->
<!-- school -->
<table cellspacing="0" cellpadding="0" width="300" class="dark_b_border2">
<tr>
<td valign="center" align="left" width="300" class='text' bgcolor="#999999" height="25" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="whitetext12"><?=$name?>'s Shows</span>
</td>
</tr>

<tr><td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" border="0">
<?php
     $school_res=$music->get_user_shows($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
<tr>
<td valign="top" align="left" width="50%" class='txt_label'>
<?=$school_set["venue"]?><br>
<?=$school_set["show_month"]?>/<?=$school_set["show_day"]?>/<?=$school_set["show_year"]?><br>

</td>
<td valign="top" align="middle" width="60" class='text'>
<a href='view_show.php?id=<?=$school_set["id"]?>'>View Show Details</a>
</td>
</tr>
<?php
     }
?>
</table>
</td></tr>
</table>
<br>
<?php
     }
?>
<center>
<?
$sql = "SELECT code FROM member_profile WHERE member_id = '".$HTTP_GET_VARS["member_id"]."'";
$code = mysql_fetch_array(mysql_query($sql));
echo stripslashes($code['code']);
?></center>

</td>
<td width="15" align="center" valign="top" bgcolor="White"><img height="1" src="images/clear.gif" width="20" border="0"></td>
<td width="435" align="center" valign="top" bgcolor="White" class="text">
<br>
<!-- school -->

<?php
     $num_songs=$music->get_num_songs($HTTP_GET_VARS["member_id"]);
     if($num_songs!=0)
     {
?>
<!-- school -->
<table cellspacing="0" cellpadding="0" width="300" class="dark_b_border2">
<tr>
<td valign="center" align="left" width="300" class='text' bgcolor="#999999" height="25" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="whitetext12"><?=$name?>'s Songs</span>
</td>
</tr>

<tr><td>
<table bordercolor="000000" cellspacing="2" cellpadding="4" width="300" align="center" border="0">
<?php
     $school_res=$music->get_user_songs($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
<!--
<tr>
<td valign="top" align="left" width="30%" class='text'>
<b><?=$school_set["song_name"]?></b><br></td>
<td valign="top" width="30%" class='text'>
<a href='<?=$school_set["song_file"]?>'>Listen to Song</a></td>
<td valign="top" width="30%" class='text'>
[<a href='#' onClick="window.open('view_lyrics.php?song_id=<?=$school_set[id]?>','mywindow','width=500,height=400,toolbar=no,location=no,directories=no,status=yes,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes')">Lyrics</a>]
<br>
[<a href='rate_song.php?id=<?=$school_set["id"]?>&member_id=<?=$HTTP_GET_VARS["member_id"]?>'>Rate Song</a>]
<br>
[<a href='view_ratings.php?id=<?=$school_set["id"]?>&member_id=<?=$HTTP_GET_VARS["member_id"]?>'>View Ratings</a>]
<br>
[<a href='critisim.php?id=<?=$school_set["id"]?>&member_id=<?=$HTTP_GET_VARS["member_id"]?>'>Critisize Song</a>]
<br>
[<a href='view_cric.php?id=<?=$school_set["id"]?>&member_id=<?=$HTTP_GET_VARS["member_id"]?>'>View Critisim</a>]
</td>

</tr>
-->
<?php
     }
?>
</table>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="450" height="345" id="musicplayer_" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="musicplayer.swf?bandID=<?=$HTTP_GET_VARS['member_id']?>" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="musicplayer.swf?bandID=<?=$HTTP_GET_VARS['member_id']?>" quality="high" bgcolor="#ffffff" width="450" height="345" name="musicplayer_" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</td></tr>
</table>
<br>

<?php
}
?>

<!-- blogs -->
<table bordercolor="000000" cellspacing="3" cellpadding="0" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td width="435" style="word-wrap:break-word" class='text'>
<?=$name?>'s Latest Blog Entry</span>[<a href="subscribe_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Subscribe to members Blog</a>]<br><br></td>
</tr>

<?php
    $num_blogs=$profile->get_num_blogs($HTTP_GET_VARS["member_id"]);
    if($num_blogs==0)
    {
?>
<tr>
<td class='text' valign="top" align="left" height="25">
No blogs entered by user yet.
</td>
</tr>
<?php
    }
    else
    {
        $blog_info=$profile->get_latest_blog($HTTP_GET_VARS["member_id"]);
?>
<tr valign="top">
<td width="435" style="word-wrap:break-word" class='text'><?=$blog_info["subject"]?>&nbsp;
(<a href="view_blog.php?id=<?=$blog_info["id"]?>">view more</a>)
<br><br>
</td>
</tr>

<tr>
<td valign="top" align="left" height="25" class='text'>
[<a href="view_member_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View All Blog Entries</a>]</td>
</tr>
<?php
    }
?>
</table><br>
<!-- blogs -->





<!-- blurbs -->
<table bordercolor="ffcc99" cellspacing="0" cellpadding="0" width="435" bgcolor="ffcc99" border="0">
<tr>
<td class='text' bgcolor="#999999" height="25" valign="center" align="left" width="300" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="orangetext15">
<?=$name?>'s Blurbs</span></td>
</tr>
<tr><td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td valign="top" align="left" width="435" bgcolor="ffffff" style="word-wrap:break-word" class='text'>
<b>Bio:</b><BR>
<?=$int["bio"]?>
</td>
</tr>
</table>
</td></tr>
</table><br>
<!-- blurbs -->





<!-- friend_space -->

<table bordercolor="000000" cellspacing="0" cellpadding="0" width="435" border="0">
<tr><td class="text" align="left" width="435" bgcolor="ffffff" height="20">
<table height="20" cellspacing="0" cellpadding="0" width="435" height="25" class='text' bgcolor="#999999">
<tr><td width="435" style="word-wrap:break-word"><span class="orangetext15">&nbsp;&nbsp;&nbsp;<?=$name?>'s Friend</span></td></tr>
</table>
<table cellspacing="0" cellpadding="5" width="435" align="center" border="0">
<tr>
<td bgcolor="ffffff" colspan="4" width="435" style="word-wrap:break-word" class='btext'>
<?php
    $friend_res = $profile->get_friends($HTTP_GET_VARS["member_id"]);
?>
<?=$name?><span class="redbtext"> has <?=count($friend_res)?> friends.</span>
</td>
</tr>

<tr>
<td>
<table width="435" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>

<?php

    $sr_no=0;
		if (count($friend_res)) {
		
		$sql = "SELECT member_id as friend_id FROM members WHERE member_id IN (".implode(',',$friend_res).") LIMIT 0,8";
		$friend_res = mysql_query($sql);
    while($friend_set=mysql_fetch_array($friend_res))
		{
        if($sr_no%4==0)
        {
          print "</tr><tr>";
        }

     $fname=$people->get_name($friend_set["friend_id"]);
     $num_images=$people->get_num_images($friend_set["friend_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($friend_set["friend_id"]);
         if($gender=="Male")
         {
          $fimage="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $fimage="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $fimage_url=$people->get_image($friend_set["friend_id"]);
        $pic_name=str_replace('user_images/', '', $fimage_url);
        $fimage = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }

?>
<td bgcolor="FFFFFF" align="center" valign="top" width="1">

<!-- friend place -->
<table border="0" cellspacing="0" align="center">
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word">
&nbsp;<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>"><?=$fname?></a>&nbsp;
</td>
</tr>
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="25%">
<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
<?=$fimage?>
</a><?
if ($people->check_online($friend_set["friend_id"]))
	echo '<br><font color="#ff0000">Online</font>';
?>
</td>
</tr>
</table>
<?php
        $sr_no=$sr_no+1;
    }
	}
?>
<!-- friend place -->

</td>
</tr>
</table>

</td>
</tr>

<tr valign="center" align="right">
<td bgcolor="FFFFFF" colspan="4">
<a href="view_friends.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&page=1" class="redlink">View All of <?=$name?>'s Friends</a>
<br><br>
</td>
</tr>
</table>
</td></tr>
</table><br>
<!-- friend_space -->


<!-- music_space -->

<table bordercolor="000000" cellspacing="0" cellpadding="0" width="435" border="0">
<tr><td class="text" align="left" width="435" bgcolor="ffffff" height="20">
<table cellspacing="0" cellpadding="0" width="435" height="25" class='text' bgcolor="#999999">
<tr><td width="435" style="word-wrap:break-word"><span class="orangetext15">&nbsp;&nbsp;&nbsp;<?=$name?>'s Favorite Bands</span></td></tr>
</table>
<table cellspacing="0" cellpadding="5" width="435" align="center" border="0">
<tr>
<td bgcolor="ffffff" colspan="4" width="435" style="word-wrap:break-word" class='btext'>
<?php
    $friend_res = $profile->get_bands($HTTP_GET_VARS["member_id"]);
?>
<?=$name?> has <span class="redbtext"><?=count($friend_res)?></span> favorite bands.
</td>
</tr>

<tr>
<td>
<table width="435" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>

<?php
		if (count($friend_res)) {
		$sql = "SELECT member_id as friend_id FROM members WHERE member_id IN (".implode(',',$friend_res).") LIMIT 0,8";
		$friend_res = mysql_query($sql);
    while($friend_set=mysql_fetch_array($friend_res))
    {
        if($sr_no%4==0)
        {
          print "</tr><tr>";
        }

     $fname=$people->get_name($friend_set["friend_id"]);
     $num_images=$people->get_num_images($friend_set["friend_id"]);
     if($num_images==0)
     {
         $fimage="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
        $fimage_url=$people->get_image($friend_set["friend_id"]);
        $pic_name=str_replace('user_images/', '', $fimage_url);
        $fimage = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }

?>
<td bgcolor="FFFFFF" align="center" valign="top" width="1">

<!-- friend place -->
<table border="0" cellspacing="0" align="center">
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word">
&nbsp;<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>"><?=$fname?></a>&nbsp;
</td>
</tr>
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="25%">
<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
<?=$fimage?>
</a>
</td>
</tr>
</table>
<?php
        $sr_no=$sr_no+1;
    }
	}

?>
<!-- music place -->

</td>
</tr>
</table>

</td>
</tr>

<tr valign="center" align="right">
<td bgcolor="FFFFFF" colspan="4">
<a href="view_bands.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&page=1" class="redlink">View All of <?=$name?>'s Favotite Bands</a>
<br><br>
</td>
</tr>
</table>
</td></tr>
</table><br>
<!-- friend_space -->


<!-- comments_space -->
<table bordercolor="ffcc99" cellspacing="0" cellpadding="0" width="435" bgcolor="ffcc99" border="0">
<tr>
<td class='text' bgcolor="#999999" height="25" valign="center" align="left" width="300" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="orangetext15">
<?=$name?>'s Friend Comments</span></td>
</tr>

<table bordercolor="000000" cellspacing="3" cellpadding="0" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td class='text'>
<?php
    $tot_comments=$profile->get_total_comments($HTTP_GET_VARS["member_id"]);
    if($tot_comments<=50)
    {
?>
<b>Displaying <span class="redtext"><?=$tot_comments?></span> of <span class="redtext"><?=$tot_comments?></span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
<?php
    }
    else
    {
?>
<b>Displaying <span class="redtext">50</span> of <span class="redtext"><?=$tot_comments?></span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
<?php
    }
?>
</td>
</tr>
<?php
    $test_res=$profile->get_profile_comments($HTTP_GET_VARS["member_id"]);
    while($test_set=mysql_fetch_array($test_res))
    {
     $fname=$people->get_name($test_set["test_user"]);
     $num_images=$people->get_num_images($test_set["test_user"]);
     if($num_images==0)
     {
         $fimage="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $fimage_url=$people->get_image($test_set["test_user"]);
         $fimage="<img alt='' src='$fimage_url' width=90 border=0>";
     }
?>
<tr>
<td bordercolor="ff9933" bgcolor="ffcccc">
<table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="FFffff">
<tr>
<td align="center" valign="top" width=150 bgcolor="FF9933" style="word-wrap:break-word" class='text'>
<a href="view_profile.php?member_id=<?=$test_set["test_user"]?>"><?=$fname?></a>
<br><br>
<a href="view_profile.php?member_id=<?=$test_set["test_user"]?>">
<?=$fimage?>
</a>
<?
if ($people->check_online($test_set["test_user"]))
	echo '<br><font color="#ff0000">Online</font>';
?>
<br><br>
</td>
<td bgcolor="F9D6B4" align="left" valign="top" width="260" style="word-wrap:break-word" class='text'>
<span class="blacktext10">
<?=$test_set["date_posted"]?>
</span><br><br><?=$test_set["test_text"]?>
</td>
</tr>
</table>
</td></tr>
<?php
    }
?>
<tr>
<td colspan='2' bgcolor='#FFFFFF' align="right">
<a href="add_testimonial.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Add Comment</a></td>
</tr>

</table>

<!-- reviews_space -->

<table bordercolor="ffcc99" cellspacing="0" cellpadding="0" width="435" bgcolor="ffcc99" border="0">
<tr>
<td class='text' bgcolor="#999999" height="25" valign="center" align="left" width="300" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="orangetext15">
<?=$name?>'s Reviews</span></td>
</tr>

<table bordercolor="000000" cellspacing="3" cellpadding="0" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td class='text'>
<?php
    $tot_comments=$profile->get_total_reviews($HTTP_GET_VARS["member_id"]);
    if($tot_comments<=50)
    {
?>
<b>Displaying <span class="redtext"><?=$tot_comments?></span> of <span class="redtext"><?=$tot_comments?></span> comments
<?php
    }
    else
    {
?>
<b>Displaying <span class="redtext">50</span> of <span class="redtext"><?=$tot_comments?></span> comments
<?php
    }
?>
</td>
</tr>
<?php
    $test_res=$profile->get_profile_reviews($HTTP_GET_VARS["member_id"]);
    while($test_set=mysql_fetch_array($test_res))
    {
     $fname=$people->get_name($test_set["test_user"]);
     $num_images=$people->get_num_images($test_set["test_user"]);
     if($num_images==0)
     {
         $fimage="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $fimage_url=$people->get_image($test_set["test_user"]);
         $fimage="<img alt='' src='$fimage_url' width=90 border=0>";
     }
?>
<tr>
<td bordercolor="ff9933" bgcolor="ffcccc">
<table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="FFffff">
<tr>
<td class='text' align="center" valign="top" width=150 bgcolor="FF9933" style="word-wrap:break-word">
<a href="view_profile.php?member_id=<?=$test_set["test_user"]?>"><?=$fname?></a>
<br><br>
<a href="view_profile.php?member_id=<?=$test_set["test_user"]?>">
<?=$fimage?>
</a>
<br><br>
</td>
<td class='text' bgcolor="F9D6B4" align="left" valign="top" width="260" style="word-wrap:break-word">
<span class="blacktext10">
<b>Rating:</b><?=$test_set["rank"]?><br>
<?=$test_set["date_posted"]?>
</span><br><br><?=$test_set["test_text"]?>
</td>
</tr>
</table>
</td></tr>
<?php
    }
?>
<tr>
<td colspan='2' bgcolor='#FFFFFF' align="right">
<a href="rank_band.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Rank User</a></td>
</tr>

</table>
