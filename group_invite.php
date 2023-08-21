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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Send Group Invitation</h3></td></tr>";

  print "<tr><td colspan='2'  >";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group=new groups;
     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);
     $creator=$group->get_member_id($group_id);

     if($group_info["members_invite"]=="1" || $creator==$_SESSION["member_id"])
     {

?>
<td width='70%'>
<table>
<tr>
<td class='txt_label'><b>Invite Friends</b>&nbsp;[<a href='past_group_invites.php?page=1' class='txt_label'>Past Invites</a>]&nbsp;</td></tr>

<tr><td class='txt_label'>Invite your friends to join your personal and private networking community. They will receive an email message with your invitation, and when they join, you will automatically be connected to them and their friends, so you can meet lots of new people.</td></tr>

<tr><td  >
<table width='100%' align='center' style='border-collapse: collapse' bordercolor='#2195DA' border='1'>

<tr><td   bgcolor='#E3E4E9' width='20%' class='txt_label'><b>Subject:</b></td>
<td   width='100%'>Invitation to join <?=$site_name?> from
<?php

        $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"];
?>
</td></tr>

<tr><td   bgcolor='#E3E4E9' width='20%' class='txt_label'><b>From:</b></td>
<td   width='100%'>
<?
  print $RSUser["member_email"];
?>
</td></tr>
<form name='Invite' action='group_invite1.php?group_id=<?=$group_id?>' method='post' onsubmit="return(verify3(this))">

<tr><td   bgcolor='#E3E4E9' width='20%' class='txt_label'><b>To:</b></td>
<td   width='100%'>
<?
        $sess_id=session_id();
        $sql="select * from invite_temp_group_emails where session_id = '$sess_id'";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {
    print "<textarea name='email' rows='3' cols='40'></textarea>";
  }
    else
  {
    print "<textarea name='email' rows='3' cols='40'>";
    while($RSUser1=mysql_fetch_array($result1))
    {
      print $RSUser1["email"];
      print ",";
    }
    print "</textarea>";
  }

?>

<br><a href='import_address.php?group=1&group_id=<?=$group_id?>' class='txt_label'>Import from your address book</a>
</td></tr>


<tr><td   bgcolor='#E3E4E9' width='20%' class='txt_label'><b>Your Message:</b></td>
<td   width='100%'>
<textarea name='message' rows='3' cols='40'></textarea>
</td></tr>

<tr><td   bgcolor='#E3E4E9' width='20%' valign='top' class='txt_label'><b>Message:</b></td>
<td   width='100%'>
<?php
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]." has invited you to join ".$RSUser["member_name"]."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.";

        $sql="select invite_message from admin_control";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["invite_message"];

  print "<br>Click below to join $site_name:<br><a href='$site_url/join_group_inv.php?group_id=".$group_id."' class='txt_label'>$site_url/join_group_inv.php?group_id=".$group_id;

?>
</td></tr>

<tr><td   width='100%' colspan='2'>
<p align='center'><input type='submit' name='submit' value='Invite'>
</td></tr>
</form>



</table>
<?php

     }
     else
     {
?>
This forum does not allow public image upload.
<?php
     }

  // run loop to display all my_groups
  print "</td></tr>";
  print "</table>";

  print "</td></tr>";
  print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</table>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
