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

<tr>
<td valign="top" bgcolor="#FFFFFF">
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

<!-- Classified Entry -->

<table width="800" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<?php
    include("includes/right_events.php");
?>

<td valign="top" width="680">
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'><font size="2">My Events</font></td>
<td align="right" valign="bottom">
<a href="events.php">Back to Events &gt;&gt;</a>
</td>
</tr>
</table>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td class='txt_label' height="24"><b>Date</b></td>
<td class='txt_label' height="24"><b>Subject</b></td>
<td class='txt_label' height="24"><b>Views</b></td>
</tr>

<?php
     $events_res=$events->get_my_events($_SESSION["member_id"]);
     while($events_set=mysql_fetch_array($events_res))
     {
         $name=$people->get_name($events_set["member_id"]);
?>

<tr bgcolor="ffffff" class="text11">
<td align="center" valign="top"><?=$events_set["posted_on"]?></td>
<td width="90%">
<a href="view_ad.php?id=<?=$events_set["id"]?>" class="mailtext"><?=$events_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$events_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td align="center"><?=$events_set["views"]?></td>
</tr>
<?php
     }
?>

</td>
</tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
 }
include("includes/bottom.php");
?>
