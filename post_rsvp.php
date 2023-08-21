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


<table cellspacing="0" cellpadding="10" border=1 bordercolor="6699CC" width="100%" align="center">

<?php
     $event_id=$HTTP_GET_VARS["event_id"];
     $response=$HTTP_POST_VARS["response"];
     $comment=$HTTP_POST_VARS["comment"];
     $calender=$HTTP_POST_VARS["calender"];
     $guests=$HTTP_POST_VARS["guests"];


     if($comment==Null)
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

         $res=$events->add_rsvp($_SESSION["member_id"], $event_id,$response,$comment,$calender,$guests);
         if($res==1)
         {
?>

<tr>
<td class='style9'>
    Your rsvp has been posted.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='view_event.php?event_id=<?=$HTTP_GET_VARS["event_id"]?>'>Return to Event</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='style9'>
    There was an error and the rsvp was not posted at this time. Please try again later.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='view_event.php?event_id=<?=$HTTP_GET_VARS["event_id"]?>'>Return to Event</a>
</td>
</tr>
<?php
         }
   }
?>

</table>

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
<?php
}
 include("includes/bottom.php");
?>
