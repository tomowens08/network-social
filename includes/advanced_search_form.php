<style type="text/css">
<!--
.style2 {font-size: 10px}
.style3 {font-family: Tahoma}
.style4 {
	font-size: 12px;
	font-family: Tahoma;
	font-weight: bold;
}
.style5 {font-family: Tahoma; font-size: 12px;}
-->
</style>
<form name="form1" action="advanced_action.php?n=0" method="post">

<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="6" width="90%">
<tr>
<td class='txt_label'><span class="style4"><b>Browse Users</b>&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
</td>
</tr>

<tr>
<table width="800" border="0" cellspacing="0" cellpadding="2" bgcolor="ffffff">
<tr valign="middle">
<td width="450">&nbsp;</td>
<td width="70" height="20"  align="center" class='style4'><a href="../browse.php">&nbsp;<b>Basic</b></a></a></td>
<td width="74" height="20" align="center"><a href='advanced_search_browse.php' class="style4">Advanced</a></td>
</tr>
</table>

<table width="800" cellspacing="0" cellpadding="2" class='dark_b_border2'>
<tr valign="top">
<td width="800" class='dark_blue_white2 style5'>&nbsp;Set  Browse Criteria</td>
</tr>
</table>

<table width="800" class='dark_b_border2' cellspacing="0" cellpadding="0">
<tr valign="top">
<table width="800" cellspacing="0" cellpadding="2">
<tr valign="top">
<td width="14%" class='txt_label' height="74">
<b>Browse for:</b><br>
<?php
     if($_SESSION["browse_gender"]=="Artists")
     {
?>
<input type="Radio" name="gender" value="Artists" checked> Artists<br>
<input type="Radio" name="gender" value="Female"> Women<br>
<input type="Radio" name="gender" value="Male"> Men<br>
<input type="Radio" name="gender" value="Both"> Both<br></td>
<?php
     }
?>
<?php
     if($_SESSION["browse_gender"]=="Female")
     {
?>
<input type="Radio" name="gender" value="Artists"> Artists<br>
<input type="Radio" name="gender" value="Female" checked> Women<br>
<input type="Radio" name="gender" value="Male"> Men<br>
<input type="Radio" name="gender" value="Both"> Both<br></td>
<?php
     }
?>

<?php
     if($_SESSION["browse_gender"]=="Male")
     {
?>
<input type="Radio" name="gender" value="Artists"> Artists<br>
<input type="Radio" name="gender" value="Female"> Women<br>
<input type="Radio" name="gender" value="Male" checked> Men<br>
<input type="Radio" name="gender" value="Both"> Both<br></td>
<?php
     }
?>


<?php
     if($_SESSION["browse_gender"]=="Both")
     {
?>
<input type="Radio" name="gender" value="Artists"> Artists<br>
<input type="Radio" name="gender" value="Female"> Women<br>
<input type="Radio" name="gender" value="Male"> Men<br>
<input type="Radio" name="gender" value="Both" checked> Both<br></td>
<?php
     }
?>

<?php
     if($_SESSION["browse_gender"]==Null)
     {
?>
<input type="Radio" name="gender" value="Artists"> Artists<br>
<input type="Radio" name="gender" value="Female"> Women<br>
<input type="Radio" name="gender" value="Male"> Men<br>
<input type="Radio" name="gender" value="Both" checked> Both<br></td>
<?php
     }
?>


<td width="20%" class='txt_label' height="74">
<b>Between Ages:<br><br>
<select name="agefrom" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
     $sr_no=18;
     while($sr_no<=100)
     {
         if($sr_no==18)
         {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
         }
         else
         {
?>
<option value="<?=$sr_no?>"><?=$sr_no?></option>
<?php
         }
     $sr_no=$sr_no+1;
     }
?>
</select></font></b> and <b>
<font color="#336699">
<select name="ageto" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
     $sr_no=18;
     while($sr_no<=100)
     {
?>
<option value="<?=$sr_no?>" selected><?=$sr_no?></option>
<?php
     $sr_no=$sr_no+1;
     }
?>
</select></font></b></td>
<td width="32%" class='txt_label' height="74"><b>who are:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="47%" class='txt_label'>
<input type="Checkbox" name="type[]" value="S"> Single<br>
<input type="Checkbox" name="type[]" value="D"> Divorced</td>
<td width="53%" class='txt_label'>
<input type="Checkbox" name="type[]" value="M"> Married<br>
<input type="Checkbox" name="type[]" value="O"> Swingers</td>
</tr>

<tr>
<td width="100%" colspan="2" class='txt_label'>
<input type="Checkbox" name="type[]" value="R"> In a Relationship
</td>
</tr>
</table>
</td>
<td width="31%" height="74" class='txt_label'><b>and are here for:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="45%" class='txt_label'>
<input type="Checkbox" name="status[]" value="Dating">Dating<br>
<input type="Checkbox" name="status[]" value="Relationships">Relationships</td>
<td width="55%" class='txt_label'>
<input type="Checkbox" name="status[]" value="Networking">Networking<br>
<input type="Checkbox" name="status[]" value="Friends">Friends
</td>
</tr>
</table>
</td>
</tr>
<tr valign="top">
<td colspan="2" width='400'>
<table cellpading="0" cellspacing="0" border="0">

<script language="JavaScript" type="text/javascript">
<!--

if ( ('United States of America' == 'United States of America')  ||  ('US' == 'CA')  || ('US' == 'UK')  ) {
	//document.form1.Country.disabled = false;
	//document.form1.distance.disabled = false;
	//document.form1.Postal.disabled = false;
} else {
	document.form1.Country.disabled = false;
	document.form1.distance.disabled = true;
	document.form1.Postal.disabled = true;
}

function checkcountry() {
	var CONT = document.form1.Country;
	var countryname = CONT.options[CONT.selectedIndex].value;
	if ((countryname == 'United States of America') || (countryname == 'CA') || (countryname == 'UK')) {
		document.form1.Country.disabled = false;
		document.form1.distance.disabled = false;
		document.form1.Postal.disabled = false;
		document.form1.Postal.value="";
	} else {
		document.form1.Country.disabled = false;
		document.form1.distance.disabled = true;
		document.form1.Postal.disabled = true;
		document.form1.Postal.value="";
	}
}
//-->
</script>

<tr>
<td colspan='2' class='txt_label'><b>located within:</b></td>
</tr>
<tr>
<td class='txt_label'><b class="style4">Country:</b></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;
<select name="Country" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif" onChange="checkcountry()">
<option value='--Null--'>Choose Country</option>
<?
$sql="select * from states";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
    if($_SESSION["country"]==$RSUser["state_name"])
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
<td valign='top' class='txt_label'><b>Zip:</b></td>
<td class='txt_label'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="distance"
<?php
     if($_SESSION["country"]!="United States of America")
     {
?>
disabled
<?php
     }
?>
style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif">
<?php
     if($_SESSION["distance"]==Null)
     {
?>
<option value="" selected>Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="250">250</option>
<?php
     }
?>
<?php
     if($_SESSION["distance"]=="5")
     {
?>
<option value="">Any</option>
<option value="5" selected>5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="250">250</option>
<?php
     }
?>
<?php
     if($_SESSION["distance"]=="10")
     {
?>
<option value="">Any</option>
<option value="5">5</option>
<option value="10" selected>10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="250">250</option>
<?php
     }
?>
<?php
     if($_SESSION["distance"]=="20")
     {
?>
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20" selected>20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="250">250</option>
<?php
     }
?>

<?php
     if($_SESSION["distance"]=="50")
     {
?>
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50" selected>50</option>
<option value="100">100</option>
<option value="250">250</option>
<?php
     }
?>

<?php
     if($_SESSION["distance"]=="100")
     {
?>
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100" selected>100</option>
<option value="250">250</option>
<?php
     }
?>


<?php
     if($_SESSION["distance"]=="250")
     {
?>
<option value="">Any</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="250" selected>250</option>
<?php
     }
?>

</select>
miles of
<input type="text" name="Postal" size="10" maxlength="10" value="<?=$_SESSION["postal"]?>" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif"></td>
</tr>

<tr>
<td class='txt_label'><b>City:</b></td>
<td class='txt_label'>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="city" size="20" value="<?=$_SESSION["city"]?>" style="font-size: 10px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif"></td>
</tr>

</table>
</td>
<td colspan="3" class='txt_label' width="300" height="74"><b>artists who want to:</b><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="33%" class='txt_label'>
<input type="Checkbox" name="artist_here[]" value="Networking with Fans"> Networking with Fans<br>
<input type="Checkbox" name="artist_here[]" value="Networking with Bands"> Networking with Bands<br>
<input type="Checkbox" name="artist_here[]" value="Fan Community"> Fan Community<br>
<input type="Checkbox" name="artist_here[]" value="Distribution"> Distribution<br>
<input type="Checkbox" name="artist_here[]" value="Promotion"> Promotion<br>
<input type="Checkbox" name="artist_here[]" value="Online Marketing"> Online Marketing<br>
<input type="Checkbox" name="artist_here[]" value="Record Deal"> Record Deal<br>

<td width="33%" class='txt_label'>
<input type="Checkbox" name="artist_here[]" value="Concert Gigs"> Concert Gigs<br>
<input type="Checkbox" name="artist_here[]" value="Constructive Reviews"> Constructive Reviews<br>
<input type="Checkbox" name="artist_here[]" value="Recording"> Recording<br>
<input type="Checkbox" name="artist_here[]" value="Licensing"> Licensing<br>
<input type="Checkbox" name="artist_here[]" value="Manager"> Manager<br>
<input type="Checkbox" name="artist_here[]" value="Producer"> Producer<br>
<input type="Checkbox" name="artist_here[]" value="Attorney"> Attorney<br>
</td>
</tr>

</table>
</td>
</tr>

</table>
</td>
</tr>

<tr><td colspan='2'>
<TABLE class=group>

<tr>
<td width='100%' class='dark_blue_white2' colSpan='4'>
  <span class="style4">&nbsp;<b>Personal Info:</b></span></td>
</tr>

<TR>
<TD class='txt_label'><b class="style4">Ethnicity:</b>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TR>
<td class='txt_label'>
<?php
     $sr_no=0;
     $count=count($ethnicity);
     while($sr_no<$count)
     {
         if($sr_no%10==0)
         {
             print "</td><td>";
         }
?>
<input type="checkbox" name="ethnicity[]" value='<?=$ethnicity[$sr_no]?>'><font face='Tahoma' size='1'><?=$ethnicity[$sr_no]?></font><br>
<?php
       $sr_no=$sr_no+1;
     }
?>
</TR></TABLE></TD>
<TD valign='top' class='txt_label'><span class="style4">Body type:</span>
<TABLE cellSpacing=0 cellPadding=0 border=0>
<TR>
<TD class='txt_label style2'>
<input type="checkbox" name="body[]" value='Slim / Slender'>
<span class="style3">Slim/Slender<BR>
<input type="checkbox" name="body[]" value='Athletic'>
Athletic<BR>
<input type="checkbox" name="body[]" value='Average'>
Average<BR>
<input type="checkbox" name="body[]" value='Some extra baggage'>
Some extra baggage<BR>
<input type="checkbox" name="body[]" value='More to love!'>
Some extra baggage<BR>
<input type="checkbox" name="body[]" value='Body builder'>
Body builder</span><BR></TD>
</TR>
</TABLE></TD>

<td valign='top'>
<table>
<TR>
<TD class='txt_label'><b class="style4">Height:</b></TD>
</TR>
<TR>
<TD class='txt_label'>
<input id="heightBetween" type="radio" name="Height" value="heightBetween" />
<span class="style5">Between</span></TD>
<TD class='txt_label'>
<select name="min_foot">
<option selected="selected" value="3">3'</option>
<option value="4">4'</option>
<option value="5">5'</option>
<option value="6">6'</option>
<option value="7">7'</option>
</select>&nbsp;<span class="style5">ft.&nbsp;</span>
<select name="min_inch">
<option selected="selected" value="0">0&quot;</option>
<option value="1">1&quot;</option>
<option value="2">2&quot;</option>
<option value="3">3&quot;</option>
<option value="4">4&quot;</option>
<option value="5">5&quot;</option>
<option value="6">6&quot;</option>
<option value="7">7&quot;</option>
<option value="8">8&quot;</option>
<option value="9">9&quot;</option>
<option value="10">10&quot;</option>
<option value="11">11&quot;</option>
</select>&nbsp;<span class="style5">in</span>. </TD></TR>

<TR>
<TD class='style5' align=right>and</TD>
<TD>
<select name="max_foot">
<option value="3">3'</option>
<option value="4">4'</option>
<option value="5">5'</option>
<option value="6">6'</option>
<option selected="selected" value="7">7'</option>
</select>&nbsp;<span class="style5">ft.</span>&nbsp;

<select name="max_inch">
<option value="0">0&quot;</option>
<option value="1">1&quot;</option>
<option value="2">2&quot;</option>
<option value="3">3&quot;</option>
<option value="4">4&quot;</option>
<option value="5">5&quot;</option>
<option value="6">6&quot;</option>
<option value="7">7&quot;</option>
<option value="8">8&quot;</option>
<option value="9">9&quot;</option>
<option value="10">10&quot;</option>
<option selected="selected" value="11">11&quot;</option>
</select>&nbsp;<span class="style5">in.</span> </TD>
</TR></TABLE>
<span class='txt_label'>
<input type="radio" name="height" checked="checked" />
<span class="style5">No preference </span></TD>
</TR></TABLE>

</td></tr>


</table>
</td>
</tr>


<tr>
<td align="center">
<table width="800" border="0" cellspacing="0" cellpadding="4" class='dark_b_border2'>
<tr valign="middle">
<td width="500" class='dark_blue_white2'>
&nbsp;<span class="style5">Sort Results by:
</span>
<input type="radio" name="orderby" value="1"> <span class="style5">Recently Updated </span>&nbsp;&nbsp;&nbsp;</font></b></font>
<font color="#FFFFFF"><b><font size="1">
<input type="radio" name="orderby" value="2">
</font></b></font><span class="style5"> Last Login</span><b><b>
<font size="1"> &nbsp;&nbsp;&nbsp;</font></b></b><font color="#FFFFFF"><b><font color="#FFFFFF"><b>
<font size="1">
<input type="radio" name="orderby" value="3" checked></font></b></font></b></font><span class="style5"> New to</span><font color="#FFFFFF"><b><font color="#FFFFFF"><b><font size="1"> 
<?=$site_name?>
</font></b></font></b></font></td>
<td width="131" class='dark_blue_white2'><div align="right">
<input name="formSubmit" id="formSubmit" value="Update" class="txt_topic" type="submit" width="70" height="26" border="0"></div></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff">&nbsp;</td>
</tr>
</form>
</table>

