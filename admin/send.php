<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Send message</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='AddSpeciality' action='send_message1.php?member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Subject(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='subject' size='20'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%' valign='top'><p align='left'><font face='Verdana' color='#670808'>Message(*):</font></p></td>";
  print "<td width='70%'><p align='left'><textarea name='message' rows='5' cols='20'></textarea></p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Send Message'></td>";
  print "</tr></table></table>";
  print "</form>";
} 

?>


</BODY>
</HTML>
