<?php
  session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
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
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
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
<td align="right">&nbsp;</td>
</tr>

<?php
     $blog_id=$HTTP_GET_VARS["id"];

         $res=$blog->delete_blog($blog_id);
         if($res==1)
         {
?>
<tr>
<td colspan='2' class='style9'>Your blog has been removed successfully.</span></td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td colspan='2' class='style9'>There was an error and your blog was not removed at this time. Please try again later.</span></td>
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
</td>
</tr>
</table>
</div>


<!-- End -->
<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
