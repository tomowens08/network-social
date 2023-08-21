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

<p align='center'>
<?

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>View Photo</h3></td></tr>";


  print "<tr><td colspan='2' class='login'>";
  print "<table>";

  print "<tr><td>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";

  print "<tr><td>";
   print "<a href='gallery.php?member_id=$HTTP_GET_VARS[member_id]'>Back to gallery >>></a>";
  print "</td></tr>";


        $sql="select * from photos where photo_id = ".$HTTP_GET_VARS["photo_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "<tr>";
  print "<td width='100%'class='login'>";
  print "<p align='center'>";
  $pic_name=str_replace('user_images/', '', $RSUser1["photo_url"]);
        print "<img src='image_gd/image2.php?$pic_name' border='0'><br>";
  print "</td>";
  print "</tr>";
  print "<tr>";
  print "<td width='100%'class='login'>";
  print "<div align='center'>";
?>
<form name='post_comment' action='post_photo_rating.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&photo_id=<?=$HTTP_GET_VARS["photo_id"]?>' method='post'>
<table cellspacing="1" cellpadding="5" align="center" bgcolor="#639ace" border="0">
<tr bgcolor="#eff3ff">
<td colspan="2" align="left" class='txt_label'>Post A Comment</td>
</tr>


<tr class="text11" bgcolor="ffffff">
<td valign="center" class='txt_label'>Body:&nbsp;&nbsp;</td>
<td><textarea name="body" cols="40" rows="5"></textarea></td>
</tr>

<tr>
<td colspan="2" align="center" bgcolor="ffffff"><input type="image" src="images/postImageComment.gif"></td>
</tr>
</table>

<?php
  print "</div>";
  print "</td></tr>";
  print "</table>";
  print "</td></tr>";
  print "</table>";
  print "</td>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
