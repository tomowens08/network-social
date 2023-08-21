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
include("includes/profile.class.php");
$profile=new profile;

//include("includes/right.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_menu.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Search
</td></tr>

<tr><td>


<?

  print "<table width='100%' align='center'>";


  if ($HTTP_GET_VARS["value"]=="")
  {

    print "<form name='Search' action='search_preffered1.php?page=1' method='post'>";
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='left'>";
    print "<table width='100%'>";
    print "<tr><td width='30%'>First Name:</td>";
    print "<td width='70%'><input type='text' name='first_name' size='20'></td>";
    print "</tr>";
    print "<tr><td width='30%'>Last Name:</td>";
    print "<td width='70%'><input type='text' name='last_name' size='20'></td>";
    print "</tr>";
    print "</tr>";
    print "<tr><td width='30%'>&nbsp;</td>";
    print "<td width='70%'><input type='submit' name='submit' value='Search'></td>";
    print "</tr>";
    print "</form>";
    print "</table>";
    print "</p></td></tr>";
  }


  if ($HTTP_GET_VARS["value"]=="interests")
  {

    print "<form name='Search' action='search_preffered1.php?value=interests&page=1' method='post'>";
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='left'>";
    print "<table width='100%'>";
    print "<tr><td width='30%'>Interests:</td>";
    print "<td width='70%'><textarea name='interests' rows='5' cols='20'></textarea></td>";
    print "</tr>";
    print "<tr><td width='30%'>&nbsp;</td>";
    print "<td width='70%'><input type='submit' name='submit' value='Search'></td>";
    print "</tr>";
    print "</form>";
    print "</table>";
    print "</p></td></tr>";
  }



  if ($HTTP_GET_VARS["value"]=="favourites")
  {

    print "<form name='Search' action='search_preffered1.php?value=favourites&page=1' method='post'>";
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='left'>";
    print "<table width='100%'>";
    print "<tr><td width='30%'>Music:</td>";
    print "<td width='70%'><input type='text' name='music' size='20'></td>";
    print "</tr>";
    print "<tr><td width='30%'>Books:</td>";
    print "<td width='70%'><input type='text' name='books' size='20'></td>";
    print "</tr>";
    print "<tr><td width='30%'>TV Shows:</td>";
    print "<td width='70%'><input type='text' name='tv' size='20'></td>";
    print "</tr>";
    print "<tr><td width='30%'>Movies:</td>";
    print "<td width='70%'><input type='text' name='movies' size='20'></td>";
    print "</tr>";
    print "<tr><td width='30%'>&nbsp;</td>";
    print "<td width='70%'><input type='submit' name='submit' value='Search'></td>";
    print "</tr>";
    print "</form>";
    print "</table>";
    print "</p></td></tr>";
  }



  print "</table>";
  print "</td>";
  print "</tr></table>";

?>

<!-- middle_content -->
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
