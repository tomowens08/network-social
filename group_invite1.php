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
  print "<h3>Send Group Invitation</h3></td></tr>";

  print "<tr><td colspan='2' class='login'>";
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

<p align='center'>

<?php
        $sess_id=session_id();
        $sql="delete from invite_temp_group_emails where session_id = '$sess_id'";
        $result=mysql_query($sql);

/*
$ts=fopen($writedir.$_SESSION["member_id"].".txt", "w");
fputs($ts,$HTTP_POST_VARS["email"]);

$ts=fopen($writedir.$_SESSION["member_id"].".txt","r");
*/
$bb=0;
$e=explode(",", $HTTP_POST_VARS["email"]);

$total_emails=count($e);

foreach($e as $ee)
{
   $sess_id=session_id();
   $sql1="insert into invite_temp_group_emails";
   $sql1.="(session_id, ";
   $sql1.="email)";
   $sql1.=" values('$sess_id'";
   $sql1.=",'$ee')";
   $result1=mysql_query($sql1);
   print mysql_error();

}


?>
<tr><td class='login' class='style11'><b>Invite Friends</b>&nbsp;[<a href='past_group_invites.php?page=1'>Past Invites</a>]&nbsp;</td></tr>
<?
$sess_id=session_id();
        $sql="select * from invite_temp_group_emails where session_id = '$sess_id'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

if ($num_rows==0)
{
  print "<tr><td class='login'><b>You did not enter any email to add.</b></td></tr>";
}
  else
{

  while($RSUser=mysql_fetch_array($result))
  {

        $sql="select * from members where member_email = '".$RSUser["email"]."'";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        $RSUser1=mysql_fetch_array($result1);
    if ($num_rows!=0)
    {

        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and group_id = ".$group_id;
        $result3=mysql_query($sql);
        $num_rows=mysql_num_rows($result3);
      if ($num_rows==0)
      {
        $sql="insert into group_invites";
        $sql.="(member_id";
        $sql.=", group_id";
        $sql.=", member_email)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", $group_id";
        $sql.=", '$RSUser[email]')";
        $result2=mysql_query($sql);

      $sql="insert into invitations";
      $sql.="(member_id";
      $sql.=", group_id";
      $sql.=", approve";
      $sql.=", deleted)";
      $sql.=" values($RSUser1[member_id]";
      $sql.=", $group_id";
      $sql.=", 0";
      $sql.=", 0)";
      $result7=mysql_query($sql);

        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    $member_name=$RSUser2["member_name"];

         // E-Mail Code
        $to= "$RSUser[name] <$RSUser[email]>";
        $subject1= "Invitation to join Schoolster from ".$RSUser2["member_name"];
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $RSUser2[member_name] <$RSUser2[member_email]>";

        $sql="select * from admin_control";
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        if ($HTTP_POST_VARS["message"]!="")
        {
        $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.<br>".$HTTP_POST_VARS["message"]."<br><hr><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        else
        {
         $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends<br><hr><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        $result_mail=mail($to,$subject1,$message,$headers);

        // E-Mail Code
        }
  }
  else
  {

        $sql="insert into group_invites";
        $sql.="(member_id";
        $sql.=", group_id";
        $sql.=", member_email)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", $group_id";
        $sql.=", '$RSUser[email]')";
        $result2=mysql_query($sql);

        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
        $member_name=$RSUser2["member_name"];

        // E-Mail Code
        $to= "$RSUser[name] <$RSUser[email]>";
        $subject1= "Invitation to join Schoolster from ".$RSUser2["member_name"];
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $RSUser2[member_name] <$RSUser2[member_email]>";

        $sql="select * from admin_control";
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        if ($HTTP_POST_VARS["message"]!="")
        {
         $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s has invited you to join ".$member_name."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.<br>".$HTTP_POST_VARS["message"]."<br><hr><br>".$RSUser2["invite_message"]."<br>Click below to join $site_name:<br><a href='$site_location/join_group_inv.php?group_id=".$group_id."'>$site_location/join_group_inv.php?group_id=".$group_id."<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        else
        {
         $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s has invited you to join ".$member_name."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.<br><hr><br>".$RSUser2["invite_message"]."<br>Click below to join $site_name:<br><a href='$site_location/join_group_inv.php?group_id=".$group_id."'>$site_location/join_group_inv.php?group_id=".$group_id."<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        $result_mail=mail($to,$subject1,$message,$headers);

        // E-Mail Code


        }
}
}
print "<tr><td class='login'><b>Your invitation has been sent.</b></td></tr>";
?>

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
//    print "</table>";
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
