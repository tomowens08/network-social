<?php
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
<td valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
<?php
if ($_SESSION["logged_in"]!="yes")
{
  print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

?>
<td width='80%'>
<table>

<p align='center'>

<?php
        $sess_id=session_id();
        $sql="delete from invite_temp_emails where session_id = '$sess_id'";
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
   $sql1="insert into invite_temp_emails";
   $sql1.="(session_id, ";
   $sql1.="email)";
   $sql1.=" values('$sess_id'";
   $sql1.=",'$ee')";
   $result1=mysql_query($sql1);
   print mysql_error();

   $bb=$bb+1;
}


?>
<tr><td class='login' class='style11'>
<b>Invite Friends</b>&nbsp;[<a href='past_invites.php?page=1'>Past Invites</a>]&nbsp;
</td></tr>
<?
$sess_id=session_id();
        $sql="select * from invite_temp_emails where session_id = '$sess_id'";
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

        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and friend_id = ".$RSUser1["member_id"];
        $result3=mysql_query($sql);
        $num_rows=mysql_num_rows($result3);
      if ($num_rows==0)
      {
        $sql="insert into invites";
        $sql.="(member_id";
        $sql.=", member_email)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", '$RSUser[email]')";
        $result2=mysql_query($sql);

      $sql="insert into invitations";
      $sql.="(member_id";
      $sql.=", friend_id";
      $sql.=", approve";
      $sql.=", deleted)";
      $sql.=" values($RSUser1[member_id]";
      $sql.=", $_SESSION[member_id]";
      $sql.=", 0";
      $sql.=", 0)";
      $result7=mysql_query($sql);

        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    $member_name=$RSUser2["member_name"];

         // E-Mail Code
        $to= "$RSUser[name] <$RSUser[email]>";
        $subject1= "Invitation to join $site_name from ".$RSUser2["member_name"];
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $RSUser2[member_name] <$RSUser2[member_email]>";

        $sql="select * from admin_control";
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        if ($HTTP_POST_VARS["message"]!="")
        {
        $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s personal and private community at $site_name, where you and ".$member_name." can network with each other's friends.".$HTTP_POST_VARS["message"]."<br><hr><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        else
        {
        $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s personal and private community at $site_name, where you and ".$member_name." can network with each other's friends.".$HTTP_POST_VARS["message"]."<br><hr><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        $result_mail=mail($to,$subject1,$message,$headers);

        // E-Mail Code
        }
  }
  else
  {

        $sql="insert into invites";
        $sql.="(member_id";
        $sql.=", member_email)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", '$RSUser[email]')";
        $result2=mysql_query($sql);

        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
        $member_name=$RSUser2["member_name"];

        // E-Mail Code
        $to= "$RSUser[name] <$RSUser[email]>";
        $subject1= "Invitation to join $site_name from ".$RSUser2["member_name"];
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $RSUser2[member_name] <$RSUser2[member_email]>";

        $sql="select * from admin_control";
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        if ($HTTP_POST_VARS["message"]!="")
        {
        $message="<html><head></head><body>";
        $message.="$member_name has invited you to see the event they have posted at $site_name. ";
        $message.="<br><hr><br>$HTTP_POST_VARS[message]<br><hr><br>";
        $message.="$RSUser2[invite_message]";
        $message.="<br>Click below to see the event :<br>";
        $message.="<a href='$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]' class='style11'>$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]</a>";
        $message.="<br>Click below to join $site_name:<br><a href='$site_location/join_inv.php?member_id=".$_SESSION["member_id"]."'>$site_location/join_inv.php?member_id=".$_SESSION["member_id"]."<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        else
        {
        $message="<html><head></head><body>";
        $message.="$member_name has invited you to see the event they have posted at $site_name. ";
        $message.="$RSUser2[invite_message]";
        $message.="<br>Click below to see the event :<br>";
        $message.="<a href='$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]' class='style11'>$site_url/view_event.php?event_id=$HTTP_GET_VARS[event_id]</a>";
        $message.="<br>Click below to join $site_name:<br><a href='$site_location/join_inv.php?member_id=".$_SESSION["member_id"]."'>$site_location/join_inv.php?member_id=".$_SESSION["member_id"]."<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        $result_mail=mail($to,$subject1,$message,$headers);

        // E-Mail Code


        }
}
}
print "<tr><td class='login'><b>Your invitation has been sent.</b></td></tr>";
?>

</table>
</td>
?>
</tr>
</table>
</td>
</tr>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
