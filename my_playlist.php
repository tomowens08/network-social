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
<td valign='top'>
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
<br><br>

<table border="0"  cellpadding="0" cellspacing="0">
<tr>
<td valign="top">

<table border="0" cellpadding="0"  cellspacing="0">
<tr>
<td class='txt_label' size='30%'>
<b>My Playlist</b>
</td>
<td class='txt_label' size='70%'>
&nbsp;
<?php

        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }

        $n_next=$n+12;

        if($num_cat_videos<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }
?>
<?php
        if($n!=0)
        {
        $n_previous=$n-12;
?>
&#187; <a href='my_playlist.php?n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='my_playlist.php?n=<?=$n_next?>'>Next</a>
<?php
        }
?>
</td>
</tr>
</table>
<br><br>

<table border="0" align="center" cellpadding="0" bgcolor="DBE1EA" cellspacing="1">
<tr bgcolor="E7E7E7">
<td valign="top">
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
     $sr_no=1;
     $front_res=$videos->display_my_playlist($_SESSION["member_id"],$n);
     while($front_set=mysql_fetch_array($front_res))
     {
         if($sr_no%3==0)
         {
             print "</tr><tr>";
         }
?>

<td valign="top" width="158" align="center" class='txt_label'>
<a title="Watch this video" href="view_video.php?id=<?=$front_set["video_id"]?>">
<img src="<?=$front_set["video_thumbnail"]?>" width="100"  border="0">
</a>
<br>
<a  href="view_video.php?id=<?=$front_set["video_id"]?>">
<strong><?=$front_set["video_title"]?></strong>
</a>
<br><?=$front_set["posted_on"]?>
<?php
     $name=$people->get_name($front_set["member_id"]);
?>
<br> by <a href="view_profile.php?member_id=<?=$front_set["member_id"]?>"><?=$name?></a>
<br>Views: <?=$front_set["views"]?> | Comments:
<?php
     $num_comments=$videos->get_num_comments($front_set["video_id"]);
?>
<?=$num_comments?>
</td>

<?php
     }
?>
</tr>
</table>
</td></tr>
</table>
</td>
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
</blockquote>
</TD>

</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
