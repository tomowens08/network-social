<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<!-- middle_content -->
<?php
     include("classes/forum.class.php");
     $forum=new forum;
     $main_cat=addslashes($HTTP_GET_VARS["main_cat"]);
     $sub_cat=addslashes($HTTP_GET_VARS["sub_cat"]);
     $post_id=addslashes($HTTP_GET_VARS["post_id"]);

     if($main_cat==Null||!is_numeric($main_cat) || $sub_cat==Null||!is_numeric($sub_cat) || $post_id==Null||!is_numeric($post_id))
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
     $topic_set=$forum->get_topic($HTTP_GET_VARS["post_id"]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">

<tr>
<td>

<!-- middle content -->


<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top" width="70%" class='join'>

<b>
<a href="message_board.php" class='txt_label'><b>Forum</b></a>
<font size="2">&raquo;</font>
<a href='view_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>'>
<b><?=$main_forum_set["cat_name"]?></b>
</a>
 &raquo;
<a href='view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>'>
<?=$sub_forum_set["cat_name"]?>
</a>
</b>
&raquo; <?=stripslashes($topic_set["subject"])?></font></font></b>
</td>
<td valign="top" width="29%">
<a href='view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>'>
<img src='images/but_backtolist.jpg' border='0'>
</a>
</td>
<td valign="top" width="29%">
<a href='post_reply.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$HTTP_GET_VARS["post_id"]?>'>
<img src='images/but_replytopost.jpg' border='0'>
</a>
</td>
</tr>
</table>


<table width='100%' cellspacing='0' cellpadding='5' class='dark_b_border2'>
<tr>
<td colspan='2' nowrap class='join'>
<?php
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+15;

        $num_posts=$forum->get_num_posts_topic($HTTP_GET_VARS["post_id"]);

        if($num_posts<=$n_next)
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
        $n_previous=$n-15;
?>
&#187; <a href='view_post.php?post_id=<?=$HTTP_GET_VARS["post_id"]?>&main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&n=<?=$n_previous?>' class='join'>Previous Page</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='view_post.php?post_id=<?=$HTTP_GET_VARS["post_id"]?>&main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&n=<?=$n_next?>' class='join'>Next Page</a>
<?php
        }
?>

</td>
</tr>

<tr class='dark_blue_white2'>
<td nowrap>
<b>Author</b>
</td>
<td>
<b>Message</b>
</td>
</tr>


<!-- display main topic -->

<tr>
<td bgcolor="ffffff" class='txt_label'>
<div align="center">
<?php
     include("includes/people.class.php");
     $people=new people;

     $topic_set=$forum->get_topic($HTTP_GET_VARS["post_id"]);


     $name=$people->get_name($topic_set["posted_by"]);
     $num_images=$people->get_num_images($topic_set["posted_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($topic_set["posted_by"]);
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
        $image_url=$people->get_image($topic_set["posted_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($topic_set["posted_by"]);
     $profile_info=$people->get_profile($topic_set["posted_by"]);
?>
<p><a href="view_profile.php?member_id=<?=$topic_set["posted_by"]?>"><?=$name?></a><br>
<img src="images/1by1.gif" width="60" height="5" border="0"><br>
<a href="view_profile.php?member_id=<?=$topic_set["posted_by"]?>">
<?=$image?>
</a><br>
<?php
     $sql="select status from online_now where member_id = $topic_set[posted_by]";
     $online_res=mysql_query($sql);
     $online_set=mysql_fetch_array($online_res);
     if($online_set["status"]=="1")
     {
         print "<img src='images/onlinenow.gif'>";
     }
?>
<img src="images/1by1.gif" width="60" height="3" border="0"><br>
<br>
<img src="images/1by1.gif" width="40" height="10" border="0"><br>
</div>
</td>
<td bgcolor="ffffff" class='txt_label' valign="top" align="left">
<table border="0" cellpadding="3" cellspacing="0" bgcolor="ffffff" width="100%">
<tr colspan="2">
<td width="75%" class='txt_label'><b>Posted:</b>&nbsp;<span class="redtext8"><b> <?=$topic_set["posted_on"]?>
</b></span><br></td>
</tr>
<tr>
<td width="500" class='txt_label' style="word-wrap:break-word">
<?=stripslashes($topic_set["message"])?>
</td>
</tr>
</table>
</td>
</tr>



<?php
     $moderators=$forum->get_mods($HTTP_GET_VARS["main_cat"],$HTTP_GET_VARS["sub_cat"]);
     $sr_no=1;
     
     $posts_res=$forum->get_replies($HTTP_GET_VARS["post_id"],$n);
     while($topic_set=mysql_fetch_array($posts_res))
     {
?>
<?php
     if($sr_no%2==0)
     {
?>
<tr bgcolor="#f8f2f2" valign="middle">
<?php
     }
?>

<td class='txt_label'>
<div align="center">
<?php

     $name=$people->get_name($topic_set["posted_by"]);
     $num_images=$people->get_num_images($topic_set["posted_by"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($topic_set["posted_by"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
     $people_info=$people->get_info($topic_set["posted_by"]);
     $profile_info=$people->get_profile($topic_set["posted_by"]);
?>
<p><a href="view_profile.php?member_id=<?=$topic_set["posted_by"]?>"><?=$name?></a><br>
<img src="images/1by1.gif" width="60" height="5" border="0"><br>
<a href="view_profile.php?member_id=<?=$topic_set["posted_by"]?>">
<?=$image?>
</a><br>
<img src="images/1by1.gif" width="60" height="3" border="0"><br>
<br>
<img src="images/1by1.gif" width="40" height="10" border="0"><br>
<?php
     $sel_p=explode(",", $moderators);
     if(in_array($_SESSION["member_id"], $sel_p))
     {
?>
[<a href='delete_forum_reply.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$topic_set["id"]?>'>Delete This Topic</a>]
<br>
[<a href='edit_topic.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$topic_set["id"]?>'>Edit This Topic</a>]
<?php
     }
?>
</div>
</td>
<td class='txt_label' valign="top" align="left">
<table border="0" cellpadding="3" cellspacing="0" width="100%">
<tr colspan="2">
<td width="75%" class='txt_label'><b>Posted:</b>&nbsp;<span class="redtext8"><b> <?=$topic_set["posted_on"]?>
</b></span><br></td>
</tr>
<tr>
<td width="500" class='txt_label' style="word-wrap:break-word">
<?=stripslashes($topic_set["message"])?>
</td>
</tr>
</table>
</td>
</tr>
<?php
          $sr_no=$sr_no+1;
     }
?>


<!-- display main topic -->


</table>
<?php
     }
?>



<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
