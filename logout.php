<?php
  @session_start();
?>
<HTML>
<HEAD>
<title></title>
</HEAD>
<BODY>
<P>
<? 
	include './includes/conn.php';
	$sql = "UPDATE members SET online = '0' WHERE member_id = '".$_SESSION['member_id']."'";
	@mysql_query($sql);
  $_SESSION["logged_in"] ="no";
  $_SESSION["member_id"] = '';
  $_SESSION["member_name"] = '';
  $_SESSION["member_lname"] = '';
  $_SESSION["member_email"] = '';
  $_SESSION["member_password"] = '';
  print ("<script language='JavaScript'> window.location='index.php'; </script>");
?>
</P>
</BODY>
</HTML>
