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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Join a Group</h3></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  print "<table width='100%'>";
	$sql = "SELECT type FROM groups WHERE id = ".$HTTP_GET_VARS[group_id];
	$res = mysql_fetch_array(mysql_query($sql));
	$approve = $res['type']?0:1;
	
	$sql = "SELECT count(*) as num FROM invitations WHERE group_id = '".$HTTP_GET_VARS[group_id]."' AND member_id = '".$_SESSION['member_id']."' AND status";
	$res = mysql_fetch_array(mysql_query($sql));
	
	if (!$res['num']) {

  	$sql="insert into invitations";
  	$sql.="(member_id";
  	$sql.=", group_id";
  	$sql.=", status";
  	$sql.=", date";
  	$sql.=", deleted)";
  	$sql.=" values($_SESSION[member_id]";
  	$sql.=", $HTTP_GET_VARS[group_id]";
  	$sql.=", '$approve'";
  	$sql.=", '".time()."'";
  	$sql.=", '0')";
		$res=mysql_query($sql);

	}
?>
<table width="100%" border="0" cellspacing="1" cellpadding="7">
<tr>
<td><div align="left"><b>
<img src="images/untitled.bmp" width="20" height="20" align="absmiddle">&nbsp;
<?
if ($approve)
	echo 'You are now a member';
else echo 'You are about to be a member.</b><br>Moderator of this group needs to approve your account first.';
?></b>
</div></td>
</tr>
<tr bgcolor="D0ECFD" valign="top">
<td><p align="left"><a href="view_group.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>" class="blacktext8">Back to Group Profile</a></p></td>
</tr>
</table>
<?php
  print "</form>";
  print "</table>";
  print "</p></td></tr>";


//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
