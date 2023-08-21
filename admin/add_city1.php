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
  print "<td class='headcell' height='20'>Add a city</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
        include("includes/conn.php");
  if ($HTTP_POST_VARS["city_name"]=="")
  {
    print "<tr bgColor='#ffffff'>";
    print "<td class='smalltext' vAlign='top'><p align='left'>You did not enter name for City.</p></td>";
    print "</tr>";
  }
    else
  {

        $sql="insert into cities(state_id, city_name) values($HTTP_POST_VARS[state_name], '$HTTP_POST_VARS[city_name]')";
        $result=mysql_query($sql);
        if($result)
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='smalltext' vAlign='top'><p align='left'>The city has been added successfully.</p></td>";
                print "</tr>";
        }
        else
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='smalltext' vAlign='top'><p align='left'>There was an error!.</p></td>";
                print "</tr>";
        }
  }
}
print "</table></table>";
?>
</BODY>
</HTML>
