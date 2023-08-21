<?php
  session_start();
?>
<?php
  include("includes/conn.php");

  $email = trim(str_replace("'","",$HTTP_POST_VARS["email"]));
  $password = trim(str_replace("'","",$HTTP_POST_VARS["password"]));

        $sql="select email_verify, member_id, member_name, member_lname, member_email from members where member_email like '$email' and member_password like '$password' and enabled='1'";
				$result = mysql_query($sql);
				
				$num_rows = mysql_num_rows($result);
        $RSUser = mysql_fetch_array($result);

  if ($num_rows==0)
  {
        print ("<script language='JavaScript'> window.location='index.php?err=1'; </script>");
  }
  else
  {
  //if($RSUser["email_verify"]==0)
  //{
  //      print ("<script language='JavaScript'> window.location='login.php?err=2'; </script>");
  //}
  //else
  //{
        $posted_on=date("m/d/Y");

  $sql="update members set last_login = '$posted_on' where member_id = $RSUser[member_id]";
  $upd=mysql_query($sql);
  
	$sql = "INSERT INTO auth SET 
					date = '".time()."',
					ip = '".$_SERVER['REMOTE_ADDR']."',
					member_id = '".$RSUser["member_id"]."'";
	mysql_query($sql);
	
	    
  $_SESSION["logged_in"]="yes";
  $_SESSION["member_id"]=$RSUser["member_id"];
  $_SESSION["member_name"]=$RSUser["member_name"];
  $_SESSION["member_lname"]=$RSUser["member_lname"];
  $_SESSION["member_email"]=$RSUser["member_email"];
  $_SESSION["member_password"]=$password;
	if ($HTTP_POST_VARS['remember_me'])
		setcookie('member_email',$email,time()+3600*7);
	$sql = "UPDATE members SET online = '".time()."' WHERE member_id = '".$RSUser["member_id"]."'";
	@mysql_query($sql);
?>
<HTML>
<HEAD>
<title>Buddy Zone</title>
</HEAD>
<BODY>
<?
  print "<p align='center'>Your account has been validated.<br>You are being taken to the members area.<br><a href='logincomplete.php'>Click here</a> if you are not redirected.</p>";
//  print "<iframe src='login_phpbb.php?user_name=$email&password=$password' width='1' height='1'>";
  print ("<script language='JavaScript'> window.location='logincomplete.php'; </script>");
  //}
}
?>
</BODY>
</HTML>
