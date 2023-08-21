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
                        print "<form name='theForm' action='delete_journal1.php?journal_id=$HTTP_GET_VARS[journal_id]' method='post'>";

                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Journal Text :</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'>";
$sql = "SELECT * FROM journal WHERE journal_id = $HTTP_GET_VARS[journal_id]";
$journal = mysql_fetch_array(mysql_query($sql));
?>
<textarea cols="70" rows="15" name="details"><?=$journal['journal_text']?></textarea>
<?
                        print "</td></tr>";

                        print "<tr><td width='100%'><p align='left'><INPUT class=flat id=Submit onclick=document.theForm.details.value=idContent.document.body.innerHTML; type=submit value='Delete Journal' name=Submit></td></tr>";


                        print "</table>";

                        // Journal Shown

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
