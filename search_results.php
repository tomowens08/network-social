<?php
  session_start();

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
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='830'>";
  print "<tr>";


  print "<td width='100%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Search</h3></td></tr>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";


?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td height="28" bgcolor="#001659">
<strong><font color="#FFFFFF">&nbsp;&nbsp;Search Results</font></strong>
</td>
</tr>
</table>

<table cellspacing="1" cellpadding="5" width="100%" align="center" bgcolor="639ace" border="0">
<tr bgcolor="eff3ff">
<td width="5%" height=24 align="center"><b>Rank</b></td>
<td width="40%" align="center"><b>Artist</b></td>
<td width="13%" align="center"><b>Last On</b></td>
<td width="19%" align="center"><b>Location</b></td>
<td width="24%" align="center"><b>Genre</b></td>
</tr>
<?php
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;

        $sql_paging="select count(*) as a from members where music='1'";
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
     $tot_records=$data_set["a"];
     $sr_no=1;
     $sql="select * from members a, music_profile b where a.member_id=b.member_id and a.music='1'";
     if($HTTP_POST_VARS["genre"]!=0)
     {
      $sql.=" and genre = $HTTP_POST_VARS[genre]";
     }
     if($HTTP_POST_VARS["Country"]!=Null)
     {
      $sql.=" and country like '%$HTTP_POST_VARS[Country]%'";
     }


     if($HTTP_POST_VARS["search_term"]!=Null&&$HTTP_POST_VARS["keywords"]!=Null)
     {
         if($HTTP_POST_VARS["search_term"]=="0")
         {
          $sql.=" and a.member_name like '%$HTTP_POST_VARS[keywords]%'";
         }
         if($HTTP_POST_VARS["search_term"]=="1")
         {
          $sql.=" and b.bio like '%$HTTP_POST_VARS[keywords]%'";
         }

         if($HTTP_POST_VARS["search_term"]=="2")
         {
          $sql.=" and b.members like '%$HTTP_POST_VARS[keywords]%'";
         }

         if($HTTP_POST_VARS["search_term"]=="3")
         {
          $sql.=" and b.influences like '%$HTTP_POST_VARS[keywords]%'";
         }
         
         if($HTTP_POST_VARS["search_term"]=="1")
         {
          $sql.=" and b.sounds_like like '%$HTTP_POST_VARS[keywords]%'";
         }
     }
     
     if($HTTP_POST_VARS["localType"]=="countryState")
     {
         $sql.=" and a.current_state like '$HTTP_POST_VARS[state]'";
     }
     
     $res=mysql_query($sql);
     print mysql_error();
     while($data_set=mysql_fetch_array($res))
     {

         if($HTTP_POST_VARS["distanceZip"]!=Null&&$HTTP_POST_VARS["zip"]!=Null)
         {

          $sql="select zip from members where member_id = $data_set[member_id]";
          $zip_res=mysql_query($sql);
          $zip_set=mysql_fetch_array($zip_res);

          set_time_limit(0);

          $first = $HTTP_POST_VARS["postal"];
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

         if($HTTP_POST_VARS["distanceZip"]!=Null&&$HTTP_POST_VARS["zip"]!=Null)
         {
          if($miles>=$HTTP_POST_VARS["distanceZip"])
          {
              $display=1;
          }
          else
          {
              $display=0;
          }
         }
         else
         {
             $display=1;
         }




         $sql="select * from music_member_profile where user_id = $data_set[member_id]";
         $ares=mysql_query($sql);
         $adata_set=mysql_fetch_array($ares);

                $sql="select count(*) as a from photos where member_id = $data_set[member_id]";
                $pic_res=mysql_query($sql);
                print mysql_error();
                $pic_set=mysql_fetch_array($pic_res);
                if($pic_set["a"]==0)
                {
                        $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
                }
                else
                {
                 $sql="select * from photos where member_id = $data_set[member_id]";
                 $pic_res=mysql_query($sql);
                 $pic_set=mysql_fetch_array($pic_res);
                 $image="<img alt='' src='$pic_set[photo_url]' width=90 border=0>";
                }
                
  if($display==1)
  {

if($adata_set["genre1"]!=Null)
{
 $sql="select cat_name from music_genre where id = $adata_set[genre1]";
 $genre_res=mysql_query($sql);
 $genre_set=mysql_fetch_array($genre_res);
}

?>
<tr class=text11 bgcolor=ffffff>
<td align="center"><?=$sr_no?></td>
<td width="35%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="50" valign="middle">
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a>
</td>
<td valign="middle">&nbsp;<?=$data_set["member_name"]?></td>
</tr>
</table>
</td>
<td width="13%" align="center"><?=$data_set["last_login"]?></td>
<td width="14%"><?=$data_set["city"]?>, <?=$data_set["state"]?></td>
<td width="14%"><?=$genre_set["cat_name"]?></td>
</tr>
<?php
     }
$sr_no=$sr_no+1;
}

?>

</table>

						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr valign="top">
								<td width="33%">



<?php
  // run loop to display all categories
  print "</td></tr>";
  print "</td></tr>";
     print "</table>";
    print "</td></tr></table>";
?>

</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");
}
?>
