<?php
@session_start();
//if ($_SESSION['member_id']) {

	//to direct to login page wehn logged in, as with MySpace use;
	//header('Location: logincomplete.php');
	//exit;
//}
include("includes/top.php");
include("includes/nav2.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<head>
<style>

body { background-color: #ffffff; }

</style>
</head>
<body>
<TABLE width="100%" border=0 align="center" cellPadding=0 cellSpacing=0 class=dark_b_border2>
<TBODY>

<TR>
<TD bgcolor="#999999"><p class="style3"><font color="#FFFFFF" size="2">Cool New People</font></p></TD>
</TR>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD valign='top'>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr>
<td width="15" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>
<?php
    include("includes/profile.class.php");
    $profile=new profile;

    include("includes/people.class.php");
    $people=new people;

    $new_members=$profile->get_new_people(6);
    while($new_set=mysql_fetch_array($new_members))
    {
     $num_images=$people->get_num_images($new_set["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($new_set["member_id"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($new_set["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($new_set["member_id"]);
     $profile_info=$people->get_profile($new_set["member_id"]);
     $name=$people->get_name($new_set["member_id"]);
?>
<!-- person 1 -->
<td width="130" height="5" bgcolor="ffffff" align="center" class="bottom" valign="top">
<a class='bottom' href="view_profile.php?member_id=<?=$new_set["member_id"]?>" id="coolNewPersonURLa1">
<?=$image?>
<br>

<?=$name?>
</a>
</td>
<!-- person 1 -->
<?php
    }
?>

<td width="15" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>
</tr>
<tr>
<td colspan=10><img src="images/clear.gif" width="1" height="5" border="0"></td>
</tr>
<tr>
<td colspan=10>
<div align='right'>
<a href="getpaidtoshop.html" class='bottom'>Get Paid to Shop Now</a> | <a href="browse.php" class='bottom'>Browse Users &gt;&gt; </a></div>
</td>
<tr>
</table>
</td>
</tr>
</table>
<table width="720" border="0" align="center">
  <tr>
    <td align="center" valign="top"><p>
      <img src="images/ypn.jpg" width="200" height="200" border="0">
    </p>
      <p align="left">
 </p></td>
    <td align="center" valign="top">
	
	<form name="frm" method="post" action="login1.php">
<TABLE width="100%" border=0>
<TBODY>
<TR>
  <TD class=red_desc colSpan=2><div align="left"><span class="style2">Login</span></div></TD>
</TR>
<TR>
<TD colSpan=2 class=red_desc style3 style4>
<div align="left">
  <?php
     if($HTTP_GET_VARS["err"]=="1")
     {
?>
  <span class="style1"><span class="style6">Email Id or password is invalid or account has been disabled</span>.</span>
  <?php
     }
     else
     {
?>
  &nbsp;
</div>
<?php
     }
?></TD>
</TR>
<TR>
<TD align=left class=style7 style3 style4>Email:</TD>
<TD align=left><INPUT name="email" value="<?=$_COOKIE['member_email']?>"></TD>
</TR>

<TR>
<TD align=left class=style7 style3 style4>Password: </TD>
<TD align=left><INPUT name="password" type=password></TD>
</TR>
<TR>
<td><span class="style4"></span></td>
<TD align="left">
  <span class="style1"><span class="style6">Remember me</span> 
  <input type="checkbox" name="remember_me" checked value="1">
  </span></TD>
</TR>
<TR>
<TR>
<TD align="center" colspan="2">
<a href="forgot_password.php" class=style7 style5 style3 style4>Forgot your password?</A></TD>
</TR>
<TR>
<TD  colSpan=2>&nbsp;</TD></TR>
<TR>
<TD colSpan=2><INPUT class=txt_topic style="WIDTH: 70px" type=submit value="Login" name="btnsubmit">&nbsp;&nbsp;&nbsp;
<input class=txt_topic style="WIDTH: 80px" onClick="document.location.href='join_us.php';return false;" type=button value="Sign Up" name=btnreg></TD></TR></TBODY></TABLE>
	</FORM>
	<br>
	<a href="/join_us.php"><img src="/images/sign-up-now.jpg" alt="Sign Up Now" border="0" /></a>&nbsp;</td>
  </tr>
  <tr align="center" valign="top">
    <td colspan="2">
</table>
	
	 </td>
    <td align="center" valign="top">
	
</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<div align="center"></div>
<?php
include("includes/bottom4.php");
?>