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
  print "<h3>Approve Friend</h3></td></tr>";


        $sql="update invitations set approve = 1 where (member_id = ".$_SESSION["member_id"]." and friend_id = ".$HTTP_GET_VARS["friend_id"].") OR (friend_id = ".$_SESSION["member_id"]." and member_id = ".$HTTP_GET_VARS["friend_id"].")";
        $result1=mysql_query($sql);
				
				$sql = "DELETE FROM invites WHERE member_id = '".$HTTP_GET_VARS["friend_id"]."'";
				mysql_query($sql);
				
        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and friend_id = ".$HTTP_GET_VARS["friend_id"];
        $result1=mysql_query($sql);
        $data_set=mysql_fetch_array($result1);
        $friend_id=$data_set["friend_id"];
        
  print "<tr><td width='100%' colspan='2' class='login'>";

	print "<p align='center' class='login'><b>The friend has been approved.</b></p>";


    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
