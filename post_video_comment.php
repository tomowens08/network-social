<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<?php
    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
?>

<!-- Classified Entry -->

<table height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font size="2"><b>Videos<br>Post Comment</b></font>
</td>
<td class='txt_label' align="right" valign="bottom">
<a href="videos.php">Back to Videos &gt;&gt;</a>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">

<?php
     $video_id=$HTTP_GET_VARS["id"];
     $rate=$HTTP_POST_VARS["rate"];
     $comment=addslashes($HTTP_POST_VARS["comment"]);

     if($rate==Null||$comment==Null)
     {
?>
<tr valign="middle" bgcolor="ffffff">
<td width="86%" class='txt_label'>
You did not select a rating or add a comment.<br>
<a href='post_video_comment.php?id=<?=$video_id?>'>Try Again</a>&nbsp;|&nbsp;
<a href='view_video.php?id=<?=$video_id?>'>Back to this video</a>
</td>
</tr>
<?php
     }
     else
     {
         $res=$videos->add_comment($video_id,$rate,$comment,$_SESSION["member_id"]);
         if($res==1)
         {
?>
<tr valign="middle" bgcolor="ffffff">
<td width="86%" class='txt_label'>
Your comment has been posted successfully.<br>
<a href='view_video.php?id=<?=$video_id?>'>Back to this video</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr valign="middle" bgcolor="ffffff">
<td width="86%" class='txt_label'>
There was an error and the comment was not posted at this time.<br>
<a href='post_video_comment.php?id=<?=$video_id?>'>Try Again</a>&nbsp;|&nbsp;
<a href='view_video.php?id=<?=$video_id?>'>Back to this video</a>
</td>
</tr>
<?php
         }

     }
?>
</table>
</td>
</tr>
</form>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
