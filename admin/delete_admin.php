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

        $sql="select * from admin_users where admin_id = ".$HTTP_GET_VARS["admin_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<form name='ChangePassword' action='delete_admin1.php?admin_id=".$HTTP_GET_VARS["admin_id"]."' method='post'>";

  print "<tr bgColor='#ffffff'>";
  print "<td class='text'><p align='left'>User Name:</p></td>";
  print "<td class='text'>".$RSUser["admin_user"]."</td>";
  print "</tr>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Click to delete'></td>";
  print "</tr></table></table>";
  print "</form>";
} 

?>
</BODY>
</HTML>

