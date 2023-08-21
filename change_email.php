<?php
ob_start("ob_gzhandler");

session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<p align='center'>

<table width='100%'>
<tr>
<td width='20%'>
<?php
    include("includes/right_menu.php");
?>
</td>

<td width='80%' valign='top'>
<table width='100%' align='center' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td colspan='2' class='dark_blue_white2'>
Change Email
</td>
</tr>

<form name='UploadImages' action='change_email1.php' method='post'>
<tr>
<td width='30%' class='txt_label'>Current Email:</td>
<td width='70%' class='txt_label'><input type='text' size='40' name='current_email'>
</td>
</tr>

<tr>
<td width='30%' class='txt_label'>New Email:</td>
<td width='70%' class='txt_label'><input type='text' size='40' name='new_email'>
</td>
</tr>

<tr>
<td width='100%' colspan='2' class='txt_label'>
<p align='center'>
<input type='submit' name='submit' value='Save Changes'>
</p>
</td>
</tr>

</form>

</table>
</td></tr>
</table>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
