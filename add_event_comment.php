<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
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

<tr>
<td valign="top">
<table cellspacing="0" cellpadding="10" border=1 bordercolor="#FF6600" width="100%" align="center">
<tr>
<td valign="top">
<table cellspacing="0" cellpadding="10" border=1 bordercolor="#FF6600" width="100%" align="center">

<?php
     $event_id=$HTTP_GET_VARS["event_id"];
     $comment=$HTTP_POST_VARS["comment"];


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

         $res=$events->add_comment($_SESSION["member_id"], $event_id,$comment);
         if($res==1)
         {
?>

<tr>
<td class='style9'>
    Your comment has been posted.
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
    There was an error and the comment was not posted at this time. Please try again later.
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
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
