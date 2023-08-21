<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>Delete Pictures</td></tr>";

  print "<tr><td class='textcell'>";


        $sql="delete from photos where photo_id = ".$HTTP_GET_VARS["photo_id"];
        $result=mysql_query($sql);
  print "Image has been deleted.";
}
print "</td></tr></table>";
?>
</BODY>
</HTML>
