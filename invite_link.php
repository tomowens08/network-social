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
<td class='dark_blue_white2'>Invite your friends to <?=$site_name?>
</td></tr>

<tr>
<td class='txt_label'>
Here is your personal invite link :
</td>
</tr>

<tr>
<td class='txt_label'>
<textarea name='invite_link' rows='3' cols='40'><?=$site_url?>join_inv.php?member_id="<?=$_SESSION["member_id"]?></textarea>
</td>
</tr>




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
