<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_invite.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>
<?php
if ($_SESSION["logged_in"]!="yes")
{
  print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">

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
<tr>
<td class='dark_blue_white2'>Invite Friends
&nbsp;[<a href='past_invites.php?page=1' class='nav'>Past Invites</a>]&nbsp;
<?php
     if($HTTP_GET_VARS["new"]==1)
     {
?>
<a href='logincomplete.php' class='nav'>Skip for now</a>
<?php
     }
?>
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
         $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s personal and private community at $site_name, where you and ".$member_name." can network with each other's friends.<br><br><hr><b>$member_name wrote:</b><br>".$HTTP_POST_VARS["message"]."<br><hr><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
        }
        else
        {
         $message="<html><head></head><body>".$member_name." has invited you to join ".$member_name."'s personal and private community at $site_name, where you and ".$member_name." can network with each other's friends.<br><br>".$RSUser2["invite_message"]."<br>You can approve or reject this invite from within your account.<br>Thanks!!!<br>$site_name team"."</body></html>";
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

        $sql="select * from admin_control";
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        if ($HTTP_POST_VARS["message"]!="")
        {
         $message1="<html><head></head><body>";
         $message1.="$member_name has invited you to join $member_name's personal and private community at $site_name, ";
         $message1.=" where you and $member_name can network with each other's friends.<br><br><hr>";
         $message1.="<b>$member_name wrote:</b><br>$HTTP_POST_VARS[message]<br><hr><br>";
         $message1.=".$RSUser2[invite_message]<br>Click below to join $site_name:<br>";
         $message1.="<a href='$site_location/join_inv.php?member_id=$_SESSION[member_id]'>$site_location/join_inv.php?member_id=$_SESSION[member_id]</a>";
         $message1.="<br>Thanks!!!<br>$site_name team</body></html>";
        }
        else
        {
         $message1="<html><head></head><body>";
         $message1.="$member_name has invited you to join $member_name's personal and private community at $site_name, ";
         $message1.=" where you and $member_name can network with each other's friends.<br><br><hr>";
         $message1.="$RSUser2[invite_message]<br>Click below to join $site_name:<br>";
         $message1.="<a href='$site_location/join_inv.php?member_id=$_SESSION[member_id]'>$site_location/join_inv.php?member_id=$_SESSION[member_id]</a>";
         $message1.="<br>Thanks!!!<br>$site_name team</body></html>";
        }

        $headers  = "From:$email_name <$site_email>\r\n". "Content-Type: text/html; charset=ISO-8859-1\r\n". "Return-Path: <$from_email>\n";
        $result_mail=mail($to,$subject1,$message1,$headers);
        // E-Mail Code

        }
}
}
print "<tr><td class='txt_label'><b>Your invitation has been sent.</b></td></tr>";
?>

</table>
</td>
</tr>
</table>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
