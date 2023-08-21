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
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>
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
		include("includes/profile.class.php");
		
		$profile = new profile;
    $people = new people;
?>

<!-- Classified Entry -->

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr valign=\"top\">";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

		$ids = $profile->get_friends($_SESSION['member_id']);
		$ids[] = $_SESSION['member_id'];
		
    $sql="select * from journal where journal_id=$HTTP_GET_VARS[journal_id]";
    $journal_res = mysql_query($sql);
    $ad_info = mysql_fetch_array($journal_res);
		
		if (in_array($ad_info['journal_of'],$ids)) {

     $name=$people->get_name($ad_info["journal_of"]);
     $num_images=$people->get_num_images($ad_info["journal_of"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($ad_info["journal_of"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($ad_info["journal_of"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }

?>


<td valign="top" width="680">
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">
<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="E8F1FA" class='txt_label'>Posted By:</td>
<td width="86%">
<a href="view_profile.php?member_id=<?=$ad_info["journal_of"]?>">
<?=$image?>
</a>
<br>
<a href="view_profile.php?member_id=<?=$ad_info["journal_of"]?>"><?=$name?></a>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' bgcolor="E8F1FA">Date:</td>
<td width="86%"><font size="2" face="verdana">
<?=myDate($ad_info["journal_date"]);?></font>
</td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' bgcolor="E8F1FA">Subject:</td>
<td width="86%"><font size="2" face="verdana"><?=$ad_info["subject"]?></font></td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' bgcolor="E8F1FA">Body:</td>
<td width="86%">
<?=$ad_info["journal_text"]?>
</td>
</tr>
</table>
<br>

<table border="0" cellspacing="0" cellpadding="0">
<form action="send_message.php?member_id=<?=$ad_info["journal_of"]?>" method="post" name="deleteForm" id="deleteForm">
<tr>
<td>
<input type="submit" value="-Send A Message-">
<br><br><br><br>
</td>
</tr>
</form>
</table>


</td>
</tr>
</table>

</table>


<!-- End -->
<!-- middle_content -->


<!-- Middle Text -->
<?php
			} else {
?>
	<td valign="top" width="680">&nbsp;
</td>
</tr>
</table>
<?
			}
    }
    include("includes/bottom.php");
?>
