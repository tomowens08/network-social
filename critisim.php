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


        $sql="select * from music_songs where id=".$HTTP_GET_VARS["id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'><span class='style18'>Write Constructive Critism For ".$RSUser["song_name"]."</span></b></p></td></tr>";

  print "<form name='theForm' action='critisim1.php?&member_id=$HTTP_GET_VARS[member_id]&id=$HTTP_GET_VARS[id]' method='post'>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login' bgcolor='#E3E4E9' valign='top'>";
  print "Comments:";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login' bgcolor='#E3E4E9' valign='top'>";
  include("includes/script.php");
  include("includes/editor.php");
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";
  print "<input type='submit' name='submit' onclick=document.theForm.details.value=idContent.document.body.innerHTML; value='Add Comments'></p>";
  print "</td></tr>";
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
include("includes/bottom.php");
}
?>
