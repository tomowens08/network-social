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

    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<!-- Classified Entry -->

<table height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top" width="130" valign='top'>
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>
Videos - Edit Album &nbsp; [<a href="videos.php">Back to Videos &gt;&gt;</a>]
</td>
</tr>

<?php
     $album_id=addslashes($HTTP_GET_VARS["id"]);
     if($album_id==Null||!is_numeric($album_id))
     {
?>
<tr>
<td width="100%" class='err_class'>
Err # Invalid Album selected, cannot be edited.
</td>
</tr>
<?php
     }
     else
     {
         $creator=$videos->get_album_creator($album_id);
         if($creator!=$_SESSION["member_id"])
         {
?>
<tr>
<td width="100%" class='err_class'>
Err # You are not the creator of this album, cannot be edited.
</td>
</tr>
<?php
         }
         else
         {
              $album_id=addslashes($HTTP_GET_VARS["id"]);
              $album_title=addslashes($HTTP_POST_VARS["album_title"]);
              $album_desc=addslashes($HTTP_POST_VARS["album_desc"]);
              $album_type=addslashes($HTTP_POST_VARS["album_type"]);

              $res=$videos->edit_album($album_id,$album_title,$album_desc,$album_type);
              if($res==1)
              {
?>
<tr>
<td width="100%" class='txt_label'>
The album has been edited successfully.
</td>
</tr>
<?php
             }
             else
             {
?>
<tr>
<td width="100%" class='err_class'>
Err # There was a mysql error and the album was not edited at this time, please try again later.
</td>
</tr>
<?php
             }
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