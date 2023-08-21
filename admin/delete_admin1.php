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
  print "<td class='headcell' height='20'>Delete Admin User</td></tr>";
  print "<tr><td height='13' class='textcell'><table>";
  include("includes/conn.php");

        $sql="delete from admin_users where admin_id = ".$HTTP_GET_VARS["admin_id"];
        $result=mysql_query($sql);
        if($result)
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='text'>The admin user has been deleted.</td>";
                print "</tr></table></table>";
        }
        else
        {
                print "<tr bgColor='#ffffff'>";
                print "<td class='text'>There was an error!</td>";
                print "</tr></table></table>";
        }

} 
?>


</BODY>
</HTML>

