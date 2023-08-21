<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<table width='450' border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCFE">
<td width="1" rowspan="19"><div align="right" class="style9"></div>
<div align="center">
</div></td>
<td height="30" colspan="3">
<div align="left"><span class="style9">
<?
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong>Forgot Password &nbsp;&nbsp;</strong></span></div>
<?
}
  else
{
if($HTTP_GET_VARS["err"]==1)
{
?>
<strong> Forgot Password &nbsp;&nbsp;<br>(The email address does not exist in the database.) </strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==2)
{
?>
<strong>(You did not enter any email address.) Forgot Password &nbsp;&nbsp;</strong></span></div>
<?
}
}
?>
</td>
<form name="form1" method="post" action="forgot_password1.php" onsubmit="return(verify2(this))">
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
<span class="style9"><strong>&nbsp;</strong></span>E-Mail Address:</td>
<td width="346" height="30">
<input type='text' name='email' size='20'>
</td>
</tr>
</tr>
<tr bgcolor="#CCCCFE">
<td height="30" colspan="2" bgcolor="#FFFFFF"><div align="center">
  <input type="submit" name="Submit" value="Send My Password">
</div></td>
</tr>
</table>
</form>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
