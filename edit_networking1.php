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
            $field=$HTTP_POST_VARS["field"];
            $sub_field=$HTTP_POST_VARS["sub_field"];
            $role=$HTTP_POST_VARS["role"];
            $desc=$HTTP_POST_VARS["desc"];

            $res=$profile->edit_network($id,$_SESSION["member_id"],$field,$sub_field,$role,$desc);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your networking has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=networking'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the networking was not edited at this time.";
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
