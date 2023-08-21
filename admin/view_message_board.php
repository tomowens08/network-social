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
?>
<tr><td width='750' height='232' valign='middle' colspan='2'>
<p align='center'>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{
?>
<table width='100%'>
<tr><td class='login'><b>Message Board</b></td></tr>

<?php

        $sql="select * from board_main where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);

    print "<tr><td class='login'>";
    print "<table width='90%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>";
    print "<tr><td width='50%' class='login'>Board Name</td><td width='20%'>Messages</td><td width='20%'>Replies</td></tr>";
    while($RSUser=mysql_fetch_array($result))
    {
        print "<tr><td width='50%' class='login'><a href='view_board.php?page=1&board_id=".$RSUser["message_id"]."'>".$RSUser["subject"]."</a><br>&nbsp;<font size='1'>".$RSUser["body"]."</font><br>&nbsp;<a href='delete_board.php?board_id=".$RSUser["message_id"]."'>Delete this board</a></td>";
        $sql="select count(*) as a from board_sub where board_id = ".$RSUser["message_id"];
        $result1=mysql_query($sql);
        print mysql_error();
        $RSUser1=mysql_fetch_array($result1);
        print "<td width='20%'>".$RSUser1["a"]."</td>";

        $sql="select count(*) as a from board_reply where board_id = ".$RSUser["message_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

       print "<td width='20%'>".$RSUser1["a"]."</td></tr>";

}

?>
</table>
</td></tr>
</table>
</td></tr>
</table>
</td>
</tr>
<? 
}
?>
</body>
</html>
