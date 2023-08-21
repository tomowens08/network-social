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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>My Groups</h3></td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";

  // run loop to display all my_groups

     include("includes/class.groups.php");
     $group=new groups;
     $member_id=$_SESSION["member_id"];
     
     $n=$HTTP_GET_VARS["n"];
     if($n==Null)
     {
         $n=1;
     }
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";


// paging
   $n=$n-1;
   $n_next=$n+20;

   $sql="select count(*) as a from groups where 1=1";
   if($HTTP_GET_VARS["searchType"]=="name" && $HTTP_GET_VARS["searchString"]!=Null)
   {
    $sql.=" and group_name like '%$HTTP_GET_VARS[searchString]%'";
   }
   if($HTTP_GET_VARS["searchType"]=="key" && $HTTP_GET_VARS["searchString"]!=Null)
   {
    $sql.=" and (group_name like '%$HTTP_GET_VARS[searchString]%'";
    $sql.=" or description like '%$HTTP_GET_VARS[searchString]%')";
   }
   if($HTTP_GET_VARS["country"]!=0)
   {
    $sql.=" and country = $HTTP_GET_VARS[country]";
   }
   $result=mysql_query($sql);
   $data_set=mysql_fetch_array($result);
   print mysql_error();
   if($data_set["a"]<=$n_next)
   {
    $next=0;
   }
   else
   {
    $next=1;
   }

   $sql="select * from groups where 1=1";
   if($HTTP_GET_VARS["searchType"]=="name" && $HTTP_GET_VARS["searchString"]!=Null)
   {
    $sql.=" and group_name like '%$HTTP_GET_VARS[searchString]%'";
   }
   if($HTTP_GET_VARS["searchType"]=="key" && $HTTP_GET_VARS["searchString"]!=Null)
   {
    $sql.=" and (group_name like '%$HTTP_GET_VARS[searchString]%'";
    $sql.=" or description like '%$HTTP_GET_VARS[searchString]%')";
   }
   if($HTTP_GET_VARS["country"]!=0)
   {
    $sql.=" and country = $HTTP_GET_VARS[country]";
   }
	 $sql .= ' AND NOT hide_from_all ';
   $sql.=" limit $n, 20";
   $result=mysql_query($sql);
   print mysql_error();
   //print mysql_num_rows($result);
   //print $sql;

   // paging

// Start Displaying

$sr_no=1;
while($data_set=mysql_fetch_array($result))
{

         if($HTTP_GET_VARS["miles"]!=Null&&$HTTP_GET_VARS["zipcode"]!=Null)
         {

          set_time_limit(0);

          $first = $HTTP_GET_VARS["zipcode"];
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
//          print $miles;
        }

         if($HTTP_GET_VARS["miles"]!=Null&&$HTTP_GET_VARS["zipcode"]!=Null)
         {
         if($miles<=$HTTP_GET_VARS["miles"])
         {

        if($sr_no%5==0)
        {
         print "</tr><tr valign=top>";
        }

                                       print "<td><table cellSpacing=0 cellPadding=0 width='100%' bgColor='#ffffff' border='0'>";
                                       print "<tbody><tr vAlign=top><td height=117><table cellSpacing=0 cellPadding=5 width='100%' border=0>";
                                       print "<tbody><tr align=middle><td vAlign=top align=middle width=68 bgColor=#ffffff>";
                                       print "<table cellSpacing=0 align=center border=0><tbody><tr><td vAlign=top align=middle>";
                                       // Group Name
                                       print "<a href='view_group.php?group_id=$data_set[id]'>$data_set[group_name]</a></td></tr>";
                                       print "<tr><td vAlign=top align=middle><a href='view_group.php?group_id=$data_set[id]'>";
                                             $num_images=$group->get_group_num_images($data_set["id"]);
                                             if($num_images==0)
                                             {
                                                 print "<img height=75 alt='' src='images/no_pic.gif' width=75 border=0></A>";
                                             }
                                             else
                                             {
                                                 $image_url=$group->get_group_image($data_set["id"]);
                                                 print "<img height=75 alt='' src='$image_url' width=75 border=0></A>";
                                             }

                                              $group_creator=$group->get_member_id($data_set["id"]);

                                              if($group_creator==$member_id)
                                              {
                                                  print "<br><img src='images/mod.bmp'>";
                                              }

                                               print "</td></tr></tbody></table></td></tr></table></table>";
                                           }
                                           }
                                           else
                                           {
        if($sr_no%5==0)
        {
         print "</tr><tr valign=top>";
        }

        print "<td><table cellSpacing=0 cellPadding=0 width='100%' bgColor='#ffffff' border='0'>";
        print "<tbody><tr vAlign=top><td height=117><table cellSpacing=0 cellPadding=5 width='100%' border=0>";
        print "<tbody><tr align=middle><td vAlign=top align=middle width=68 bgColor=#ffffff>";
        print "<table cellSpacing=0 align=center border=0><tbody><tr><td vAlign=top align=middle>";
        // Group Name
        print "<a href='view_group.php?group_id=$data_set[id]'>$data_set[group_name]</a></td></tr>";
        print "<tr><td vAlign=top align=middle><a href='view_group.php?group_id=$data_set[id]'>";
                                             $num_images=$group->get_group_num_images($data_set["id"]);
                                             if($num_images==0)
                                             {
                                                 print "<img height=75 alt='' src='images/no_pic.gif' width=75 border=0></A>";
                                             }
                                             else
                                             {
                                                 $image_url=$group->get_group_image($data_set["id"]);
                                                 print "<img height=75 alt='' src='$image_url' width=75 border=0></A>";
                                             }

                                              $group_creator=$group->get_member_id($data_set["id"]);

                                              if($group_creator==$member_id)
                                              {
                                                  print "<br><img src='images/mod.bmp'>";
                                              }

                                               print "</td></tr></tbody></table></td></tr></table></table>";


                                           }
                                $sr_no=$sr_no+1;
                              }

             // paging
                print "<tr><td width='100%' colspan='4' class='content'>";
                               if($n!=0)
                               {
                                $n_previous=$n-20;
                                print "&#187; <a href='search_group_action.php?searchString=$HTTP_GET_VARS[searchString]&searchType=$HTTP_GET_VARS[searchType]&searchCategory=$HTTP_GET_VARS[searchCategory]&country=$HTTP_GET_VARS[country]&miles=$HTTP_GET_VARS[miles]&zipcode=$HTTP_GET_VARS[zipcode]&n=$n_previous'>Previous</a>";
                               }
                               if($next==1)
                               {
                                print "&nbsp;&#187; <a href='search_group_action.php?searchString=$HTTP_GET_VARS[searchString]&searchType=$HTTP_GET_VARS[searchType]&searchCategory=$HTTP_GET_VARS[searchCategory]&country=$HTTP_GET_VARS[country]&miles=$HTTP_GET_VARS[miles]&zipcode=$HTTP_GET_VARS[zipcode]&n=$n_next'>Next</a>";
                               }
                print "</td></tr>";
            // paging


  // run loop to display all my_groups

  print "</td></tr>";
  print "</table>";

  print "</td></tr>";
  print "</table>";
  print "</td>";
    print "</table>";
//    print "</td></tr></table>";
?>
<?
if($sr_no==1||$sr_no==3)
{
?>
</table>
</table>
<?php
}
?>
</table></table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
