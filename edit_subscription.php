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
<td>
<span class=blacktext12>Edit Subscription</span>
</td>
</tr>

<?php
     $sub_id=$HTTP_GET_VARS["id"];
     $res=$blog->get_sub($sub_id);

     include_once("includes/people.class.php");
     $people=new people;
     $name=$people->get_name($res["sub_member_id"]);
     $num_images=$people->get_num_images($res["sub_member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($blog_info["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
?>
<tr>
<td>

<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="003399">
<tr>
<td>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr align="left" valign="middle">
<td class='style9' width="83%" bgcolor="A5D5F5" style="color:black; font-weight: bold; font-size: 10pt;">&nbsp;&nbsp;&nbsp;My Subscriptions </td>
</tr>
<tr align="left" valign="top" bgcolor="FFFFFF">
<td colspan="2" align="center" valign="middle" class="blacktext7">
<form action="edit_sub.php?id=<?=$HTTP_GET_VARS["id"]?>" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr align="center" valign="top" bgcolor="FFFFFF">
<td class='style9' colspan="2">Make your changes then click "Save".<br><br>
</td>
</tr>
<tr><td>
<a href="view_profile.php?member_id=<?=$res["sub_member_id"]?>" target="_blank">
<?=$image?>
</a></td><td></td></tr>
<tr>
<td valign="bottom" class="blacktext7"><strong>Name:</strong></td>
<td valign="middle">
<table cellpadding="0" cellspacing="0">
<tr><td align="center">
<a href="view_profile.php?member_id=<?=$res["sub_member_id"]?>" target="_blank">
<?=$name?>
</a><br>
</td></tr>
</table>
</td>
</tr>
<tr>
<td valign="middle" class="blacktext7"><strong>Subscribed:</strong></td>
<td class='style9' valign="middle">3/17/2005</td>
</tr>
<tr>
<td valign="middle" class="blacktext7"><strong>Email:</strong></td>
<td class='style9' valign="middle">
<?php
     if($res["notify"]=="1")
     {
?>
<input type="checkbox" name="notify" value="on" checked>&nbsp;Send e-mail notification for each new blog post
<?php
     }
     else
     {
?>
<input type="checkbox" name="notify" value="on">&nbsp;Send e-mail notification for each new blog post
<?php
     }
?>
</td>
</tr>
<tr><td colspan="2" align="right"><input type="submit" value="Save">&nbsp;<input type="button" value="Cancel" onclick="document.location.href = 'http://blog.myspace.com/index.cfm?fuseaction=blog.mysubscriptions'"></td></tr>
</form>
</table>
</td>
</tr>
</table>

</td>
</tr>

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
<!-- middle_content --><!-- Middle Text -->
<?php
     include("includes/bottom.php");
}
?>
