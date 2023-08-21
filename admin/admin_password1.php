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
  print "<td class='headcell' height='20'>Change Admin Password</td></tr>";
  print "<tr><td height='13' class='textcell'><table>";
  include("includes/conn.php");
        $sql="select * from admin_users where admin_id = ".$HTTP_GET_VARS["admin_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  if ($HTTP_POST_VARS["old_password"]!=$RSUser["admin_password"])
  {
    print "<tr bgColor='#ffffff'>";
    print "<td class='text'>The old password does not match.</td>";
    print "</tr></table></table>";
  }
    else
  {
        $sql="update admin_users set admin_password = '$HTTP_POST_VARS[new_password]' where admin_id=$HTTP_GET_VARS[admin_id]";
        $result=mysql_query($sql);
                if($result)
                {
                          print "<tr bgColor='#ffffff'>";
                          print "<td class='text'>The password has been changed.</td>";
                          print "</tr></table></table>";
                }
                else
                {
                print mysql_error();
                          print "<tr bgColor='#ffffff'>";
                          print "<td class='text'>There was an error!</td>";
                          print "</tr></table></table>";
                }
                

  }
} 

?>


</BODY>
</HTML>

