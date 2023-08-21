<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>

<?php
    include("includes/blog.class.php");

    $blog=new blog;
    $blog_info=$blog->get_blog($HTTP_GET_VARS["id"]);
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
<td><span class=blacktext12>Post a Comment to a Blog Entry</span></td>
<td align="right"><a href="view_blog.php?id=<?=$HTTP_GET_VARS["id"]?>">View Blog</a></td>
</tr>

<?php
     $blog_id=$HTTP_GET_VARS["id"];
     $posted_on=$HTTP_POST_VARS["posted_on"];
     $body=$HTTP_POST_VARS["body"];
     $kudos=$HTTP_POST_VARS["kudos"];
     
     if($body==Null)
     {
?>
<tr>
    <td colspan='2' class='style9'>You did not enter any comments.</span></td>
</tr>
<?php
     }
     else
     {
         $res=$blog->add_comment($blog_id,$_SESSION["member_id"],$posted_on,$body,$kudos);
         if($res==1)
         {
?>
<tr>
<td colspan='2' class='style9'>Your comment has been added successfully.</span></td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td colspan='2' class='style9'>There was an error and your comment was added. Please try again later.</span></td>
</tr>
<?php
         }
     }
?>


</table>
</td>
</tr>

</table>
</td>
</tr>
</table>
<?php
     }
     include("includes/bottom.php");
?>
