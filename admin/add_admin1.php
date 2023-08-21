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
  print "<td class='headcell' height='20'>Add new admin user</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
include("includes/conn.php");
  if ($HTTP_POST_VARS["user_name"]=="" || $HTTP_POST_VARS["password"]=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {

    $sql="select * from admin_users where admin_user like '".$HTTP_POST_VARS["user_name"]."'";
    $result=mysql_query($sql);
    $num_rows=mysql_num_rows($result);
    if ($num_rows!=0)
    {
      print "The user name that you have selected already exists. Please select a new one.";
    }
      else
    {
        $sql="insert into admin_users(admin_user, admin_password) values('$HTTP_POST_VARS[user_name]', '$HTTP_POST_VARS[password]')";
        $result=mysql_query($sql);
        if($result)
        {
        print "<tr bgColor='#ffffff'>";
        print "<td class='smalltext' vAlign='top'><p align='left'>The admin user has been added.</p></td>";
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
}
print "</table></table>";
?>


</BODY>
</HTML>

