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
include("includes/profile.class.php");
$profile=new profile;

//include("includes/right.php");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_profile_edit.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>Edit Profile
</td></tr>

<tr><td>

<?php
        include("includes/company_edit.php");
?>
</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>
<!-- Middle Text -->
<?php
     include("includes/bottom.php");
}
?>
