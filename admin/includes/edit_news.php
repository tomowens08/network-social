<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
$sql="select * from news where news_id = ".$HTTP_GET_VARS["news_id"];
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["news_body"];
?>
</BODY>
</HTML>
