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

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>Add a Moderator for Music</td></tr>";
  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</p></td>";
  print "<td class='textcell' valign='top' width='60%'>Member Name</td>";
  print "</tr>";
  print "<form name='add_mod' action='add_music_moderators.php' method='post'>";
  include("includes/conn.php");
  include("../classes/moderators.class.php");

    $moderators=new moderators;
    $moderators->display_moderators_music();

  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='100%' colspan='4'>";
  print "<p align='center'>";
  print "<input type='submit' name='submit' value='Add Moderators'>";
  print "</p></td></tr>";

  print "</form>";

  print "</table></table>";
}

?>


</BODY>
</HTML>

