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
?>

<!-- Blog Entry -->

<table width="100%">
<tbody>
<tr>
<td vAlign=top width="20%">
<!-- Start -->

<table bordercolor=000000 cellspacing=0 cellpadding=0 width='720' bgcolor=ffffff border=0>
<tr>
<td height="33">
<table width="720" border="0" cellspacing="0" cellpadding="20">
<tr>
<td><span class=blacktext12>Remove Subscription</span></td>
</tr>

<?php
     $sub_id=$HTTP_GET_VARS["id"];

         $res=$blog->delete_sub($sub_id);
         if($res==1)
         {
?>
<tr>
<td colspan='2' class='style9'>Your subscription has been removed successfully.</span></td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td colspan='2' class='style9'>There was an error and your subscription was not removed at this time. Please try again later.</span></td>
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
