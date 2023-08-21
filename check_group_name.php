<?
header('Content-Type: text/xml');
if ($_GET['name']) {
	include './includes/conn.php';
	$sql = "SELECT count(*) as num FROM groups WHERE group_name LIKE '".$_GET['name']."'";
	$res = mysql_fetch_array(mysql_query($sql));
	@mysql_close();
	/*
	$fp = fopen('./user_images/test.txt','w');
	$cont = $res['num'].' '.$sql;
	fputs($fp,$cont,strlen($cont));
*/
}
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"
  standalone="yes"?>'; ?>
<response>
  <method>checkName</method>
  <result><?=$res['num'];?>
  </result>
</response>
