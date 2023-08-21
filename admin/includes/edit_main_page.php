<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
$sql="select * from main_page";
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["main_text"];
?>
</BODY>
</HTML>
