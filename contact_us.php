<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<!-- middle_content -->
<?php
     include("includes/packages.class.php");
     $pack=new packages;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="4" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">
<strong>&nbsp;Contact Us</strong></span></div>
</td>
</tr>

<tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?
$sql="select login_text from login_page";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
print stripslashes($data_set["login_text"]);
?>

<!-- middle_content -->

</td></tr>
</table>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
