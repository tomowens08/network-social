<?php
  session_start();

if (count($_POST)) {
	$_POST['with_photo'] = intval($_POST['with_photo']);
	$_SESSION['browse_bands'] = count($_POST)?$_POST:$_SESSION['browse_bands'];
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}
function Distance($latitude1, $longitude1, $latitude2, $longitude2)
{
 	$pi = 3.14159265358979323846;
	$EARTH_RADIUS = 3963.205; # diameter/2 in miles
  
	$dist = 0;
  $latitude1 = $latitude1 * $pi / 180; #turn each from radians to degrees
  $longitude1 = $longitude1 * $pi / 180;
  $latitude2 = $latitude2 * $pi / 180;
  $longitude2 = $longitude2 * $pi / 180;

  if(($latitude1 != $latitude2) || ($longitude1 != $longitude2)){
    $dist = (sin($latitude1) * sin($latitude2)) + (cos($latitude1) * cos($latitude2)) * cos($longitude2 - $longitude1);
    $dist = $EARTH_RADIUS * (-1 * atan2($dist / sqrt(1 - $dist * $dist), 1) + $pi / 2);
  }

  return sprintf("%.1f", $dist);
}


if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{

include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
include("includes/people.class.php");

include("includes/profile.class.php");
$profile=new profile;

$people = new people;
$mem_id = $_GET['member_id']?$_GET['member_id']:$_SESSION['browse_bands']['member_id'];
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>

<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
//    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
?>


<script language="JavaScript" type="text/javascript">
<!--

function checkcountry() {
	var CONT = document.form1.countries;
	var countryname = CONT.options[CONT.selectedIndex].value;
	if ((countryname == '1'))
   {
		document.form1.countries.disabled = false;
		document.form1.distances.disabled = false;
		document.form1.postal.disabled = false;
		//document.getElementById('orderby1').disabled = false;
	}
    else
    {
		document.form1.countries.disabled = false;
		document.form1.distances.disabled = true;
		document.form1.postal.disabled = true;
		//document.getElementById('orderby1').disabled = true;
	}
}
//-->
</script>
<table width="100%" cellspacing="0" cellpadding="2" class='dark_b_border2'>
<tr valign="top">
<td width="40%" class='dark_blue_white2'>
<h3><?=$people->get_name($mem_id)?>'s Favorite Bands</h3>
</td>
</tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
<?php
//m - members
//pb - profile_back
$data = array();
$data = $profile->get_bands($mem_id);




if (!count($data)) {
?>
<td align="center">No Users matching your criteria.</td></tr>
<?
} else {


$i = 0;

foreach ($data as $mbr) {
	
	if (!$i)
		echo '<tr valign="top">';
	
	$name = $people->get_name($mbr);

	$num_images = $people->get_num_images($mbr);
?>
<td class="txt_label" align="center"><a href="view_profile.php?member_id=<?=$mbr?>"><?=$name?></a><br>
<?
	if($num_images == 0) {
		
		$gender = $people->check_gender($mbr);
		
		if($gender == "Male")	{
?>
<a href="view_profile.php?member_id=<?=$mbr?>"><img alt='' src='images/male.gif' width='60' height='60' border='0'></a>
<?
		} else {
?>
<a href="view_profile.php?member_id=<?=$mbr?>"><img alt='' src='images/female.gif' width='60' height='60' border='0'></a>
<?
		}

	} else {
		$image_url = $people->get_image($mbr);
		$pic_name = str_replace('user_images/', '', $image_url);
		echo "<a href='view_profile.php?member_id=$mbr[member_id]'><img src='image_gd/image_browse.php?$pic_name' border='0'></a>";
	}
	if ($people->check_online($mbr))
		echo '<br><font color="#ff0000">Online</font>';
	echo '</td>';
	if ($i == 3) {
		echo '</tr>';
		$i = 0;
	} else {
		$i++;
	}
}
for ($j=0;$j<$i;$j++) {
	echo '<td>&nbsp;</td>';
}
if ($j) echo '</tr>';

} //end if count($data)
?>

</table>

<?php


  print "</td></tr></table>";
// Paging Technique

   print "<div align='center'>";

  print "<table width='100%'>";
  print "<tr><td width='100%'><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back</a></td></tr>";
  print "</table>";
  print "</div>";
  print "</td>";
  print "</tr></table>";
?>
<!-- middle_content -->
<!-- Middle Text -->
</table></table>
<?php
include("includes/bottom.php");
}
?>
