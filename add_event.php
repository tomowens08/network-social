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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_events.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Events
</td></tr>

<tr><td>

<!-- middle_content -->
<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;

     include("includes/events.class.php");
     $events=new events;

?>

<!-- Events Entry -->
<!-- event main table -->

<table cellspacing="0" cellpadding="10" width="100%" align="center">

<?php
     $event_name=$HTTP_POST_VARS["event_name"];
     $event_organizer=$HTTP_POST_VARS["event_organizer"];
     $email=$HTTP_POST_VARS["email"];
     $type=$HTTP_POST_VARS["type"];
     $category=$HTTP_POST_VARS["category"];
     $description=$HTTP_POST_VARS["description"];
     $long_description=$HTTP_POST_VARS["long_description"];
     $month=$HTTP_POST_VARS["month"];
     $day=$HTTP_POST_VARS["day"];
     $year=$HTTP_POST_VARS["year"];
     $hour=$HTTP_POST_VARS["hour"];
     $minute=$HTTP_POST_VARS["minute"];
     $marker=$HTTP_POST_VARS["marker"];
     $location=$HTTP_POST_VARS["location"];
     $address=$HTTP_POST_VARS["address"];
     $city=$HTTP_POST_VARS["city"];
     $state=$HTTP_POST_VARS["state"];
     $zip_code=$HTTP_POST_VARS["zip_code"];
     $country=$HTTP_POST_VARS["country"];

     
     if($event_name==Null||$event_organizer==Null||$event_organizer==Null&&($category_public==Null&&$category_private==Null)&&($city==Null&&$state==Null&&$zip==Null))
     {
?>
<tr>
<td class='txt_label'>
    You did not enter the required fields.
</td>
</tr>

<?php
     }
     else
     {

         $res=$events->add_event($_SESSION["member_id"], $event_name,$event_organizer,$email,$type,$category,$description,$long_description,$month,$day,$year,$hour,$minute,$marker,$location,$address,$city,$state,$zip_code,$country);
         if($res==1)
         {
?>

<tr>
<td class='txt_label'>
    Your event has been posted.
</td>
</tr>
<tr>
<td class='txt_label'>
    <a href='events.php'>Return to Events Home</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='txt_label'>
    There was an error and the event was not posted at this time. Please try again later.
</td>
</tr>
<tr>
<td class='txt_label'>
    <a href='events.php'>Return to Events Home</a>
</td>
</tr>
<?php
         }
   }
?>

</table>

<!-- middle_content -->
</TD>

<!-- middle_content -->
</table>
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
     include("includes/bottom.php");
}
?>
