<?php
session_start();
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
include("includes/profile.class.php");
$profile=new profile;

include("includes/class.class.php");
$class=new classified;

include("includes/people.class.php");
$people=new people;

//include("includes/right.php");
?>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
     include("includes/class_side.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Classifieds - View All
</td></tr>

<tr><td>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%" height="80%">
<tr>
<td valign="top">
<table width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="ffffff">

<tr>
<?php

     $sr_no=0;
     $cat_res=$class->get_all_cats();
     while($cat_set=mysql_fetch_array($cat_res))
     {
         if($sr_no%2==0)
         {
             print "</tr><tr>";
         }
         $num_ads=$class->get_num_ads_cat($cat_set["id"]);
?>
<td valign="top" class='txt_label' width="50%">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td height="24" colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class='txt_label'>
<b><?=$cat_set["cat_name"]?></b>
&nbsp;(<a href="view_classifieds.php?cat_id=<?=$cat_set["id"]?>" class="classifiedstext">view all <?=$num_ads?></a>) <br>or select sub category
</td>
<td class='style9' align="right">
<a href="create_listing.php?cat_id=<?=$cat_set["id"]?>" class="classifiedstext">Create Listing</a>
</td>
</tr>
</table>
</td>
</tr>
<?php
     $sub_res=$class->get_all_sub_cats($cat_set["id"]);
     while($sub_set=mysql_fetch_array($sub_res))
     {

?>
<tr bgcolor="ffffff" class='txt_label'>
<td width="100%">
<a href="view_sub_classifieds.php?cat_id=<?=$cat_set["id"]?>&sub_id=<?=$sub_set["id"]?>" class="mailtext"><?=$sub_set["cat_name"]?></a>
</td>
</tr>
<?php
     }
?>
</table>
</td>
<?php
     $sr_no=$sr_no+1;
     }
?>

		</td>
	</tr>
</table>
</table>
</table>


<!-- End -->

<!-- middle_content -->
</blockquote>
</TD>

</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>
<div align="center">
  <!-- Middle Text -->
  <?php
include("includes/bottom.php");
?>
</div>
