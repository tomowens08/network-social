<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
<td class='dark_blue_white2'>Classifieds Listings
</td></tr>

<tr><td>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td class='txt_label' height="24"><b>Date</b></td>
<td class='txt_label' height="24"><b>Subject</b></td>
<td class='txt_label' height="24"><b>Views</b></td>
</tr>

<?php
     $listing_res=$class->get_cat_sub_listings($HTTP_GET_VARS["cat_id"],$HTTP_GET_VARS["sub_id"]);
     while($listing_set=mysql_fetch_array($listing_res))
     {
         $name=$people->get_name($listing_set["member_id"]);
?>

<tr bgcolor="ffffff" class="text11">
<td align="center" class='txt_label' valign="top"><?=$listing_set["posted_on"]?></td>
<td class='txt_label' width="90%">
<a href="view_ad.php?id=<?=$listing_set["id"]?>" class="mailtext"><?=$listing_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$listing_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td  class='txt_label' align="center"><?=$listing_set["views"]?></td>
</tr>
<?php
     }
?>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>


<!-- middle_content -->

</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>

<!-- Middle Text -->
<?php
}
include("includes/bottom.php");
?>
