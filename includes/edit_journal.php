<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
include("conn.php");
$sql="select journal_text from journal where journal_id = $HTTP_GET_VARS[journal_id]";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print mysql_error();
print $data_set["journal_text"];
?>
</BODY>
</HTML>

