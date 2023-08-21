<?php
session_start();
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
<td valign="top" bgcolor="#FFFFFF"><!-- middle_content -->

<?php
    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
?>

<!-- Classified Entry -->

<table height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font size="2"><b>Videos - View Video</b></font>
</td>
<td class='txt_label' align="right" valign="bottom">
<a href="videos.php">Back to Videos &gt;&gt;</a>
</td>
</tr>
</table>
<?php
     $video_id=addslashes($HTTP_GET_VARS["id"]);
     if($video_id==Null||!is_numeric($video_id))
     {
         die("This is a hacking attempt, which was caught.");
     }
     $aa=$videos->update_view_counter($video_id);

     $video_set=$videos->get_video($video_id);
?>


<table border="0" cellspacing="0" cellpadding="0" width="760" align="center">
<tr>
<td width="320" valign="top" >
<table cellpadding="0" bgcolor="9EC2DD" cellspacing="1">
<tr bgcolor="D6E2EC">
<td>

<object width="409" height="386" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" id="mediaplayer1">
<param name="Filename" value="<?=$video_set["asx_file"]?>">
<param name="AutoStart" value="True">
<param name="ShowControls" value="True">
<param name="ShowStatusBar" value="False">
<param name="ShowDisplay" value="True">
<param name="AutoRewind" value="True">
<embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/MediaPlayer/" width="409" height="386" src="<?=$site_url?><?=$video_set["asx_file"]?>" filename="<?=$video_set["asx_file"]?>" autostart="True" showcontrols="True" showstatusbar="False" showdisplay="True" autorewind="True">
</embed>
</object>
</td></tr>
</table>

<br><img src="images/bulet_star.gif" alt="" width="11" height="10" border="0" align="absbottom"><strong> Rate this video</strong> &nbsp;&nbsp;
</div>

<table  width="320"   border="0" align="center" cellspacing="1" cellpadding="4"  bgcolor="FF0000">
<tr  bgcolor="FFA4A4">
<td height="26" align="center">
<table align="center">
<tr>
<td width="20"><img src="images/thumbs_down.gif" alt="" width="15" height="15" border="0"></td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=1"><strong>1</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=2"><strong>2</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=3"><strong>3</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=4"><strong>4</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=5"><strong>5</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=6"><strong>6</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=7"><strong>7</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=8"><strong>8</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=9"><strong>9</strong></a> </td>
<td width="10"><a href="rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>&rating=10"><strong>10</strong></a> </td>
<td width="20" align="right"><img src="images/thumbs_up.gif" alt="" width="15" height="15" border="0"></td>
</tr>
</table>
</td>
</tr>
</table>

<br>

<table cellpadding="0" cellspacing="0"  width="320">
<tr>
<td  align="center" height="30">

<a title='Click here to email this video to your friends' href='forward_video.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>Email Video to Friends</strong></a>
&nbsp;| &nbsp;
<a title='Add this video to your list of favorite video' href='add_video_favorite.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>Add to Favorite</strong></a>
<br>
<a title='AIM this video to a friend *** make sure your AIM is active ***' href='aim:goim?screenname=&message=hey,+check+out+this+cool+video+at+<?=$site_name?>+<?=$site_url?>view_video.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>AIM video to a friend</strong></a>
<a title='AIM this video to a friend *** make sure your AIM is active ***' href='aim:goim?screenname=&message=hey,+check+out+this+cool+video+at+<?=$site_name?>+<?=$site_url?>view_video.php?id=<?=$HTTP_GET_VARS["id"]?>'><img src='images/icon_aim.gif' border='0'></a>
&nbsp;|&nbsp;
<?php
     if($video_set["video_codes_allow"]=="1")
     {
?>
<a title='Click here to get video codes for use on your own website, online journal, myspace, xanga, etc.' href='video_code.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>Get Video Codes </strong></a>
<?php
     }
?>
<br>
<a title='Add Video To Your Playlist' href='add_playlist.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>Add video to playlist</strong></a>
</td>
</tr>
</table>

<!-- member comments -->

<img src="images/spacer.gif" width="1" height="5" border="0" alt=""><br>
<table  width="320"   border="0" align="center" cellspacing="0" cellpadding="0" >
<tr><td class='txt_label'>
<img src="images/5ico1.gif" align="absmiddle"><b>Member Comments</b>
</td><td align="right">
<a title='post your comment about this video' href='rate_video.php?id=<?=$HTTP_GET_VARS["id"]?>'><strong>Post Comment</strong></a>
</td></tr>
</table>
<img src="images/spacer.gif" width="1" height="5" border="0" alt=""><br>

<table  width="320" border="0" cellspacing="0" cellpadding="0" align="center">
<?php
     $num_comments=$videos->get_num_comments($video_id);
?>
<tr>
<td class='txt_label'>Found: <b><?=$num_comments?></b> comments</b>
</td>
</tr>
</table>

<script>
	function confirmDeleteComment()
	{
	if ( confirm("Sure you want to delete this comment?"))
			  return true
	else
			   return false
	}
</script>


<table class="textsmal11" width="320"   border="0" align="center" cellspacing="1" cellpadding="4" bgcolor="D3D2D2" >

<?php
     $creator=$videos->get_video_creator($video_id);

     $comments_res=$videos->get_front_comments(40,$video_id);
     while($comments_set=mysql_fetch_array($comments_res))
     {
?>

<?php
     $num_images=$people->get_num_images($comments_set["posted_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($comments_set["posted_by"]);
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
        $image_url=$people->get_image($comments_set["posted_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $poster_name=$people->get_name($comments_set["posted_by"]);

     $creator=$videos->get_video_creator($video_id);
?>
<tr  bgcolor="FFFFFF">
<td width="70" align="center" valign="top">
<a href="view_profile.php?member_id=<?=$comments_set["posted_by"]?>">
<?=$image?>
</a>
<?php
     $sql="select status from online_now where member_id = $comments_set[posted_by]";
     $online_res=mysql_query($sql);
     $online_set=mysql_fetch_array($online_res);

     if($online_set["status"]=="1")
     {
         print "<img src='images/onlinenow.gif'>";
     }
?>
<br>
<a href="view_profile.php?member_id=<?=$comments_set["posted_by"]?>"><?=$poster_name?></a>
</td>
<td valign="top">
<table class="txt_label" width="96%" align="center">
<tr ><td valign="top">
<?=$comments_set["posted_on"]?>
<br><img src="images/spacer.gif" width="1" height="5" border="0" alt="">
<br>
<?=$comments_set["comment"]?>
<br>
<br><img src="images/spacer.gif" width="1" height="5" border="0" alt=""><br>
Rating Given:<br>
<?php
     $aa=1;
     while($aa<=$comments_set["rate"])
     {
?>
<img src="images/bulet_star.gif" alt="" width="11" height="10" border="0" align="absbottom">
<?php
       $aa=$aa+1;
     }
?>
<?php
     while($aa<=10)
     {
?>
<img src="images/bulet_star_empty.gif" alt="" width="11" height="10" border="0" align="absbottom">
<?php
       $aa=$aa+1;
     }
?>
</td></tr>
<tr>
<td align="right">
<?php
     $creator=$videos->get_video_creator($video_id);

     if($creator==$_SESSION["member_id"])
     {
?>
<a href='delete_video_comment.php?comment_id=<?=$comments_set["id"]?>' onClick="return confirmDeleteComment();">Delete this comment</a>
<?php
     }
?>
</td>
</tr>
</table>
</td>
</tr>
<?php
     }
?>
<tr><td class='txt_label'>
<div align='center'>
<a href='view_all_video_comments.php?id=<?=$video_id?>'>View All Comments</a>
</div>
</td></tr>
</table>

<!-- member comments -->

<!-- video details -->

</td>
<td width="20" ><img src="images/spacer.gif" alt="" width="20" height="1" border="0"></td>
<td width="20" ><img src="../images/spacer.gif" alt="" width="20" height="1" border="0"></td>
 <td width="399" valign="top">
<table border="0" cellspacing="0" cellpadding="0" width="399">
<tr>
<td valign="top" style="padding-right:20px;padding-bottom:10px ">
<img src="images/5tit1.gif"><br>
<img src="images/spacer.gif" alt="" width="1" height="10" border="0"><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" width="90">
<a href="view_video.php?id=<?=$video_id?>"><img src="<?=$video_set["video_thumbnail"]?>" width="75"  border="0" vspace="5" hspace="5"></a>
</td>

<TD valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td class='txt_label'>
<strong><?=$video_set["video_title"]?></strong>
<br>
<?=$video_set["video_caption"]?>
</td></tr>
<tr><td class='txt_label'>
<img src="images/spacer.gif" alt="" width="1" height="5" border="0"><br>
Category: <a href='show_video_cat.php?cat_id=<?=$video_set["video_cat"]?>'>
<?php
     $cat=$videos->get_cat($video_set["video_cat"]);
?>
<?=$cat["cat_name"]?></a>
<br>
Published on: <?=$video_set["posted_on"]?>
<br>
 by
 <?php
      $name=$people->get_name($video_set["member_id"]);
 ?>
  <?=$name?>
<br>
(
<a href="view_profile.php?member_id=<?=$video_set["member_id"]?>">View Profile</a> |
<a href="send_message.php?member_id=<?=$video_set["member_id"]?>">Send Message</a>
)
<br><img src="images/spacer.gif" alt="" width="1" height="5" border="0"><br>
Views: <?=$video_set["views"]?>
<br>
Rating:
<?php
     $avg_rating=$videos->get_avg_video_rating($video_id);
?>
<?php
     $aa=1;
     while($aa<=$avg_rating)
     {
?>
<img src="images/bulet_star.gif" alt="" width="11" height="10" border="0" align="absbottom">
<?php
       $aa=$aa+1;
     }
?>
<?php
     while($aa<=10)
     {
?>
<img src="images/bulet_star_empty.gif" alt="" width="11" height="10" border="0" align="absbottom">
<?php
       $aa=$aa+1;
     }
?>
</td></tr>
</table>
</td>
</tr>

<tr>
<td height="5"  colspan="2">
<img src="images/spacer.gif" alt="" width="1" height="5" border="0"></td></tr>
<tr><td colspan="2" height="24" bgcolor="D5F0DB" class='txt_label'>
&nbsp;Tags: <?=$video_set["video_tags"]?>
</td></tr>

<tr>
<td colspan="2" height="20" class='txt_label'>
Views: <?=$video_set["views"]?>
&nbsp;&nbsp;|&nbsp;&nbsp; Last Viewed by:
<a href='view_profile.php?member_id=<?=$video_set["last_viewed"]?>'>
<?php
     $last=$people->get_name($video_set["last_viewed"]);
?>
<?=$last?>
</a>
</td></tr>

<tr><td height="5"  colspan="2"><img src="images/spacer.gif" alt="" width="1" height="5" border="0"></td></tr>



<tr>
<td height="5"  colspan="2">
<img src="images/spacer.gif" alt="" width="1" height="5" border="0"></td></tr>
<tr><td colspan="2" height="24" bgcolor="D5F0DB" class='txt_label'>
&nbsp;Other Videos By: <a href='view_profile.php?member_id=<?=$creator?>'><?=$name?></a>
</td></tr>

<tr>
<td colspan="2" height="20" class='txt_label'>
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
     $sr_no=0;
     $front_res=$videos->display_user_videos($video_id,$creator);
     while($front_set=mysql_fetch_array($front_res))
     {
         if($sr_no%3==0)
         {
             print "</tr><tr>";
         }
?>

<td valign="top" width="158" align="center" class='txt_label'>
<a title="Watch this video" href="view_video.php?id=<?=$front_set["id"]?>">
<img src="<?=$front_set["video_thumbnail"]?>" width="100"  border="0">
</a>
<br>
<a  href="view_video.php?id=<?=$front_set["id"]?>">
<strong><?=$front_set["video_title"]?></strong>
</a>
<br><?=$front_set["posted_on"]?>
<?php
     $name=$people->get_name($front_set["member_id"]);
?>
<br> by <a href="view_profile.php?member_id=<?=$front_set["member_id"]?>"><?=$name?></a>
<br>Views: <?=$front_set["views"]?> | Comments:
<?php
     $num_comments=$videos->get_num_comments($front_set["id"]);
?>
<?=$num_comments?>
</td>

<?php
	   $sr_no=$sr_no+1;
     }
?>
</tr>
<?php
     if($sr_no==1)
     {
?>
<tr>
<td height="20" class='txt_label'>
<b>No other videos were found.</b>
</td></tr>
<?php
     }
?>
</table>
</td></tr>
<tr><td height="5"  colspan="2"><img src="images/spacer.gif" alt="" width="1" height="5" border="0"></td></tr>


</table>
</td></tr>
</table>
</td>
</tr>
</table>


<!-- video details -->


</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
$aa=$videos->update_last_viewed($video_id,$_SESSION["member_id"]);
include("includes/bottom.php");
?>
