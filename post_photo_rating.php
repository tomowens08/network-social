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


  print "<tr><td colspan='2' class='txt_label'>";
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
  print "<td width='100%' class='txt_label'>";
  print "<p align='center'>";
  $pic_name=str_replace('user_images/', '', $RSUser1["photo_url"]);
        print "<img src='image_gd/image2.php?$pic_name' border='0'><br>";
  print "</td>";
  print "</tr>";
  print "<tr>";
  print "<td width='100%' class='txt_label'>";
  print "<div align='center'>";
?>
<table cellspacing="1" cellpadding="5" align="center" bgcolor="#639ace" border="0">
<tr bgcolor="#eff3ff">
<td colspan="2" class='txt_label' align="left">Post A Comment</td>
</tr>
<?php
     $rating=$HTTP_POST_VARS["rating"];
     $body=$HTTP_POST_VARS["body"];
     if($body==Null)
     {
?>
<tr>
<td colspan="2" align="center" class='txt_label' bgcolor="ffffff">You did not enter any comment!</td>
</tr>
<?php
     }
     else
     {
         if($HTTP_GET_VARS["member_id"]==$_SESSION["member_id"])
         {
?>
<tr>
<td colspan="2" class='txt_label' align="center" bgcolor="ffffff">You cannot rate/comment on your own photograph!</td>
</tr>
<?php
         }
         else
         {
          include("classes/photo.comments.class.php");
          $photo_comments=new photo_comments;
          $res = $photo_comments->add_rating($HTTP_GET_VARS["photo_id"], $HTTP_GET_VARS["member_id"], '',$body,$_SESSION["member_id"]);
					if ($res) {
						include_once 'includes/people.class.php';
						$people = new people;
						$people->notification('comment',$HTTP_GET_VARS[member_id],' ',$site_name,$site_url,$email_name,$site_email,array('photo_id'=>$HTTP_GET_VARS["photo_id"]));
					}
?>
<tr>
<td colspan="2" class='txt_label' align="center" bgcolor="ffffff">Your rating/comment has been added!</td>
</tr>
<?php
         }
     }
?>
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
