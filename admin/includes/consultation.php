<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
include("conn.php");
$sql="select consultation from contact_us";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["consultation"];
?>
</BODY>
</HTML>
