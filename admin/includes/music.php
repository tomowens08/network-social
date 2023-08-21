<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
$sql="select music_features from pages";
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print stripslashes($data_set["music_features"]);
?>
</BODY>
</HTML>
