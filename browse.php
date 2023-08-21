<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
}
?>

<?php
if (count($_POST)) {
	$_POST['with_photo'] = intval($_POST['with_photo']);
	$_POST['view_online'] = intval($_POST['view_online']);
	$_SESSION['browse'] = $_POST;
	$_SESSION['browse_page'] = '';
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}

$dist = sprintf("%.1f", $dis);

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


?>

<?php
$num_per_row = 5;
$rows_per_page = 6;
$rec_per_page = $num_per_row*$rows_per_page;
$_SESSION['browse_page'] = $_GET['page']?$_GET['page']:($_SESSION['browse_page']?$_SESSION['browse_page']:1);

include("includes/people.class.php");
$people=new people;

include("includes/top.php");
include("includes/conn.php");
include("includes/nav.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<table width="800" bordercolor="#000000" cellspacing=0 cellpadding=0 bgcolor="#ffffff" border="0">

<?php
include("includes/browse_form.php");
?>
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">

<tr>
<td valign="top" align="center">
<table width="800" class='dark_b_border2' cellspacing="0" cellpadding="0">
<tr>
<td class='dark_blue_white2' valign="top">
<b>Search Results</b>
</td>
</tr>
<tr>
<td align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
<?php
//m - members
//pb - profile_back
$sql = array();
if ($_SESSION['browse']['gender'] != 'Both' && $_SESSION['browse']['gender']) {
	$sql[] = "m.gender = '".$_SESSION['browse']['gender']."'";
}

if ($_SESSION['browse']['agefrom']) {
	$sql[] = '('.date('Y',time()).' - m.birth_year) >= '.$_SESSION['browse']['agefrom'];
}

if ($_SESSION['browse']['ageto']) {
	$sql[] = '('.date('Y',time()).' - m.birth_year) <= '.$_SESSION['browse']['ageto'];
}

if (count($_SESSION['browse']['type']) && !@in_array('All',$_SESSION['browse']['type']) && count($_SESSION['browse']['type']) < 3) {
	$tmp = array();
	foreach ($_SESSION['browse']['type'] as $type) {
		$tmp[] = "pb.marital_status = '".$type."'";
	}
	$sql[] = count($tmp)>1?'('.implode(' OR ',$tmp).')':$tmp[0];
}

if (count($_SESSION['browse']['status']) && !@in_array('All',$_SESSION['browse']['status'])) {
	$tmp = array();
	foreach ($_SESSION['browse']['status'] as $status) {
		$tmp[] = "m.here_for like '%".$status."%'";
	}
	$sql[] = count($tmp)>1?'('.implode(' OR ',$tmp).')':$tmp[0];
}

if ($_SESSION['browse']["countries"])
	$sql[] = "m.country = '".$_SESSION['browse']["countries"]."'";


if ($_SESSION['browse']["city"])
	$sql[] = "m.city = '".$_SESSION['browse']["city"]."'";

$_SESSION['browse']['with_photo'] = intval($_SESSION['browse']['with_photo']);

if ($_SESSION['browse']['with_photo'])
	$sql[] = "p.photo_id";

$sql = "SELECT m.* FROM members m LEFT JOIN profile_back pb ON m.member_id = pb.member_id LEFT JOIN photos p ON m.member_id = p.member_id ".(count($sql)?'WHERE '.implode(' AND ',$sql):'').' GROUP BY m.member_id';

$data = array();
$i = 0;
$in = file("data.db");
set_time_limit(0);

switch ($_SESSION['browse']['orderby']) {

	case '1':
		$result = mysql_query($sql);
		$distance = array();
		$data_tmp = array();
		while ($f = mysql_fetch_array($result)) {
			$data_tmp[$f['member_id']] = $f;
          
			$sql = "select zip_code from members where member_id = $f[member_id] AND country = 1";
      $zip_res = mysql_query($sql);
      $zip_set = mysql_fetch_array($zip_res);
			$first = $_SESSION['browse']["postal"];
      $second = $zip_set["zip_code"];
      if($first && $second)	{
				foreach($in as $line)	{
					if((ereg($first, $line)) || (ereg($second, $line))) {
						list($zip, $city, $state, $area, $lat, $long) = split("\|", $line);
            if($first == $zip) {
                $flat = $lat;
                $flong = $long;
						}
            if($second == $zip)	{
							$slat = $lat;
              $slong = $long;
            }
						$distance[$f['member_id']] = true;
					}
        }
      }
      $miles = Distance($flat, $flong, $slat, $slong);

			if ($distance[$f['member_id']]) $distance[$f['member_id']] = $miles;
			else $distance[$f['member_id']] = 'N/A';
		}
		natsort($distance);
		foreach ($distance as $id => $dist) {
			if ($dist <= $_SESSION['browse']['distances'] || !$_SESSION['browse']['distances']) {
				$data[$id] = $data_tmp[$id];
				$data[$id]['distance'] = $dist;
			}
		}
	break;
	case '2':
		$sql .= ' ORDER BY m.views DESC';
		$result = mysql_query($sql);
		while ($f = mysql_fetch_array($result)) {
			$data[$i] = $f;
			$i++;
		}
	break;
	case '3':
		$sql .= ' ORDER BY m.member_id DESC, m.country, m.current_state, m.zip_code';
		$result = mysql_query($sql);
		while ($f = mysql_fetch_array($result)) {
			$data[$i] = $f;
			$i++;
		}
	break;
}



if ($_SESSION['browse']['orderby'] != 1) {

		if ($_SESSION['browse']["postal"]) {
			foreach ($data as $k => $f) {
				$sql = "select zip_code from members where member_id = $f[member_id] AND country = 1";
     		$zip_res = mysql_query($sql);
				$zip_set = mysql_fetch_array($zip_res);
				$first = $_SESSION['browse']["postal"];
     		$second = $zip_set["zip_code"];
     		if($first && $second)	{
					foreach($in as $line)	{
						if((ereg($first, $line)) || (ereg($second, $line))) {
							list($zip, $city, $state, $area, $lat, $long) = split("\|", $line);
          		if($first == $zip) {
           	     $flat = $lat;
           	     $flong = $long;
							}
           	 if($second == $zip)	{
								$slat = $lat;
           	   $slong = $long;
           	 }
							$distance[$f['member_id']] = true;
						}
        	}
      	}
      	$miles = Distance($flat, $flong, $slat, $slong);
				if ($miles > $_SESSION['browse']['distances'] && $_SESSION['browse']['distances'])
					unset($data[$k]);
				else $data[$k]['distance'] = $miles;
			}
		}

}



if (!count($data)) {
?>
<td align="center">No Users matching your criteria.</td></tr>
<?
} else {



$start = ($_SESSION['browse_page']-1)*$rec_per_page;
$end = $_SESSION['browse_page']*$rec_per_page - 1;



foreach ($data as $id => $v) {
	if ($_SESSION['browse']['view_online'] && !$people->check_online($v['member_id'])) {
		unset($data[$id]);
	}
	$i++;
}

$num_records = count($data);
$i = 0;
foreach ($data as $id => $v) {
	if ($i < $start || $i > $end) {
		unset($data[$id]);
	}
	$i++;
}

$i = 0;
foreach ($data as $mbr) {
	
	if (!$i)
		echo '<tr valign="top">';
	
	$name = $people->get_name($mbr['member_id']);

	$num_images = $people->get_num_images($mbr["member_id"]);
?>
<td class="txt_label" align="center"><a href="view_profile.php?member_id=<?=$mbr['member_id']?>"><?=$name?></a><br>
<?
	if (isset($mbr['distance'])) {
		echo 'Miles from '.$_SESSION['browse']['postal'].': '.$mbr['distance'].'<br>';
	}
	if($num_images == 0) {
		
		$gender = $people->check_gender($mbr["member_id"]);
		
		if($gender == "Male")	{
?>
<a href="view_profile.php?member_id=<?=$mbr['member_id']?>"><img alt='' src='images/male.gif' width='60' height='60' border='0'></a>
<?
		} else {
?>
<a href="view_profile.php?member_id=<?=$mbr['member_id']?>"><img alt='' src='images/female.gif' width='60' height='60' border='0'></a>
<?
		}

	} else {
		$image_url = $people->get_image($mbr["member_id"]);
		$pic_name = str_replace('user_images/', '', $image_url);
		echo "<a href='view_profile.php?member_id=$mbr[member_id]'><img src='image_gd/image_browse.php?$pic_name' border='0'></a>";
	}
	if ($people->check_online($mbr['member_id']))
		echo '<br><font color="#ff0000">Online</font>';
	echo '</td>';
	if ($i == ($num_per_row - 1)) {
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
</td>

</tr>
</table>
</td>
</tr>
<tr>

<td valign="top" align="center">

<table border="0" cellspacing="5" cellpadding="0" width="675" bordercolor="#000000">
<tr>
<td colspan="4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align=center>
<?php
        if ($_SESSION['browse_page']-1)
        {
?>
<a href='browse.php?page=<?=($_SESSION['browse_page']-1)?>'>&lt; Previous</a>
<?
        }
        if ($_SESSION['browse_page']*$rec_per_page < $num_records) {
?>
&nbsp;<a href='browse.php?page=<?=($_SESSION['browse_page']+1)?>'>Next &gt;</a>
<?php
				}
?>

</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

		</td>
	</tr>

</table>

<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
