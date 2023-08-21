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
<style type="text/css">
<!--
.style3 {font-family: Tahoma; font-size: 12px; }
-->
</style>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
  <p>
  <!-- middle_content -->
  <span class="style3">Also Try:</span></p>
  <p class="style3"><a href="advanced_search.php">Advanced Search </a></p>
  <p class="style3"><a href="search_profiles.php">Search Profiles</a></p>
  <p class="style3"><a href="search_profiles_advanced.php">Search Profiles Advanced</a> </p>
  <p class="style3"><a href="search_preffered.php">Search Prefered</a></p>
  <p><span class="style3"><a href="search_music.php">Search Music    </a></span></p>
  <p>
    <?php
    include("includes/right_menu.php");
?>
    </p>
<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'><?=$site_name?> Search</td></tr>

<tr><td>


<tr>
<td width="100%" valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="0" bordercolor="#000000" bgcolor="#ffffff">
<tr>
<td valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr valign="top">
<td width="20"><img src="images/1by1.gif" width="20" height="1"></td>
<td width="529">
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>

<td valign="top" bgcolor="526FA3">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
<td class='txt_label' valign="top" bgcolor="#FFFFFF"> <p><strong><font size="2">Search <?=$site_name?> Profiles</font></strong></p>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
<form name="SearchFormTop" method="get" action='search_profiles.php'>
<input type='hidden' name='type' value='1'>
<tr>
<td valign="top" bgcolor="#526FA3">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr><td valign="middle" class='txt_label' bgcolor="#D5DCEA">&nbsp;&nbsp;Search <?=$site_name?> for
<input type="text" name="searchrequest" size="30" maxlength="200" value="" align="MIDDLE">&nbsp;
<input type="submit" value="Search">
</td></tr>
</table></td>
</tr>
</form>
</table>

<br><br>

<p class='txt_label'><strong>Find Someone You Know</strong></p>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
<tr>
<td valign="top" bgcolor="#526FA3">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td width="79%" valign="middle" bgcolor="#FFFFFF" colspan="2">
<font color="#999999"><strong><font color="#003399" size="2">
Friend Finder</font></strong></font></td>
</tr>

<form action="search_profiles.php?type=2" method="get">
<input type='hidden' name='type' value='2'>

<tr bgcolor="white">
<td align="right" nowrap class='txt_label'>
Select search by:</td>
<td class='txt_label'>
<input type="Radio" id="searchBy" name="searchBy" value="First" checked>Name</input>
<input type="Radio" id="searchBy" name="searchBy" value="Display">Display Name</input>
<input type="Radio" id="searchBy" name="searchBy" value="Email">Email</input></td>
</tr>
<tr bgcolor="white">
<td>&nbsp;</td>
<td>
<input type="text" name="f_first_name" size="35">
<input type="submit" name="Submit" value="Find"></td>
</tr>
</form>
</table></td>
</tr>
</table>
<br><br>


<p class='txt_label'><strong>Find Your Classmates</strong></p>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
<tr>
<td height="62" valign="top" bgcolor="#526FA3">
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
<tr>
<td width="79%" class='txt_label' valign="middle" bgcolor="#FFFFFF" colspan="2">
<font color="#999999"><strong>
<font color="#003399" size="2">Classmate Finder</font></strong></font></td>
</tr>

<form action="search_profiles.php?type=3" name="schoolSearch" method="get">
<input type='hidden' name='type' value='3'>
<tr>
<td align="right" class='txt_label' width="25%">School Name:</td>
<td>
<input type="text" size="30" name="school_name"></td>
</tr>

<tr>
<td align="right" class='txt_label' width="25%">State:</td>
<td>
<input type="text" size="30" name="state"></td>
</tr>
<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" value="Find"></td>
</tr>
</form>
</table></td>
</tr>
</table>


<p class='txt_label'><strong>City Search</strong></p>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
<tr>
<td height="62" valign="top" bgcolor="#526FA3">
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">

<form action="city_search.php" name="schoolSearch" method="get">
<tr>
<td align="right" class='txt_label' width="25%">City Name:</td>
<td>
<input type="text" size="30" name="city_name"></td>
</tr>

<tr>
<td align="right" width="25%">&nbsp;</td>
<td>
<input type="submit" value="Find"></td>
</tr>
</form>
</table></td>
</tr>
</table>
</table>
<!-- middle_content -->
</table>
</table>
<!-- Middle Text --></td></tr>
</table>
<!-- Middle Text -->
</table></td>
</tr>
</table>
</table>

<?php
include("includes/bottom.php");
}
?>
