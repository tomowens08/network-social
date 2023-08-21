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
     include("includes/people.class.php");
     $people=new people;

     $main_cat=addslashes($HTTP_GET_VARS["main_cat"]);
     
     if($main_cat==Null||!is_numeric($main_cat))
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
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" align="center">
<tr>
<td valign="top" align="center">
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center">


<?php
     $main_forum_set=$forum->get_main_cat($HTTP_GET_VARS["main_cat"]);
?>
<tr>
<td valign="top" class='txt_label'>
<b><a href='message_board.php'><?=$site_name?> Forum's</a> >> <?=$main_forum_set["cat_name"]?>
<br></p>
</td>
</tr>


<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr class='dark_blue_white2' valign="middle">
<td width="42%"><b>&nbsp;Forum Sub Category </b></td>
<td width="9%"><b>Topics</b></td>
<td width="9%"><b>Posts</b></td>
<td width="30%"><b>Last Post</b></td>
</tr>

<?php

     $forum_res=$forum->get_all_sub_cat($HTTP_GET_VARS["main_cat"]);
     $sr_no=1;

     while($forum_set=mysql_fetch_array($forum_res))
     {
?>
<?php
     if($sr_no%2==0)
     {
?>
<tr bgcolor="#f8f2f2" valign="middle">
<?php
     }
     else
     {
?>
<tr bgcolor="#FFFFFF" valign="middle">
<?php
     }
?>

<td valign="middle"  width="42%" class='txt_label'>
<a href="view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$forum_set["id"]?>">
<img src="images/folder.gif" align="left" border="0"></a>
<b>
<a href="view_sub_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$forum_set["id"]?>">
<?=$forum_set["cat_name"]?>
</a></b>
</td>
<td width="9%" class='txt_label'>
<?php
     $num_topics=$forum->get_sub_num_forum_topics($forum_set["id"]);
     print $num_topics;
?>
</td>
<td width="9%" class='txt_label'>
<?php
     $num_topics=$forum->get_sub_num_forum_posts($forum_set["id"]);
     print $num_topics;
?>
</td>
<td width="30%" class='txt_label'>
<?php
     $last_post=$forum->get_sub_last_forum_post($forum_set["id"]);
     if($last_post==0)
     {
?>
No Last Post
<?php
     }
     else
     {
?>
<?=$last_post["posted_on"]?>
<br>
<?php
     $name=$people->get_name($last_post["posted_by"]);
?>
by: <a href="view_profile.php?member_id=<?=$last_post["posted_by"]?>"><?=$name?></a> &nbsp;<font color="CC0000">&raquo;</font>
<a href="view_post.php?main_cat=<?=$last_post["main_forum_id"]?>&sub_cat=<?=$last_post["sub_forum_id"]?>&post_id=<?=$last_post["topic_id"]?>"><font color="003399"><u>View Post</u></font></a>
<?php
     }
?>
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

</table>
<?php
}
?>






<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
