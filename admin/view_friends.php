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

        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>".$RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]."'s Friends</td></tr>";

  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Member Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";


        $sql="select * from member_friends where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
  $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

        $sql="select * from members where member_id = ".$RSUser["friend_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
      print "<tr bgColor='#ffffff'>";
      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
      print "<td class='textcell' valign='top' width='70%'><a href='view_profile.asp?member_id=".$RSUser1["member_id"]."'>".$RSUser1["member_name"]."</a> (E-Mail :) ".$RSUser1["member_email"]."</td>";
      print "<td class='textcell' valign='top' width='20%'><a href='view_friends.asp?member_id=".$RSUser1["member_id"]."'>View Friends</a></td>";
      print "</tr>";
      $sr_no=$sr_no+1;
  } 


  print "</table></table>";
} 

?>
</BODY>
</HTML>
