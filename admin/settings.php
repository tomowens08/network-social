<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{
	include '../includes/conn.php';
	if ($_POST['go']) {
		$sql = "SELECT * FROM settings";
		$q = mysql_query($sql);
		while ($f = mysql_fetch_array($q)) {
			$sql = "UPDATE settings SET field_value = '".$_POST[$f['field_name']]."' WHERE field_name = '$f[field_name]'";

			mysql_query($sql);
		}
		echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
		exit;
	}
  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>Manage Settings</td></tr>";
  print "<tr><td class='textcell'><table width='100%'>";
	$settings = array();
	$sql = "SELECT * FROM settings";
	$q = mysql_query($sql);
	while ($f = mysql_fetch_array($q)) {
		$settings[$f['field_name']] = $f['field_value'];
	}
?>
<table width="100%" align="center">
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<tr>
	<td width="50%" align="right">Redirect unlogged users to Login page:</td>
	<td><input type="checkbox" <?if ($settings['visitor_redirect']) echo 'checked';?> name="visitor_redirect" value="1"></td>
</tr>
<tr>
	<td colspan="2" align="center">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="go" value="Update"></td>
</tr>
</form>
</table>
<?
}
?>