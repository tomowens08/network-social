<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
?>

<!-- Classified Entry -->

<table width="830" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/class_side.php");
?>

<td valign="top" width="680">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
<td class='txt_label'><font size="2"><b>Classifieds<br>Listings for Search</b></font></td>
<td align="right" valign="bottom">
<a href="classified.php">Back to Classifieds &gt;&gt;</a>
</td>
</tr>
</table>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td>
<form name='search' action='search_class.php' action='get'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="text11">
<td align="right">Category:&nbsp;</td>
<td>
<select name="cat_id">
<option value="0">Any</option>
<?php
     $cat_res=$class->get_all_cats();
     while($cat_set=mysql_fetch_array($cat_res))
     {
?>
<option value="<?=$cat_set["id"]?>"><?=$cat_set["cat_name"]?></option>
<?php
     }
?>
</select>&nbsp;&nbsp;Keyword:&nbsp;<input type="text" name="keyword" value="">
</td>
<td><input type="submit" value="Search"></td>
</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="text11">
<td align="right">AND:&nbsp;</td>
<td>
<select name="distance">
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="500">500</option>
</select>
&nbsp;&nbsp;miles of&nbsp;
<input type="text" name="postal" size="10" maxlength="5" value="">
&nbsp;&nbsp;(enter Zip Code)&nbsp;
</td>
<td align="right">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</form>


<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td class='txt_label' height="24"><b>Date</b></td>
<td class='txt_label' height="24"><b>Subject</b></td>
<td class='txt_label' height="24"><b>Views</b></td>
</tr>

<?php
     $listing_res=$class->get_listings($HTTP_GET_VARS["cat_id"]);
     while($listing_set=mysql_fetch_array($listing_res))
     {
         $name=$people->get_name($listing_set["member_id"]);
?>

<tr bgcolor="ffffff" class="text11">
<td class='txt_label' align="center" valign="top"><?=$listing_set["posted_on"]?></td>
<td class='txt_label' width="90%">
<a href="view_ad.php?id=<?=$listing_set["id"]?>" class="mailtext"><?=$listing_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$listing_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td class='txt_label' align="center"><?=$listing_set["views"]?></td>
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

<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
