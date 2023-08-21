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
  print "<td class='headcell' height='20'>Change Max Image size users can upload!</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
        include("includes/conn.php");
        include("../includes/profile.class.php");

        $profile=new profile;
        $height_set=$profile->get_max_image_size();

  print "<form name='AddSpeciality' action='image_size1.php' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Max Height(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='text' name='max_height' value='$height_set[max_height]'>";
  print "</p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Max Width(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='text' name='max_width' value='$height_set[max_width]'>";
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
