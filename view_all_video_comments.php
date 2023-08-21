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

include("classes/videos.class.php");
$videos=new videos;


//include("includes/right.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
     include("includes/video_side.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Video Comments
</td></tr>

<tr><td>

<table cellspacing="0" cellpadding="5" border=1 width="100%">

<?php
     $video_id=addslashes($HTTP_GET_VARS["id"]);
     if($video_id==Null||!is_numeric($video_id))
     {
         die("This is a hacking attempt, which was caught.");
     }

     $num_comments=$videos->get_num_comments($video_id);

     $comments_res=$videos->get_front_comments($num_comments,$video_id);
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
<a href="view_profile.php?member_id=<?=$comments_set["member_id"]?>">
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
<a href="view_profile.php?member_id=<?=$comments_set["member_id"]?>"><?=$poster_name?></a>
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
Rating Given:
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
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>


<!-- middle_content -->

</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>

<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
