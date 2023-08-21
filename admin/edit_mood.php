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
  print "<td class='headcell' width='100%' height='20'>Edit a Blog Mood</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  include("includes/conn.php");
  include("../includes/blog.class.php");

  $blog=new blog;
  $mood_info=$blog->get_mood($HTTP_GET_VARS["id"]);


  print "<form name='AddSpeciality' action='edit_mood1.php?id=$HTTP_GET_VARS[id]' method='post' enctype='multipart/form-data'>";



  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='text' name='cat_name' size='20' value='$mood_info[name]'>";
  print "</p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Current Image:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<img src='$site_location/$mood_info[image]'>";
  print "</p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>New Mood Image:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<input type='file' name='mood_image' size='20'>";
  print "</p></td>";
  print "</tr>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Edit a Mood'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
