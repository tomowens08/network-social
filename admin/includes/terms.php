<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
$sql="select term_text from terms";
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["term_text"];
?>
</BODY>
</HTML>
