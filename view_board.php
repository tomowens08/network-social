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

        $sql="select * from board_main where message_id = ".$HTTP_GET_VARS["board_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);

    if ($_SESSION["member_id"]==$RSUser3["member_id"])
    {
      print "<h3>View Board</h3>&nbsp;";
    }
    else
    {
      print "<h3>View Board</h3>&nbsp;";
    }

  print "</td></tr>";

  if ($HTTP_GET_VARS["member_id"]=="")
  {


        $sql="select * from board_main where message_id = ".$HTTP_GET_VARS["board_id"];
        $result3=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result3);

?>
</td></tr>
<?php

        $sql="select * from board_sub where board_id = ".$HTTP_GET_VARS["board_id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

    print "<tr><td class='login'>";
    print "<table width='90%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>";
    print "<tr><td width='90%' class='login' colspan='3'><p align='right'><a href='add_new_post.php?board_id=".$HTTP_GET_VARS["board_id"]."' class='style11'>[Add a new post]</a></p></td></tr>";
    print "<tr><td width='50%' class='login'>Message</td><td width='20%'>Posted On</td><td width='20%'>Posted By</td></tr>";

// Paging Technique
    $page=$HTTP_GET_VARS["page"];
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
    while(!$loop_var==0)
    {
       $RSUser=mysql_fetch_array($result);
      if ($RSUser["board_sub_id"]!=Null)
      {
        print "<tr><td width='50%' class='login'><a href='view_bmessage.php?page=1&board_id=".$RSUser["board_id"]."&message_id=".$RSUser["board_sub_id"]."' class='style11'>".$RSUser["subject"]."</a><br>";

        if ($_SESSION["member_id"]==$RSUser3["member_id"])
        {
          print "<a href='delete_bmessage.php?board_id=".$RSUser["board_id"]."&message_id=".$RSUser["board_sub_id"]."' class='style11'>[Delete this message]</a>";
        } 

        print "</td>";

        print "<td width='20%'>".$RSUser["posted_on"]."</td>";

        $sql="select member_name, member_lname, member_id from members where member_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

        print "<td width='20%'><a href='view_profile.php?member_id=".$RSUSer1["member_id"]."' class='style11'>".$RSUser1["member_name"]."&nbsp;".$RSUser1["member_lname"]."</a></td></tr>";

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
      print "<a href='view_board.php?board_id=".$HTTP_GET_VARS["board_id"]."&page=".$diff3."'>[".$diff3."]</a>&nbsp;";
    } 
    print "</td></tr></table>";
// Paging Technique

?>
</table>
<?php
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
}
?>
