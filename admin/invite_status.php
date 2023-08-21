<?php
session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?
if ($_SESSION["user_admin"]!="Yes")
{

  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Change Invite Status of The Site</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
        include("includes/conn.php");
        include("../classes/invite.class.php");
        
        $invite=new invite;
        $status=$invite->get_status();

  print "<form name='AddSpeciality' action='invite_status1.php' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Status(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  if($status=="1")
  {
   print "<input type='checkbox' name='invite' value='on' checked>";
  }
  else
  {
   print "<input type='checkbox' name='invite' value='on'>";
  }
  print "</p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' valign='top'>";
  print "<p align='left'><font face='Verdana' color='#670808'>";
  if($status=="1")
  {
   print "Uncheck the Box and click submit to allow users to signup.";
  }
  else
  {
   print "Check the Box and click submit to allow users to signup.";
  }
  print "</font></p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Submit'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
