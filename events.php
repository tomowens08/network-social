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

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
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
<td class='dark_blue_white2'>
Events
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
     
  include("classes/moderators.class.php");
  $moderators=new moderators;
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
<form name='search' action='search_events.php' method='get'>
<TR>
<TD width='100%' colspan='5'>
<table cellSpacing='0' cellPadding='4' width="100%" border=0>
<tr>
<td class='txt_label'>Keywords</td>
<td class='txt_label'>Category</td>
<td class='txt_label'>&nbsp;</td>
<td class='txt_label'>Postal Code</td>
<td class='txt_label'>&nbsp;</td>
</tr>

<tr>
<td class='txt_label'>
<input type='text' name='keywords' size='15'>
</td>
<td class='txt_label'>in
<select name='category' size='1'>
<option value=''>All Categories</option>
<?php
     $sql="select * from events_cat order by cat_name";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {
?>
<option value='<?=$data_set["id"]?>'><?=$data_set["cat_name"]?></option>
<?php
     }
?>
</select>
</td>
<td class='txt_label'>within
<select name='miles' size='1'>
<option value=''>All</option>
<option value='5'>5 Miles</option>
<option value='10'>10 Miles</option>
<option value='20'>20 Miles</option>
<option value='30'>30 Miles</option>
<option value='50'>50 Miles</option>
<option value='100'>100 Miles</option>
<option value='500'>500 Miles</option>
</select>
</td>
<td class='txt_label'>
of <input type='text' name='zip' size='5'>
</td>
<td class='txt_label'>
<input type='submit' name='submit' value='Find'>
</td>
</tr>

</table>
</TD>
</TR>
</form>

<TR class='dark_blue_white2'>
<TD>&nbsp;</TD>
<TD width=65>&nbsp;&nbsp;Time</TD>
<TD width=320>&nbsp;&nbsp;Event &amp;Description</TD>
<TD vAlign=center width=110>&nbsp;</TD>
<TD width=175>&nbsp;&nbsp;Place &amp; Location
</TD>
</TR>
<?php
     $event_res=$events->get_events();
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
<TD vAlign=top class='txt_label'>
<?
if($event_set["start_hour"]<10)
{
    print "0";
}
?>
<?=$event_set["start_hour"]?>:
<?
if($event_set["start_minute"]<10)
{
    print "0";
}
?>
<?=$event_set["start_minute"]?> <?=$event_set["start_marker"]?></TD>
<TD vAlign=top class='txt_label'>
<A href="view_event.php?event_id=<?=$event_set["id"]?>"><?=stripslashes($event_set["event_name"])?></A>
<BR>
<FONT color=gray>

<?
if($event_set["start_hour"]<10)
{
    print "0";
}
?>
<?=$event_set["start_hour"]?>:
<?
if($event_set["start_minute"]<10)
{
    print "0";
}
?>
<?=$event_set["start_minute"]?> <?=stripslashes($event_set["start_marker"])?> <?=stripslashes($event_set["short_desc"])?></FONT>
<?php
          $creator=$events->get_event_creator($event_set["id"]);
          if($creator==$_SESSION["member_id"])
          {
              $show=1;
          }
          else
          {
           $check=$moderators->check_event_mod($_SESSION["member_id"]);
           if($check==1)
           {
            $show=1;
           }
           else
           {
            $show=0;
           }
          }

     if($show==1)
     {
?>
<br>
<b>Moderators Options:</b>
<br>
[<a href='edit_event.php?event_id=<?=$event_set["id"]?>'>Edit Event</a>]
<br>
[<a href='delete_event.php?event_id=<?=$event_set["id"]?>'>Delete Event</a>]
<?php
     }
?>
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


<div align="center">
  <!-- Middle Text -->
  <?php
     include("includes/bottom.php");
}
?>
</div>
