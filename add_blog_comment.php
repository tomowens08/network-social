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
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<?php
    include("includes/blog.class.php");

    $blog=new blog;
    $blog_info=$blog->get_blog($HTTP_GET_VARS["id"]);
    // check for comments allowed
    if($blog_info["comments_allowed"]==1)
    {
?>
<tr>
<td valign='top' colspan='2'>
<p align='center'>

<!-- Blog Entry -->

<table width="100%">
<tbody>
<tr>
<td vAlign=top width="20%">
Comments are not allowed on this blog.
<?php
         die();
    }
    //check for comments allowed
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
</table>
</td>
</tr>

<tr valign="top">
<td align="center">
<table width="625" border="0" cellspacing="0" cellpadding="1" bgcolor="6699CC">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr>
<td class='style9'>
<b>Posted On:</b> <?=$blog_info["posted_month"]?>/<?=$blog_info["posted_day"]?>/<?=$blog_info["posted_year"]?>
</td>
</tr>
<tr>
<td><strong><?=$blog_info["subject"]?></strong></td>
</tr>
<tr>
<td><?=$blog_info["body"]?></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
</td>
</tr>

<tr valign="top">
<td align="center">
<table border="0" cellspacing="0" cellpadding="1" bgcolor="6699CC">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td>
<form action="post_comment.php?id=<?=$HTTP_GET_VARS["id"]?>" method="post" name="theForm" id="theForm">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td class='style9' nowrap>Posted Date:&nbsp;</td>
<td class='style9'>
<?php
     $posted_on=date("D M d, Y, H:m");
?>
<input type='hidden' name='posted_on' value='<?=$posted_on?>'>
<?=$posted_on?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr>
<td class='style9' colspan="3" nowrap>Body:</td>
</tr>
<tr>
<td class='style9' colspan="3"><textarea cols="70" rows="15" name="body"></textarea></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr valign="middle">
<td class='style9' >Give Kudos:
<input type="Radio" name="kudos" value="2"> 2 Kudos!
<input type="Radio" name="kudos" value="1"> 1 Kudos!
<input type="Radio" name="kudos" value="0" checked> No Kudos
</td>
</tr>
</table>
<p align="center"><input type="button" value="Cancel" onClick="history.back();">
<input type="submit" value="Post"></p>
</form>
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


<!-- Middle Text -->
<?php
include("includes/bottom.php");
     }
?>
