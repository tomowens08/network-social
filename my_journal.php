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
<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>
<tr class='txt_label'>
	<td><a href="view_all_journal.php">Journals</a></td>
</tr>
<tr class='txt_label'>
	<td><a href="my_journal.php">My Journals</a></td>
</tr>
<tr class='txt_label'>
	<td><a href="add_to_journal.php">Post a Journal</a></td>
</tr>
</table>
<?php
     include("includes/right_menu.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Journal Listings
</td></tr>

<tr><td>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">

<tr bgcolor="EFF3FF" >
<td class='txt_label' width='20%' height="24"><b>From</b></td>
<td class='txt_label' width='20%' height="24"><b>Date</b></td>
<td class='txt_label' width='60%' height="24"><b>Subject</b></td>
</tr>

<?php
     $result=mysql_query("select * from journal where journal_of = $_SESSION[member_id]");
     $num_rows=mysql_num_rows($result);

     if($num_rows==0)
     {
?>
<tr>
<td class='txt_label' width='100%' colspan='3'><b>No Journals added yet!</b></td>
</tr>

<tr>
<td class='txt_label' width='100%' colspan='3'><a href='add_to_journal.php'>Add to Journal</a></td>
</tr>

<?php
     }
     else
     {
     $sr_no=$sr_no+1;

     $result=mysql_query("select * from journal where journal_of = $_SESSION[member_id] ORDER BY journal_date DESC");
     while($data_set=mysql_fetch_array($result))
     {
?>
<?php
     $num_images=$people->get_num_images($data_set["journal_of"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($data_set["journal_of"]);
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
        $image_url=$people->get_image($data_set["journal_of"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_browse.php?$pic_name' border='0'>";
     }

     $name=$people->get_name($data_set["journal_of"]);
?>
<tr bgcolor="ffffff" class="text11">
<td align="center" width='20%' class='txt_label' valign="top">
<a href='view_profile.php?member_id=<?=$data_set["journal_of"]?>'>
<?=$image?>
</a>
<br>
<a href='view_profile.php?member_id=<?=$data_set["journal_of"]?>'>
<?=$name?>
</a>
</td>
<td class='txt_label' width='20%'>
<?=myDate($data_set["journal_date"]);?>
</td>
<td  class='txt_label' width='60%' valign='top'>
<a href='view_journal.php?journal_id=<?=$data_set["journal_id"]?>'><?=$data_set["subject"]?></a>
<br>
<?php
     print "[<a href='delete_journal.php?journal_id=$data_set[journal_id]' class='style11'>Delete This Journal</a>]";
?>
</td>
</td>
</tr>

<?php
       $sr_no=$sr_no+1;
     }
?>
<tr>
<td class='txt_label' width='100%' colspan='3'><a href='add_to_journal.php'>Add to Journal</a></td>
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
