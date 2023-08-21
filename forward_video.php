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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/video_side.php");
  print "</td>";
  include("classes/videos.class.php");
  $videos=new videos;



  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Forward a video to your friends</h3></td></tr>";


  print "<tr><td width='100%' colspan='2' class='login'>";

  print "<table width='100%'>";
  print "<form name='Forward' action='forward_video1.php?id=$HTTP_GET_VARS[id]' method='post'>";
  print "<tr><td width='20%' class='txt_label' valign='top'>E-Mail : </td>";
  print "<td width='80%' valign='top'><input type='text' name='email' size='30'></td>";
  print "</tr>";

  print "<tr><td width='20%' valign='top'>&nbsp;</td>";
  print "<td width='80%' valign='top'><input type='submit' name='submit' value='Send Video'></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' valign='top'>";
  print "<div align='center'>";
        print "<a href='view_video.php?id=$HTTP_GET_VARS[id]'>Back to Video</a>";
  print "</div>";
  print "</td>";
  print "</tr>";

  print "</table>";


  print "</td>";
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
