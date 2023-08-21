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
<td valign="top" width='100%' bgcolor="#FFFFFF">
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
Videos - Delete Album&nbsp;[<a href='videos.php'>Back to Videos &gt;&gt;</a>]
</td>
</tr>

<?php
     $album_id=addslashes($HTTP_GET_VARS["id"]);
     if($album_id==Null||!is_numeric($album_id))
     {
?>
<tr valign="middle">
<td width="100%" class='err_class'>
Err # No album selected.
</td>
</tr>
</table>
<?php
     }
     else
     {
         $creator=$videos->get_album_creator($album_id);
         if($creator!=$_SESSION["member_id"])
         {
?>
<tr bgcolor="ffffff" valign="middle">
<td width="100%" class='err_class'>
Err # You are not the creator of this album.
</td>
</tr>
<?php
         }
         else
         {
              $album_id=addslashes($HTTP_GET_VARS["id"]);
              $res=$videos->delete_album($album_id);
              if($res==1)
              {
?>
<tr bgcolor="ffffff" valign="middle">
<td width="100%" class='txt_label'>
<b>The album was deleted successfully.</b><br>
<b>You must delete the videos separately if you want to for this album.</b><br></td>
</tr>
<?php
             }
             else
             {
?>
<tr bgcolor="ffffff" valign="middle">
<td width="100%" class='err_class'>
Err # There was an error and the album was not deleted at this time, please try again later.
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
