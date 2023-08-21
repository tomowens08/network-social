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
  print "<td class='headcell' height='20' width='100%'>Manage Video Channels</td></tr>";
  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='60%'>Channel Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "<td class='textcell' valign='top' width='20%'>&nbsp;</td>";
  print "</tr>";
  include("includes/conn.php");
  include("../classes/videos.class.php");

    $videos=new videos;
    $videos->display_admin_cat();

  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='100%' colspan='4'>";
  print "<p align='center'><a href='add_video_cat.php' target='main'>Add New Video Channel</a></p>";
  print "</td></tr>";

  print "</table></table>";
}

?>


</BODY>
</HTML>

