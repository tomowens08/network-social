<?php
$pi = 3.14159265358979323846;
$EARTH_RADIUS = 3963.205; # diameter/2 in miles

$dist = sprintf("%.1f", $distance);

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
?>

<!-- Classified Entry -->

<table width="830" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/class_side.php");
?>

<td valign="top" width="680">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
<td class='txt_label'><font size="2"><b>Classifieds<br>Listings for Search</b></font></td>
<td align="right" valign="bottom">
<a href="classified.php">Back to Classifieds &gt;&gt;</a>
</td>
</tr>
</table>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td>
<form name='search' action='search_class.php' action='get'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="text11">
<td align="right">Category:&nbsp;</td>
<td>
<select name="catId">
<option value="0">Any</option>
<?php
     $cat_res=$class->get_all_cats();
     while($cat_set=mysql_fetch_array($cat_res))
     {
?>
<option value="<?=$cat_set["id"]?>"><?=$cat_set["cat_name"]?></option>
<?php
     }
?>
</select>&nbsp;&nbsp;Keyword:&nbsp;<input type="text" name="keyword" value="">
</td>
<td><input type="submit" value="Search"></td>
</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="text11">
<td align="right">AND:&nbsp;</td>
<td>
<select name="distance">
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="500">500</option>
</select>
&nbsp;&nbsp;miles of&nbsp;
<input type="text" name="postal" size="10" maxlength="5" value="">
&nbsp;&nbsp;(enter Zip Code)&nbsp;
</td>
<td align="right">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</form>


<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td class='txt_label' height="24"><b>Date</b></td>
<td class='txt_label' height="24"><b>Subject</b></td>
<td class='txt_label' height="24"><b>Views</b></td>
</tr>

<?php

     // search sql

        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;

        $sql_paging="select count(*) as a from classified_listing where 1=1";
        if($HTTP_GET_VARS["cat_id"]!=0)
        {
         $sql_paging.=" and cat_id = $HTTP_GET_VARS[cat_id]";
        }
        if($HTTP_GET_VARS["keyword"]!=Null)
        {
         $sql_paging.=" and (subject like '%$HTTP_GET_VARS[keyword]%'";
         $sql_paging.=" or message like '%$HTTP_GET_VARS[keyword]%')";
        }

        $sql="select * from classified_listing where 1=1";
        if($HTTP_GET_VARS["cat_id"]!=0)
        {
         $sql.=" and cat_id = $HTTP_GET_VARS[cat_id]";
        }
        if($HTTP_GET_VARS["keyword"]!=Null)
        {
         $sql.=" and (subject like '%$HTTP_GET_VARS[keyword]%'";
         $sql.=" or message like '%$HTTP_GET_VARS[keyword]%')";
        }

        $sql.=" limit $n, 10";

        $result=mysql_query($sql_paging);
        print mysql_error();
        $data_set=mysql_fetch_array($result);
        if($data_set["a"]<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }

        $result=mysql_query($sql);

        while($data_set=mysql_fetch_array($result))
        {
         if($HTTP_GET_VARS["distance"]!=Null&&$HTTP_GET_VARS["postal"]!=Null)
         {

          $sql="select zip from members where member_id = $data_set[member_id]";
          $zip_res=mysql_query($sql);
          $zip_set=mysql_fetch_array($zip_res);

          set_time_limit(0);

          $first = $HTTP_GET_VARS["postal"];
          $second = $zip_set["zip"];

          if($first && $second)
          {
          $in = file("data.db");
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
            }
          }
         }
          $miles = Distance($flat, $flong, $slat, $slong);
//          print $miles;
        }

         if($HTTP_GET_VARS["distance"]!=Null&&$HTTP_GET_VARS["postal"]!=Null)
         {
         if($miles>=$HTTP_GET_VARS["distance"])
         {

         $name=$people->get_name($data_set["member_id"]);
?>

<tr bgcolor="ffffff" class="text11">
<td align="center" valign="top"><?=$listing_set["posted_on"]?></td>
<td width="90%">
<a href="view_ad.php?id=<?=$listing_set["id"]?>" class="mailtext"><?=$listing_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$listing_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td align="center"><?=$listing_set["views"]?></td>
</tr>
<?php
        }
        }
        else
        {
?>
<tr bgcolor="ffffff" class="text11">
<td align="center" valign="top"><?=$data_set["posted_on"]?></td>
<td width="90%">
<a href="view_ad.php?id=<?=$data_set["id"]?>" class="mailtext"><?=$data_set["subject"]?></a>
<br>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>" class="classifiedstext"><?=$name?></a>
</td>
<td align="center"><?=$data_set["views"]?></td>
</tr>
<?php
        }
     }
?>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>


<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
