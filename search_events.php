<?php
session_start();
$pi = 3.14159265358979323846;
$EARTH_RADIUS = 3963.205; # diameter/2 in miles

$dist = sprintf("%.1f", $dis);

function Distance($latitude1, $longitude1, $latitude2, $longitude2)
{
  global $pi, $EARTH_RADIUS;

  $dist = 0;
  $latitude1 = $latitude1 * $pi / 180; #turn each from radians to degrees
  $longitude1 = $longitude1 * $pi / 180;
  $latitude2 = $latitude2 * $pi / 180;
  $longitude2 = $longitude2 * $pi / 180;

  if(($latitude1 != $latitude2) || ($longitude1 != $longitude2)){
    $dist = (sin($latitude1) * sin($latitude2)) + (cos($latitude1) * cos($latitude2)) * cos($longitude2 - $longitude1);
    $dist = $EARTH_RADIUS * (-1 * atan2($dist / sqrt(1 - $dist * $dist), 1) + $pi / 2);
  }

  return sprintf("%.1f", $dist);
}

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
<input type='text' name='keywords' size='15' value='<?=$HTTP_GET_VARS["keywords"]?>'>
</td>
<td class='txt_label'>in
<select name='category' size='1'>
<option value=''>All Categories</option>
<?php
     $sql="select * from events_cat order by cat_name";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {
         if($HTTP_GET_VARS["category"]==$data_set["id"])
         {
?>
<option value='<?=$data_set["id"]?>' selected><?=$data_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value='<?=$data_set["id"]?>'><?=$data_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
</td>
<td class='txt_label'>within
<select name='miles' size='1'>
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
of <input type='text' name='zip' size='5' value='<?=$HTTP_GET_VARS["zip"]?>'>
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
<TD width=65>&nbsp;&nbsp;<SPAN class=whitetext12>Time</SPAN></TD>
<TD width=320>&nbsp;&nbsp;<SPAN class=whitetext12>Event &amp;Description</SPAN></TD>
<TD vAlign=center width=110>&nbsp;</TD>
<TD width=175>&nbsp;&nbsp;<SPAN class=whitetext12>Place &amp; Location</SPAN></TD>
</TR>
<?php
$keywords=addslashes($HTTP_GET_VARS["keywords"]);
$category=addslashes($HTTP_GET_VARS["category"]);
$miles=addslashes($HTTP_GET_VARS["miles"]);
$zip=addslashes($HTTP_GET_VARS["zip"]);

     $sql="select * from events where 1=1";
     if($keywords!=Null)
     {
         $sql.=" and (lower(event_name) like lower('%$keywords%')";
         $sql.=" or lower(organizer) like lower('%$keywords%')";
         $sql.=" or lower(email) like lower('%$keywords%')";
         $sql.=" or lower(short_desc) like lower('%$keywords%')";
         $sql.=" or lower(long_desc) like lower('%$keywords%')";
         $sql.=" or lower(place) like lower('%$keywords%')";
         $sql.=" or lower(address) like lower('%$keywords%')";
         $sql.=" or lower(city) like lower('%$keywords%')";
         $sql.=" or lower(state) like lower('%$keywords%')";
         $sql.=" or lower(country) like lower('%$keywords%'))";
     }
     if($category!=Null)
     {
         $sql.=" and cat_id = $category";
     }
     if($miles!=Null&&$zip!=Null)
     {
         $sql.=" and country like 'United States Of America'";
     }

     $sql.=" order by id desc";
     //print $sql;
     
        global $returned_events;
        $result=mysql_query($sql);
        print mysql_error();
        $sr_no=0;
        $in = file("data.db");
        while($data_set=mysql_fetch_array($result))
        {
            if($miles!=Null&&$zip!=Null)
            {
               //set_time_limit(0);

               $first = $zip;
               $second = $data_set["zip"];
               $flat='';
               $flong='';
               $slat='';
               $slong='';

               if($first && $second)
               {
                foreach($in as $line)
                {
                 if((ereg($first, $line)) || (ereg($second, $line)))
                 {
                  list($zip, $city, $state, $area, $lat, $long) = split("\|", $line);
                  if($first == $zip)
                  {
                            $flat = $lat;
                            $flong = $long;
                  }
                  if($second == $zip)
                  {
                             $slat = $lat;
                             $slong = $long;
                  }
                  if($flat!=Null&&$flong!=Null&&$slat!=Null&&$slong!=Null)
                  {
                   break;
                  }
                 }
                }
               }
               $miles = Distance($flat, $flong, $slat, $slong);

            }
            
            if($miles!=Null && $zip!=Null)
            {
             if(($miles <= $miles))
             {
              $display1=1;
             }
             else
             {
              $display1=0;
             }
            }
            else
            {
                $display1=1;
            }

            if($display1==1)
            {
               $returned_events[$sr_no]=$data_set["id"];
               $sr_no=$sr_no+1;
            }

        }

     
        $total_events_found=count($returned_events);
        $div_n=$n/30;

        $start_member=$div_n*30;
        $end_member=$start_member+29;

        if($end_member>$total_events_found)
        {
            $end_member=$total_events_found;
            $next=0;
        }
        else
        {
            $next=1;
        }

        if($end_member!=0)
        {
         $display_member_start=$start_member+1;
        }
        else
        {
            $display_member_start=0;
        }

     
$sr_no=$start_member;
while($sr_no<=$end_member)
{
    if($returned_events[$sr_no]!=Null)
    {
        $sql="select * from events where id = $returned_events[$sr_no]";
        $event_res=mysql_query($sql);
        $event_set=mysql_fetch_array($event_res);
        
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
     }
     $sr_no=$sr_no+1;
     }
?>
</FONT></TD></TR>
<tr>
<td colspan='5' class='txt_label'>
<?php
        if($n!=0)
        {
        $n_previous=$n-30;
?>
&#187; <a href='search_events.php?keywords=<?=$keywords?>&category=<?=$category?>&miles=<?=$miles?>&zip=<?=$zip?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
        $n_next=$n+30;
?>
&nbsp;&#187; <a href='search_events.php?keywords=<?=$keywords?>&category=<?=$category?>&miles=<?=$miles?>&zip=<?=$zip?>&n=<?=$n_next?>'>Next</a>
<?php
        }
?>
</td>
</tr>
</TBODY></TABLE>

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
