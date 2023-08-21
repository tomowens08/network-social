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

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' width='100%' height='20'>Add a new package</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='AddSpeciality' action='add_package1.php' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Package Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='package_name' size='20'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Package Price(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='package_price' size='20'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%' valign='top'><p align='left'><font face='Verdana' color='#670808'>Allowed Mods:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='checkbox' name='mods[]' value='Search'>&nbsp;Search<br>";
  print "<input type='checkbox' name='mods[]' value='Mails'>&nbsp;Private Messaging<br>";
  print "<input type='checkbox' name='mods[]' value='Browse'>&nbsp;Browse Users<br>";
  print "<input type='checkbox' name='mods[]' value='Bulletin'>&nbsp;Bulletin Boards<br>";
  print "<input type='checkbox' name='mods[]' value='Journal'>&nbsp;Journal<br>";
  print "<input type='checkbox' name='mods[]' value='Address Book'>&nbsp;Address Book<br>";
  print "<input type='checkbox' name='mods[]' value='Blogs'>&nbsp;Blogs<br>";
  print "<input type='checkbox' name='mods[]' value='Classified'>&nbsp;Classifieds<br>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Add Package'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
