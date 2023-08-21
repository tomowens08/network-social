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

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Edit Profile
</td></tr>

<tr><td>

<!-- edit profile table -->
<?php
    if($HTTP_GET_VARS["type"]==Null)
    {
      $int=$profile->get_interests($_SESSION["member_id"]);

        // Begin Interests and Personality
        include("includes/profile_interests.php");
        // End Interests and Personality

    }

    if($HTTP_GET_VARS["type"]=="back")
    {
      $int=$profile->get_back($_SESSION["member_id"]);
        // Begin Background
        include("includes/profile_back.php");
        // End Background
    }
    
    // schools
    if($HTTP_GET_VARS["type"]=="schools")
    {
       // schools
        include("includes/profile_school.php");
       // schools
    }
    // schools


    if($HTTP_GET_VARS["type"]=="companies")
    {
       // schools
        include("includes/profile_company.php");
       // schools
    }

    if($HTTP_GET_VARS["type"]=="name")
    {
       // schools
        include("includes/profile_name.php");
       // schools
    }

    if($HTTP_GET_VARS["type"]=="networking")
    {
       // schools
        include("includes/profile_networking.php");
       // schools
    }

    if($HTTP_GET_VARS["type"]=="basic")
    {
       // schools
        include("includes/profile_basic.php");
       // schools
    }
    if($HTTP_GET_VARS["type"]=="code")
    {
        include("includes/profile_code.php");
    }
    if($HTTP_GET_VARS["type"]=="song")
    {
        include("includes/profile_song.php");
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
