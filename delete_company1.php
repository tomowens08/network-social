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
            $company_name=$HTTP_POST_VARS["company_name"];
            $city=$HTTP_POST_VARS["city"];
            $state=$HTTP_POST_VARS["state"];
            $country=$HTTP_POST_VARS["country"];
            $dates=$HTTP_POST_VARS["dates"];
            $title=$HTTP_POST_VARS["title"];
            $division=$HTTP_POST_VARS["division"];

            $res=$profile->delete_company($id);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your company has been deleted.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=companies'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the company was not deleted at this time.";
                print "</td></tr>";
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
<!-- Middle Text -->
<?php
     include("includes/bottom.php");
}
?>
