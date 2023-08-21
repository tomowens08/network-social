<?php
  session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>View Board</h3></td></tr>";

  if ($HTTP_GET_VARS["member_id"]=="")
  {

?>
<table width='100%'>
<tr><td class='login'><b>Message Board</b>
<? 
        $sql="select * from board_main where message_id = ".$HTTP_GET_VARS["board_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);
    if ($_SESSION["member_id"]==$RSUser3["member_id"])
    {
      print "&nbsp;[<a href='add_board.php' class='style11'>Add New Board</a>]&nbsp;";
    } 

?>
</td></tr>
<?php
    print "<tr><td class='login'>";
    print "<table width='90%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>";
    print "<tr><td width='90%' class='login' colspan='3'><p align='right'><a href='view_board.php?page=1&board_id=".$HTTP_GET_VARS["board_id"]."' class='style11'>[Back]</a>&nbsp;<a href='add_new_post.php?board_id=".$HTTP_GET_VARS["board_id"]."' class='style11'>[Add a new post]</a>&nbsp;<a href='add_reply.php?board_id=".$HTTP_GET_VARS["board_id"]."&message_id=".$HTTP_GET_VARS["message_id"]."' class='style11'>[Post a reply]</a></p></td></tr>";
    print "<tr><td width='20%' class='login'>Message By</td><td width='80%'>Message</td></tr>";

    if ($HTTP_GET_VARS["page"]==1)
    {

        $sql="select * from board_sub where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<tr><td width='20%'>";

        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);
        
      print "<a href='view_profile.php?member_id=".$RSUser["member_id"]."' class='style11'>";
      print $RSUser3["member_name"]."&nbsp;".$RSUser3["member_lname"]."</a>";
      print "<br>Posted On:<br>".$RSUser["posted_on"];
      print "</td>";

      print "<td width='80%'>".$RSUser["subject"]."<hr><br>".$RSUser["message"]."</td></tr>";

    } 


// Paging Technique
    $page=$HTTP_GET_VARS["page"];
    $sql="select * from board_reply where board_id = ".$HTTP_GET_VARS["board_id"]." and board_sub_id = ".$HTTP_GET_VARS["message_id"];
    $result=mysql_query($sql);
    $num_rows=mysql_num_rows($result);
    if($page==Null)
    {
        $page=1;
    }
    $total=$num_rows;

    $loop_var=$page*10-10;
    while(!$loop_var==0)
    {
        $RSUser=mysql_fetch_array($result);
        $loop_var=$loop_var-1;
    } 

// Paging Technique

$loop_var=10;
    while($loop_var!=0)
    {
      $RSUser=mysql_fetch_array($result);
      if ($RSUser["board_id"]!=Null)
      {
        print "<tr><td width='20%'>";

        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);

        print "<a href='view_profile.php?member_id=".$RSUser["member_id"]."' class='style11'>".$RSUser3["member_name"]."&nbsp;".$RSUser3["member_lname"]."</a><br>Posted On:<br>".$RSUser["posted_on"];
        print "</td>";

        print "<td width='80%'>".$RSUser["subject"]."<hr><br>".$RSUser["message"]."</td></tr>";
      }

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

    while($diff3!=$diff2)
    {

      $diff3=$diff3+1;
      print "<a href='view_bmessage.php?message_id=".$HTTP_GET_VARS["message_id"]."&board_id=".$HTTP_GET_VARS["board_id"]."&page=".$diff3."'>[".$diff3."]</a>&nbsp;";
    } 
    print "</td></tr></table>";
// Paging Technique

?>
</table>
</td></tr>



</table>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
}
?>
