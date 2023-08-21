<?php
ob_start("ob_gzhandler");
/*
  Author Ankur Jain (ankurjain@vastal.com)
  version 1.0.1
  created on 17/06/2006

  Copyright Vastal I-Tech & Co. (www.vastal.com)
  All rights reserved.

  This software is the confidential and proprietary property of Vastal I-Tech & Co.. ("Confidential Information").
  You shall not disclose such Confidential Information and
  shall use it only in accordance with the terms of the license agreement
  you entered into with Vastal I-Tech & Co..
*/
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

<table height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top" width="130">
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>
Videos - Delete Video Comment &nbsp; [<a href="videos.php">Back to Videos &gt;&gt;</a>]
</td>
</tr>

<?php
     $comment_id=addslashes($HTTP_GET_VARS["comment_id"]);
     if($comment_id==Null||!is_numeric($comment_id))
     {
?>
<tr>
<td width="100%" class='err_class'>
Err # Invalid comment selected, cannot be deleted.
</td>
</tr>
</table>
<?php
     }
     else
     {
              $res=$videos->delete_comment($comment_id);
              if($res)
              {
?>
<tr>
<td width="100%" class='txt_label'>
Your video has been successfully deleted.
</td>
</tr>
</table>
<?php
              }
              else
              {
?>
<tr>
<td width="100%" class='err_class'>
Err # There was a mysql error and the video was not deleted at this time, please try again later.
</td>
</tr>
</table>
<?php
              }
     }
?>

</table>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
