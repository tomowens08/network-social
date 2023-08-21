<?php
session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?
if($_SESSION["session_admin"] != "Yes")
{
print "You need to login before you can view this page";
}
else
{
print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
print "<td class='headcell' height='20' width='100%'>New Users with Subscription Not Processed</td></tr>";

print "<tr><td class='textcell'><table width='100%'>";



print "<tr bgColor='#ffffff'>";
print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
print "<td class='textcell' valign='top' width='60%'>Member Name(E-Mail)</td>";
print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
print "<td class='textcell' valign='top' width='20%'>&nbsp;</td>";
print "</tr>";
include("includes/inc.php");
include("../classes/users.class.php");

$users=new users;
$users->display_admin_not_processed();

print "</table></table>";
}
?>


</BODY>
</HTML>
