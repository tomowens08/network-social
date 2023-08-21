<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
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

  print "<table width='830'>";
  print "<tr>";

  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";
  print "<td width='80%' valign='top'>";

  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'><b>Journal Comments</b></td></tr>";


            $result=mysql_query("select * from journal_comment where journal_id = $HTTP_GET_VARS[journal_id]");
            print mysql_error();
            $num_rows=mysql_num_rows($result);

        if($num_rows==0)
        {
                  print "<tr>";
                  print "<td width='100%' colspan='2' class='login'><p align='center'>";
                  print "There are no comments entered yet!!!";
                  print "</p></td></tr>";

                  print "<tr>";
                  print "<td width='100%' colspan='2' class='login'><p align='center'>";
                  print "<a href='add_comment.php?journal_id=$HTTP_GET_VARS[journal_id]' class='style11'>Add Comment</a>";
                  print "</p></td></tr>";
        }

        else
        {
                while($data_set=mysql_fetch_array($result))
                {
                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";

                        // Journal Shown

                        print "<table>";
                        print "<tr><td><p align='left'><font face='Verdana' color='#000000' size='2'><b>$data_set[journal_date]</b></font></td></tr>";

                        $result3=mysql_query("select member_name, member_lname from members where member_id=$data_set[journal_by]");
                        $data_set3=mysql_fetch_array($result3);
                        
                        print "<tr><td><p align='left'><font face='Verdana' color='#000000' size='2'><b>Posted By :$data_set3[member_name]&nbsp;$data_set3[member_lname]</b></font></td></tr>";
                        print "<tr><td><p align='left'>$data_set[journal_text]</td></tr>";

                        print "<tr><td><p align='left'><font face='Verdana' color='#000000' size='2'><b>$data_set[journal_time]</font></b>";

                        $result1=mysql_query("select count(*) as a from journal_comment where journal_id = $data_set[journal_id]");
                        $data_set1=mysql_fetch_array($result1);
                        print mysql_error();

                        print "&nbsp;<a href='add_comment.php?journal_id=$data_set[journal_id]' class='style11'>Add Comment</a>";
                        
                        $result3=mysql_query("select journal_of from journal where journal_id=$data_set[journal_id]");
                        $data_set3=mysql_fetch_array($result3);

                        if($data_set3["journal_of"]==$_SESSION["member_id"])
                        {
                                print "&nbsp;<a href='delete_comment.php?comment_id=$data_set[comment_id]' class='style11'>Delete Comment</a>";
                        }


                        print "</td></tr>";


                        print "</table>";

                        // Journal Shown

                        print "</p></td></tr>";
                }

                        print "<tr>";
                        print "<td width='100%' colspan='2' class='login'><p align='center'>";
                        print "<a href='add_to_journal.php' class='style11'>Add Journal</a>";
                        print "</p></td></tr>";
        }


  print "</table>";
  print "</td>";
  print "</tr></table>";

?>

</td>
</tr>


<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
