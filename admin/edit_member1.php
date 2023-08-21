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
  print "<td class='headcell' height='20' width='100%'>Manage Members</td></tr>";

  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Profile Type</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";

  include("includes/conn.php");

        $sql="select * from profile_flag";
        $result=mysql_query($sql);
        $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

        $sql="select * from members where member_id = ".$RSUser["member_by"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'><a href='../view_profile.php?member_id=$RSUser1[member_id]'>$RSUser1[member_name]</a> (E-Mail :) $RSUser1[member_email]<br> Flag By : <a href='../view_profile.php?member_id=$RSUser2[member_id]'>$RSUser2[member_name]</a> (E-Mail :) $RSUser2[member_email] </td>";
    print "<td class='textcell' valign='top' width='20%'><a href='edit_member1.php?member_id=$RSUser1[member_id]'>Edit Profile</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  }


  print "</table></table>";
}

?>


</BODY>
</HTML>

