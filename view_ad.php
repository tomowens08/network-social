<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<script language="JavaScript">
function confirmDelete()
{
	if(confirm("Are you sure you want to delete?"))
	{
		document.deleteForm.submit();
	}
}
</script>
<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
    $ad_id=$HTTP_GET_VARS["id"];
    
    $res=$class->update_counter($ad_id);
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
     $ad_info=$class->get_ad($ad_id);
     $cat_info=$class->get_cat($ad_info["cat_id"]);

     $people=new people;
     $name=$people->get_name($ad_info["member_id"]);
     $num_images=$people->get_num_images($ad_info["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($ad_info["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }

?>


<td valign="top" width="680">
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td><font size="2"><b>Classifieds<br>Listing #<?=$ad_info["id"]?></b></font></td>
<td align="right" valign="bottom">
<a href="view_classifieds.php?cat_id=<?=$ad_info["cat_id"]?>">Back to '<?=$cat_info["cat_name"]?>' &gt;&gt;</a>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">
<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="E8F1FA"><span class=blacktext10>Posted By:</span></td>
<td width="86%">
<a href="view_profile.php?member_id=<?=$ad_info["member_id"]?>">
<?=$image?>
</a>
<span class="text">
<a href="view_profile.php?member_id=<?=$ad_info["member_id"]?>"><?=$name?></a>
</span>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA"><span class=blacktext10>Date:</span></td>
<td width="86%"><font size="2" face="verdana"><?=$ad_info["posted_on"]?></font>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA"><span class=blacktext10>Subject:</span></td>
<td width="86%"><font size="2" face="verdana"><?=$ad_info["subject"]?></font></td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="E8F1FA"><span class=blacktext10>Body:</span></td>
<td width="86%"><span class="blacktextnb10"><font size="2"  face="verdana">
<?=$ad_info["message"]?>
</span></td>
</tr>
</table>
<br>
<?php
     $creator=$class->get_ad_creator($ad_id);
     if($creator!=$_SESSION["member_id"])
     {
?>
<table border="0" cellspacing="0" cellpadding="0">
<form action="send_message.php?member_id=<?=$creator?>" method="post" name="deleteForm" id="deleteForm">
<tr>
<td>
<input type="submit" value="-Send A Message-">
<br><br><br><br>
</td>
</tr>
</form>
</table>
<?php
     }
?>


<?php
     $creator=$class->get_ad_creator($ad_id);
     if($creator==$_SESSION["member_id"])
     {
?>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width='50%'>
<form action="delete_ad.php?id=<?=$ad_id?>" method="post" name="deleteForm" id="deleteForm">
<input type="submit" value="-Delete-" onclick="confirmDelete();">
</form>
</td>
<td width='50%'>
<form action="send_message.php?member_id=<?=$ad_info["member_id"]?>" method="post" name="deleteForm" id="deleteForm">
<input type="submit" value="-Send Message-">
</form>

</td>
</tr>
</table>
<?php
     }
?>
</td>
</tr>
</table>



<!-- End -->
<!-- middle_content -->


<!-- Middle Text -->
<?php
    include("includes/bottom.php");
?>
