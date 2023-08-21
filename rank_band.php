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
  print "<table width='80%' align='center' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";

        $sql="select * from members where member_id=".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'><span class='style18'>Ranking for ".$RSUser["member_name"]."</span></b></p></td></tr>";
  print "<form name='AddTestimonial' action='rank_band1.php?member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";

  print "<tr>";
  print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Rating:</td><td width='60%' class='login'>";
  print "<select name='rating' size='1'>";
  for($aa=1;$aa!=11;$aa++)
  {
      print "<option value='$aa'>$aa</option>";
  }
  print "</select>";
  print "</td></tr>";

  print "<tr>";
  print "<td width='40%' class='login' bgcolor='#E3E4E9' valign='top'>Review:</td><td width='60%' class='login'>";
  print "<textarea name='testimonial' rows='5' cols='30'></textarea>";
  print "</td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Add Testimonial'></p></td></tr>";
  print "</form>";

  print "</td></tr></table>";

  print "</table>";
  print "</td>";
  print "</tr>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom3.php");
}
?>
