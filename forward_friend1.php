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
  print "<h3>Forward a friends profile!</h3></td></tr>";


        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
        $member_name=$RSUser1["member_name"]."&nbsp;".$RSUser1["member_lname"];
  

          // E-Mail Code
        $to= "<$HTTP_POST_VARS[email]>";
        $subject1= "Your friend has forwarded a profile from $site_name";
        $message= "<html><head></head><body>";
        $message.="$member_name has sent you a profile listed at <a href='$site_url'>$site_url</a>.";
        $message.="<br>You can see this profile by clicking at the link below.";
        $message.="<br><a href='$site_url/view_profile.php?member_id=$HTTP_GET_VARS[friend_id]'>View Profile</a>";
        $message.="<br>If you not a member of $site_name. ";
        $message.="Please click at the link below to become one.";
        $message.="<br><a href='join_inv.php?member_id=$RSUser1[member_id]'>Join $site_name</a>";
        $message.="<br>Thanks!!!<br>$site_name team.";
        $message.="</body></html>";
        
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: $RSUser1[member_name] <$RSUser1[member_email]>";
        $result_mail=mail($to,$subject1,$message,$headers);

        // E-Mail Code





  print "<tr><td width='100%' colspan='2'  class='txt_label'>";

  print "<table width='100%'>";
  print "<tr><td width='100%' class='txt_label' valign='top'>";
  print "The profile has been forwarded.";
  print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[friend_id]'>Back to Profile</a>";
  print "</td>";
  print "</tr>";

  print "</table>";


  print "</td>";

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
