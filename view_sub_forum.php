<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");

     include("classes/forum.class.php");
     $forum=new forum;
//include("includes/right.php");
     $main_cat=addslashes($HTTP_GET_VARS["main_cat"]);
     $sub_cat=addslashes($HTTP_GET_VARS["sub_cat"]);

     if($main_cat==Null||!is_numeric($main_cat) || $sub_cat==Null||!is_numeric($sub_cat))
     {
?>
<tr>
<td valign="top" bgcolor="#FFFFFF" class='err_class'>
&nbsp;&nbsp;&nbsp;Err # Invalid forum selected, cannot be displayed.
</td>
</tr>

<tr>
<td valign="top" bgcolor="#FFFFFF">&nbsp;

</td>
</tr>
<?php
     }
     else
     {

     $main_forum_set=$forum->get_main_cat($HTTP_GET_VARS["main_cat"]);
     $sub_forum_set=$forum->get_sub_cat($HTTP_GET_VARS["sub_cat"]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">



<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5">

<tr>
<td valign="top" width="75%" class='txt_label'>
<b><a href="message_board.php" class='txt_label'><b>Forum</b></a>
&raquo; <a href='view_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>'>
<?=$main_forum_set["cat_name"]?>
</a>
&raquo;
<?=$sub_forum_set["cat_name"]?>
</b>
</td>
<td width="25%">
<a href='post_topic.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>'>
<img src='images/but_postforu.jpg' border='0'>
</a>
</td>
</tr>

<tr>
<td colspan='2'>

<table width='100%' cellspacing='0' cellpadding='5' class='dark_b_border2'>

<tr>
<td colspan='4' class='join'>
<?php
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+15;

        $num_posts=$forum->get_sub_num_forum_posts($HTTP_GET_VARS["main_cat"],$HTTP_GET_VARS["sub_cat"]);

        if($num_posts<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }

        if($n!=0)
        {
        $n_previous=$n-15;
?>
&#187; <a href='view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&n=<?=$n_previous?>'>Previous Page</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&n=<?=$n_next?>'>Next Page</a>
<?php
        }
?>
</td>
</tr>

<tr class='dark_blue_white2' valign="middle">
<td width="29%"><b>&nbsp;Forum Topic</b></td>
<td width="15%"><b>Posts</b></td>
<td width="32%"><b>Last Post</b></td>
<td width="32%"><b>Topic Starter</b></td>
</tr>
<tr>
<td colspan='4' bgcolor="#ca0064"></td>
</tr>


<?php
     $sr_no=1;

     include("includes/people.class.php");
     $people=new people;
     $moderators=$forum->get_mods($HTTP_GET_VARS["main_cat"],$HTTP_GET_VARS["sub_cat"]);

     $topics_res=$forum->get_topics($HTTP_GET_VARS["main_cat"],$HTTP_GET_VARS["sub_cat"],$n);
     while($topics_set=mysql_fetch_array($topics_res))
     {
        $sel_p=explode(",", $moderators);
?>
<?php
     if($sr_no%2==0)
     {
?>
<tr bgcolor="#f8f2f2" valign="middle">
<?php
     }
?>

<td width="29%" valign='top'>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top" class='txt_label'>
<img src="images/folder.gif" align="left">
<img src="images/1by1.gif" width="2" height="30" align="left"><b>
<a class='txt_label' href="view_post.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$topics_set["id"]?>"><?=stripslashes($topics_set["subject"])?></a></b>
<?php
     if(in_array($_SESSION["member_id"], $sel_p))
     {
?>
<br><br><b>Moderator Options:</b>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a class='txt_label' href='delete_post.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$topics_set["id"]?>'>Delete This Topic</a>]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a class='txt_label' href='edit_post.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$topics_set["id"]?>'>Edit This Topic</a>]
<?php
     }
?>
</td></tr>

<tr>
<td align="right" valign="baseline">
</td>
</tr>
</table>
</td>
<td width="7%" valign='top' class='join'>
<div align='center'>
<?php
     $num_posts=$forum->get_num_posts_topic($topics_set["id"]);
     print $num_posts;
?>
</div>
</td>
<td width="32%">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr valign="top">
<?php

     $last_post=$forum->get_last_topic_post($topics_set["id"]);
     if($last_post!=0)
     {

     $name=$people->get_name($last_post["posted_by"]);
     $num_images=$people->get_num_images($last_post["posted_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($last_post["posted_by"]);
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
        $image_url=$people->get_image($last_post["posted_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($last_post["posted_by"]);
     $profile_info=$people->get_profile($last_post["posted_by"]);

?>
<td><a class='join' href="view_profile.php?member_id=<?=$last_post["posted_by"]?>"><?=$image?></a>
</td>
<td valign="top" class='join' width="176">
<?=$last_post["posted_on"]?> <br>by:
<a class='join' href="view_profile.php?member_id=<?=$last_post["posted_by"]?>"><?=$name?></a>
<?php
     $sql="select status from online_now where member_id = $last_post[posted_by]";
     $online_res=mysql_query($sql);
     $online_set=mysql_fetch_array($online_res);
     if($online_set["status"]=="1")
     {
         print "<img src='images/onlinenow.gif'>";
     }
?>
</td>
<?php
     }
?>
</tr>
</table>
</td>
<td width="32%">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr valign="top">
<td class='join'>
<?php
     $name=$people->get_name($topics_set["posted_by"]);

     $num_images=$people->get_num_images($topics_set["posted_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($topics_set["posted_by"]);
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
        $image_url=$people->get_image($topics_set["posted_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($topics_set["posted_by"]);
     $profile_info=$people->get_profile($topics_set["posted_by"]);
?>
<a href="view_profile.php?member_id=<?=$topics_set["posted_by"]?>"><?=$image?></a></td>
<td valign="top" width="176" class='join'>
<?=$last_post["posted_on"]?><br>by: <a class='join' href="view_profile.php?member_id=<?=$topics_set["posted_by"]?>"><?=$name?></a>
<br>
<?php
     if($last_post["posted_by"]!=Null)
     {
     $sql="select status from online_now where member_id = $last_post[posted_by]";
     $online_res=mysql_query($sql);
     $online_set=mysql_fetch_array($online_res);
     if($online_set["status"]=="1")
     {
         print "<img src='images/onlinenow.gif'>";
     }
     }
?>
</td>
</tr>
</table>
</td>
</tr>

<?php
        $sr_no=$sr_no+1;
     }
?>
</table>



</td>
</tr>

</table>
</td>
</tr>

</table>
<?php
     }
?>

<!-- middle_content -->



<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
