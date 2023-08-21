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
  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%'>";
?>
<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>
<tr class='txt_label'>
	<td><a href="view_all_journal.php">Journals</a></td>
</tr>
<tr class='txt_label'>
	<td><a href="my_journal.php">My Journals</a></td>
</tr>
<tr class='txt_label'>
	<td><a href="add_to_journal.php">Post a Journal</a></td>
</tr>
</table>
<?
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>My Journal (Add a journal)</h3></td></tr>";



                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";

                        // Journal Shown

                        print "<table>";
                        print "<form name='theForm' action='add_to_journal1.php' method='post'>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Journal Subject:</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><input type='text' name='subject' size='60' maxlength='255'></td></tr>";

                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Journal Text :</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'>";
?>
<textarea cols="70" rows="15" name="details"></textarea>
<?
                        print "</td></tr>";

                        print "<tr><td width='100%'><p align='left'><INPUT class=flat id=Submit onclick=document.theForm.details.value=idContent.document.body.innerHTML; type=submit value='Add Journal' name=Submit></td></tr>";


                        print "</table>";

                        // Journal Shown

                        print "</p></td></tr>";



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
