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
  print "<td class='headcell' height='20' width='100%'>Manage Cities</td></tr>";

  print "<tr><td class='textcell'><table width='100%'>";

  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>State Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";
  include("includes/conn.php");

        $sql="select * from states";
        $result=mysql_query($sql);
  $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'><a href='manage_city1.php?state_id=".$RSUser["state_id"]."'>".$RSUser["state_name"]."</a></td>";
    print "<td class='textcell' valign='top' width='20%'><a href='manage_city1.php?state_id=".$RSUser["state_id"]."'>View Cities</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  } 


  print "</table></table>";
} 

?>


</BODY>
</HTML>

