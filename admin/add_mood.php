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
  print "<td class='headcell' width='100%' height='20'>Add a new Mood</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='AddSpeciality' action='add_mood1.php' method='post' enctype='multipart/form-data'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Mood Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='cat_name' size='20'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Mood Image:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='file' name='mood_image' size='20'>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Add Mood'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
