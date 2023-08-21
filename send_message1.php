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
  print "<h3>Send Message</h3></td></tr>";


        $sql="select * from members where member_id=".$HTTP_GET_VARS["member_id1"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
	if (!$HTTP_POST_VARS["subject"] && $HTTP_POST_VARS["message"]) $HTTP_POST_VARS["subject"] = 'No Subject';
 
  if ($HTTP_POST_VARS["subject"]=="" && $HTTP_POST_VARS["message"]=="")
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='txt_label'><p align='center'>You did not enter any text.</p></td></tr>";
  }
    else
  {
        $date_posted = time();
        
        $sql="insert into messages";
        $sql.="(mess_by";
        $sql.=", mess_to";
        $sql.=", mess_text";
        $sql.=", subject";
        $sql.=", deleted";
        $sql.=", date_posted";
        $sql.=", mess_read)";

        $sql.=" values($_SESSION[member_id]";
        $sql.=", $HTTP_GET_VARS[member_id1]";
        $sql.=", '$HTTP_POST_VARS[message]'";
        $sql.=", '$HTTP_POST_VARS[subject]'";
        $sql.=", 0";
        $sql.=", '$date_posted'";
        $sql.=", 0)";
        
				if (mysql_query($sql)) {
					include_once 'includes/people.class.php';
					$people = new people;
					$people->notification('message',$HTTP_GET_VARS[member_id1],' ',$site_name,$site_url,$email_name,$site_email);
				}
				
				
        
        $sql="insert into messages_sent";
        $sql.="(mess_by";
        $sql.=", mess_to";
        $sql.=", mess_text";
        $sql.=", subject";
        $sql.=", deleted";
        $sql.=", date_posted";
        $sql.=", mess_read)";

        $sql.=" values($_SESSION[member_id]";
        $sql.=", $HTTP_GET_VARS[member_id1]";
        $sql.=", '$HTTP_POST_VARS[message]'";
        $sql.=", '$HTTP_POST_VARS[subject]'";
        $sql.=", 0";
        $sql.=", '$date_posted'";
        $sql.=", 0)";
        $result=mysql_query($sql);
        
        $sql="select member_email from members where member_id = $HTTP_GET_VARS[member_id1]";
        $email_res=mysql_query($sql);
        $email_set=mysql_fetch_array($email_res);
        
       // include("classes/emails.class.php");
       // $emails=new emails;
       // $send=$emails->send_message_notification($HTTP_GET_VARS["member_id1"],$email_set["member_email"],$site_url,$site_name,$email_name,$site_email);


print "<tr>";
print "<td width='100%' colspan='2' class='txt_label'>";
print "<p align='center'>Your message has been sent.</p>";
print "<p align='center'><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id1]'>Back to Profile</a></p>";
print "</td></tr>";
}



  print "</table>";
  print "</td>";

//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
