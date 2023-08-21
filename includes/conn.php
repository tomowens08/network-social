<?php
$allowcur = 'true';
$hostname="localhost";
$dbuser="idevinte_fusn1";
$dbpass="fusn0";
$link = mysql_connect($hostname, $dbuser, $dbpass)
or Die("could'nt connect to my sql database");
$select_database = mysql_select_db("idevinte_fusn1", $link)
or Die("could'nt select database");


$q = "SELECT * FROM settings";
$settings = array();
$sql = mysql_query($q);
while ($f = mysql_fetch_array($sql)) {
	$settings[$f['field_name']] = $f['field_value'];
}

if ($_SESSION['member_id']) {
	$sql = "SELECT gmt FROM members WHERE member_id = '".$_SESSION['member_id']."'";
	$res = mysql_fetch_array(mysql_query($sql));
	$settings[gmt] = $res[gmt];
}

function myDate ($timestamp,$format='m-d-Y H:i:s') {
	
	global $settings;

	return gmdate($format,$timestamp+(3600*$settings['gmt']));

}

$uploaddir = "/home/tomowens/public_html/socialnetwork/user_images/";
$songdir = "/home/tomowens/public_html/socialnetwork/songs/";
$emaildir = "/home/tomowens/public_html/socialnetwork/emails/";
$writedir = "/home/tomowens/public_html/socialnetwork/temp_upload"; 
$mooddir = "/home/tomowens/public_html/socialnetwork/moods/";

$site_location="http://www.idevinteractive.com/socialnetwork";
$site_email="tom0152@hotmail.co.uk";
$email_name="tom0152@hotmail.co.uk'";
$site_url="http://www.idevinteractive.com/socialnetwork";
$site_name="1 Network'";
$net_url="http://www.idevinteractive.com/socialnetwork";
$net_name="1 Network";

$minutes_online = 5;
$month = array();
$month[0]="Jan";
$month[1]="Feb";
$month[2]="Mar";
$month[3]="Apr";
$month[4]="May";
$month[5]="Jun";
$month[6]="Jul";
$month[7]="Aug";
$month[8]="Sep";
$month[9]="Oct";
$month[10]="Nov";
$month[11]="Dec";

$country[0]="United Kingdom";
$country[1]="Anguilla";
$country[2]="Argentina";
$country[3]="Australia";
$country[4]="Austria";
$country[5]="Belgium";
$country[6]="Brazil";
$country[7]="Canada";
$country[8]="Chile";
$country[9]="China";
$country[10]="Costa Rica";
$country[11]="Denmark";
$country[12]="Dominican Republic";
$country[13]="Ecuador";
$country[14]="Finland";
$country[15]="France";
$country[16]="Germany";
$country[17]="Greece";
$country[18]="Hong Kong";
$country[19]="Iceland";
$country[20]="India";
$country[21]="Ireland";
$country[22]="Israel";
$country[23]="Italy";
$country[24]="Jamaica";
$country[25]="Japan";
$country[26]="Luxembourg";
$country[27]="Malaysia";
$country[28]="Mexico";
$country[29]="Monaco";
$country[30]="Netherlands";
$country[31]="New Zealand";
$country[32]="Norway";
$country[33]="Portugal";
$country[34]="Singapore";
$country[35]="South Korea";
$country[36]="Spain";
$country[37]="Sweden";
$country[38]="Switzerland";
$country[39]="Taiwan";
$country[40]="Thailand";
$country[41]="Ukraine";
$country[42]="United States of America";
$country[43]="Uruguay";
$country[44]="Venezuela";

$religion[1]="I will let you know . . .";
$religion[2]="Agnostic";
$religion[3]="Atheist";
$religion[4]="Buddhist";
$religion[5]="Catholic";
$religion[6]="Christian - other";
$religion[7]="Hindu";
$religion[8]="Jewish";
$religion[9]="Mormon";
$religion[10]="Muslim";
$religion[11]="Protestant";
$religion[12]="Other";
$religion[13]="Taoist";
$religion[14]="Wiccan";
$religion[15]="Scientologist";

$income[0]="Mind your own beezwax!";
$income[1]="Less than $30,000";
$income[2]="$30,000 to $45,000";
$income[3]="$45,000 to $60,000";
$income[4]="$60,000 to $75,000";
$income[5]="$75,000 to $100,000";
$income[6]="$100,000 to $150,000";
$income[7]="$150,000 to $250,000";
$income[8]="$250,000 and Higher";

function datediff($date1,$date2)
{
//	echo strtotime($date1).' '.$date1.'<br>';
 $s=strtotime($date2) - strtotime($date1);
 $m=intval($s/60);
 $s=$s%60;
 $h=intval($m/60);
 $m=$m%60;
 $d=intval($h/24);
 $h=$h%24;
 return  trim($d);
}

function GetTodayDate($dateVar)
{
 $tomorrow  = mktime (0,0,0,date("m")  ,date("d")-$dateVar,date("Y"));
 $new=date ("Y-m-d", $tomorrow);
 return  $new;
}
$state = array();
$state[0]="AL";
$state[1]="AK";
$state[2]="AB";
$state[3]="AZ";
$state[4]="AR";
$state[5]="BC";
$state[6]="CA";
$state[7]="CO";
$state[8]="CT";
$state[9]="DE";
$state[10]="DC";
$state[11]="FL";
$state[12]="GA";
$state[13]="HI";
$state[14]="ID";
$state[15]="IL";
$state[16]="IN";
$state[17]="IA";
$state[18]="KS";
$state[19]="KY";
$state[20]="LA";
$state[21]="ME";
$state[22]="MB";
$state[23]="MD";
$state[24]="MA";
$state[25]="MI";
$state[26]="MN";
$state[27]="MS";
$state[28]="MO";
$state[29]="MT";
$state[30]="NE";
$state[31]="NV";
$state[32]="NB";
$state[33]="NH";
$state[34]="NJ";
$state[35]="NM";
$state[36]="NY";
$state[37]="NF";
$state[38]="NC";
$state[39]="ND";
$state[40]="NS";
$state[41]="NU";
$state[42]="OH";
$state[43]="OK";
$state[44]="ON";
$state[45]="OR";
$state[46]="PA";
$state[47]="PE";
$state[48]="QC";
$state[49]="RI";
$state[50]="SK";
$state[51]="SC";
$state[52]="SD";
$state[53]="TN";
$state[54]="TX";
$state[55]="UT";
$state[56]="VT";
$state[57]="VA";
$state[58]="WA";
$state[59]="WV";
$state[60]="WI";
$state[61]="WY";
$state[62]="YT";


$ethnicity[0]="No Answer";
$ethnicity[1]="Asian";
$ethnicity[2]="Black/African descent";
$ethnicity[3]="East Indian";
$ethnicity[4]="Latino/Hispanic";
$ethnicity[5]="Middle Eastern";
$ethnicity[6]="Native American";
$ethnicity[7]="Pacific Islander";
$ethnicity[8]="White/Caucasian";
$ethnicity[9]="Other";

?>
