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
  print "<td class='headcell' height='20' width='100%'>Search Classified Ad by ID</td></tr>";
  include("includes/conn.php");

  print "<tr><td class='textcell'><table width='100%'>";



  print "<form name='search' action='search_class_id1.php' method='get'>";

        print "<tr bgColor='#ffffff'>";
        print "<td class='textcell' valign='top' width='30%'>Classified ID:</td>";
        print "<td class='textcell' valign='top' width='70%'>";
        print "<input type='text' name='class_id' size='30'>";
        print "</td>";
        print "</tr>";

        print "<tr bgColor='#ffffff'>";
        print "<td class='textcell' valign='top' width='100%' colspan='2'>";
        print "<div align='center'>";
        print "<input type='submit' name='submit' value='Search'>";
        print "</div>";
        print "</td>";
        print "</tr>";


  print "</form>";
  print "</table></table>";
}

?>
</BODY>
</HTML>

