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
<!-- middle_content -->

<?php
    include("includes/blog.class.php");

    $blog=new blog;
    $blog_info=$blog->get_blog($HTTP_GET_VARS["blog_id"]);
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
<!-- Start -->

<table bordercolor=000000 cellspacing=0 cellpadding=0 width='720' bgcolor=ffffff border=0>
<tr>
<td height="33">
<table width="720" border="0" cellspacing="0" cellpadding="20">
<tr>
<td><span class=blacktext12><h3>Remove a Comment from a Blog Entry</h3></span></td>
<td align="right"><a href="view_blog.php?id=<?=$HTTP_GET_VARS["blog_id"]?>">View Blog</a></td>
</tr>

<?php
     $blog_id=$HTTP_GET_VARS["blog_id"];
     $comment_id=$HTTP_GET_VARS["comment_id"];

         $res=$blog->delete_comment($comment_id, $blog_id);
         if($res==1)
         {
?>
<tr>
<td colspan='2' class='txt_label'>Your comment has been removed successfully.</span></td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td colspan='2' class='txt_label'>There was an error and your comment was removed at this time. Please try again later.</span></td>
</tr>
<?php
         }
?>


</table>
</td>
</tr>

</table>
</td>
</tr>
</table>
<br>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
 }
include("includes/bottom.php");
?>
