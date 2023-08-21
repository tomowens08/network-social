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

<table width="800" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<?php
     include("includes/class_side.php");
?>

<td valign="top" width="680">
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'><font size="2"><b>Classifieds<br>Listings for 'My Listings'</b></font></td>
<td align="right" valign="bottom">
<a href="classified.php">Back to Classifieds &gt;&gt;</a>
</td>
</tr>
</table>

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
     $listing_res=$class->get_my_listings($_SESSION["member_id"]);
     while($listing_set=mysql_fetch_array($listing_res))
     {
         $name=$people->get_name($listing_set["member_id"]);
?>

<tr bgcolor="ffffff" class="text11">
<td align="center" valign="top"><?=$listing_set["posted_on"]?></td>
<td width="90%">
<a href="view_ad.php?id=<?=$listing_set["id"]?>" class="mailtext"><?=$listing_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$listing_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td align="center"><?=$listing_set["views"]?></td>
</tr>
<?php
     }
?>

</td>
</tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
 }
include("includes/bottom.php");
?>
