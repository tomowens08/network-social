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
include("includes/right3.php");
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
<td width="42%" class='txt_label'><b>&nbsp;Forum Category </b>&nbsp;<a href="./message_board.php?field=cat_name&order=asc"><img title="Sort by category name asc" border="0" src="./images/s_up.png"></a>&nbsp;<a href="./message_board.php?field=cat_name&order=desc"><img title="Sort by category name desc" border="0" src="./images/s_down.png"></a></td>
<td width="9%" class='txt_label'><b>Topics</b>&nbsp;<a href="./message_board.php?field=topics&order=asc"><img title="Sort by number of topics asc" border="0" src="./images/s_up.png"></a>&nbsp;<a href="./message_board.php?field=topics&order=desc"><img title="Sort by number of topics asc" border="0" src="./images/s_down.png"></a></td>
<td bgcolor="EFF3FF" width="9%" class='txt_label'><b>Posts</b>&nbsp;<a href="./message_board.php?field=posts&order=asc"><img title="Sort by number of messages asc" border="0" src="./images/s_up.png"></a>&nbsp;<a href="./message_board.php?field=posts&order=desc"><img title="Sort by number of messages asc" border="0" src="./images/s_down.png"></a></td>
<td width="30%" class='txt_label'><b>Last Post</b>&nbsp;<a href="./message_board.php?field=posted_on&order=asc"><img title="Sort by last post date asc" border="0" src="./images/s_up.png"></a>&nbsp;<a href="./message_board.php?field=posted_on&order=desc"><img title="Sort by last post date desc" border="0" src="./images/s_down.png"></a></td>
</tr>
<?php
     include("classes/forum.class.php");
     $forum = new forum;
		 $sql = "SELECT mc.*, fp.topic_id, fp.posted_on, fp.posted_by, fp.main_forum_id, fp.sub_forum_id,
		 								(select count(*) as a from forum_topics ft where ft.main_forum_id = mc.id) as topics,
										(select count(*) as a from forum_posts fp where fp.main_forum_id = mc.id) as posts,
										(
											SELECT IF (
														(select posted_on from forum_topics as ft where ft.main_forum_id = mc.id order by posted_on desc limit 0,1) > (select posted_on from forum_posts fp where fp.main_forum_id = mc.id ORDER BY posted_on DESC LIMIT 0,1),
														(select id from forum_topics as ft where ft.main_forum_id = mc.id order by posted_on desc limit 0,1),
														0
													)
										
										) as last_topic_id
										
										FROM forum_main_cat mc LEFT JOIN forum_posts fp ON fp.main_forum_id = mc.id
										WHERE fp.id IN (SELECT max(id) FROM forum_posts fp1 where fp1.main_forum_id = mc.id) OR (SELECT count(*) FROM forum_posts fp2 where fp2.main_forum_id = mc.id) = 0
										GROUP BY mc.id";

		 $_SESSION[$_SERVER['PHP_SELF'].'field'] = $_GET['field']?$_GET['field']:$_SESSION[$_SERVER['PHP_SELF'].'field'];
		 $_SESSION[$_SERVER['PHP_SELF'].'order'] = $_GET['order']?$_GET['order']:$_SESSION[$_SERVER['PHP_SELF'].'order'];
		 if ($_SESSION[$_SERVER['PHP_SELF'].'field'])
		 	$sql .= ' ORDER BY '.$_SESSION[$_SERVER['PHP_SELF'].'field'].' '.$_SESSION[$_SERVER['PHP_SELF'].'order'];
		 else 
		 	$sql .= ' ORDER BY posts DESC';

		 $forum_res = mysql_query($sql);
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
<?=$forum_set['topics']?>
</td>
<td bgcolor="FFFFFF" width="9%" class='txt_label'>
<?=$forum_set['posts']?>
</td>
<td bgcolor="FFFFFF" width="30%" class='txt_label'>
<?php
     if(!$forum_set['topic_id'] && !$forum_set['topics'])
     {
?>
No Last Post
<?php
     } elseif (($forum_set['topics'] && !$forum_set["posted_by"]) || $forum_set['last_topic_id']) {
			$sql = "SELECT * FROM forum_topics WHERE main_forum_id = ".$forum_set['id']." ORDER BY posted_on DESC LIMIT 0,1";
			$res = mysql_fetch_array(mysql_query($sql));
?>
<?=myDate($res["posted_on"]);?>
<br>
<?php
     include_once("includes/people.class.php");

     $people=new people;
     $name = $people->get_name($res["posted_by"]);
?>
by: <a href="view_profile.php?member_id=<?=$res["posted_by"]?>"><?=$name?></a> &nbsp;<font color="CC0000">&raquo;</font>
<a href="view_sub_forum.php?main_cat=<?=$res["main_forum_id"]?>&sub_cat=<?=$res["sub_forum_id"]?>&post_id=<?=$res['id']?>"><font color="003399"><u>View Topic</u></font></a>

<?
		 }
     else
     {
?>
<?=myDate($forum_set["posted_on"]);?>
<br>
<?php
     include_once("includes/people.class.php");

     $people=new people;
     $name = $people->get_name($forum_set["posted_by"]);
?>
by: <a href="view_profile.php?member_id=<?=$forum_set["posted_by"]?>"><?=$name?></a> &nbsp;<font color="CC0000">&raquo;</font>
<a href="view_post.php?main_cat=<?=$forum_set["main_forum_id"]?>&sub_cat=<?=$forum_set["sub_forum_id"]?>&post_id=<?=$forum_set["topic_id"]?>"><font color="003399"><u>View Post</u></font></a>
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
include("includes/bottom3.php");
}
?>
