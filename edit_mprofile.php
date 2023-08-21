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
    include("includes/right_mprofile_menu.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Edit Profile
</td></tr>

<tr><td>

<!-- edit profile table -->
<?php
include("includes/music.class.php");
$music=new music;
if (!$HTTP_GET_VARS["type"])
	$HTTP_GET_VARS["type"] = 'details';
    if($HTTP_GET_VARS["type"]=='shows')
    {
        // Begin Interests and Personality
        include("includes/mprofile_shows.php");
        // End Interests and Personality

    }
		
    if($HTTP_GET_VARS["type"]=="personality")
    {
        // Begin Background
        include("includes/mprofile_interests.php");
        // End Background
    }
		
    if($HTTP_GET_VARS["type"]=="details")
    {
        // Begin Background
        include("includes/mprofile_details.php");
        // End Background
    }

    if($HTTP_GET_VARS["type"]=="basic")
    {
        include("includes/mprofile_basic.php");
    }

    if($HTTP_GET_VARS["type"]=="songs")
    {
        include("includes/mprofile_songs.php");
    }

    if($HTTP_GET_VARS["type"]=="listing")
    {
        include("includes/mprofile_listing.php");
    }
    if($HTTP_GET_VARS["type"]=="code")
    {
        include("includes/mprofile_code.php");
    }

?>

</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>
<?php
     include("includes/bottom.php");
}
?>
