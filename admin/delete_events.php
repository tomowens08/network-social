<?php
session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?
if ($_SESSION["user_admin"]!="Yes")
{

  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Delete all Expired Events</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
include("includes/conn.php");

$date_now=date("y-m-d");

$sql="select * from events";
$res=mysql_query($sql);
while($data_set=mysql_fetch_array($res))
{
    $start_month=$data_set["start_month"];
    if($start_month<10)
    {
       $start_month="0".$start_month;
    }

    $start_day=$data_set["start_day"];
    if($start_day<10)
    {
       $start_day="0".$start_day;
    }

    $check_date=$data_set["start_year"]."-".$start_month."-".$start_day;

    //print $check_date;
    $aa=datediff($date_now, $check_date);

    //print "AA = $aa<br>";
    
    if($aa<0)
    {
        $sql="delete from events where id = $data_set[id]";
        $del=mysql_query($sql);
        
        $sql="delete from events_rsvp where event_id = $data_set[id]";
        $del=mysql_query($sql);

        $sql="delete from events_comments where event_id = $data_set[id]";
        $del=mysql_query($sql);

    }
    
}

         print "The expired events channel have been deleted successfully.";

 }
print "</table></table>";
?>


</BODY>
</HTML>

