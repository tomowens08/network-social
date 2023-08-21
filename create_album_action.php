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
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<table height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top" width="35%">
<?php
     include("includes/video_side.php");
?>
<td valign="top" width='65%'>

<table width="100%" class='dark_b_border2' cellspacing="0" cellpadding="10">
<tr>
<td colspan='2' class='dark_blue_white2'>
Videos - Create Album&nbsp;[<a href='videos.php'>Back to Videos &gt;&gt;</a>]
</td>
</tr>

<?php

     $album_title=addslashes($HTTP_POST_VARS["album_title"]);
     $album_desc=addslashes($HTTP_POST_VARS["album_desc"]);
     $type=addslashes($HTTP_POST_VARS["type"]);

     if($album_title==Null||$album_desc==Null)
     {
?>
<tr>
<td class='err_class'>
    You did not enter album title or album description.
</td>
</tr>

<?php
     }
     else
     {
         include("classes/videos.class.php");
         $videos=new videos;

         $res=$videos->add_album($album_title,$album_desc,$type,$_SESSION["member_id"]);
         if($res==1)
         {
?>
<tr>
<td class='txt_label'>
    Your album has been added.
</td>
</tr>
<tr>
<td class='txt_label'>
    <a href='videos.php'>Return to Videos</a>&nbsp;|&nbsp;<a href='upload_video.php'>Upload a Video</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='err_class'>
Err # There was a mysql error and the album was not added at this time. Please try again later.
</td>
</tr>
<tr>
<td class='txt_label'>
    <a href='videos.php'>Return to Videos</a>
</td>
</tr>
<?php
         }
   }
?>

</table>

<!-- End -->
<!-- middle_content -->
</td>
</tr>
</table>

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
