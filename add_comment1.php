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
                        print "<table>";

        if($HTTP_POST_VARS["details"]==Null)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>You did not enter any comment to enter!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_comment.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
        $date_posted=date("D M j Y");
        $time_posted=date("G:i:s T");
        $journal_id=$HTTP_GET_VARS["journal_id"];
        $posted_by=$_SESSION["member_id"];
        $journal_text=$HTTP_POST_VARS["details"];

        $sql="insert into journal_comment";
        $sql.="(journal_id";
        $sql.=", journal_by";
        $sql.=", journal_date";
        $sql.=", journal_time";
        $sql.=", journal_text)";
        $sql.=" values($journal_id";
        $sql.=", $posted_by";
        $sql.=", '$date_posted'";
        $sql.=", '$time_posted'";
        $sql.=", '$journal_text')";

        $result=mysql_query($sql);

        if($result)
        {
                        $sql="select journal_of from journal where journal_id=$journal_id";
                        $result1=mysql_query($sql);
                        $data_set1=mysql_fetch_array($result1);
												
												include_once 'includes/people.class.php';
												$people = new people;
												$people->notification('comment',$HTTP_GET_VARS[member_id],array('journal_id'=>$journal_id));
												
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>Your Comment Has Been Posted!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_journal.php?member_id=$data_set1[journal_of]' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
                        $sql="select journal_of from journal where journal_id=$journal_id";
                        $result1=mysql_query($sql);
                        $data_set1=mysql_fetch_array($result1);
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>There was an error!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_journal.php?member_id=$data_set1[journal_of]' class='style11'>Back</b></font></td></tr>";
        }
        }



                        print "</table>";
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
