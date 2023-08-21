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
  print "<h3>Delete a friend</h3></td></tr>";


  if ($HTTP_GET_VARS["folder"]=="bookmark")
  {
        $sql="delete from bookmarks where member_id = ".$_SESSION["member_id"]." and member_book_id = ".$HTTP_GET_VARS["friend_id"];
        $result=mysql_query($sql);
  }
    elseif ($_GET['friend_id'])
  {
        $sql = "UPDATE invitations SET deleted = '1' WHERE (member_id = ".$_GET['friend_id']." AND friend_id = ".$_SESSION['member_id'].") OR (friend_id = ".$_GET['friend_id']." AND member_id = ".$_SESSION['member_id'].")";
				//echo $sql;
				$res = mysql_query($sql);
				$sql = "DELETE FROM invites WHERE member_id = '".$HTTP_GET_VARS["friend_id"]."'";
				mysql_query($sql);
				$sql = "SELECT member_email FROM members WHERE member_id = ".$_GET['friend_id'];
				$fr = mysql_fetch_array(mysql_query($sql));
				$sql = "DELETE FROM invites WHERE member_id = ".$_SESSION['member_id']." AND member_email LIKE '%".$fr['member_email']."%'";
				mysql_query($sql);
	}

  print "<tr><td width='100%' colspan='2' class='login'>";

//}
if ($HTTP_GET_VARS["folder"]=="bookmark")
{

  print "<p align='center' class='login'><b>The friend has been deleted from your bookmarks</b></p>";
  print "<p align='center' class='login'><a href='view_bookmarks.php?page=1'>Back</a></p>";
}
  else
{

  print "<p align='center' class='login'><b>The friend has been deleted.</b></p>";
  print "<p align='center' class='login'><a href='myfriends.php?page=1'>Back</a></p>";
} 



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
