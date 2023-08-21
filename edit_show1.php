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

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>Edit Profile
</td></tr>

<?php
include("includes/music.class.php");
$music=new music;


            // shows
            $id=$HTTP_GET_VARS["id"];
            $month=$HTTP_POST_VARS["month"];
            $day=$HTTP_POST_VARS["day"];
            $year=$HTTP_POST_VARS["year"];
            $hour=$HTTP_POST_VARS["hour"];
            $min=$HTTP_POST_VARS["min"];
            $marker=$HTTP_POST_VARS["marker"];
            $venue=$HTTP_POST_VARS["venue"];
            $cost=$HTTP_POST_VARS["cost"];
            $address=$HTTP_POST_VARS["address"];
            $city=$HTTP_POST_VARS["city"];
            $zip_code=$HTTP_POST_VARS["zip_code"];
            $regional=$HTTP_POST_VARS["regional"];
            $state=$HTTP_POST_VARS["state"];
            $country=$HTTP_POST_VARS["country"];
            $description=$HTTP_POST_VARS["description"];

            $res=$music->edit_shows($id, $_SESSION["member_id"],$month,$day,$year,$hour,$min,$marker,$venue,$cost,$address,$city,$zip_code,$regional,$state,$country,$description);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your show has been edited.";
                print "<br><br>";
                print "<a href='edit_mprofile.php'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the show was not edited at this time.";
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
