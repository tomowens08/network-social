<HTML>
<HEAD>
</HEAD>
<BODY bgcolor='#ffffff'>
<? 
$sql="select disclaimer_text from disclaimer";
include("conn.php");
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["disclaimer_text"];
?>
</BODY>
</HTML>
