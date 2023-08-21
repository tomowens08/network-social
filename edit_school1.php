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


            // background
            $id=$HTTP_GET_VARS["id"];
            $school_name=$HTTP_POST_VARS["school_name"];
            $city=$HTTP_POST_VARS["city"];
            $state=$HTTP_POST_VARS["state"];
            $status=$HTTP_POST_VARS["status"];
            $fyear=$HTTP_POST_VARS["fyear"];
            $eyear=$HTTP_POST_VARS["eyear"];
            $graduation_year=$HTTP_POST_VARS["graduation_year"];
            $degree=$HTTP_POST_VARS["degree"];
            $major=$HTTP_POST_VARS["major"];
            $courses=$HTTP_POST_VARS["courses"];
            $clubs=$HTTP_POST_VARS["clubs"];

            $res=$profile->edit_school($id, $_SESSION["member_id"],$school_name,$city,$state,$status,$fyear,$eyear,$graduation_year,$degree,$major,$courses,$clubs);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your school has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=schools'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the school was not edited at this time.";
                print "</td></tr>";
            }

?>
<!-- Middle Text -->
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
