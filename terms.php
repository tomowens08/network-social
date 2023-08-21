<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<? 
$sql="select * from terms";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print $data_set["term_text"];
?>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
