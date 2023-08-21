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
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
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

<table width='100%'>
<tr>
<td width='20%'>
<?php
    include("includes/video_side.php");
    include("classes/videos.class.php");
    $videos=new videos;
?>
</td>

<td width='80%' valign='top'>
<table width='100%' align='center' class='dark_b_border2'>
<tr>
<td colspan='2' class='dark_blue_white2'>
Add video to your favorite!
</td>
</tr>

<tr>
<td width='100%' colspan='2'  class='txt_label'>

<?php
     $video_id=addslashes($HTTP_GET_VARS["id"]);
     if(!is_numeric($video_id))
     {
?>
<tr>
<td width='100%' colspan='2' valign='top' class='err_class'>
Err # Invalid Video Selected cannot be added to favorites.<br>
<?php
     if(is_numeric($video_id))
     {
?>
<a href='view_video.php?id=<?=$video_id?>'>Back to Video</a>
<?php
     }
?>
</div>
</td>
</tr>

<?php
     }
     else
     {

  $num=$videos->check_favorite($_SESSION["member_id"],$video_id);

  if($num==1)
  {
?>
<tr>
<td width='100%' colspan='2' valign='top' class='err_class'>
The Video is already in your favorites.<br>
<?php
     if(is_numeric($video_id))
     {
?>
<a href='view_video.php?id=<?=$video_id?>'>Back to Video</a>
<?php
     }
?>
</div>
</td>
</tr>

<?php
  }
  else
  {
      $res=$videos->add_favorite($_SESSION["member_id"],$video_id);
      if($res==1)
      {
?>
<tr>
<td width='100%' colspan='2' valign='top' class='txt_label'>
The video has been added to your favorites.<br>
<?php
     if(is_numeric($video_id))
     {
?>
<a href='view_video.php?id=<?=$video_id?>'>Back to Video</a>
<?php
     }
?>
</div>
</td>
</tr>
<?php
      }
      else
      {
?>
<tr>
<td width='100%' colspan='2' valign='top' class='err_class'>
Err # There was an mysql error and the video was not added to your favorites at this time, please try again later.<br>
<?php
     if(is_numeric($video_id))
     {
?>
<a href='view_video.php?id=<?=$video_id?>'>Back to Video</a>
<?php
     }
?>
</div>
</td>
</tr>
<?php
      }
  }

}
?>

</table>
</td>
</table>
</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
