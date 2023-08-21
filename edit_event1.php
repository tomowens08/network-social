<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>
<?php
    include("includes/events.class.php");
    include("includes/people.class.php");

    $events=new events;
    $people=new people;
?>

<!-- Classified Entry -->

<table width="720" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor=white>
<tr>
<td><font class="blacktext10">Events </td>
<td width="50%" align="right">

</td>
</tr>
</table>
</td>
</tr>

<tr>
<td valign="top">
<table cellspacing="0" cellpadding="10" border=1 bordercolor="6699CC" width="100%" align="center">
<tr>
<td valign="top">
<table cellspacing="0" cellpadding="10" border=1 bordercolor="6699CC" width="100%" align="center">

<?php
     $event_name=$HTTP_POST_VARS["event_name"];
     $event_organizer=$HTTP_POST_VARS["event_organizer"];
     $email=$HTTP_POST_VARS["email"];
     $type=$HTTP_POST_VARS["type"];
     $category_public=$HTTP_POST_VARS["category"];
     $category_private=$HTTP_POST_VARS["category_private"];
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
<td class='style9'>
    You did not enter the required fields.
</td>
</tr>

<?php
     }
     else
     {
         if($type==1)
         {
             $category=$category_public;
         }
         else
         {
             $category=$category_private;
         }

         $res=$events->edit_event($HTTP_GET_VARS["event_id"],$_SESSION["member_id"], $event_name,$event_organizer,$email,$type,$category,$description,$long_description,$month,$day,$year,$hour,$minute,$marker,$location,$address,$city,$state,$zip_code,$country);
         if($res==1)
         {
?>

<tr>
<td class='style9'>
    Your event has been edited.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='events.php'>Return to Events Home</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='style9'>
    There was an error and the event was not posted at this time. Please try again later.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='events.php'>Return to Events Home</a>
</td>
</tr>
<?php
         }
   }
?>

</table>

</table>

<!-- End -->
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
     include("includes/bottom.php");
}
?>
