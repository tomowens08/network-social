<?php
  session_start();
  include("includes/conn.php");
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

  if ($HTTP_GET_VARS["member_id"]=="")
  {

?>
<table width='100%'>
<tr><td class='login'><b>Message Board</b>
<?php
        $sql="select * from board_main where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result);
?>
</td></tr>
<? 
    print "<tr><td class='login'>";
    print "<table width='90%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>";
    print "<tr><td width='90%' class='login' colspan='3'><p align='right'>&nbsp;</p></td></tr>";
    print "<tr><td width='20%' class='login'>Message By</td><td width='80%'>Message</td></tr>";

    if ($HTTP_GET_VARS["page"]==1)
    {

        $sql="select * from board_sub where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<tr><td width='20'>";
        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);
      print "<a href='view_profile.asp?member_id=".$RSUser["member_id"]."'>".$RSUser3["member_name"]."&nbsp;".$RSUser3["member_lname"]."</a><br>Posted On:".$RSUser["posted_on"];
      print "</td>";

      print "<td width='80%'>".$RSUser["subject"]."<hr><br>".$RSUser["message"]."</td></tr>";

    } 


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

    $sql="select * from board_reply where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
    $result=mysql_query($sql);
    $loop_var=10;
    while(!$loop_var==0)
    {
    
    $RSUser=mysql_fetch_array($result);
    print "<tr><td width='20'>";
        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result1);
        print "<a href='view_profile.asp?member_id=".$RSUser["member_id"]."'>".$RSUser3["member_name"]."&nbsp;".$RSUser3["member_lname"]."</a><br>Posted On:".$RSUser["posted_on"];
        print "</td>";
        print "<td width='80%'>".$RSUser["subject"]."<hr><br>".$RSUser["message"]."</td></tr>";
      $loop_var=$loop_var-1;
    } 


// Paging Technique
    $diff=round($total/10,0);
    $diff1=$total/10;
    if ($diff<$diff1)
    {

      $diff2=$diff+1;
    }
      else
    {

      $diff2=$diff;
    } 

    $diff3=0;
    print "<table width='100%'>";
    print "<tr><td width='100%'>Goto Page : ";

    while(!$diff3==$diff2)
    {

      $diff3=$diff3+1;
      print "<a href='view_board.asp?board_id=".$HTTP_GET_VARS["board_id"]."&page=".$diff3."'>[".$diff3."]</a>&nbsp;";
    } 
    print "</td></tr></table>";
// Paging Technique

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
