<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
$sql="select * from help";
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["help_text"];
?>
</BODY>
</HTML>
