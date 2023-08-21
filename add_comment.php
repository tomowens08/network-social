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
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>My Journal (Add a comment to journal)</h3></td></tr>";


    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>";

    // Journal Shown

    print "<table>";
    print "<form name='theForm' action='add_comment1.php?journal_id=$HTTP_GET_VARS[journal_id]' method='post'>";
    print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Comment Text :</b></font></td></tr>";
    print "<tr><td width='100%'><p align='left'>";
    include("includes/script.php");
    include("includes/editor.php");
    print "</td></tr>";
    print "<tr><td width='100%'><p align='left'><INPUT class=flat id=Submit onclick=document.theForm.details.value=idContent.document.body.innerHTML; type=submit value='Add Comment' name=Submit></td></tr>";
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
