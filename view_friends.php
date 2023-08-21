<?php
  session_start();

if (count($_POST)) {
	$_POST['with_photo'] = intval($_POST['with_photo']);
	$_SESSION['browse_friends'] = count($_POST)?$_POST:$_SESSION['browse_friends'];
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

$people = new people;
$mem_id = $_GET['member_id']?$_GET['member_id']:$_SESSION['browse_friends']['member_id'];
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
<h3><?=$people->get_name($mem_id)?>'s Friends</h3>
</td>
</tr>
</table>

<table width="100%" class='dark_b_border2' cellspacing="0" cellpadding="0">

<tr valign="top">
<td height="98">

<table width="100%" border="0" cellspacing="0" cellpadding="2">
<form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="member_id" value="<?=$mem_id?>">
<tr valign="top">
<td class='txt_label' width="13%" height="74">
<b>Browse for:</b><br>

<input type="Radio" name="gender" <?if($_SESSION['browse_friends']["gender"]=="Both" || !$_SESSION['browse_friends']["browse_gender"]) echo 'checked';?> value="Both"> All<br>
<input type="Radio" name="gender" <?if($_SESSION['browse_friends']["gender"]=="Female") echo 'checked';?> value="Female"> Women<br>
<input type="Radio" name="gender" <?if($_SESSION['browse_friends']["gender"]=="Male") echo 'checked';?> value="Male"> Men<br></td>


<td height="74" width="17%" class='txt_label'>
<b>between Ages:<br><br>
<select name="agefrom" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
if (!$_SESSION['browse_friends']['agefrom']) $_SESSION['browse_friends']['agefrom'] = 15;
if (!$_SESSION['browse_friends']['ageto']) $_SESSION['browse_friends']['ageto'] = 100;

     $sr_no=15;
     while($sr_no<=100)
     {
?>
<option <?if ($_SESSION['browse_friends']['agefrom'] == $sr_no) echo 'selected';?> value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
     $sr_no=$sr_no+1;
     }
?>
</select></font></b> and <b>
<font color="#336699">
<select name="ageto" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
     $sr_no=15;
     while($sr_no<=100)
     {
?>
<option <?if ($_SESSION['browse_friends']['ageto'] == $sr_no) echo 'selected';?> value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
     $sr_no=$sr_no+1;
     }
?>
</select></font></b></td>
<td class='txt_label' width="15%" height="74"><b>who are:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td class='txt_label'>
<?
$type = array(
	'Any' => 'All',
	'Single' => 'S',
	'Married' => 'M',
	'Divorced' => 'D',
	'In a Relationship' => 'R'
);
if (!count($_SESSION['browse_friends']['type'])) $_SESSION['browse_friends']['type'] = array('All');
foreach ($type as $text => $val) {
	if (in_array($val,$_SESSION['browse_friends']['type']))
		echo '<input checked type="Checkbox" name="type[]" value="'.$val.'">'.$text.'<br>';
	else
		echo '<input type="Checkbox" name="type[]" value="'.$val.'">'.$text.'<br>';
}
?>
</td>

</tr>
</table>
</td>
<td class='txt_label' width="15%" height="74"><b>and are here for:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td class='txt_label'>
<?
$status = array(
	'Any' => 'All',
	'Dating' => 'Dating',
	'Relationships' => 'Relationships',
	'Networking' => 'Networking',
	'Friends' => 'Friends'
);
if (!count($_SESSION['browse_friends']['status'])) $_SESSION['browse_friends']['status'] = array('All');
foreach ($status as $text => $val) {
	if (in_array($val,$_SESSION['browse_friends']['status']))
		echo '<input checked type="Checkbox" name="status[]" value="'.$val.'">'.$text.'<br>';
	else
		echo '<input type="Checkbox" name="status[]" value="'.$val.'">'.$text.'<br>';
}
?></td>
</tr>
</table>
</td>
<td align="right">
<table cellpading="0" cellspacing="0" border="0">

<tr>
<td colspan='2' class='txt_label'><b>located within:</b></td>
</tr>
<tr>
<td width="70" class='txt_label'><b>Country:</b></td>
<td>
<select name="countries" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif" onChange="checkcountry()">
<option value='0'>Choose Country</option>
<?
$sql="select * from states order by state_name";
$result = mysql_query($sql);
while($RSUser = mysql_fetch_array($result))
{
    if($_SESSION['browse_friends']["countries"] == $RSUser["state_id"])
    {
     print "<option value='$RSUser[state_id]' selected>".$RSUser["state_name"]."</option>";
    }
    else
    {
     print "<option value='$RSUser[state_id]'>".$RSUser["state_name"]."</option>";
    }
}
?>
</select>
</td>
</tr>
<tr valign="top">
<td class='txt_label' valign='top'><b>Distance:</b><br>(US Only)</td>
<td class='txt_label'>
<select name="distances" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<option value="" selected>Any</option>
<?php
$distances = array(5,10,20,50,100,250);
foreach ($distances as $num) {
	if ($_SESSION['browse_friends']['distances'] == $num)
		echo '<option selected value="'.$num.'">'.$num;
	else
		echo '<option value="'.$num.'">'.$num;
}
?>
</select>
<b>miles of</b>
<input type="text" name="postal" size="10" maxlength="10" value="<?=$_SESSION['browse_friends']['postal']?>" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif"><br></td>
</tr>

<tr>
<td class='txt_label'><b>City:</b></td>
<td><input type="text" name="city" size="20" value="<?=$_SESSION['browse_friends']["city"]?>" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif"></td>
</tr>
<script>checkcountry();</script>

</table>
<?
if (!isset($_SESSION['browse_friends']['with_photo'])) $_SESSION['browse_friends']['with_photo'] = 1;
?>
</td>
<td class="txt_label"><b>with photo:</b><br><input <?if (($_SESSION['browse_friends']['with_photo'])) echo 'checked';?> type="checkbox" name="with_photo" value="1">&nbsp;Yes
	<br><br>
	<b>online only:</b><br><input <?if (($_SESSION['browse_friends']['view_online'])) echo 'checked';?> type="checkbox" name="view_online" value="1">&nbsp;Yes</td>
</tr>

</table>
</td>
</tr>
</table>

<table width="802" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr valign="middle">
<td width="600" class='dark_blue_white2'>
<font color="#000000"><b>
<font size="1">
&nbsp;Sort Results by:
<?
if (!$_SESSION['browse_friends']['orderby']) $_SESSION['browse_friends']['orderby'] = 2;
?>
<input type="radio" id="orderby1" name="orderby" <?if ($_SESSION['browse_friends']['orderby'] == 1) echo 'checked';?> value="1"> Closest to you &nbsp;&nbsp;&nbsp;</font></b></font>
<font color="#000000"><b><font size="1">
<input type="radio" name="orderby" <?if ($_SESSION['browse_friends']['orderby'] == 2) echo 'checked';?> value="2"> Most popular</font><font color="#000000"><b>
<font size="1"> &nbsp;&nbsp;&nbsp;</font></b></font><font color="#000000"><b>
<font size="1">
<input type="radio" name="orderby" <?if ($_SESSION['browse_friends']['orderby'] == 3) echo 'checked';?> value="3"> New to <?=$site_name?></font></b></font></b>
</font></td>
<td width="131" class='dark_blue_white2'><div align="right">
<input value="Update" class="txt_topic" type="submit" width="70" height="26" border="0"></div></td>
</tr>
</table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
<?php
//m - members
//pb - profile_back
$sql = array();
if ($_SESSION['browse_friends']['gender'] != 'Both' && $_SESSION['browse_friends']['gender']) {
	$sql[] = "m.gender = '".$_SESSION['browse_friends']['gender']."'";
}

if ($_SESSION['browse_friends']['agefrom']) {
	$sql[] = '('.date('Y',time()).' - m.birth_year) >= '.$_SESSION['browse_friends']['agefrom'];
}

if ($_SESSION['browse_friends']['ageto']) {
	$sql[] = '('.date('Y',time()).' - m.birth_year) <= '.$_SESSION['browse_friends']['ageto'];
}

if (count($_SESSION['browse_friends']['type']) && !@in_array('All',$_SESSION['browse_friends']['type']) && count($_SESSION['browse_friends']['type']) < 3) {
	$tmp = array();
	foreach ($_SESSION['browse_friends']['type'] as $type) {
		$tmp[] = "pb.marital_status = '".$type."'";
	}
	$sql[] = count($tmp)>1?'('.implode(' OR ',$tmp).')':$tmp[0];
}

if (count($_SESSION['browse_friends']['status']) && !@in_array('All',$_SESSION['browse_friends']['status'])) {
	$tmp = array();
	foreach ($_SESSION['browse_friends']['status'] as $status) {
		$tmp[] = "m.here_for like '%".$status."%'";
	}
	$sql[] = count($tmp)>1?'('.implode(' OR ',$tmp).')':$tmp[0];
}

if ($_SESSION['browse_friends']["countries"])
	$sql[] = "m.country = '".$_SESSION['browse_friends']["countries"]."'";


if ($_SESSION['browse_friends']["city"])
	$sql[] = "m.city = '".$_SESSION['browse_friends']["city"]."'";

$_SESSION['browse_friends']['with_photo'] = intval($_SESSION['browse_friends']['with_photo']);

if ($_SESSION['browse_friends']['with_photo'])
	$sql[] = "p.photo_id";

$sql[] = "(mf.member_id = ".$mem_id." OR mf.friend_id = ".$mem_id.") AND mf.approve";
$sql[] = "m.member_id <> ".$mem_id;
$sql[] = "NOT mf.deleted";

$sql = "SELECT m.* FROM
				members m LEFT JOIN profile_back pb ON m.member_id = pb.member_id LEFT JOIN photos p ON m.member_id = p.member_id LEFT JOIN invitations mf ON (m.member_id = mf.friend_id OR m.member_id = mf.member_id)
				".(count($sql)?'WHERE '.implode(' AND ',$sql):'').' GROUP BY m.member_id';

$data = array();
$i = 0;
$in = file("data.db");
set_time_limit(0);

switch ($_SESSION['browse_friends']['orderby']) {
	case '1':
		$result = mysql_query($sql);
		$distance = array();
		$data_tmp = array();
		while ($f = mysql_fetch_array($result)) {
			$data_tmp[$f['member_id']] = $f;
          
			$sql = "select zip_code from members where member_id = $f[member_id] AND country = 1";
      $zip_res = mysql_query($sql);
      $zip_set = mysql_fetch_array($zip_res);
			$first = $_SESSION['browse_friends']["postal"];
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
			if ($dist <= $_SESSION['browse_friends']['distances'] || !$_SESSION['browse_friends']['distances']) {
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

if ($_SESSION['browse_friends']['orderby'] != 1) {

		if ($_SESSION['browse_friends']["postal"]) {
			foreach ($data as $k => $f) {
				$sql = "select zip_code from members where member_id = $f[member_id] AND country = 1";
     		$zip_res = mysql_query($sql);
				$zip_set = mysql_fetch_array($zip_res);
				$first = $_SESSION['browse_friends']["postal"];
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
				if ($miles > $_SESSION['browse_friends']['distances'] && $_SESSION['browse_friends']['distances'])
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

foreach ($data as $id => $v) {
	if ($_SESSION['browse_friends']['view_online'] && !$people->check_online($v['member_id'])) {
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
		echo 'Miles from '.$_SESSION['browse_friends']['postal'].': '.$mbr['distance'].'<br>';
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
	if ($people->check_online($mbr["member_id"]))
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
