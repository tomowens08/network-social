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
<td valign="top" width="25%">
<?php
     include("includes/video_side.php");
?>
<td valign="top" width='75%'>

<table width="100%" class='dark_b_border2' cellspacing="0" cellpadding="10">
<tr>
<td colspan='2' class='dark_blue_white2'>
Videos - Create Album&nbsp;[<a href='videos.php'>Back to Videos &gt;&gt;</a>]
</td>
</tr>

<form name='AddListing' action='create_album_action.php' method='post'>

<tr bgcolor="ffffff" valign="middle">
<td width="14%" class='txt_label'>Title:</td>
<td width="86%">
<input type="text" name="album_title" value="" size="50" maxlength="60">
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Description:</td>
<td width="86%">
<textarea name="album_desc" rows="5" cols="50" class="verdana12">
</textarea>
</span>
</td>
</tr>

<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Type:</td>
<td width="86%" class='txt_label'>
<input type='radio' value='1' name='type' checked>&nbsp;Public<br>
<input type='radio' value='2' name='type'>&nbsp;Private ( Circle of Friends & Invitation )<br>
</textarea>
</span>
</td>
</tr>

<tr>
<td colspan='2'>
<input type="submit" name="submit" value="-Create-"><br>
</td>
</tr>
</form>
</table>

</td>
</tr>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
