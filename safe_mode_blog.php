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
<td valign="top" bgcolor="#FFFFFF"> <blockquote>
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
?>
<!-- Blog Entry -->

<table width="625" border="0" cellspacing="0" cellpadding="1" bgcolor="#FFFFFF">
<?php
     $blog=new blog;
     $blog_res=$blog->get_my_blogs($_SESSION["member_id"]);

     while($blog_set=mysql_fetch_array($blog_res))
     {
?>
<tr>
<td>
<table bgcolor="ffffff" width="625" border="1" style="border-collapse: collapse; border-color: #cccccc;" >
<tr>
<td valign="top">
<a href="edit_blog.php?id=<?=$blog_set["id"]?>"><b>Edit</b></a>
<br>
<a href="delete_blog.php?id=<?=$blog_set["id"]?>" onclick="if( confirm('Are you sure you want to remove this blog?') ){return true;}else{ return false; }"><b>Delete</b></a>
</td>
<td >
<table bgcolor="ffffff" width="568">
<tr>
<td style="font-weight:bold;" width="263">Subject: <?=$blog_set["subject"]?>
</td>
<td width="292" style="font-weight:bold;" align="right">Last Updated: <?=$blog_set["last_updated"]?>
</td>
</tr>
</table >
<table bgcolor="ffffff" width="568" >
<tr>
<td  width="560" valign="top">
<?=$blog_set["body"]?>
</td>
</tr>
<tr>
<td  height="10">
</td>
</tr>
</table></table>
<?php
     }
?>


<!-- End -->
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
}
include("includes/bottom.php");
?>
