<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{
  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>View Message</td></tr>";

  print "<tr width='100%'><td width='100%'><table width='100%'>";
        $sql="delete from admin_reply where message_id = ".$HTTP_GET_VARS["mess_id"];
        $result=mysql_query($sql);
  print "<tr><td>The message has been deleted.</td></tr>";
}
print "</table></table>";
?>
</BODY>
</HTML>
