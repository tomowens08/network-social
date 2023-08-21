<?php
session_start();
?>
<script language="JavaScript">
	function checkcountry()
	{
		var CONT = document.myForm.Country;
		var countryname = CONT.options[CONT.selectedIndex].value;

		if (countryname == 'United States')
		{
			//document.myForm.localType.value = 'countryState';
			document.myForm.localType[0].disabled = false;
			document.myForm.localType[1].disabled = false;
			document.myForm.state.disabled = false;
			document.myForm.zip.disabled = true;
			document.myForm.distance.disabled = true;
		}
		else if ((countryname == 'CA') || (countryname == 'UK'))
		{
			document.myForm.localType.value = 'distanceZip';
			document.myForm.localType[0].disabled = true;
			document.myForm.localType[1].disabled = false;
			document.myForm.localType[1].checked = true;
			document.myForm.state.disabled = true;
			document.myForm.zip.disabled = false;
			document.myForm.distance.disabled = false;
		}
		else
		{
			document.myForm.localType.value = 'distanceZip';
			document.myForm.localType[0].disabled = true;
			document.myForm.localType[1].disabled = true;
			document.myForm.state.disabled = true;
			document.myForm.zip.disabled = true;
			document.myForm.distance.disabled = true;
		}

		return;
	}

	function search_choice(){
		if(document.myForm.search_term.value!="")
		{
			//document.myForm.keywords.value = "";

			document.myForm.keywords.disabled = false;
			document.myForm.keywords.focus();
		}else{
			//document.myForm.keywords.value = "Select Category";
			document.myForm.keywords.disabled = true;
		}
	}

	function checkfield(){

	//if(document.myForm.localType[1].checked){
		//var re =  /[\d]{5}/;
		//var str = new String(document.myForm.zip.value);
		if(document.myForm.search_term.value!="" && document.myForm.keywords.value==""){
			alert("KeyWord cannot be blank");
			//document.myForm.zip.value="";
			document.myForm.keywords.focus();
			return false;
		}
	//}
		//alert(document.myForm.zip.value);
	return true;
	}

	function RadioClick(val){
	if (val == 'countryState')
		{
		checkcountry();
		document.myForm.zip.disabled = true;
		document.myForm.distance.disabled = true;
		}
	if (val == 'distanceZip')
		{
		document.myForm.state.disabled = true;
		document.myForm.zip.disabled = false;
		document.myForm.distance.disabled = false;
		}
	return;
	}

	function DropDownSelect(obj, val)
	{
		var i;
		var len = obj.options.length;

		for (i=0; i<len; i++)
		{
			if (obj.options[i].value == val)
			{
				obj.selectedIndex = i;
				break;
			}
		}
	}

</script>
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
 include("includes/top.php");
 include("includes/nav.php");
 include("includes/conn.php");
 include("includes/music.class.php");
 $music=new music;
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
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";


?>

<table width='100%' bgcolor="#FFFFFF" cellpadding="10" cellspacing="0" border="0" align="center">
<tbody>
<form name="myForm" id="myForm" action="search_results.php" method="post">
<tr valign="top">
<td class="text" width="100%">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr valign="top">
<td width="80%">
<p><font class="blacktext12">Music</font> <b><font color="#CC0000">&raquo;</font>
<font color="#003399">Search Results</font></b></p>
<table bordercolor="#6699cc" cellspacing="0" cellpadding="0" width="100%" border="0">
<tbody>
<tr>
<td valign="center" align="left" bgcolor="#6699cc">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td><span class='style9'>Set Search Criteria</span></td>
</tr>
</table>
</td>
</tr>

<tr valign="top" bgcolor="#d5e8fb">
<td height="80">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr valign="top">
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="blue">
<tr>
<td nowrap>Genre:
<select style="font-size: 9px;" name="genre">
<option value="0">Any Genre</option>

<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($data_set["genre1"]==$genre_set["id"])
         {
?>
<option value ="<?=$genre_set["id"]?>" selected><?=$genre_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location:
</td>
<td nowrap>
<select style="font-size: 9px;" name="Country" onchange="checkcountry()">
<option value="">Select Country</option>
<?
$sql="select * from states";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
    if($_SESSION["country"]==$RSUser["state_id"])
    {
     print "<option value='$RSUser[state_name]' selected>".$RSUser["state_name"]."</option>";
    }
    else
    {
     print "<option value='$RSUser[state_name]'>".$RSUser["state_name"]."</option>";
    }
}
?>
</td>
</tr>
<tr>
<td>
<table border="0" bordercolor="orange">
<tr>
<td nowrap>
Search By:
<select style="font-size: 9px;" name="search_term" onChange="search_choice();">
<option value="0" >Band Name</option>
<option value="1" >Band Bio</option>
<option value="2" >Band Members</option>
<option value="3" >Influences</option>
<option value="4" >Sounds like</option>
</select>
<script language="JavaScript">
DropDownSelect(document.forms.myForm.search_term, '');
</script>
</td>
</tr>
<tr>
<td>
Keyword:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="font-size: 9px;" type="text" name="keywords" size="16" maxlength="50">
</td>
</tr>
<tr>
<td>
Influences:&nbsp;&nbsp;&nbsp;<input style="font-size: 9px;" type="text" name="influences" size="16" maxlength="50">
</td>
</tr>

<tr>
<td>
Sounds Like:&nbsp;<input style="font-size: 9px;" type="text" name="influences" size="16" maxlength="50">
</td>
</tr>

</table>

<td>
<table border="0" bordercolor="orange">
<tr>
<td valign="top">
<table border="0" bordercolor="red">
<tr>
<td>
<input type="radio" disabled name="localType" value="countryState"  CHECKED onFocus="RadioClick('countryState');">
</td>
<td colspan="4">
<select style="font-size: 9px;" name="state" class="normalarial" disabled>
<?php
     $sr_no=0;
     while($sr_no<=62)
     {
         if($HTTP_POST_VARS["state"]==$state[$sr_no]&&$HTTP_POST_VARS["state"]!="0")
         {
?>
<option value='<?=$state[$sr_no]?>' selected><?=$state[$sr_no]?></option>
<?php
         }
         else
         {
?>
<option value='<?=$state[$sr_no]?>'><?=$state[$sr_no]?></option>
<?php
         }
  $sr_no=$sr_no+1;
}
?>
</select>
</td>
</tr>

<tr>
<td>
<input type="radio" name="localType" id="localType" value="distanceZip"  onFocus="RadioClick('distanceZip');">
</td>
<td nowrap>
<select style="font-size: 9px;" name="distance">
<option value="0">Any</option>
<option value="5" >5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="500">500</option>
</select>
<script language="JavaScript">
DropDownSelect(document.forms.myForm.distance, 0);
</script>
</td>

<td nowrap>miles of</td>
<td>
<input style="font-size: 9px;" name="zip" type="text" size="7" maxlength="10" value="">
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td align="center">within</td>
<td>&nbsp;</td>
<td align="center">Zip</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

<tr valign="top">
<td colspan="2" height="2"></td>
</tr>

<tr valign="bottom">
<td colspan="3" align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td valign="bottom">
<div align="right">
<input type="submit" name="Submit2" value="Search">
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>

</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table>

</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");
}
?>
