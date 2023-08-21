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
?>
<td width='80%' valign='top'>

<table width='100%'>
<tr><td class='login'><b>Invite Friends</b>&nbsp;[<a href='past_invites.php?page=1'>Past Invites</a>]&nbsp;</td></tr>
<?
  if($_SESSION["member_id"]==$HTTP_GET_VARS["friend_id"])
  {
    print "<tr><td class='login'>";
    print "<b>You cannot add yourself to your friends.</b>";
    print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[friend_id]'>Back to Profile</a>";
    print "</td></tr>";
  }
  else
  {
        $sql="select * from invitations 
							where ((friend_id = $_SESSION[member_id] and member_id = $HTTP_GET_VARS[friend_id]) OR (member_id = $_SESSION[member_id] and friend_id = $HTTP_GET_VARS[friend_id])) AND NOT deleted";
				$res_RSUser = mysql_query($sql);
        $RSUser = mysql_fetch_array($res_RSUser);
  
	if (!$RSUser['approve'])
  {
        $sql="select * from members ";
        $sql.="where member_id = $HTTP_GET_VARS[friend_id]";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);


        $sql="insert into invites";
        $sql.="(member_id";
        $sql.=", member_name";
        $sql.=", member_lname";
        $sql.=", member_email)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", '$RSUser[member_name]'";
        $sql.=", '$RSUser[member_lname]'";
        $sql.=", '$RSUser[member_email]')";
        $result=mysql_query($sql);
				
				
        $sql="insert into invitations";
        $sql.="(member_id";
        $sql.=", friend_id";
        $sql.=", approve";
        $sql.=", date";
        $sql.=", deleted)";
        $sql.=" values($RSUser[member_id]";
        $sql.=", $_SESSION[member_id]";
        $sql.=", 0";
        $sql.=", ".time();
        $sql.=", 0)";
				if (!mysql_num_rows($res_RSUser)) {
       		$result=mysql_query($sql);
					include_once 'includes/people.class.php';
					$people = new people;
					$people->notification('friend_request',$RSUser[member_id],' ',$site_name,$site_url,$email_name,$site_email);
				}
        print "<tr><td class='login'>";
        print "<b>Your invitation has been sent.</b>";
        print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[friend_id]'>Back to Profile</a>";
        print "</td></tr>";
  }
  else
  {
      print "<tr><td class='login'>";
      print "<b>The member is already in your friends list.</b>";
      print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[friend_id]'>Back to Profile</a>";
      print "</td></tr>";
  }
}
        



?>
</table>


</td>
</tr>

</table>

<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
