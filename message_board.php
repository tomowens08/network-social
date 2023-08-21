<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" align="center">
<tr>
<td valign="top" align="center">
<table border="0" cellpadding="4" cellspacing="0" width="800" align="center">


<tr>
<td valign="top" class='txt_label'><b><?=$site_name?> Forum's<br></p></td>
</tr>

<tr>
<td>

<table width='99%' align='center' class='dark_b_border2' cellspacing='0' cellpadding='4'>
<tr valign="middle" class='dark_blue_white2'>
<td width="42%"><b>&nbsp;Forum Category </b></td>
<td width="9%"><b>Topics</b></td>
<td width="9%"><b>Posts</b></td>
<td width="30%"><b>Last Post</b></td>
</tr>

<?php
     include("includes/people.class.php");
     $people=new people;

     include("classes/forum.class.php");
     $forum=new forum;
     $forum_res=$forum->get_all_main_cat();
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

<td valign="center"  width="42%" class='txt_label'>
<a href="view_forum.php?main_cat=<?=$forum_set["id"]?>">
<img src="images/folder.gif" align="left" border="0"></a>
<b>
<a href="view_forum.php?main_cat=<?=$forum_set["id"]?>" class='join'>
<?=$forum_set["cat_name"]?>
</a></b><br>
<br>
<?=$forum_set["cat_desc"]?>
</td>
<td width="9%" class='join'>
<div align='center'>
<?php
     $num_topics=$forum->get_main_num_forum_topics($forum_set["id"]);
     print $num_topics;
?>
</div>
</td>
<td width="9%" class='join'>
<div align='center'>
<?php
     $num_topics=$forum->get_main_num_forum_posts($forum_set["id"]);
     print $num_topics;
?>
</div>
</td>
<td width="30%" class='join'>
<div align='center'>
<?php
     $last_post=$forum->get_main_last_forum_post($forum_set["id"]);
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
by: <a class='join' href="view_profile.php?member_id=<?=$last_post["posted_by"]?>"><?=$name?></a> &nbsp;<font color="CC0000">&raquo;</font>
<a class='join' href="view_post.php?main_cat=<?=$last_post["main_forum_id"]?>&sub_cat=<?=$last_post["sub_forum_id"]?>&post_id=<?=$last_post["topic_id"]?>"><font color="003399"><u>View Post</u></font></a>
<?php
     }
?>
</div>
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





<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
