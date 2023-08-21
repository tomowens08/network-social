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


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor=B1D0F0>
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="1" bordercolor="#B1D0F0" bgcolor=FFFFFF>
<TR>
<TD align=center>
<table width="100%" bgcolor=B1D0F0>
<tr>
<td class='white'>&nbsp;&nbsp;
<b>My Events</b>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="3" bgcolor=B1D0F0>
<tr>
<td>
<table width="100%" border="" bordercolor="White" cellpadding=5 bgcolor="FFFFFF" valign="top">
<tr align="center">
<TD>
<strong><font face='Verdana' color="#FF6600">&laquo;</font></strong>
<a href="past_events.php">View past events</a> |
<strong><font face='Verdana' color="#000000" size='2'><a href="my_events.php">View upcoming  events</a></font></strong>
<strong><font color="##FF0000">&raquo;</font></strong>
</td>
</tr>
</table>
</td>
</tr>
</table><br>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td align=right>
<a href="all_my_events.php">All My Events</a> &nbsp;|&nbsp;
<font face='Verdana' color="#000000" size='2'>Events I've Posted</a>&nbsp;|&nbsp;</font>
<a href="attending_events.php" class="man">Events I'm Attending</a>
</TD>
</TR>
</table>
<table border='1' width="100%" border="0" cellspacing="0" cellpadding="5" bordercolor="#C0C0C0" style='border-collapse: collapse'>
<?php
     $num_events=$events->get_num_my_events($_SESSION["member_id"]);
     if($num_events==0)
     {
?>
<tr>
<td>
<p>You do not have any events that you are attending.</p>
</td>
</tr>
<?php
     }
     else
     {
?>
<TR class='dark_blue_white2'>
<TD>&nbsp;</TD>
<TD width=65>&nbsp;&nbsp;Time</TD>
<TD width=320>&nbsp;&nbsp;Event &amp;Description</TD>
<TD vAlign=center width=110>&nbsp;</TD>
<TD width=175>&nbsp;&nbsp;Place &amp; Location</TD>
</TR>
<?php
     $event_res=$events->get_my_events($_SESSION["member_id"]);
     while($event_set=mysql_fetch_array($event_res))
     {
        $check=$events->check_past_future($event_set["id"]);
?>
<TR bgColor=#ffffff>
<TD vAlign=top><?=$event_set["start_month"]?>/<?=$event_set["start_day"]?>/<?=$event_set["start_year"]?></TD>
<TD vAlign=top><?=$event_set["start_hour"]?>:<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?></TD>
<TD vAlign=top>
<A href="view_event.php?event_id=<?=$event_set["id"]?>"><?=$event_set["event_name"]?></A>
<BR>
<?php
     if($check==1)
     {
?>
[<A href="edit_event.php?event_id=<?=$event_set["id"]?>">Edit</A>]&nbsp;[<A href="delete_event.php?event_id=<?=$event_set["id"]?>">Delete</A>]
[<A href="invite_event.php?event_id=<?=$event_set["id"]?>">Invite</A>]
<br>
<?php
     }
?>
<FONT color=gray><?=$event_set["start_hour"]?>:<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?> <?=$event_set["short_desc"]?></FONT>
</TD>
<TD vAlign=top>
<?php
     $cat_set=$events->get_cat($event_set["cat_id"]);
?>
<a class=man href="view_events.php?cat_id=<?=$event_set["cat_id"]?>"><?=$cat_set["cat_name"]?></A>
</TD>
<TD vAlign=top><?=$event_set["place"]?></A><BR><FONT color=gray><?=$event_set["city"]?>&nbsp;<?=$event_set["state"]?></FONT>
</TD>
</TR>
<?php
     }
}
?>

</td>
</tr>
</table>
</td>
<tr>
</table>
</td>
</tr>
</table>
</td>
<td>&nbsp;</td>
</tr>
</table>

<!-- End -->
</td>
</tr>

<!-- End -->
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
