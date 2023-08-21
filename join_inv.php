<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");

//include("includes/right.php");
function my_rand($min, $max)
{
mt_srand((double)microtime() * 1000000);
return(rand()%(($max-$min)+1) + $min);
}

?>
<!-- middle_content -->
<?php
     include("includes/packages.class.php");
     $pack=new packages;

	$sql = "SELECT state_id FROM states WHERE def";
	$def_country = mysql_fetch_array(mysql_query($sql));
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">
<?php
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong><font color="#000000">&nbsp;Sign Up Process&nbsp;&nbsp;Step 1</font></strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==1)
{
?>
<strong><font color="#ff0000">(You did not enter all the required fields) Sign Up Process&nbsp;&nbsp;</font></strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==2)
{
?>
<strong><font color="#ff0000">(The email address you choose is already registered with us.) Sign Up Process&nbsp;&nbsp;</font></strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==3)
{
?>
<strong><font color="#ff0000">(The verification number you entered is incorrect.) Sign Up Process&nbsp;&nbsp;</font></strong></span></div>
<?
}
?>
</td>
</tr>

<tr><td>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
function checkPostCode () {
	if (form1.country.options[form1.country.selectedIndex].value == <?=$def_country['state_id']?>) {
		toggleDisplay("pc_layer",true);
		toggleDisplay("state_opt",true);
		toggleDisplay("non_us_state",false);
	} else {
		toggleDisplay("pc_layer",false);
		toggleDisplay("state_opt",false);
		toggleDisplay("non_us_state",true);
	}
}
function toggleDisplay(id,display){
	if(display){
		this.document.getElementById( id).style.display='inline'
		if(this.document.getElementById(id+"link") != undefined){
			this.document.getElementById(id+"link").style.display='none';
		}
	}else{
		this.document.getElementById(  id).style.display='none'
		if(this.document.getElementById(id+"link") != undefined){
			this.document.getElementById(id+"link").style.display='inline';
		}
	}
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="form1" method="post" action="join_inv2.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>" onsubmit="return(verify(this))">
<?php
     include("classes/invite.class.php");
     $invite=new invite;
     $status=$invite->get_status();
     if($status=="1")
     {
?>
<tr>
<td height="30" class='style9' colspan="2"><div align="center">&nbsp;</div></td>
</tr>

<tr>
<td height="10" colspan='2' class='txt_label'>The signups are currently disabled. We allow only invited people to join.</td>
</tr>

<?php
     }
     else
     {
?>
<tr>
<td height="10"></td>
<td height="10"></td>
</tr>
<tr>
<td width="194" class='txt_label'>
<strong>&nbsp;</strong></span>Current Country:</td>
<td width="346" height="30">
<!-- Main State Code -->
<select onchange="checkPostCode();" name="country">
<? 
$sql="select * from states order by state_name";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
		if (!$HTTP_GET_VARS["country_id"] && $RSUser['def'])
			$HTTP_GET_VARS["country_id"] = $RSUser["state_id"];
			

    if($HTTP_GET_VARS["country_id"]==$RSUser["state_id"])
    {
     print "<option value='$RSUser[state_id]' selected>".$RSUser["state_name"]."</option>";
    }
    else
    {
     print "<option value='$RSUser[state_id]'>".$RSUser["state_name"]."</option>";
    }
}
?>
</select></td>
</tr>

<!-- Main State Code -->

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Email Address:</td>
<td height="30">
<input type='text' name='email' size='25' value='<?=$HTTP_POST_VARS["email"]?>'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>First Name:</td>
<td height="30">
<input type='text' name='first_name' size='25' value='<?=$HTTP_POST_VARS["first_name"]?>'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Last Name:</td>
<td height="30">
<input type='text' name='last_name' size='25' value='<?=$HTTP_POST_VARS["last_name"]?>'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Password:</td>
<td height="30">
<input type='password' name='password' size='25'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Confirm Password:</td>
<td height="30">
<input type='password' name='password1' size='25'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>City:</td>
<td height="30">
<input type='text' name='city' size='25' value='<?=$HTTP_POST_VARS["city"]?>'>
</td>
</tr>


<tr id="state_opt">
<td class='txt_label'><strong>&nbsp;</strong>State:</td>
<td height="30">
<select name='us_state'>
<option value=''>Pick your State</option>
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

<tr id="non_us_state">
<td class='txt_label'><strong>&nbsp;</strong>Non-US State:</td>
<td height="30">
<input type='text' name='other_state' size='25' value='<?=$HTTP_POST_VARS["other_state"]?>'>
</td>
</tr>


<tr id="pc_layer">
<td class='txt_label'><strong>&nbsp;</strong>Postal Code:</td>
<td height="30">
<input type='text' name='postal_code' size='25' value='<?=$HTTP_POST_VARS["postal_code"]?>'>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Gender:</td>
<td height="30" class='txt_label'>
<?php
     if($HTTP_POST_VARS["gender"]=="Male")
     {
?>
<input type='radio' name='gender' value='Male' checked>Male&nbsp;
<input type='radio' name='gender' value='Female'>Female&nbsp;
<?php
     }
     else
     {
?>
<input type='radio' name='gender' value='Male'>Male&nbsp;
<input type='radio' name='gender' value='Female' checked>Female&nbsp;
<?php
     }
?>
</td>
</tr>

<tr>
<td class='txt_label'><strong>&nbsp;</strong>Date Of Birth:</td>
<td height="30" class='style9'>
<select name='month' size='1'>
<option value="">Month
<option value="">--
<?php
     $sr_no=0;
     while($sr_no!=12)
     {
         if($HTTP_POST_VARS["month"]==$month[$sr_no])
         {
          print "<option value='$sr_no' selected>$month[$sr_no]</option>";
         }
         else
         {
          print "<option value='$sr_no'>$month[$sr_no]</option>";
         }
         $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;/&nbsp;
<select name='day' size='1'>
<option value="">Day
<option value="">--
<?php
     $sr_no=1;
     while($sr_no!=32)
     {
         if($HTTP_POST_VARS["day"]==$sr_no)
         {
          print "<option value='$sr_no' selected>$sr_no</option>";
         }
         else
         {
          print "<option value='$sr_no'>$sr_no</option>";
         }
         $sr_no=$sr_no+1;
     }
?>
</select>&nbsp;/&nbsp;
<select name='year' size='1'>
<option value="">Year
<option value="">--
<?php
     $sr_no = date('Y') - 15;
     while($sr_no!=1904)
     {
         if($HTTP_POST_VARS["year"]==$sr_no)
         {
          print "<option value='$sr_no' selected>$sr_no</option>";
         }
         else
         {
          print "<option value='$sr_no'>$sr_no</option>";
         }
         $sr_no=$sr_no-1;
     }
?>
</select>
</td>
</tr>

<tr>
<td class='txt_label' valign='top'><strong>&nbsp;</strong>Here for:</td>
<td height="30" class='txt_label'>
<input type='checkbox' name='here_for[]' value='Dating'>&nbsp;Dating<br>
<input type='checkbox' name='here_for[]' value='Marriage'>&nbsp;Marriage<br>
<input type='checkbox' name='here_for[]' value='Relationships'>&nbsp;Relationships<br>
<input type='checkbox' name='here_for[]' value='Friends'>&nbsp;Friends<br>
<input type='checkbox' name='here_for[]' value='Long relationship'>&nbsp;Long relationship<br>
<input type='checkbox' name='here_for[]' value='Marriage & Children'>&nbsp;Marriage & Children<br>
<input type='checkbox' name='here_for[]' value='Activity Partner'>&nbsp;Activity Partner<br>
</td>
</tr>

<!--
<tr>
<td class='txt_label'><strong>&nbsp;</strong>Choose Package:</td>
<td height="30">
<select name='package' size='1'>
<?php
     $pack_res=$pack->get_all();
     while($pack_set=mysql_fetch_array($pack_res))
     {
?>
<option value='<?=$pack_set["id"]?>'><?=$pack_set["pack_name"]?>&nbsp;(Price USD $<?=$pack_set["price"]?>)</option>
<?php
     }
?>
</select>
</td>
</tr>
-->
<input type="Hidden" name="package" value="<?=$pack_set["id"]?>">
<tr>
<td width='100%' colspan='2'>
<p align='center' class='txt_label'>
<?php
     // generate random number
        srand((double)microtime()*1000000);
        $number=rand(10000,9999999);
     // generate random number
        $_SESSION["confirm_number"]=$number;
?>
<img src='image_number.php?text=<?=$number?>'>
<br>
Please enter the above number:
<br>
<input type='text' name='entered_number' size='10'>
</p>
</td>
</tr>



<tr>
<td height="30" class='txt_label' colspan="2"><div align="center">
<input type="submit" name="Submit" value="Submit">
<br>By clicking on submit button, you agree to our <a href='terms.php' class='txt_label' target='_blank'>Terms and Conditions</a>
</div></td>
</tr>
<?php
     }
?>
</table>

</td></tr>
</table>
<script>
	checkPostCode();
</script>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
