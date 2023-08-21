<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<script>
var popUpWin=0;
function IsPopupBlocker() {
	var strNewURL = "Dummy.htm;"
	var Strfeature = "" ;
	var WindowOpen = window.open
	(strNewURL,"MainWindow",Strfeature);
	try{
		var obj = WindowOpen.name;
		WindowOpen.close();
		//alert("Popup blocker NOT detected");
	} 
	catch(e){ 
		alert("System has been blocked by POP-UP BLOCKER.\nPlease disable the POP-UP BLOCKER and try again. ");
	}
}

function popUpWindow(URLStr, left, top, width, height)
{
	
  var str
	if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
	
	IsPopupBlocker();
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_invite.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">
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

<tr>
<td class='txt_label'>
Invite your friends to join your personal and private networking community. They will receive an email message with your invitation, and when they join, you will automatically be connected to them and their friends, so you can meet lots of new people.
</td>
</tr>

<tr>
<td class='style9'>
&nbsp;
</td>
</tr>

<tr><td class='txt_label'>
<table width='100%' cellpadding='4' align='center' height='300' style='border-collapse: collapse' bordercolor='#000000' border='1'>

<tr><td class='txt_label' bgcolor='#E3E4E9' width='20%' class='style11'><b>Subject:</b></td>
<td class='txt_label' width='100%'>Invitation to join <?=$site_name?> from
<?php

        $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"];
?>
</td></tr>

<tr><td class='txt_label' bgcolor='#E3E4E9' width='20%' class='style11'><b>From:</b></td>
<td class='txt_label' width='100%'>
<? 
  print $RSUser["member_email"];
?>
</td></tr>
<form name='Invite' action='invite1.php' method='post' onsubmit="return(verify3(this))">

<tr valign="top"><td class='txt_label' bgcolor='#E3E4E9' width='20%' class='style11'><b>To:</b></td>
<td class='txt_label' width='100%'>
Import from: <label style="cursor: pointer;" title="Import contacts from your Address Book" onclick="popUpWindow('import_address.php?agent=book',200,200,520,550);">Your Address Book</label>&nbsp;|&nbsp;
<label title="Import contacts from your Yahoo mail account" style="cursor: pointer;" onclick="popUpWindow('import_address.php?agent=yahoo',200,200,520,550);">Yahoo</label>&nbsp;|&nbsp;
<label title="Import contacts from your MSN mail account" style="cursor: pointer;" onclick="popUpWindow('import_address.php?agent=msn',200,200,520,550);">MSN</label>&nbsp;|&nbsp;
<label title="Import contacts from your Hotmail account" style="cursor: pointer;" onclick="popUpWindow('import_address.php?agent=hotmail',200,200,520,550);">Hotmail</label>&nbsp;|&nbsp;
<label title="Import contacts from your Gmail account" style="cursor: pointer;" onclick="popUpWindow('import_address.php?agent=gmail',200,200,520,550);">Gmail</label>
<br>
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
</td></tr>


<tr valign="top"><td class='txt_label' bgcolor='#E3E4E9' width='20%' class='style11'><b>Your Message:</b></td>
<td class='txt_label' width='100%'>
<textarea name='message' rows='3' cols='40'></textarea>
</td></tr>

<tr><td class='txt_label' bgcolor='#E3E4E9' width='20%' valign='top' class='style11'><b>Message:</b></td>
<td class='txt_label' width='100%'>
<?php
  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]." has invited you to join ".$RSUser["member_name"]."'s personal and private community at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.";

        $sql="select invite_message from admin_control";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print $RSUser["invite_message"];

  print "<br>Click below to join $site_name:<br><a href='$site_url/join_inv.php?member_id=".$_SESSION["member_id"]."' class='style11'>$site_url/join_inv.php?member_id=".$_SESSION["member_id"];

?>
</td></tr>

<tr><td class='login' width='100%' colspan='2'>
<p align='center'><input type='submit' class='txt_topic' name='submit' value='Send Invitation'>
</td></tr>
</form>



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
