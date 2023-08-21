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

  $max_height=$HTTP_POST_VARS["max_height"];
  $max_width=$HTTP_POST_VARS["max_width"];

  $res=$profile->update_max_image_size($max_width,$max_height);

        if($res)
        {
        print "<tr bgColor='#ffffff'>";
        print "<td class='smalltext' vAlign='top'><p align='left'>The size has been changed.</p></td>";
        print "</tr>";
        }
        else
        {
        print "<tr bgColor='#ffffff'>";
        print "<td class='smalltext' vAlign='top'><p align='left'>There was an error!</p></td>";
        print "</tr>";
        }
}
print "</table></table>";
?>


</BODY>
</HTML>

