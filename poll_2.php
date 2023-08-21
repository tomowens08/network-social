<?php
// set cookie
$cookie_life = time() + 31536000;
setcookie('voted1','1',$cookie_life);

// post var
$sP_choice = $_POST['choice'];

mysql_connect("mysql167.secureserver.net","nx5poll","123456");
@mysql_select_db("nx5poll") or die( "Unable to select database");


// query
$sQ_poll = "SELECT * FROM `nx5poll_poll` WHERE `pid` = '1'";
$sR_poll = mysql_query($sQ_poll);

// get vars
$sM_total = mysql_result($sR_poll,0,'total');
$sM_0 = mysql_result($sR_poll,0,'0');
$sM_1 = mysql_result($sR_poll,0,'1');
$sM_2 = mysql_result($sR_poll,0,'2');

// increment total votes
$sM_total+=1;

// increment user vote
if ( $sP_choice == 0 ) {
	$sM_0+=1; }
elseif ( $sP_choice == 1 ) { $sM_1+=1; }
elseif ( $sP_choice == 2 ) { $sM_2+=1; }
else { echo ''; }

// update DB
mysql_query("UPDATE `nx5poll_poll` SET `total` ='$sM_total', `0` ='$sM_0', `1` ='$sM_1', `2` ='$sM_2' WHERE `pid` ='1'");


// close mysql
mysql_close();

// exit
$sS_ref = "$HTTP_REFERER";
header('Location:' . $sS_ref);
exit();
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>NX5ware - opinion poll</title>
</head>

<body>

</body>
</html>