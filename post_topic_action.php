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
<td colspan="2" class='txt_label'>Message Board: Start New Topic</td>
</tr>
<tr><td align="center">

<table border="0" cellspacing="1" cellpadding="5"  bgcolor="6699cc">
<?php
     $invalid=1;

     $main_cat=$HTTP_GET_VARS["main_cat"];
     if($main_cat==Null||!is_numeric($main_cat))
     {
         $invalid=0;
     }
     
     $sub_cat=$HTTP_GET_VARS["sub_cat"];
     if($sub_cat==Null||!is_numeric($sub_cat))
     {
         $invalid=0;
     }

     $subject=addslashes($HTTP_POST_VARS["subject"]);
     $subject=str_replace("java", "", $subject);
     $subject=str_replace("javascript", "", $subject);
     $subject=str_replace("script", "", $subject);
     
            if(strpos(strtolower($subject),"script")>0)
            {
             $invalid=0;
            }
            else
            {
             if($invalid!=0)
             {
              $invalid=1;
             }
            }

     

     $body=addslashes($HTTP_POST_VARS["body"]);
     $body=str_replace("java", "", $body);
     $body=str_replace("javascript", "", $body);
     $body=str_replace("script", "", $body);
     
            if(strpos(strtolower($body),"script")>0)
            {
             $invalid=0;
            }
            else
            {
             if($invalid!=0)
             {
              $invalid=1;
             }
            }


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
         if($invalid==1)
         {
         include("classes/forum.class.php");
         $forum=new forum;
         $res=$forum->add_topic($main_cat,$sub_cat,$subject,$body,$_SESSION["member_id"]);
         
         if($res==1)
         {
?>
<tr><td bgcolor="ffffff" colspan="2" align="center" class='txt_label'>
Your topic has been posted.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td></tr>
<?php
         }
         else
         {
?>
<tr>
<td bgcolor="ffffff" colspan="2" align="center" class='err_class'>
There was an error and your topic was not added at this time, please try again later.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td>
</tr>
<?php
         }
         }
         else
         {
?>
<tr>
<td bgcolor="ffffff" colspan="2" align="center" class='err_class'>
Your input cannot be validated and post was not added at this time, please try again later.<br>
<a href='view_sub_forum.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Back to forum</a>&nbsp;|&nbsp;
<a href='post_topic.php?main_cat=<?=$main_cat?>&sub_cat=<?=$sub_cat?>'>Post Again</a>
</td>
</tr>
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
