<?php
  session_start();
?>
<HTML>
<HEAD>
<title>Site Administrator Section</title>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table border='0'><tr><td width='100%'>Welcome to Admin Panel</td></tr>";
  print "<tr><td>You have full access to the system</td></tr>";
  print "<tr><td>The time now is ".strftime("%H:%M:%S %p")."</td></tr>";
  print "<tr><td>The date today is ".strftime("%m/%d/%Y")."</td></tr>";
  print "<tr><td>Your I.P. Address is ".${"remote_host"}."</td></tr>";
  print "</table>";
} 


?>

</BODY>
</HTML>

