<?
if ($_GET['member_id']) {
	include './includes/conn.php';
	$sql = "UPDATE members SET online = '".time()."' WHERE member_id = '".$_GET['member_id']."'";
	@mysql_query($sql);
	@mysql_close();

	$cont = implode('',file('./user_images/test.txt'));
	if (!$cont) $cont = 1;
	$fp = fopen('./user_images/test.txt','w');
	$cont++;
	fputs($fp,$cont,strlen($cont));
	fclose($cont);
}
?>
