<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";

  print "</table>";

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Delete a message</b></p></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";


        $sql="delete from board_sub where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
        $result=mysql_query($sql);

        $sql="delete from board_reply where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
        $result=mysql_query($sql);

  print "<p align='center'><font face='Arial' size='2'>Your message has been deleted.<br><a href='message_board.php'>Back</a>";
  print "</p></td></tr>";


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
