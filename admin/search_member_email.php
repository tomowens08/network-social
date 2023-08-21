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
  print "<td class='headcell' height='20' width='100%'>Search Members by Member Email</td></tr>";
  include("includes/conn.php");

  print "<tr><td class='textcell'><table width='100%'>";



  print "<form name='search' action='search_member_email1.php' method='get'>";

        print "<tr bgColor='#ffffff'>";
        print "<td class='textcell' valign='top' width='30%'>Member Email:</td>";
        print "<td class='textcell' valign='top' width='70%'>";
        print "<input type='text' name='member_email' size='30'>";
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

