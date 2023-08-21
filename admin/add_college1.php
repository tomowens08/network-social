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
  print "<td class='headcell' height='20'>Add a college</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
  include("includes/conn.php");
  if ($HTTP_POST_VARS["city_name"]=="" || $HTTP_POST_VARS["school_name"]=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {

        $sql="insert into colleges(state_id, college_city, college_name, listed) values($HTTP_GET_VARS[state_id], $HTTP_POST_VARS[city_name], '$HTTP_POST_VARS[school_name]', '1')";
        $result=mysql_query($sql);
        if($result)
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='smalltext' vAlign='top'><p align='left'>The college has been added.</p></td>";
                print "</tr>";
        }
        else
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='smalltext' vAlign='top'><p align='left'>There was an error!</p></td>";
                print "</tr>";
        }
  }
}


print "</table></table>";
?>
</BODY>
</HTML>
