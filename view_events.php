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

<!-- row for event list -->
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
</TBODY></TABLE></TD></TR></TBODY></TABLE>


<TABLE cellSpacing='0' cellPadding='4' width="100%" border=0>
<TBODY>
<TR class='dark_blue_white2'>
<TD>&nbsp;</TD>
<TD width=65>&nbsp;&nbsp;<SPAN class=whitetext12>Time</SPAN></TD>
<TD width=320>&nbsp;&nbsp;<SPAN class=whitetext12>Event &amp;Description</SPAN></TD>
<TD vAlign=center width=110>&nbsp;</TD>
<TD width=175>&nbsp;&nbsp;<SPAN class=whitetext12>Place &amp; Location</SPAN></TD>
</TR>
<?php
     $event_res=$events->get_cat_events($HTTP_GET_VARS["cat_id"]);
     $sr_no=1;
     while($event_set=mysql_fetch_array($event_res))
     {
         if($sr_no%2==0)
         {
             print "<tr bgColor='#ffffff'>";
         }
         else
         {
             print "<tr bgColor='#D0D0D0'>";
         }
?>
<TD vAlign=top class='txt_label'><?=$event_set["start_month"]?>/<?=$event_set["start_day"]?>/<?=$event_set["start_year"]?></TD>
<TD vAlign=top class='txt_label'><?=$event_set["start_hour"]?>:<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?></TD>
<TD vAlign=top class='txt_label'>
<A href="view_event.php?event_id=<?=$event_set["id"]?>"><?=$event_set["event_name"]?></A>
<BR>
<FONT color=gray><?=$event_set["start_hour"]?>:<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?> <?=$event_set["short_desc"]?></FONT>
</TD>
<TD vAlign=top class='txt_label'>
<?php
     $cat_set=$events->get_cat($event_set["cat_id"]);
?>
<a class=man href="view_events.php?cat_id=<?=$event_set["cat_id"]?>"><?=$cat_set["cat_name"]?></A>
</TD>
<TD vAlign=top class='txt_label'><?=$event_set["place"]?></A><BR><FONT color=gray><?=$event_set["city"]?>&nbsp;<?=$event_set["state"]?></FONT>
</TD>
</TR>
<?php
     $sr_no=$sr_no+1;
     }
?>
</FONT></TD></TR></TBODY></TABLE>

<!-- events -->

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
