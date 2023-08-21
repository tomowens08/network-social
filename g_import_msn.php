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
include("includes/conn.php")
?>
<?
/*Script Configuration. Read Readme.rtf for guidance.*/
//===================================================================================================================
$cookiepath="/home/content/z/b/e/zbestsolutions/html/mydatinglounge/cookie/";
$scriptlocalpath="cookie/";
$sendmailpath="g_sendmail.php";
//===================================================================================================================

if(intval(@$_POST['update'])==1){
$email=stripslashes(@$_POST['EmailAddress']);
$password=stripslashes(@$_POST['Passwd']);
$output=null;

include("msnimporter.php");

$getdata=getdata($email,$password);
if(!strpos($email,"@")){$email.="@msn.com";}

if(!$getdata){$output="<b>Failed to import addresses. Please check your username &amp; password.</b>";}else{
$getinfo=getinfo($getdata,1);
$getname=getinfo($getdata,0);
$rt=0; $xgct=0;
while($rt!=count($getinfo)){
if($getinfo[$rt+1]!=null){
		$xgct++;
		$output.="<tr><td><input type=\"checkbox\" id=\"email[]\" name=\"email[]\" value=\"".htmlspecialchars($getinfo[$rt+1],ENT_QUOTES)."\" checked></td>
		<td width=\"200\">".htmlspecialchars($getname[$rt+1],ENT_QUOTES)."</td><td width=\"200\" bgcolor=\"#eeeeee\">".htmlspecialchars($getinfo[$rt+1],ENT_QUOTES)."</td></tr>";
}

$rt++;
}

$checkrow="<tr><td colspan=\"3\" bgcolor=\"#cccccc\"><a onclick=\"select_all(1);\" href=\"javascript: void(0);\"><font color=\"#666666\"><b>Select All</b></font></a> | <a onclick=\"select_all(0);\" href=\"javascript: void(0);\"><font color=\"#666666\"><b>Unselect All</b></font></a></td></tr>";

$output="
<form name=\"formlist\" method=\"POST\" action=\"".$sendmailpath."\">
<table border=\"1\" bordercolor=\"#cccccc\" class=stxt cellspacing=\"6\" cellpadding=\"6\" align=\"center\" style=\"border-collapse: collapse\" width=\"450\">".$checkrow.$output.$checkrow."</table>
<br/><span class=\"stxt\">There are a total of <b>".$xgct."</b> emails being imported.</span><br/><br/><input type=\"submit\" id=\"smt\" class=\"stxt\" value=\"Send Invitation\"><input type=\"hidden\" name=\"fromemail\" value=\"".htmlspecialchars($email,ENT_QUOTES)."\"></form>
";

}
}

?><html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Php MSN Address Book Importer</title>
<style><!--
.stxt {font:normal 8pt tahoma, arial, verdana; color:#000;}
form {margin:0px;}
img {border:0px solid;}
body {margin-top:26px; margin-bottom:20px; background-image:url(bg.jpg); background-repeat:repeat-x;}
#smt {
    background-color: #CC3333;
    font: bold 9pt arial,verdana, helvetica, sans-serif;
    color: #fff; cursor: pointer; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #F66 #900 #900 #F66; padding: 2px;
}
--></style>

<script language="Javascript"><!--

function select_all(CheckValue){
	var objCheckBoxes = document.forms['formlist'].elements['email[]'];
	if(!objCheckBoxes)
	return;

	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}

--></script>
</head>

<body>
<div style="text-align:center;">
<img border="0" src="img/msn_logo.jpg" width="132" height="58"></div>
<br/>
<div style="text-align:center; margin:0px auto;">

	<div style="text-align:left; width:350px; margin:0px auto; padding:5px; border:2px solid #ddd; background-image:url(bg.jpg); background-repeat:repeat-x;" class=stxt>
		<div>Welcome to <b>MSN Address Book Importer</b>!<br/>Please enter the username and password:-</div>
		<div><hr noshade color="#DDDDDD" size="1"></div>
		<form method="POST" action="g_import_msn.php">
				<table border="0" cellpadding="2" width="100%" class=stxt cellspacing="2">
					<tr>
						<td>E-mail Address:</td>
						<td>
						<input type="text" name="EmailAddress" style="width:120px;" class=stxt value="<?=htmlspecialchars(stripslashes(@$_POST['EmailAddress']),ENT_QUOTES);?>"> @msn.com</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="Passwd" style="width:100px;" class=stxt></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" id="smt" value="Import Now"></td>
					</tr>
				</table>
				<input type="hidden" name="update" value="1">
		</form>
	</div>
<br/><br/>
<div class=stxt><?=@$output;?></div>

<br/><br/>
</div>
</body>

</html>
<?php
     include("includes/bottom.php");
}
?>