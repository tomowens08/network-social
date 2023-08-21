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


        $sql="select * from groups where id = ".$HTTP_GET_VARS["group_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Gallery of ".$RSUser["group_name"]."</h3></td></tr>";



  print "<tr><td colspan='2' class='txt_label'>";
  print "<table>";

  print "<tr><td colspan='4'>";
   print "<a href='view_group.php?group_id=$HTTP_GET_VARS[group_id]'>Back to group >>></a>";
  print "</td></tr>";

        $sql="select * from group_photos where group_id = ".$HTTP_GET_VARS["group_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

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
      print "<p align='center'>&nbsp;<a href='view_gphoto.php?group_id=$HTTP_GET_VARS[group_id]&photo_id=$RSUser1[photo_id]'><img src='".$RSUser1["photo_url"]."' width='100' height='100' border='0'></a></p>";
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
   print "<a href='view_group.php?group_id=$HTTP_GET_VARS[group_id]'>Back to group >>></a>";
  print "</td></tr>";



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
