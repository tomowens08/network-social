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

        $result=mysql_query("select member_name, member_lname from members where member_id=$HTTP_GET_VARS[member_id]");
        $data_set=mysql_fetch_array($result);


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>$data_set[member_name]&nbsp;$data_set[member_lname]'s Journal</h3></td></tr>";




            $result=mysql_query("select * from journal where journal_of = $HTTP_GET_VARS[member_id]");
            $num_rows=mysql_num_rows($result);

        if($num_rows==0)
        {
                  print "<tr>";
                  print "<td width='100%' colspan='2' class='txt_label'><p align='center'>";
                  print "There are no journal entries entered by you yet!!!";
                  print "</p></td></tr>";

                  print "<tr>";
                  print "<td width='100%' colspan='2' class='txt_label'><p align='center'>";
                  print "<a href='add_journal.php' class='style11'>Add Journal</a>";
                  print "</p></td></tr>";
        }

        else
        {
                while($data_set=mysql_fetch_array($result))
                {
                        print "<tr>";
                        print "<td width='100%' colspan='2' class='txt_label'><p align='center'>";

                        // Journal Shown

                        print "<table>";
                        print "<tr><td><p align='left'><font face='Verdana' color='#000000' size='2'><b>$data_set[journal_date]</b></font></td></tr>";
                        print "<tr><td><p align='left'>$data_set[journal_text]</td></tr>";

                        print "<tr><td><p align='left'><font face='Verdana' color='#000000' size='2'><b>$data_set[journal_time]</font></b>";

                        $result1=mysql_query("select count(*) as a from journal_comment where journal_id = $data_set[journal_id]");
                        $data_set1=mysql_fetch_array($result1);
                        print mysql_error();

                        print "&nbsp;<a href='view_comments.php?journal_id=$data_set[journal_id]' class='style11'>$data_set1[a] Comments</a>";
                        print "&nbsp;<a href='add_comment.php?journal_id=$data_set[journal_id]' class='style11'>Add Comment</a>";

                        if($data_set["journal_of"]==$_SESSION["member_id"])
                        {
                                print "&nbsp;<a href='edit_journal.php?journal_id=$data_set[journal_id]' class='style11'>Edit</a>";
                                print "&nbsp;<a href='delete_journal.php?journal_id=$data_set[journal_id]' class='style11'>Delete</a>";
                        }


                        print "</td></tr>";


                        print "</table>";

                        // Journal Shown

                        print "</p></td></tr>";
                }

                        print "<tr>";
                        print "<td width='100%' colspan='2' class='txt_label'><p align='center'>";
                        print "<a href='my_journal.php' class='style11'>Your Journal</a>";
                        print "&nbsp;|&nbsp;<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]' class='style11'>Back to friend profile</a>";
                        print "</p></td></tr>";
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
