<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<br>
<?php
     include("includes/packages.class.php");
     $pack=new packages;
?>
<TABLE cellSpacing=0 cellPadding=0 width='830' border=0>
<TBODY>
<TR>
<TD class=style1 width=375 valign='top'>
<BLOCKQUOTE>
<SPAN class=style1>
<div align="right"></div>
<table width='450' border="0" cellpadding="0" cellspacing="0" bordercolor="000000" bgcolor="ffffff">
<tr bgcolor="#FF6600">
<td width="1" rowspan="19"><div align="right" class="style9"></div>
<div align="center">
</div></td>
<td height="30" colspan="3">
<div align="right"><span class="style9">
<?php
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong>Sign Up Process&nbsp;&nbsp;</strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==1)
{
?>
<strong>(You did not enter all the required fields) Sign Up Process&nbsp;&nbsp;</strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==2)
{
?>
<strong>(The email address you choose is already registered with us.) Sign Up Process&nbsp;&nbsp;</strong></span></div>
<?
}
?>
</td>
<form name="form1" method="post" action="join_inv2.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<td width="1" rowspan="19"><div align="right" class="style9"></div>
<div align="center">
</div></td>
</tr>
<tr>
<td height="10"></td>
<td height="10"></td>
</tr>
<tr>
<td width="194" class="style1 style9">
<span class="style9"><strong>&nbsp;</strong></span>Current Country:</td>
<td width="346" height="30">
<!-- Main State Code -->
<select name="country">
<?
$sql="select * from states";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
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
<td height="10"></td>
<td height="10"></td>
</tr>
<tr bgcolor="#FF6600">
<td height="30" colspan="2" class="style9"><strong>&nbsp;Join Us Free:</strong></td>
</tr>
<tr>
<td height="10"></td>
<td height="10"></td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>Email Address:</td>
<td height="30">
<input type='text' name='email' size='25' value='<?=$HTTP_POST_VARS["email"]?>'>
</td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>First Name:</td>
<td height="30">
<input type='text' name='first_name' size='25' value='<?=$HTTP_POST_VARS["first_name"]?>'>
</td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>Last Name:</td>
<td height="30">
<input type='text' name='last_name' size='25' value='<?=$HTTP_POST_VARS["last_name"]?>'>
</td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>Password:</td>
<td height="30">
<input type='password' name='password' size='25'>
</td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>State:</td>
<td height="30">
<select name='us_state'>
<option value='0'>Non-US State</option>
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
<td class="style9"><strong>&nbsp;</strong>Non-US State:</td>
<td height="30">
<input type='text' name='other_state' size='25' value='<?=$HTTP_POST_VARS["other_state"]?>'>
</td>
</tr>


<tr>
<td class="style9"><strong>&nbsp;</strong>Postal Code:</td>
<td height="30">
<input type='text' name='postal_code' size='25' value='<?=$HTTP_POST_VARS["postal_code"]?>'>
</td>
</tr>

<tr>
<td class="style9"><strong>&nbsp;</strong>Gender:</td>
<td height="30" class='style9'>
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
<td class="style9"><strong>&nbsp;</strong>Date Of Birth:</td>
<td height="30" class='style9'>
<select name='month' size='1'>
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
<?php
     $sr_no=2005;
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
<td class="style9"><strong>&nbsp;</strong>Here for:</td>
<td height="30">
<select name='here_for' size='1'>
<option value='Dating'>Dating</option>
<option value='Networking'>Networking</option>
<option value='Relationships'>Relationships</option>
<option value='Friends'>Friends</option>
</select>
</td>
</tr>


<tr>
<td class="style9"><strong>&nbsp;</strong>Choose Package:</td>
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


<tr bgcolor="#FF6600">
<td height="30" class='style9' colspan="2"><div align="center">
<input type="submit" name="Submit" value="Submit">
<br>By clicking on submit button, you agree to our <a href='terms.php' target='_blank'>Terms and Conditions</a>
</div></td>
</tr>
</table>
</form>
</TBODY></TABLE></DIV>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
