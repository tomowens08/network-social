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

<table border="0" cellspacing="0" cellpadding="0" width="800" height="100%" bordercolor="000000" bgcolor="ffffff">
<tr>
<td valign="top">
<table border="0" cellpadding="5" cellspacing="0" width="100%" bgcolor="ffffff">
<tr>
<td colspan="2" class='txt_label'>Message Board: Edit Post</td>
</tr>
<tr><td align="center">

<table border="0" cellspacing="1" cellpadding="5"  bgcolor="6699cc">
<?php
     $main_cat=$HTTP_GET_VARS["main_cat"];
     $sub_cat=$HTTP_GET_VARS["sub_cat"];
     $post_id=$HTTP_GET_VARS["post_id"];
     $subject=addslashes($HTTP_POST_VARS["subject"]);
     $body=addslashes($HTTP_POST_VARS["body"]);
     if($subject==Null||$body==Null)
     {
?>

<tr><td bgcolor="ffffff" colspan="2" align="center" class='txt_label'>
You did not enter subject or body.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td></tr>
<?php
     }
     else
     {
         include("classes/forum.class.php");
         $forum=new forum;
         $res=$forum->edit_post($post_id,$subject,$body);

         if($res==1)
         {
?>
<tr><td bgcolor="ffffff" colspan="2" align="center" class='txt_label'>
Your post has been edited.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td></tr>
<?php
         }
         else
         {
?>
<tr><td bgcolor="ffffff" colspan="2" align="center" class='txt_label'>
There was an error and your post was not edited at this time, please try again later.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td></tr>
<?php
         }
     }
?>

</table>
</td>
</tr>
</table>

</div>

<!-- middle_content -->
</td>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
