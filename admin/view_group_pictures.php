<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

        $sql="select * from groups where id = ".$HTTP_GET_VARS["group_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>$RSUser[group_name]'s Pictures</td></tr>";

  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Image</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";

        $sql="select * from group_photos where group_id = ".$HTTP_GET_VARS["group_id"];
        $result=mysql_query($sql);

  $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'><img src='$site_location/$RSUser[photo_url]' width='100' height='100'></td>";
    print "<td class='textcell' valign='top' width='20%'><a href='delete_group_picture.php?photo_id=$RSUser[photo_id]'>Delete Pictures</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  }


  print "</table></table>";
}
?>
</BODY>
</HTML>
