<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
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

<?php
    include("includes/blog.class.php");
    
    $blog=new blog;
    $blog_info = $blog->get_blog($HTTP_GET_VARS["id"]);
    if($blog_info["privacy"]=="1")
    {
        // check for preffered list
        
        $res=$blog->check_preffered($blog_info["member_id"],$_SESSION["member_id"]);
        if($res==0)
        {
?>
<table width="100%">
<tbody>
<tr>
<td vAlign=top width="20%">

  You are not allowed to view this blog.
<?php
          die();
        }
    }
    $res=$blog->update_counter($HTTP_GET_VARS["id"]);
?>

<!-- Blog Entry -->

<table width="100%">
<tbody>
<tr>
<td vAlign=top width="20%">
<?php
     include("includes/people.class.php");
     $people=new people;
     $name=$people->get_name($blog_info["member_id"]);
     $num_images=$people->get_num_images($blog_info["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($blog_info["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
     $people_info=$people->get_info($blog_info["member_id"]);
     $profile_info=$people->get_profile($blog_info["member_id"]);
?>

<!-- user_profile -->
<table class=profile>
<tbody>
<TR>
<TD align=middle>
<p>
<a href="view_profile.php?member_id=<?=$blog_info["member_id"]?>"><B><?=$name?></B></A><BR>
<a href="view_profile.php?member_id=<?=$blog_info["member_id"]?>">
<?php
     print $image;
?>
</a><br></p>
<div class=DataPoint=OnlineNow;UserID=4885511; id=UserDataNode0 style="WIDTH: 80px; HEIGHT: 20px">
</DIV>
<p></p>
<p class='txt_label'><b>Last Updated:</b><br><?=$blog_info["last_updated"]?></p>
</td></tr>
<TR>
<TD align=middle>
<?php
     if($blog_info["member_id"]==$_SESSION["member_id"])
     {
?>
<a href="post_blog.php">Post New Blog</A><BR>
<a href="email_friend.php">Email to a Friend</A>
<?php
     }
?>
</td>
</tr></tbody></table>
<br>
<table class='txt_label'>
<tbody>
<tr>
<td class='txt_label'><B>Gender</B>: <?=$people_info["gender"]?><BR>
<b>Status</B>: <?=$profile_info["status"]?>
<?php
        $days=datediff($people_info["dob"], GetTodayDate(0));
        $years=Round($days/365, 0);
?>
<BR><B>Age</B>: <?=$years?> Years
<BR><B>City</B>:<?=$people_info["city"]?>
<BR><B>State</B>: <?=$people_info["state_name"]?><BR>
<?php
if($people_info["country"]!=Null)
{
 if(is_numeric($people_info["country"]))
 {
  $sql="select * from states where state_id = $people_info[country]";
  $country_res=mysql_query($sql);
  $country_set=mysql_fetch_array($country_res);
 }
}
?>
<B>Country</B>: <?=$country_set["state_name"]?><BR>
</TD></TR></TBODY></TABLE><BR>
<TABLE class=profile>
<TBODY>
</TBODY></TABLE><BR></TD>
<TD width=5>
<IMG height=1 alt="" src="images/spacer.gif" width=5 border=0></TD>

<td vAlign=top width="100%">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR class=spacer>
<TD></TD></TR></TBODY></TABLE>
<table width='100%' cellSpacing='0' cellPadding='10'>
<TBODY>
<TR>
<td width="100%">
<p class="blogTimeStamp"><b>Posted On:</b> <?=date('d/m/Y',$blog_info['last_updated'])?></p>
<table class=blog cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD width=30><IMG height=1 alt="" src="images/spacer.gif" width=#blogIndent# border=0>
</TD>
<TD class='txt_label'>
<P class='txt_label'>
<?=$blog_info["body"]?>
</P>

<b>
<?php
   $num_comments=$blog->get_num_comments($blog_info["id"]);
   $num_kudos=$blog->get_num_kudos($blog_info["id"]);
?>
<?=$num_comments?> Comments
</b>
 -
<b>
<?=$num_kudos?> Kudos
</b> -
<a href="add_blog_comment.php?id=<?=$HTTP_GET_VARS["id"]?>">
<b>Add Comment</b></a> -
<?php
     $creator=$blog->get_creator($blog_info["id"]);
     if($creator==$_SESSION["member_id"])
     {
?>
<a href="edit_blog.php?id=<?=$blog_info["id"]?>">
<b>Edit</b>
</a>
- <a onclick="if( confirm('Are you sure you want to remove this blog?') ){return true;}else{ return false; }" href="delete_blog.php?id=<?=$blog_info["id"]?>">
<b>Remove</b>
</a>
<?php
     }
?>
</p></td></tr></tbody></table></td>
</tr></tbody></table>
<br>

<!-- blog_ comments -->
<?php
     $comments_res=$blog->get_blog_comments($blog_info["id"]);
     while($comment_set = mysql_fetch_array($comments_res))
     {
         $commentor_name = $people->get_name($comment_set["member_id"]);
         $cnum_images = $people->get_num_images($comment_set["member_id"]);
         if($cnum_images == 0)
         {
             $image = "<img src='images/no_pic.gif' border='0'>";
         }
         else
         {
					$image_url = $people->get_image($comment_set["member_id"]);
					$pic_name = str_replace('user_images/', '', $image_url);
					$image = "<a href='view_profile.php?member_id=$comment_set[member_id]'><img src='image_gd/image_browse.php?$pic_name' border='0'></a>";
         }
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td><img src="images/clear.gif" height="1" width="0"></td>
<td class="blogCommentsProfile">
<a href="view_profile.php?member_id=<?=$comment_set["member_id"]?>" class="profileLinks"><?=$commentor_name?></a><br>
<a href="view_profile.php?member_id=<?=$comment_set["member_id"]?>">
<?=$image?></a><br>
<DIV style="width:80px;height:20px;" ID="UserDataNode1" CLASS="DataPoint=OnlineNow;UserID=4885511;"></div>
</td>
<td class="blogComments" width="100%">
<table cellpadding="5" cellspacing="0" border="0" width="100%">
<tr>
<td class="blogComments">
<p class="blogCommentsContent"><?=$comment_set["body"]?></p>
<p class="blogCommentsContent">Posted by <a href="view_profile.php?member_id<?=$comment_set["member_id"]?>"><b>
<?=$commentor_name?></b></a> on <?=$comment_set["posted_on"]?>
<?php
     if($comment_set["comment_id"]!=0)
     {
?>
<p class="blogCommentsContent">Posted For Comment
<?php
     $comment=$blog->get_comment($comment_set["comment_id"]);
?>
<br>
<b><?=$comment["body"]?></b></a><br> which was posted on <?=$comment["posted_on"]?>
<?php
     }
?>
<br>
<?php
     if($creator==$_SESSION["member_id"])
     {
?>
[<a href="remove_comment.php?blog_id=<?=$blog_info["id"]?>&comment_id=<?=$comment_set["id"]?>" onmouseover="window.status='Remove this blog comment';return true;" onmouseout="window.status='';return true;" onclick="return confirm('Are you sure you want to remove this blog comment?')"><b>Remove</b></a>]
<?php
     }
?>
[<a href="add_blog_comment1.php?blog_id=<?=$blog_info["id"]?>&comment_id=<?=$comment_set["id"]?>" onmouseover="window.status='Reply to this comment';return true;" onmouseout="window.status='';return true;"><b>Reply to this</b></a>]
</p></td>
</tr>
</table>
</td>
</tr>
<tr class="commentSpacer">
<td colspan="3"></td>
</tr>
</table>
<?php
     }
?>

<!-- blog_comments -->
</table>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
    }
include("includes/bottom.php");
?>
