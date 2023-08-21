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
  session_start();
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
  print "<td width='20%' valign='top'>";
   include("includes/music_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Shows in your area!</h3></td></tr>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";

?>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%" height="80%">
<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<form action="search_shows.php" method="get">
<tr bgcolor="ffffff" class='txt_label'>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class='txt_label'>
<td>
<select name="distance">
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50" SELECTED>50</option>
<option value="100">100</option>
</select>&nbsp;&nbsp;miles from&nbsp;
<input type="text" name="postal" size="10" maxlength="10" value="">
&nbsp;&nbsp;in&nbsp;&nbsp;
<select name="country">
<option value="US" SELECTED>United States</option>
</select>
</td>
<td align="right">

<select name="genre">
<option value="">Any Genre
<?php
     include("includes/music.class.php");
     $music = new music;
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
     }
?>

</select>&nbsp;
<input type="submit" value="Sort">
</td>
</tr>
</table>
</td>
</tr>
</form>
</table>


<!-- display shows table starts -->
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td height="24" class='txt_label'><b>Date</b></td>
<td height="24" class='txt_label'><b>Time</b></td>
<td height="24" class='txt_label'><b>Band</b></td>
<td height="24" class='txt_label'><b>Venue</b></td>
<td height="24" class='txt_label'><b>Location</b></td>
<td height="24" class='txt_label'><b>Cost</b></td>
</tr>
<?php
     // paging stuff
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;

        $sql_paging="select count(*) as a from music_shows a, music_member_profile b where a.member_id=b.user_id";
        if($HTTP_GET_VARS["genre"]!=Null)
        {
         $sql_paging.=" and (b.genre1=$HTTP_GET_VARS[genre]";
         $sql_paging.=" or b.genre2=$HTTP_GET_VARS[genre]";
         $sql_paging.=" or b.genre3=$HTTP_GET_VARS[genre])";
        }
        if($HTTP_GET_VARS["postal"]!=Null)
        {
            $sql_paging.=" and region = 'state'";
        }

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



     // paging stuff
     $sql="select * from music_shows a, music_member_profile b where a.member_id=b.user_id";
     if($HTTP_GET_VARS["genre"]!=Null)
     {
       $sql.=" and (b.genre1=$HTTP_GET_VARS[genre]";
       $sql.=" or b.genre2=$HTTP_GET_VARS[genre]";
       $sql.=" or b.genre3=$HTTP_GET_VARS[genre])";
     }
     if($HTTP_GET_VARS["postal"]!=Null)
     {
        $sql.=" and region = 'state'";
     }

     $sql.=" limit $n, 30";

     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {

         if($HTTP_GET_VARS["distance"]!=Null&&$HTTP_GET_VARS["postal"]!=Null)
         {
          set_time_limit(0);

          $first = $HTTP_GET_VARS["postal"];
          $second = $data_set["zip_code"];

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
          //print $miles;
        }
         if($miles<=$HTTP_GET_VARS["distance"])
         {
         $sql="select * from members where member_id = $data_set[member_id]";
         $mem_res=mysql_query($sql);
         $mem_set=mysql_fetch_array($mem_res);

         $sql="select * from music_shows where member_id = $data_set[member_id] and venue='$data_set[venue]'";
         $id_res=mysql_query($sql);
         $id_set=mysql_fetch_array($id_res);

?>
<!-- show_line -->
<tr bgcolor="ffffff" class='txt_label'>
<td align="center" class='txt_label' valign="top"><?=$data_set["show_month"]?>/<?=$data_set["show_day"]?>/<?=$data_set["show_year"]?></td>
<td align="center" class='txt_label' valign="top"><?=$data_set["show_hour"]?>:<?=$data_set["show_min"]?><?=$data_set["show_marker"]?></td>
<td valign="top" class='txt_label' nowrap>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>" class="classifiedstext"><?=$mem_set["member_name"]?></a></td>
<td width="45%" class='txt_label' nowrap>
<a href="view_show.php?id=<?=$id_set["id"]?>" class="classifiedstext"><?=$data_set["venue"]?></a></td>
<td width="45%" class='txt_label' nowrap><?=$data_set["city"]?>, <?=$data_set["state"]?></td>
<td width="100" class='txt_label' nowrap><?=$data_set["cost"]?></td>
</tr>
<!-- show_line -->

<?php
           }
     }
?>

<tr>
<td colspan="6" bgcolor="ffffff">
<table border="0" cellspacing="2" cellpadding="0" bordercolor="#000000" width="100%">
<tr>
<td colspan="4">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr>
<?php
     if($tot_records>=30)
     {
?>
<td nowrap>Listing <?=$n+1?>-<?=$n+30?> of <?=$tot_records?>&nbsp;&nbsp;&nbsp;</td>
<?php
     }
     else
     {
?>
<td nowrap>Listing <?=$n+1?>-<?=$tot_records?> of <?=$tot_records?>&nbsp;&nbsp;&nbsp;</td>
<?php
     }
?>
<td align=right width="150" nowrap>
<?php
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='search_shows.php?distance=<?=$HTTP_GET_VARS["distance"]?>&postal=<?=$HTTP_GET_VARS["postal"]?>&country=<?=$HTTP_GET_VARS["country"]?>&genre=<?=$HTTP_GET_VARS["genre"]?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='search_shows.php?distance=<?=$HTTP_GET_VARS["distance"]?>&postal=<?=$HTTP_GET_VARS["postal"]?>&country=<?=$HTTP_GET_VARS["country"]?>&genre=<?=$HTTP_GET_VARS["genre"]?>&n=<?=$n_next?>'>Next</a>
<?php
        }
?>
</td>
</tr>
</table>
</td>
</tr>
</table>


<?php
  // run loop to display all categories
  print "</td></tr>";
  print "</td></tr>";
     print "</table>";
    print "</td></tr></table>";
?>

</table>
</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");
}
?>
