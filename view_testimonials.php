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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>$RSUser1[member_name]'s Testimonials</h3></td></tr>";




        $sql="select * from testimonials where member_id = ".$HTTP_GET_VARS["member_id"]." and approved = '1'";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>There are no testimonials for this member yet.</p></td></tr>";
  }
    else
  {
    $sr_no=1;
    while($RSUser1=mysql_fetch_array($result1))
    {
      print "<tr><td width='100%' colspan='2' class='login'>";
      print "<table width='100%'>";
      print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser1["test_user"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);

      if ($num_rows==0)
      {
        print "<img src='images/nophoto.jpg' width='50' height='50'>";
      } 
      else
      {
        print "<img src='$RSUser[photo_url]' width='50' height='50'>";
      }

      print "</td>";


        $sql="select * from members where member_id = ".$RSUser1["test_user"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
        
      print "<td width='60%' valign='top'>";

      print "<table width='100%'>";
      print "<tr><td width='100%' class='login'><a href='view_profile.php?member_id=".$RSUser["member_id"]."'>".$RSUser["member_name"].", ".$RSUser1["date_posted"]."</a>:</td></tr>";
      print "<tr><td width='100%' class='login'>".$RSUser1["test_text"]."</td></tr>";
      print "</table>";
      print "</td>";



      print "</table>";
      print "</td></tr>";
    }

  } 

    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back</a></p></td></tr>";

    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
