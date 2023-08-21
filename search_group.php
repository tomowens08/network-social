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
  print "<td valign='top' width='20%'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Groups Advanced Search</h3></td></tr>";

include("includes/class.groups.php");
$group=new groups;
$group_res=$group->get_all_cats();
?>
<form name='search_group' action='search_group_action.php' method='get'>
<table width="100%" class='dark_b_border2' cellspacing="1" cellpadding="2">

<tr bgcolor="#FFFFFF" valign="top">
<td colspan="2">
<table width="100%" border="0" cellspacing="1" cellpadding="5">
<tr>
<td>&nbsp;</td>
<td colspan="2" class='txt_label'>
<input type="text" size="20" name="searchString">
<input type="radio" name="searchType" value="name" checked> Name
<input type="radio" name="searchType" value="key"> Keyword</td>

<td class='txt_label'>
<select name="searchCategory">
<option value="0" selected>All</option>
<?php
     while($group_set=mysql_fetch_array($group_res))
     {
         if($HTTP_POST_VARS["group_cat"] == $group_set["id"])
         {
               print "<option value='$group_set[id]' selected>$group_set[cat_name]</option>";
         }
         else
         {
               print "<option value='$group_set[id]'>$group_set[cat_name]</option>";
         }
     }
?>
</select> Category</td>
</tr>

<tr>
<td>&nbsp;</td>
<td class='txt_label'>
<select name="country">
<option value="0">Any</option>
<?php
  // run loop to display all categories
     $sql="select * from states";
     $state_res=mysql_query($sql);
     while($state_set=mysql_fetch_array($state_res))
     {
         if($HTTP_POST_VARS["country"]==$state_set["state_id"])
         {
          print "<option value='$state_set[state_id]' selected>$state_set[state_name]</option>";
         }
         else
         {
          print "<option value='$state_set[state_id]'>$state_set[state_name]</option>";
         }
     }

  // run loop to display all categories
?>
</select> Country</td>
<td class='txt_label'>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td class='txt_label'>OR</td>
<td class='txt_label'>
<select name="miles">
<option value="0">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select> miles from</td>

<td class='txt_label'>
<input type="text" name="zipcode" size="10">&nbsp;Zip</td>
<td><input type="submit" value="Search"></td>
</tr>
</table>
<?php
  // run loop to display all categories
  print "</td></tr>";
     print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
