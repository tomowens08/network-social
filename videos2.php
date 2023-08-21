<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
include("includes/profile.class.php");
$profile=new profile;

include("includes/class.class.php");
$class=new classified;

include("includes/people.class.php");
$people=new people;

//include("includes/right.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top' bgcolor='#FFFFFF'>
<!-- middle_content -->
<?php
     include("includes/video_side.php");
     include("classes/videos.class.php");
     $videos=new videos;
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Videos - Home
</td></tr>

<tr><td>

<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td class='txt_label'>
<br>Welcome to <?=$site_name?>'s Video Gallery!<br>
<?php
     $total_videos=$videos->get_total_num_videos();
?>
<?=$total_videos?> memorable public and private videos and counting... It's your turn to have fun.
<br>
<br>
<a href="upload_video.php"><strong><font color="#800000">Upload Video</font></strong></a>
</td></tr>
</table>
<br>

<table border="0" align="center" cellpadding="0" bgcolor="FFCC99" cellspacing="1">
<tr bgcolor="FDF3E9"><td>
<br>
<table width="96%"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<form action="search_video.php" method="post">
<tr><td class='txt_label'>
<input class="size11" type="text" name="key_word" size="30" value="">
<input type="submit" name="btnSubmit" value="Search Videos" class="size11">
</td></tr>
</form>
</table>
</td>
<td align="right">
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<form action="show_video_cat.php" method="get">
<tr><td align="right">
<select  name="cat_id" size='1'>
<option value="0" selected> ~ Select Channel ~</option>
<?php
     $cat_res=$videos->get_all_cat();
     while($cat_set=mysql_fetch_array($cat_res))
     {
         $num_videos=$videos->get_cat_num_videos($cat_set["id"]);
?>
<option value="<?=$cat_set["id"]?>"><?=$cat_set["cat_name"]?> (<?=$num_videos?>)</option><br>
<?php
     }
?>
</select>
<input type="submit"  name="btnSubmit" value=" Display Videos " class="size11">
</td></tr>
</form>
</table>
</td>
</tr>
</table>
<br>
</td></tr>
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">

<table border="0" align="center" cellpadding="0"  cellspacing="0">
<tr>
<td><img src="images/newvideos.gif" alt="" width="123" height="23" border="0"></td>
<td align="right"><a href="new_videos.php"><strong>See More New Videos</strong></a></td>
</tr>
</table>

<table border="0" align="center" cellpadding="0" bgcolor="DBE1EA" cellspacing="1">
<tr><td valign="top">
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
     $sr_no=0;
     $front_res=$videos->display_main_vids(10);
     while($front_set=mysql_fetch_array($front_res))
     {
         if($sr_no%2==0)
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
</table>
</td></tr>
</table>
</td>

<td width="30"><img src="images/spacer.gif" alt="" width="30" height="1" border="0"></td>

<td valign="top" width="255" align="right" >
<br><br>
<table width="215"  border="0" cellpadding="0"  cellspacing="0" >
<tr><td><img src="images/channel.gif" alt="" width="154" height="38" border="0"></td></tr>

<?php
     $cat_res=$videos->get_all_cat();
     while($cat_set=mysql_fetch_array($cat_res))
     {
         $num_videos=$videos->get_cat_num_videos($cat_set["id"]);
?>
<tr><td class='txt_label'>
<a href="show_video_cat.php?cat_id=<?=$cat_set["id"]?>"><?=$cat_set["cat_name"]?></a> &nbsp;&nbsp; (<?=$num_videos?>)
</td></tr>
<?php
     }
?>
</table>
<br><br>

			</td></tr>
		</table>
		<br><br>
	</td>
</tr>
</table>

		</td>
	</tr>
</table>
</table>
</table>


<!-- End -->

<!-- middle_content -->
</TD>

</td></tr>
</table>
<!-- Middle Text -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
