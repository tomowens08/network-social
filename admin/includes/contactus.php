<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
include("conn.php");
$sql="select contact_us from contact_us";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["contact_us"];
?>
</BODY>
</HTML>
