<?php
  session_start();
?>
<HTML>
<HEAD>
<title>www.RuskiDom.com</title>
</HEAD>
<BODY>
<?php
  include("includes/conn.php");
  $email=str_replace("'","",$HTTP_POST_VARS["email"]);

  if($email==Null)
  {
        print ("<script language='JavaScript'> window.location='forgot_password.php?err=2'; </script>");
  }
  else
  {
        $sql="select member_email, member_name, member_lname, member_password from members where member_email like '".$email."'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
  if ($num_rows==0)
  {
        print ("<script language='JavaScript'> window.location='forgot_password.php?err=1'; </script>");
  }
  else
  {
        $to= "$RSUser[member_name] <$RSUser[member_email]>";
        $subject1= "Lost password for www.RuskiDom.com";
        $message= "<html><head><title>Lost Password for www.RuskiDom.com</title></head>";
        $message.="<body>";
        $message.="<p>Dear $member_name $member_lname,</p>";
        $message.="<p>You had requested your login information for <a href='http://www.RuskiDom.com' target='_blank'>www.RuskiDom.com</a>.</p>";
        $message.="<p>Here is your login information :</p>";
        $message.="<p>User Name : $RSUser[member_email]</p>";
        $message.="<p>Password : $RSUser[member_password]</p>";
        $message.="<p>Please keep them in a safe place!</p>";
        $message.="<p>Regards,</p>";
        $message.="<p>www.RuskiDom.com Team</p>";
        $message.="<p>Note :- You have received this email because you requested to retrieve your password at <a href='http://www.RuskiDom.com'>http://www.RuskiDom.com</a></p>";
        $message.="</body></html>";
        $headers  = "From:$email_name <$site_email>\r\n". "Content-Type: text/html; charset=ISO-8859-1\r\n". "Return-Path: <$from_email>\n";
        $result_mail=mail($to,$subject1,$message,$headers);
        
  print "<p align='center'>Your account has been validated.<br>You are being taken to the members area.<br><a href='logincomplete.php'>Click here</a> if you are not redirected.</p>";
  print ("<script language='JavaScript'> window.location='login.php?err=3'; </script>");
  }
  }
?>
</BODY>
</HTML>
