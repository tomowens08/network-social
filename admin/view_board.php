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

  if ($HTTP_GET_VARS["member_id"]=="")
  {

?>
<table width='100%'>
<tr><td class='login'><b>Message Board</b>
<? 

?>
</td></tr>
<?php
        $sql="select * from board_sub where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

    print "<tr><td class='login'>";
    print "<table width='90%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>";
    print "<tr><td width='90%' class='login' colspan='3'><p align='right'>&nbsp;</p></td></tr>";
    print "<tr><td width='50%' class='login'>Message</td><td width='20%'>Posted On</td><td width='20%'>Posted By</td></tr>";

// Paging Technique
    $page=$HTTP_GET_VARS["page"];
    $total=mysql_num_rows($result);

    $loop_var=$page*10-10;
    while(!$loop_var==0)
    {

        $RSUser=mysql_fetch_array($result);
        $loop_var=$loop_var-1;
    } 

// Paging Technique
        $sql="select * from board_sub where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);

    $loop_var=10;
    while($RSUser=mysql_fetch_array($result))
    {


        print "<tr><td width='50%' class='login'><a href='view_bmessage.asp?page=1&board_id=".$RSUser["board_id"]."&message_id=".$RSUser["board_sub_id"]."'>".$RSUser["subject"]."</a><br>";
        print "<a href='delete_bmessage.php?board_id=".$RSUser["board_id"]."&message_id=".$RSUser["board_sub_id"]."'>[Delete this message]</a>";
        print "</td>";

        print "<td width='20%'>".$RSUser["posted_on"]."</td>";

        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);

        print mysql_error();
        $RSUser1=mysql_fetch_array($result1);


        print "<td width='20%'><a href='../view_profile.php?member_id=".$RSUser1["member_id"]."' target='_blank'>".$RSUser1["member_name"]."&nbsp;".$RSUser1["member_lname"]."</a></td></tr>";
        
        $loop_var=$loop_var-1;
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

} 

?>
</body>
</html>
