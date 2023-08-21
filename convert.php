<?
include './includes/conn.php';

$sql = "SELECT * FROM forum_posts";
$q = mysql_query($sql);

while ($f = mysql_fetch_array($q)) {
	if (ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{1,4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})',$f['posted_on'],$regs)) {
		$date = mktime($regs[4],$regs[5],$regs[6],$regs[1],$regs[2],$regs[3]);
		$sql = "UPDATE forum_posts SET posted_on = '".$date."' WHERE id = ".$f['id'];
		
		mysql_query($sql);
	}
}

$sql = "SELECT * FROM forum_topics";
$q = mysql_query($sql);

while ($f = mysql_fetch_array($q)) {
	if (ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{1,4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})',$f['posted_on'],$regs)) {
		$date = mktime($regs[4],$regs[5],$regs[6],$regs[1],$regs[2],$regs[3]);
		$sql = "UPDATE forum_topics SET posted_on = '".$date."' WHERE id = ".$f['id'];
		
		mysql_query($sql);
	}
}


$sql = "SELECT * FROM journal";
$q = mysql_query($sql);
$months = array();
for ($i=0;$i<12;$i++) {
	$add = 3600*24*30*$i;
	$m_l = date('M',time()+$add);
	$m_n = date('m',time()+$add);
	$months[$m_l] = $m_n;
}

while ($f = mysql_fetch_array($q)) {
	if (ereg('([a-zA-Z]{1,3}) ([a-zA-Z]{1,3}) ([0-9]{1,2}) ([0-9]{1,4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})',$f['journal_date'].' '.$f['journal_time'],$regs)) {
		$date = mktime($regs[5],$regs[6],$regs[7],$months[$regs[2]],$regs[3],$regs[4]);
		$sql = "UPDATE journal SET journal_date = '".$date."' WHERE journal_id = ".$f['journal_id'];
		mysql_query($sql);
	}
}

$sql = "SELECT * FROM journal_comment";
$q = mysql_query($sql);
$months = array();
for ($i=0;$i<12;$i++) {
	$add = 3600*24*30*$i;
	$m_l = date('M',time()+$add);
	$m_n = date('m',time()+$add);
	$months[$m_l] = $m_n;
}

while ($f = mysql_fetch_array($q)) {
	if (ereg('([a-zA-Z]{1,3}) ([a-zA-Z]{1,3}) ([0-9]{1,2}) ([0-9]{1,4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})',$f['journal_date'].' '.$f['journal_time'],$regs)) {
		$date = mktime($regs[5],$regs[6],$regs[7],$months[$regs[2]],$regs[3],$regs[4]);
		$sql = "UPDATE journal_comment SET journal_date = '".$date."' WHERE comment_id = ".$f['comment_id'];
		mysql_query($sql);
	}
}
?>