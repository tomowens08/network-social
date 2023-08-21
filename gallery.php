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
include("includes/people.class.php");

$people = new people;
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?
if ($HTTP_GET_VARS["member_id"]) {

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";


        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Gallery of ".$people->get_name($HTTP_GET_VARS["member_id"])."</h3></td></tr>";

        

  print "<tr><td colspan='2' class='txt_label'>";
  print "<table cellpadding='4' cellspacing='0'>";
  
  print "<tr><td colspan='4'>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";

        $sql="select * from photos where member_id = ".$HTTP_GET_VARS["member_id"]." ORDER BY photo_id";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

            include("classes/photo.comments.class.php");
            $photo_comments=new photo_comments;

  if ($num_rows!=0)
  {
    $a=0;
    while($RSUser1=mysql_fetch_array($result1))
    {

      if ($a%4==0)
      {

        print "</tr>";
        print "<tr>";
      } 

      print "<td width='25%'class='txt_label'>";
      print "<div align='center'>";
      print "<a href='view_photo.php?member_id=$HTTP_GET_VARS[member_id]&photo_id=$RSUser1[photo_id]'>";

        $pic_name=str_replace('user_images/', '', $RSUser1["photo_url"]);
        print "<img src='image_gd/image.php?$pic_name' border='0'>";
      print "</a>";
      print "<br>";
      print "<a href='rate_photo.php?member_id=$HTTP_GET_VARS[member_id]&photo_id=$RSUser1[photo_id]'>Add a Comment</a>";
            $num_comments = $photo_comments->get_num_comments($RSUser1["photo_id"],$HTTP_GET_VARS["member_id"]);
      print "<br>";
      print "$num_comments Comment(s)";
      print "</div>";
      print "</td>";
      $a=$a+1;
    }
  }
    else
  {

    print "<tr>";
    print "<td width='100%' class='txt_label'>";
    print "<p align='center'>There are no images yet.</p>";
    print "</td></tr>";
  } 
  
  print "<tr><td colspan='4'>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";


}
  print "</table>";
  print "</td>";
  print "</tr>";
  print "</table>";
  print "</td>";
  print "</table>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
