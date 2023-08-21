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
  print "<table width='100%' align='center' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";


        $sql="select * from music_songs where id=".$HTTP_GET_VARS["id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'><span class='style18'>Write Constructive Critism For ".$RSUser["song_name"]."</span></b></p></td></tr>";

  if ($HTTP_POST_VARS["details"]=="")
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>You did not enter any text.</p></td></tr>";
  }
    else
  {
        $posted_on=strftime("%m/%d/%Y");

        $sql="insert into song_critisize";
        $sql.="(song_id";
        $sql.=", posted_by";
        $sql.=", comments";
        $sql.=", posted_on)";
        $sql.=" values($HTTP_GET_VARS[id]";
        $sql.=", $_SESSION[member_id]";
        $sql.=", '$HTTP_POST_VARS[details]'";
        $sql.=", '$posted_on')";

        $result=mysql_query($sql);

        if($result)
        {
          print "<tr>";
          print "<td width='100%' colspan='2' class='login'><p align='center'>";
          print "The Constructive Critisim has been added successfully.</p>";
          print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to Profile</a>";
          print "</td></tr>";
        }
        else
        {
          print "<tr>";
          print "<td width='100%' colspan='2' class='login'><p align='center'>There was an error!</p></td></tr>";
        }



  }

}




  print "</table>";
  print "</td>";
  print "</tr>";

//  print "</td></tr></table>";
?>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
