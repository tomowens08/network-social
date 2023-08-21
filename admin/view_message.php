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

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>View Message</td></tr>";

  print "<tr width='100%'><td width='100%'><table width='100%'>";

        $sql="select * from admin_reply where message_id = ".$HTTP_GET_VARS["mess_id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
  if ($num_rows==0)
  {
    print "The message has been deleted.";
  }
    else
  {

    print "<tr>";
        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result1);
    print "<tr>";
    print "<td width='20%' bgcolor='#D0D0D0'><p align='left'>From:</p></td>";
    print "<td width='80%'><p align='left'>".$RSUser3["member_name"]."&nbsp;".$RSUser3["member_lname"]."</p></td>";
    print "</tr>";
    print "<tr>";
    print "<td width='20%' bgcolor='#D0D0D0'><p align='left'>Posted On:</p></td>";
    print "<td width='80%'><p align='left'>".$RSUser["posted_on"]."</p></td>";
    print "</tr>";
    print "<tr>";
    print "<td width='20%' bgcolor='#D0D0D0'><p align='left'>Subject:</p></td>";
    print "<td width='80%'><p align='left'>".$RSUser["subject"]."</p></td>";
    print "</tr>";
    print "<tr>";
    print "<td width='20%' bgcolor='#D0D0D0'><p align='left'>Message:</p></td>";
    print "<td width='80%'><p align='left'>".$RSUser["message"]."</p></td>";
    print "</tr>";
    print "<tr>";
    print "<td width='20%'><p align='left'>&nbsp;</p></td>";
    print "<td width='80%'><p align='left'><a href='send.php?member_id=".$RSUser3["member_id"]."'>Send a reply</a>&nbsp;|&nbsp;<a href='delete_message.php?mess_id=".$RSUser["message_id"]."'>Delete this message</a></p></td>";
    print "</tr>";
  } 


  print "</table></table>";
} 

?>
</BODY>
</HTML>
