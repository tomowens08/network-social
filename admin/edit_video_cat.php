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
  print "<td class='headcell' width='100%' height='20'>Edit a Video Channel</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  include("includes/conn.php");
  include("../classes/videos.class.php");

  $videos=new videos;
  $videos_info=$videos->get_cat($HTTP_GET_VARS["id"]);


  print "<form name='AddSpeciality' action='edit_video_cat1.php?id=$HTTP_GET_VARS[id]' method='post'>";



  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='cat_name' size='20' value='$videos_info[cat_name]'></p></td>";
  print "</tr>";


  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Description:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<textarea name='cat_desc' rows='4' cols='40'>$videos_info[cat_desc]</textarea>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Edit a Video Channel'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
