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

        $sql="select * from members where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
        
  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>".$RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]."'s Invites</td></tr>";

  print "<tr><td class='textcell'><table width='100%'>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Invite Address</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";

        $sql="select * from invites where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);

  $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'>".$RSUser["member_email"]."</td>";
    print "<td class='textcell' valign='top' width='20%'><a href='delete_invites.php?invite_id=".$RSUser["invite_id"]."'>Delete Invites</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  } 


  print "</table></table>";
} 

?>


</BODY>
</HTML>

