<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
<?php
    include("includes/events.class.php");
    include("includes/people.class.php");

    $events=new events;
    $people=new people;
?>

<table width="720" border="0" cellspacing="0" cellpadding="5" bgcolor="white">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor=white>
<tr>
<td><font class='txt_label'>Events </td>
<td width="50%" align="right">
<a class="man" href="events.php">Events Home</a> &nbsp;|&nbsp;
<a href="create_event.php" class="man">Create Event</a> &nbsp;|&nbsp;
</td>
</tr>

</table>
</td>
</tr>

<table>
<table width="720" border="0" cellspacing="0" cellpadding="5" bgcolor="white">
<tr>
<td>
<table width="720" align="center" border="0" cellspacing="0" cellpadding="5" bgcolor="f5f5f5">
<tr>

<td  align="left" VALIGN="top" width=750>
<?php
     $event_set=$events->get_event($HTTP_GET_VARS["event_id"]);
     $event_by=$events->get_event_creator($HTTP_GET_VARS["event_id"]);
?>

<table width="100%" border="0" cellpadding="1" cellspacing="0" class="dark_b_border2">
<tr>
<td  valign="top">
<table width="100%" border="0" cellpadding="1" cellspacing="0">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr align="center">
<td class='dark_blue_white2'><?=$event_set["event_name"]?></td>
</tr>
</table>
</td>
</tr>

<?php
     $num_images=$people->get_num_images($event_by);
     if($num_images==0)
     {
         $gender=$people->check_gender($event_by);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($event_by);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
?>
<tr>
<td valign="top" width="100%">
<table width="100%" border="0" cellpadding="5" cellspacing="5" bgcolor="ffffff">
<tr>
<td align="left" class='txt_label' valign="top" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="170" valign="top"><p>
<?=$image?>
</td>
<td width="5" class='txt_label' valign="top">
<img src="images/1by1.gif" width="5" height="1">
</td>
<td width="275" valign="top">
<p><font class='txt_label'><strong>Posted By:<br>
</strong><a href="view_profile.php?member_id=<?=$event_by?>" target="_blank"><?=$name?></a></font><br>
</p>
<p class='txt_label'><strong>Hosted By:</strong><br>
<?=$event_set["organizer"]?><br>
<a href="<?=$event_set["email"]?>" class="man">e-mail</a>
</p>
<p class='txt_label'><strong>When:</strong><br><?=$event_set["start_month"]?>/<?=$event_set["start_day"]?>/<?=$event_set["start_year"]?>
<br> at <?=$event_set["start_hour"]?>:<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?><br>
<p class='txt_label'><strong>Where:<br></strong>
<?=$event_set["place"]?><br>
<?=$event_set["address"]?><br>
<?=$event_set["state"]?> <?=$event_set["zip"]?><br>
<?=$event_set["country"]?>
</p>
</td>
</tr>
</table>

<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="ffffff">
<tr>
<td class='txt_label'>
<br><strong><?=$event_set["long_desc"]?></strong>
</td>
</tr>
</table>
</td>
<td align="right" valign="top" width="300" >
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" align="left">


</div>
</td>
</tr>
</table>
</td>
</tr>
</table>

<!-- End -->
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
