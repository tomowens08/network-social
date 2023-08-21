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

<?
  print "<table width='100%'>";
  print "<tr>";

  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h4>My Journal (Delete an entry to your journal)</h4></td></tr>";


                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";

                        // Journal Shown
                        print "<table>";


        $sql="delete from journal";
        $sql.=" where journal_id = $HTTP_GET_VARS[journal_id]";
        $result=mysql_query($sql);
        
        $sql="delete from journal_comment";
        $sql.=" where journal_id = $HTTP_GET_VARS[journal_id]";
        $result=mysql_query($sql);

        if($result)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Your Journal Has Been Deleted!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>There was an error!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }



                        print "</table>";
                        print "</p></td></tr>";



  print "</table>";
  print "</td></tr></table>";


?>

</td>
</tr>


</table>

<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
