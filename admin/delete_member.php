<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<table>
<tr>
<td width='750' height='232' valign='middle' colspan='2'>
<p align='center'>
<?
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "<font face='verdana' size='2'><b>You need to login before you can view this page.</b></font>";
}
  else
{
        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";

  print "</table>";

  print "<table width='100%'>";
  print "<tr>";

        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result1=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result);

  print "<td width='100%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Delete ".$RSUser3["member_name"]."&nbsp;".$RSuser3["member_lname"]."'s Account</b></p></td></tr>";

    print "<form name='EditProfile' action='delete_profile1.php?status=New&member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Confirm Deletion'></p></td></tr>";
    print "</form>";

  print "</table>";
  print "</td></tr></table>";


  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";

} 

?>

</td>
</tr>
</body>
</html>
