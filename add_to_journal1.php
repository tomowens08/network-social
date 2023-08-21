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

?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='815'>";
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
                        print "<table>";

        if($HTTP_POST_VARS["details"]==Null)
        {
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b>You did not enter any journal to enter!!!</b></font></td></tr>";
                        print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='add_to_journal.php' class='style11'>Back</b></font></td></tr>";
        }
        else
        {
        $date_posted=time();
        $time_posted=date("G:i:s T");
        $journal_of=$_SESSION["member_id"];
        $journal_text=$HTTP_POST_VARS["details"];
        $subject = $HTTP_POST_VARS[subject]?$HTTP_POST_VARS[subject]:'No subject';
				
        $sql="insert into journal";
        $sql.="(journal_of";
        $sql.=", journal_date";
        $sql.=", journal_time";
        $sql.=", subject";
        $sql.=", journal_text)";
        $sql.=" values($journal_of";
        $sql.=", '$date_posted'";
        $sql.=", '$time_posted'";
        $sql.=", '$subject'";
        $sql.=", '$journal_text')";

        $result=mysql_query($sql);
        print mysql_error();
        
        if($result)
        {
            // send email notifications to all friends
               include("includes/profile.class.php");
               $profile=new profile;

               include("includes/people.class.php");
               $people=new people;
               
               include("classes/emails.class.php");
               $emails=new emails;

               $friend_res = $profile->get_friends($_SESSION["member_id"]);
							 
               foreach ($friend_res as $friend_set)
               {
 												include_once 'includes/people.class.php';
												$people = new people;
												$people->notification('journal',$friend_set,' ',$site_name,$site_url,$email_name,$site_email);
                   // get the email and name of friends
                      //$name=$people->get_name($friend_set);
                      //$email=$people->get_email($friend_set);

                      //$res=$emails->send_bulletin_notification($friend_set,$name,$email,$site_url,$site_name,$email_name,$site_email);
                   // get the email and name of friends
               }
            // send email notifications to all friends
                        print "<tr><td width='100%' class='txt_label'>";
                        print "<b>Your Journal Has Been Posted!!!</b>";
                        print "</td></tr>";
                        print "<tr><td width='100%' class='txt_label'>";
                        print "<b><a href='my_journal.php' class='style11'>Back</b>";
                        print "</td></tr>";
        }
        else
        {
                        print "<tr><td width='100%' class='txt_label'>";
                        print "<b>There was an error and the journal was not posted at this time, please try again later.</b>";
                        print "</td></tr>";
                        print "<tr><td width='100%' class='txt_label'>";
                        print "<b><a href='my_journal.php' class='style11'>Back</b>";
                        print "</td></tr>";
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
