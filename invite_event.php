<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
?>
<?php
session_start();
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<?php

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

?>
<td width='80%'>
<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='style9'>
<b><h3>Invite Friends</h3></b>
&nbsp;[<a href='past_invites.php?page=1' class='style11'>Past Invites</a>]&nbsp;
<?php
     if($HTTP_GET_VARS["new"]==1)
     {
?>
<a href='logincomplete.php'>Skip for now</a>
<?php
     }
?>
</td></tr>

<tr>
<td class='style9'>
Invite your friends to join your personal and private networking community. They will receive an email message with your invitation, and when they join, you will automatically be connected to them and their friends, so you can meet lots of new people.
</td>
</tr>

<tr>
<td class='style9'>
&nbsp;
</td>
</tr>

<tr><td class='login'>
<table width='100%' align='center' height='300' style='border-collapse: collapse' bordercolor='#000000' border='1'>

<tr><td class='login' bgcolor='#E3E4E9' width='20%' class='style11'><b>Subject:</b></td>
<td class='login' width='100%'>Invitation to join <?=$site_name?> from
<?php

        $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"];
?>
</td></tr>

<tr><td class='login' bgcolor='#E3E4E9' width='20%' class='style11'><b>From:</b></td>
<td class='login' width='100%'>
<?
  print $RSUser["member_email"];
?>
</td></tr>
<form name='Invite' action='invite_event1.php?event_id=<?=$HTTP_GET_VARS["event_id"]?>' method='post' onsubmit="return(verify3(this))">

<tr><td class='login' bgcolor='#E3E4E9' width='20%' class='style11'><b>To:</b></td>
<td class='login' width='100%'>
<?
        $sess_id=session_id();
        $sql="select * from invite_temp_emails where session_id = '$sess_id'";
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

<br><a href='import_address.php' class='style11'>Import from your address book</a>
</td></tr>


<tr><td class='login' bgcolor='#E3E4E9' width='20%' class='style11'><b>Your Message:</b></td>
<td class='login' width='100%'>
<textarea name='message' rows='3' cols='40'></textarea>
</td></tr>

<tr><td class='login' bgcolor='#E3E4E9' width='20%' valign='top' class='style11'><b>Message:</b></td>
<td class='login' width='100%'>
<?php
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"];
  print " has invited you to see the event they have posted at $site_name ";

        $sql="select invite_message from admin_control";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["invite_message"];

  print "<br>Click below to see the event :<br>";
  print "<a href='$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]' class='style11'>$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]</a>";

  print "<br>Click below to join $site_name:<br>";
  print "<a href='$site_url/join_inv.php?member_id=$_SESSION[member_id]' class='style11'>$site_url/join_inv.php?member_id=$_SESSION[member_id]</a>";

?>
</td></tr>

<tr><td class='login' width='100%' colspan='2'>
<p align='center'><input type='submit' name='submit' value='Invite'>
</td></tr>
</form>



</table>
</td>
<?php
print "</td>";
?>
</tr>
</table>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
