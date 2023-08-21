<?php
session_start();
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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>View Message</h3></td></tr>";

        $sql="select * from admin_message where message_id = ".$HTTP_GET_VARS["mess_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        $RSUser1=mysql_fetch_array($result1);

  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>The message has been deleted.</p></td></tr>";
  }
    else
  {

    print "<tr><td width='100%' colspan='2' class='login'>";

    print "<tr><td width='30%' bgcolor='#D0D0D0' class='login'>From:</td>";
    print "<td width='70%' class='login'>Administrator</td></tr>";


    print "<tr><td width='30%' bgcolor='#D0D0D0' class='login'>Date:</td>";
    print "<td width='70%' class='login'>".$RSUser1["date_posted"]."</td></tr>";

    print "<tr><td width='30%' bgcolor='#D0D0D0' class='login'>Subject:</td>";
    print "<td width='70%' class='login'>".$RSUser1["subject"]."</td></tr>";

    print "<tr><td width='30%' bgcolor='#D0D0D0' class='login'>Message:</td>";
    print "<td width='70%' class='login'>".$RSUser1["message"]."</td></tr>";

    print "<tr><td width='100%' colspan='2' class='login'>";
    print "|&nbsp;<a href='reply_admin.php' class='style11'>Reply To This Message</a>&nbsp;|&nbsp;";

    print "<a href='delete_admin_message.php?mess_id=".$HTTP_GET_VARS["mess_id"]."' class='style11'>Delete This Message</a>&nbsp;|&nbsp;";
  } 


  print "</td></tr>";



  print "</table>";

  print "</td>";


  print "</table>";
  print "</td></tr>";


  print "</table>";
  print "</td>";
  print "</tr></table>";

?>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
} 
?>
