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

  $profile_id=$HTTP_POST_VARS["profile_id"];
  $res=$profile->update_default_friend($profile_id);

        if($res)
        {
        print "<tr bgColor='#ffffff'>";
        print "<td class='smalltext' vAlign='top'><p align='left'>The profile has been changed.</p></td>";
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

