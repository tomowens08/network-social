<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<table border="0" cellspacing="0" cellpadding="0" width="800" height="100%" bordercolor="000000" bgcolor="ffffff" align="center">
<tr>
<td valign="top" align="center">
<table border="0" cellpadding="5" cellspacing="0" width="85%" bgcolor="ffffff" align="center">
<tr>
<td valign="top" class='txt_label'><b><?=$site_name?> Forum's<br></p></td>
</tr>

<tr>
<td>

<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="639ACE">
<tr bgcolor="EFF3FF" valign="middle">
<td width="42%" class='txt_label'><b>&nbsp;Forum Category </b></td>
<td width="9%" class='txt_label'><b>Topics</b></td>
<td bgcolor="EFF3FF" width="9%" class='txt_label'><b>Posts</b></td>
<td width="30%" class='txt_label'><b>Last Post</b></td>
</tr>
<?php
     include("classes/forum.class.php");
     $forum=new forum;
     $forum_res=$forum->get_all_main_cat();
     while($forum_set=mysql_fetch_array($forum_res))
     {
?>
<tr valign="middle">
<td bgcolor='#FFFFFF' valign="middle"  width="42%" class='txt_label'>
<a href="view_forum.php?main_cat=<?=$forum_set["id"]?>">
<img src="images/folder.gif" width="34" height="29" align="left" border="0"></a>
<b>
<a href="view_forum.php?main_cat=<?=$forum_set["id"]?>">
<?=$forum_set["cat_name"]?>
</a></b><br>
<br>
<?=$forum_set["cat_desc"]?>
</td>
<td bgcolor="FFFFFF" width="9%" class='txt_label'>
<?php
     $num_topics=$forum->get_main_num_forum_topics($forum_set["id"]);
     print $num_topics;
?>
</td>
<td bgcolor="FFFFFF" width="9%" class='txt_label'>
<?php
     $num_topics=$forum->get_main_num_forum_posts($forum_set["id"]);
     print $num_topics;
?>
</td>
<td bgcolor="FFFFFF" width="30%" class='txt_label'>
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
     include("includes/people.class.php");

     $people=new people;
     $name=$people->get_name($last_post["posted_by"]);
?>
by: <a href="view_profile.php?member_id=<?=$last_post["posted_by"]?>"><?=$name?></a> &nbsp;<font color="CC0000">&raquo;</font>
<a href="view_post.php?post_id=<?=$last_post["id"]?>"><font color="003399"><u>View Post</u></font></a>
<?php
     }
?>
</td>
</tr>

<?php
     }
?>


</table>
</td>
</tr>
</table>


<!-- middle_content -->
</td>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
