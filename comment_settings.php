<?php
  session_start();
?>
<?php
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

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' width='100%' class='dark_blue_white2'>";
  print "<h3>Settings</h3>";
  print "</td></tr>";

  include("includes/profile.class.php");
  $profile = new profile;
// Upload Image Code
	$sql = "SELECT * FROM members WHERE member_id = '".$_SESSION['member_id']."'";
	$mem = mysql_fetch_array(mysql_query($sql));

?>
	<tr valign="top">
		<td align="center" colspan="2">
		<table class="txt_label" border="0" align="center" cellpadding="0" cellspacing="0">
		<form name='UploadImages' action='comment_settings1.php' method='post'>
		<tr class="txt_label">
			<td colspan="2"><b>Time settings:</td>
		</tr>
		<tr class="txt_label">
			<td align="right">Timezone:</td>
			<td align="left">&nbsp;
			<select name="gmt">
			
<?
$gmt = array(
	'-12' => 'GMT-12:00 Eniwetok, Kwajalein',
	'-11' => 'GMT-11:00 Midway Island, Samoa',
	'-10' => 'GMT-10:00 Hawaii',
	'-9' => 'GMT-09:00 Alaska',
	'-8' => 'GMT-08:00 Pacific Time (US &amp; Canada); Tijuana',
	'-7' => 'GMT-07:00 Mountain Time (US &amp; Canada)',
	'-7.01' => 'GMT-07:00 Arizona',
	'-6' => 'GMT-06:00 Central Time (US &amp; Canada)',
	'-6.01' => 'GMT-06:00 Mexico City, Tegucigalpa',
	'-6.001' => 'GMT-06:00 Saskatchewan',
	'-5' => 'GMT-05:00 Eastern Time (US &amp; Canada)',
	'-5.01' => 'GMT-05:00 Bogota, Lima',
	'-5.001' => 'GMT-05:00 Indiana (East)',
	'-4.01' => 'GMT-04:00 Atlantic Time (Canada)',
	'-4.001' => 'GMT-04:00 Caracas, La Paz',
	'-3.5' => 'GMT-03:30 Newfoundland',
	'-3' => 'GMT-03:00 Brasilia',
	'-3.01' => 'GMT-03:00 Buenos Aires, Georgetown',
	'-2' => 'GMT-02:00 Mid-Atlantic',
	'-1' => 'GMT-01:00 Azores, Cape Verde Island',
	'0' => 'GMT (Greenwich Mean Time) Dublin, Edinburgh, London',
	'1' => 'GMT+01:00 Berlin, Stockholm, Rome, Bern, Brussels',
	'1.01' => 'GMT+01:00 Lisbon, Warsaw',
	'1.001' => 'GMT+01:00 Paris, Madrid',
	'1.0001' => 'GMT+01:00 Prague',
	'2' => 'GMT+02:00 Athens, Helsinki, Istanbul',
	'2.01' => 'GMT+02:00 Cairo',
	'2.001' => 'GMT+02:00 Eastern Europe',
	'2.0001' => 'GMT+02:00 Harare, Pretoria',
	'2.00001' => 'GMT+02:00 Israel',
	'3' => 'GMT+03:00 Moscow, St. Petersburg, Volgograd',
	'3.01' => 'GMT+03:00 Baghdad, Kuwait, Nairobi, Riyadh',
	'3.001' => 'GMT+03:30 Tehran',
	'4' => 'GMT+04:00 Abu Dhabi, Muscat, Tbilisi, Kazan',
	'4.5' => 'GMT+04:30 Kabul',
	'5' => 'GMT+05:00 Islamabad, Karachi',
	'5.01' => 'GMT+05:00 Sverdlovsk, Tashkent',
	'5.5' => 'GMT+05:30 Bombay, Calcutta, Madras, New Delhi',
	'6' => 'GMT+06:00 Almaty, Dhaka',
	'7' => 'GMT+07:00 Krasnoyarsk',
	'7.01' => 'GMT+07:00 Bangkok, Jakarta, Hanoi',
	'8' => 'GMT+08:00 Beijing, Chongqing, Urumqi',
	'8.01' => 'GMT+08:00 Hong Kong SAR, Perth, Singapore, Taipei',
	'9' => 'GMT+09:00 Tokyo, Osaka, Sapporo, Seoul, Yakutsk',
	'9.5' => 'GMT+09:30 Adelaide',
	'9.5' => 'GMT+09:30 Darwin',
	'10' => 'GMT+10:00 Brisbane, Melbourne, Sydney',
	'10.01' => 'GMT+10:00 Vladivostok',
	'10.001' => 'GMT+10:00 Guam, Port Moresby',
	'11' => 'GMT+11:00 Hobart',
	'12' => 'GMT+12:00 Magadan, Solomon Islands, New Caledonia',
	'12.01' => 'GMT+12:00 Kamchatka',
	'12.001' => 'GMT+12:00 Fiji Islands, Marshall Islands',
	'12.0001' => 'GMT+12:00 Wellington, Auckland'
);

	foreach ($gmt as $k => $v) {
		if ($mem['gmt'] == $k)
			$opt = '<option selected value="'.$k.'">'.$v;
		else
			$opt = '<option value="'.$k.'">'.$v;
		echo $opt;
	}
?>		</select>			</td>
		</tr>
		<tr class="txt_label">
		  <td colspan="2">&nbsp;</td>
		  </tr>
		<tr class="txt_label">
		  <td colspan="2"><div align="left"><a href="/change_email.php">Change email</a> </div></td>
		  </tr>
		<tr class="txt_label">
		  <td colspan="2">&nbsp;</td>
		  </tr>
		<tr class="txt_label">
			<td colspan="2"><b>Comments settings:</td>
		</tr>
		<tr class="txt_label">
			<td align="right"><input type='radio' <?if ($mem['comment_setting']) echo 'checked';?> name='comment_setting' value='1'></td>
			<td align="left">Allow all users to add comment</td>
		</tr>
		<tr class="txt_label">
			<td align="right"><input type='radio' <?if (!$mem['comment_setting']) echo 'checked';?> name='comment_setting' value='0'></td>
			<td align="left">Allow only friends to add comment</td>
		</tr>
		<tr class="txt_label">
			<td>&nbsp;</td>
		</tr>
		<tr class="txt_label">
			<td colspan="2"><b>Visibility settings:</td>
		</tr>
		<tr class="txt_label">
			<td align="right"><input type="checkbox" <?=($mem['view_online']?'checked':'')?> name="view_online" value="1"></td>
			<td align="left">Allow users to see my 'Online' status</td>
		</tr>
		<tr class="txt_label">
			<td>&nbsp;</td>
		</tr>
		<tr class="txt_label">
			<td colspan="2"><b>I want to receive notifications for the following:</td>
		</tr>
		<tr>
			<td align="right"><input type="checkbox" <?if ($mem['notif_message']) echo 'checked';?> name="notif_message" value="1"></td>
			<td>Messages</td>
		</tr>
		<tr>
			<td align="right"><input type="checkbox" <?if ($mem['notif_comment']) echo 'checked';?> name="notif_comment" value="1"></td>
			<td>Comments</td>
		</tr>
			<tr>
			<td align="right"><input type="checkbox" <?if ($mem['notif_journal']) echo 'checked';?> name="notif_journal" value="1"></td>
			<td>Journal</td>
		</tr>
		<tr>
			<td align="right"><input type="checkbox" <?if ($mem['notif_friend_request']) echo 'checked';?> name="notif_friend_request" value="1"></td>
			<td>Friends Requests</td>
		</tr>
		<tr>
			<td align="right"><input type="checkbox" <?if ($mem['notif_group_invitation']) echo 'checked';?> name="notif_group_invitation" value="1"></td>
			<td>Group Invitations</td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type='submit' <?if ($mem['']) echo 'checked';?> name='submit' value='Save Changes'></td>
		</tr>
		</form>
		</table>
		</td>
	</tr>
<?
    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
