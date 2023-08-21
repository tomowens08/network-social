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


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>My Journal (Add a journal)</h3></td></tr>";


                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";
                        print "<table>";

        if($HTTP_POST_VARS["details"]==Null)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>You did not enter any journal to enter!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
        $date_posted=date("D M j Y");
        $time_posted=date("G:i:s T");
        $journal_of=$_SESSION["member_id"];
        $journal_text=$HTTP_POST_VARS["details"];
        
        $sql="insert into journal";
        $sql.="(journal_of";
        $sql.=", journal_date";
        $sql.=", journal_time";
        $sql.=", journal_text)";
        $sql.=" values($journal_of";
        $sql.=", '$date_posted'";
        $sql.=", '$time_posted'";
        $sql.=", '$journal_text')";

        $result=mysql_query($sql);
        
        if($result)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Your Journal Has Been Posted!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>There was an error!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='my_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        }



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
