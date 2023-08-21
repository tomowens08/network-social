<?php
  session_start();
?>
<?php
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
  print "<table width='80%' align='center' class='dark_b_border2' style='border-collapse: collapse'>";

  $sql="select * from members where member_id=".$HTTP_GET_VARS["member_id"];
  $result=mysql_query($sql);
  $RSUser=mysql_fetch_array($result);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'>Add a testimonial for ".$RSUser["member_name"]."</span></b></p></td></tr>";
  print "<form name='AddTestimonial' action='add_testimonial1.php?member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";

  include("includes/profile.class.php");
  $profile=new profile;
  $comment_setting=$profile->check_comment_status($HTTP_GET_VARS["member_id"]);
  if($comment_setting==1)
  {
   print "<tr>";
   print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Testimonial</td><td width='60%' class='login'>";
   print "<textarea name='testimonial' rows='5' cols='30'></textarea>";
   print "</td></tr>";

   print "<tr>";
   print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Add Testimonial'></p></td></tr>";
   print "</form>";
  }
  else
  {
      // check if user is a friend
      $check_friend=$profile->check_comment_friend($HTTP_GET_VARS["member_id"],$_SESSION["member_id"]);
      if($check_friend==1)
      {
       print "<tr>";
       print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Testimonial</td><td width='60%' class='login'>";
       print "<textarea name='testimonial' rows='5' cols='30'></textarea>";
       print "</td></tr>";

       print "<tr>";
       print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Add Testimonial'></p></td></tr>";
       print "</form>";
      }
      else
      {
       print "<tr>";
       print "<td width='100%' colspan='2' class='txt_label'>";
       print "<p align='center'>This member accepts comments from friends only!</p>";
       print "</td></tr>";
      }
  }
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>Your testimonial is subject to ".$RSUser["member_name"]."'s approval.</p></td></tr>";

  print "</td></tr></table>";

  print "</table>";
  print "</td>";
  print "</tr>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
