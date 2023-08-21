<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
$school_id=$HTTP_POST_VARS["school_id"];
$city_id1=$HTTP_POST_VARS["city_id1"];
$school_id=$HTTP_POST_VARS["school_id"];
$city_id=$HTTP_POST_VARS["city_id"];
$state_id=$HTTP_POST_VARS["state_id"];
$high_state=$HTTP_POST_VARS["high_state"];
$college_state=$HTTP_POST_VARS["college_state"];
$college_id=$HTTP_POST_VARS["college_id"];
$high_graduated=$HTTP_POST_VARS["high_graduated"];
$high_first=$HTTP_POST_VARS["high_first"];
$high_last=$HTTP_POST_VARS["high_last"];
$high_first_name=$HTTP_POST_VARS["high_first_name"];
$high_last_name=$HTTP_POST_VARS["high_last_name"];
$month=$HTTP_POST_VARS["month"];
$day=$HTTP_POST_VARS["day"];
$year=$HTTP_POST_VARS["year"];
$coll_graduated=$HTTP_POST_VARS["coll_graduated"];
$coll_first=$HTTP_POST_VARS["coll_first"];
$coll_last=$HTTP_POST_VARS["coll_last"];
$coll_first_name=$HTTP_POST_VARS["coll_first_name"];
$coll_last_name=$HTTP_POST_VARS["coll_last_name"];
$salutation=$HTTP_POST_VARS["salutation"];
$last_name=$HTTP_POST_VARS["last_name"];
$email=$HTTP_POST_VARS["email"];
$zip_code=$HTTP_POST_VARS["zip_code"];
$password=$HTTP_POST_VARS["password"];
$last_login=strftime("%m/%d/%Y");

        $sql="select member_id from members where member_email like '".$email."'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

  if ($num_rows==0)
  {
        $sql="insert into members";
        $sql.="(member_name";
        $sql.=", member_lname";
        $sql.=", member_email";
        $sql.=", member_password";
        $sql.=", email_verify";
        $sql.=", flag";
        $sql.=", last_login";
        $sql.=", enable";
        $sql.=", current_state";
        $sql.=", high_state";
        $sql.=", high_city";
        $sql.=", high_name";
        if($college_state!=Null)
        {
        $sql.=", college_state";
        }
        if($city_id1!=Null)
        {
        $sql.=", college_city";
        }
        if($college_id!=Null)
        {
        $sql.=", college_name";
        }
        $sql.=", high_year_graduated";
        $sql.=", high_first_attended";
        $sql.=", high_last_attended";
        $sql.=", first_name_high";
        $sql.=", last_name_high";
        $sql.=", birth_day";
        $sql.=", birth_month";
        $sql.=", birth_year";
        $sql.=", coll_year_graduated";
        $sql.=", coll_first_attended";
        $sql.=", coll_last_attended";
        $sql.=", first_name_coll";
        $sql.=", last_name_coll";
        $sql.=", salutation";
        $sql.=", zip_code";
        $sql.=")";

        $sql.=" values('$high_first_name'";
        $sql.=", '$last_name'";
        $sql.=", '$email'";
        $sql.=", '$password'";
        $sql.=", '0'";
        $sql.=", '0'";
        $sql.=", '$last_login'";
        $sql.=", 1";
        $sql.=", $state_id";
        $sql.=", $high_state";
        $sql.=", $city_id";
        $sql.=", $school_id";
        if($college_state!=Null)
        {
        $sql.=", $college_state";
        }
        if($city_id1!=Null)
        {
        $sql.=", $city_id1";
        }
        if($college_id!=Null)
        {
        $sql.=", $college_id";
        }
        $sql.=", '$high_graduated'";
        $sql.=", '$high_first'";
        $sql.=", '$high_last'";
        $sql.=", '$high_first_name'";
        $sql.=", '$high_last_name'";
        $sql.=", $day";
        $sql.=", '$month'";
        $sql.=", '$year'";
        $sql.=", '$coll_graduated'";
        $sql.=", '$coll_first'";
        $sql.=", '$coll_last'";
        $sql.=", '$coll_first_name'";
        $sql.=", '$coll_last_name'";
        $sql.=", '$salutation'";
        $sql.=", '$zip_code')";

        $result=mysql_query($sql);
        print mysql_error();
        $user_id=mysql_insert_id();
        $verify_code=1234*$user_id;


        // E-Mail Code
        $to= "$high_first_name <$email>";
        $subject1= "Welcome to schoolster.com";
        $message= "<html><head><title>Welcome to Schoolster.com</title></head>";
        $message.="<body>";
        $message.="<p>Dear $high_first_name $last_name,</p>";
        $message.="<p>Thank you for joining <a href='http://www.schoolster.com' target='_blank'>www.schoolster.com</a>.</p>";
        $message.="<p>With Schoolster you can do following :</p>";
        $message.="<ul>";
        $message.="<li>Connect with your friends from your high school.</li>";
        $message.="<li>Connect with your friends from your college.</li>";
        $message.="<li>Connect with your friends who are in your friend list.</li>";
        $message.="<li>Connect with your friends friends and so on.</li>";
        $message.="<li>Send messages to your friends.</li>";
        $message.="<li>Forward your friends a friends profile's.</li>";
        $message.="<li>Manage your address book.</li>";
        $message.="<li>Manage your message board.</li>";
        $message.="<li>And much more...</li>";
        $message.="</ul>";
        $message.="<hr><p>Your login information is as below :</p>";
        $message.="<p>User Name : $email</p>";
        $message.="<p>Password : $password</p>";
        $message.="<hr><p>Please click below to verify your email :</p>";
        $message.="<p><a href='http://www.schoolster.com/email_verify.php?code=$verify_code'>http://www.schoolster.com/email_verify.php?code=$verify_code</a></p>";
        $message.="<p>Regards,</p>";
        $message.="<p>Schoolster.com Team</p>";
        $message.="<p>Note :- You have received this email because you signed up with our website <a href='http://www.schoolster.com'>http://www.schoolster.com</a></p>";
        $message.="</body></html>";

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $email_name <$site_email>";
        $result_mail=mail($to,$subject1,$message,$headers);

        $sql="insert into invitations";
        $sql.="(member_id";
        $sql.=", friend_id";
        $sql.=", approve";
        $sql.=", deleted)";
        $sql.=" values($user_id";
        $sql.=", $HTTP_POST_VARS[member_id]";
        $sql.=", 0";
        $sql.=", 0)";

        $result=mysql_query($sql);

        // E-Mail Code
?>
<TABLE cellSpacing=0 cellPadding=0 width=536 border=0>
<TBODY>
<TR>
<TD class=style1 width=375 valign='top'>
<BLOCKQUOTE>
<SPAN class=style1>
Your account has been created.<br> An email has been sent to your email address.<br>Please verify the email address.
</TBODY></TABLE></DIV></TD></TR>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
<?
}
  else
{
?>
<TABLE cellSpacing=0 cellPadding=0 width=536 border=0>
<TBODY>
<TR>
<TD class=style1 width=375 valign='top'>
<BLOCKQUOTE>
<SPAN class=style1>
The E-Mail address you have chosen already exists.<br> Please choose another one by going back.
</TBODY></TABLE>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
