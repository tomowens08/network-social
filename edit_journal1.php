<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?
  print "<table width='100%'>";
  print "<tr>";

  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h4>My Journal (Edit an entry to your journal)</h4></td></tr>";

                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";
                        print "<table>";

        if($HTTP_POST_VARS["details"]==Null)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>You did not enter any journal to enter!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_to_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
        $journal_text=$HTTP_POST_VARS["details"];

        $sql="update journal";
        $sql.=" set journal_text = '$journal_text'";
        $sql.=" where journal_id = $HTTP_GET_VARS[journal_id]";

        $result=mysql_query($sql);

        if($result)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Your Journal Has Been Edited!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>There was an error!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        }



                        print "</table>";
                        print "</p></td></tr>";



  print "</table>";
  print "</td>";

  print "</tr></table>";

?>
<?php
include("includes/bottom.php");
}
?>
