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
  print "<td class='headcell' height='20' width='100%'>Manage Admin Users</td></tr>";
  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='60%'>User Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "<td class='textcell' valign='top' width='20%'>&nbsp;</td>";
  print "</tr>";
  include("includes/conn.php");

        $sql="select * from admin_users order by admin_id";
        $result=mysql_query($sql);
        $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='60%'>".$RSUser["admin_user"]."</td>";
    print "<td class='textcell' valign='top' width='10%'><a href='admin_password.php?admin_id=".$RSUser["admin_id"]."'>Edit</a></td>";
    if ($RSUser["admin_id"]!=1)
    {

      print "<td class='textcell' valign='top' width='10%'><a href='delete_admin.php?admin_id=".$RSUser["admin_id"]."'>Delete</a></td>";
    }
      else
    {

      print "<td class='textcell' valign='top' width='20%'>Main User</td>";
    } 

    print "</tr>";
    $sr_no=$sr_no+1;
  } 

  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='100%' colspan='4'><p align='center'><a href='add_admin.php' target='main'>Add New Admin User</a></p></td></tr>";

  print "</table></table>";
} 

?>


</BODY>
</HTML>

