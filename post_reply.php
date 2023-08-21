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
<td colspan="2" class='txt_label'>Message Board: Post a Reply</td>
</tr>
<tr><td align="center">
<form method="post" action="post_reply_action.php?post_id=<?=$HTTP_GET_VARS["post_id"]?>&main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>">
<table border="0" cellspacing="1" cellpadding="5"  bgcolor="#330000">
<tr><td bgcolor="#330000" nowrap colspan="2" class='fontmain'><b>Enter Your New Topic</b></td></tr>
<tr><td bgcolor="ffffff" class='join'><b>Subject:&nbsp;</b></td>
<td bgcolor="ffffff"><input type="text" name="subject" size="80" maxlength="255" value=""></td></tr>
<tr><td bgcolor="ffffff" valign="top" class='join'><b>Body:&nbsp;</b></td><td bgcolor="ffffff">
<textarea name="body" rows="10" cols="80"></textarea></td></tr>
</table>
</td></tr>
<tr><td bgcolor="ffffff" colspan="2" align="center">
<input type="submit" value='Add Post' name='submit'>&nbsp;&nbsp;
</td></tr>
</form>
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
