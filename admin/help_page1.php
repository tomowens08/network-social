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

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Change help</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
  include("includes/conn.php");

        $sql="update help set help_text = '$HTTP_POST_VARS[details]";
        $result=mysql_query($sql);
  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'><p align='left'>The help page has been edited successfully.</p></td>";
  print "</tr>";
}



print "</table></table>";
?>
</BODY>
</HTML>
