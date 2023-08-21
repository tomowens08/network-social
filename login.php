<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<!-- middle_content -->
<?php
     include("includes/packages.class.php");
     $pack=new packages;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">
<strong>&nbsp;Login&nbsp;&nbsp;</strong></span></div>
</td>
</tr>

<tr><td align="center">
<br>
<table width="250" border="0" cellspacing="0" cellpadding="0">
	<form name="frm" method="post" action="login1.php">
<TBODY>
<TD class=bold_black align=left><font size="2">Email</font></TD>
<TD align=left><INPUT value="<?=$_COOKIE['member_email']?>" name="email"></TD></TR>
<TR>
<TD class=bold_black align=left><font size="2">Password</font></TD>
<TD align=left><INPUT type=password name="password"></TD></TR>
<TR>
<td>&nbsp;</td>
<TD align="left">
<font size="2">Remember me</font> <input type="checkbox" name="remember_me" checked value="1"></TD></TR>
<TR>
<TR>
<td>&nbsp;</td>
<TD align="left">
<a class=bold_gray href="forgot_password.php">Forgot your password?</A></TD></TR>
<TR>
<TD align=middle colSpan=2>&nbsp;</TD></TR>
<TR>
<TD align=middle colSpan=2><INPUT class=txt_topic style="WIDTH: 70px" type=submit value="Login" name="btnsubmit">&nbsp;&nbsp;&nbsp;
<input class=txt_topic style="WIDTH: 80px" onClick="document.location.href='join_us.php';return false;" type=button value="Sign Up" name=btnreg>
</TD></TR>
</TBODY>
</TABLE>
	</FORM>
<br>
	</td>
</tr>
</table>
<!-- middle_content -->

<!-- Middle Text -->
<?php
     include("includes/bottom.php");
?>
