<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<?php
include("includes/inc.php");
$sql="select * from business_center where business_id = ".$HTTP_GET_VARS["business_id"];
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["business_details"];
?>
</BODY>
</HTML>

