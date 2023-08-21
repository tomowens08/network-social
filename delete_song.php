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
$music = new music;


            // shows
            $id=$HTTP_GET_VARS["id"];

            $res = $music->delete_song($id);

            if($res==1)
            {
								$sql = "SELECT music FROM members WHERE member_id = ".$_SESSION['member_id'];
								$res = mysql_fetch_array(mysql_query($sql));
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your song has been deleted.";
                print "<br><br>";
								if ($res['music'])
	                print "<a href='edit_mprofile.php?type=songs'><<< Back >>></a>";
 								else
									print "<a href='edit_profile.php?type=song'><<< Back >>></a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the show was not deleted at this time.";
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
