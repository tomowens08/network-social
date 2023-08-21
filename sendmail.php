<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
else
{
include("includes/conn.php");
include("includes/top.php");
include("includes/nav.php");
//include("includes/right.php");
?>
<html>
<head>
<title>Send Mail Test</title>
<style><!--
BODY {font: normal 11px Arial, Verdana, Tahoma;}
.pd {margin-top: 15px; padding: 5px; background-color: #f4f4f4;}
--></style>
</head>
<body>
<?php
/*
This sample send mail script is provided by Xceog.Net for free.
Please contact us for more information.
-------------------------------------------------------------------------
*/
        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    $member_name=$RSUser2["member_name"];
	
	    $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

function sendmail($to,$subject,$message,$site_email){
//set sender's email here

$headers = "From: $email_name\r\nMIME-Version: 1.0\r\nContent-Type: text/HTML; charset=utf-8\r\nReply-To: $site_email\r\nX-Priority: 1\r\nX-MSmail-Priority: High\r\nX-Mailer: PHP/".phpversion();

if (mail($to, $subject, $message, $headers, "-f".$site_email)){return true;}else{return false;}
}

//== Set subject and message
$subject="$member_name has invited you to join $site_name"; //put your subject in PHP Alphanumeric Format e.g. "Hello. This is a test..."
$msgfile="test.php"; //enter the filename which points to your mail content file in html format e.g. "mailmessage.html"

//========================== do not edit beyond this line
ob_start(); require($msgfile); $message=ob_get_contents(); ob_end_clean();
//== End retrieval

$email = @$_POST['email'];
$from = $member_name;
//$from = "noreply@yourdomain.com"; //uncomment to use your domain email instead of user's email to send mails

if(!$email){$email = array();}

foreach ($email as $emailaddress) {
	if(@sendmail($emailaddress,$subject,$message,$site_email)){
	  echo htmlspecialchars($emailaddress,ENT_QUOTES)."&ndash; <b>Mail Sent Successfully</b><br/>";
	}else{
	  echo htmlspecialchars($emailaddress,ENT_QUOTES)."&ndash; <b>Send Mail Failed</b><br/>";
	}
}

print "<div class=\"pd\"><b>Total of ".count($email)." selected email addresses retrieved</b></div>";
print "<tr><td width='100%'><p align='left'><font face='Verdana' color='#000000' size='2'><b><a href='invite.php' class='style11'>Back to Invite section</b></font></td></tr>";
print "<br>";
print "<br>";
?>
</body>
</html>
<?php
include("includes/bottom.php");
}
?>