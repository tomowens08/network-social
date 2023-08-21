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
  print "<td class='headcell' height='20'>Change Default Friend Profile of The Site</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
        include("includes/conn.php");
        include("../includes/profile.class.php");

        $profile=new profile;
        $profile_id=$profile->get_default_friend();

  print "<form name='AddSpeciality' action='default_friend_profile1.php' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Friend Profile ID(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='text' name='profile_id' value='$profile_id'>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Change User ID'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
