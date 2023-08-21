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
<td valign="top" width='130' valign='top'>
<?php
     include("includes/video_side.php");
?>

<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding='4' class='dark_b_border2'>
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
Err # Invalid album selected, cannot be edited.
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
              $album_set=$videos->get_album($album_id);
?>
<tr>
<td width='100%'>
<form name='AddListing' action='edit_album1.php?id=<?=$HTTP_GET_VARS["id"]?>' method='post'>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">

<tr bgcolor="ffffff" valign="middle">
<td width="14%" class='txt_label'>Title:</td>
<td width="86%">
<input type="text" name="album_title" value='<?=stripslashes($album_set["album_title"])?>' size="50" maxlength="60">
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Description:</td>
<td width="86%">
<textarea name="album_desc" rows="5" cols="50" class="verdana12">
<?=stripslashes($album_set["album_desc"])?>
</textarea>
</span>
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Type:</td>
<td width="86%" class='txt_label'>
<?php
     if($album_set["album_type"]==1)
     {
?>
<input type='radio' value='1' name='type' checked>&nbsp;Public<br>
<input type='radio' value='2' name='type'>&nbsp;Private ( Circle of Friends & Invitation )<br>
<?php
     }
?>
<?php
     if($album_set["album_type"]==2)
     {
?>
<input type='radio' value='1' name='type'>&nbsp;Public<br>
<input type='radio' value='2' name='type' checked>&nbsp;Private ( Circle of Friends & Invitation )<br>
<?php
     }
?>
</td>
</tr>


</table>
<br>
<input type="submit" name="submit" value="- Edit -"><br>
</td>
</tr>
</form>
</table>
</td>
</tr>
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
