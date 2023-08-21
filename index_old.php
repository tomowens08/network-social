<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>


<TABLE class=dark_b_border2 cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>

<TR>
<TD bgcolor="#999999"><font color="#FFFFFF" size="2">Cool New People</font></TD>
</TR>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD valign='top'>
<table border="0" cellspacing="0" cellpadding="3" width="435" bordercolor="000000">
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

    $new_members=$profile->get_new_people();
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
<td width="130" height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a class='bold_black' href="view_profile.php?member_id=<?=$new_set["member_id"]?>" id="coolNewPersonURLa1">
<?=$image?>
<br>
<a href="view_profile.php?member_id=<?=$new_set["member_id"]?>">
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
<a class='bold_gray' href="browse.php">Browse Users</a>
</div>
</td>
<tr>
</table>
</td>
</tr>
</table>
</table>
<!-- cool new users -->

<tr><td>&nbsp;</td></tr>

<tr>
<td>
<table height='100' cellSpacing='0' cellPadding='0' width="100%">
<tbody>
<tr>
<td vAlign='top' width='469' height='110'>
<?php
     include("includes/music.class.php");
     $music=new music;
     $music_set=$music->get_latest_music_user();
     if($music_set["member_id"]!=Null)
     {
?>
<table class='dark_b_border2' cellSpacing='0' cellPadding='0' width="100%" border='0'>
<tbody>
<tr>
<td bgcolor="#999999"><font color="#FFFFFF" size="2">Musician</font></td>
</tr>

<tr>
<td>
<table height=110 cellSpacing=0 cellPadding=0 border=0>
<tbody>
<TR>
<TD height=110>
<TABLE borderColor=#000000 height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD class=text_black vAlign=center align=center width="50%">
<?php
     $num_images=$people->get_num_images($music_set["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($music_set["member_id"]);
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
        $image_url=$people->get_image($music_set["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
     $name=$people->get_name($music_set["member_id"]);
?>
<a href="view_profile.php?member_id=<?=$music_set["member_id"]?>">
<?=$image?>
</a>
</TD>
<TD>&nbsp;&nbsp; </TD>
<TD class=text vAlign=top align=left width="50%">
<a class=bold_black href="view_profile.php?member_id=<?=$music_set["member_id"]?>">
<?=$name?>
</a>
<?=$music_set["cat_name"]?>
<BR>
<?=$music_set["current_state"]?><?php
if(is_numeric($music_set["country"]))
{
$sql="select * from states where state_id = $music_set[country]";
$result=mysql_query($sql);
$data_set=mysql_fetch_array($result);
?>
<?=$data_set["state_name"]?>
<?php
}
else
{
    print $music_set["country"];
}
?>
</TD>
</TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
<?php
     }
?>

<TD width=10>&nbsp; </TD>
<?php
     $featured_id = $people->get_featured_profile();
     if($featured_id != Null)
     {
?>
<TD vAlign=top width=506 height=110>

<TABLE class=dark_b_border2 cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD bgcolor="#999999"><font color="#FFFFFF" size="2">Featured Profile</font></TD></TR>

<TR>
<TD>
<TABLE height=110 cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD height=110>
<TABLE borderColor=#000000 height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<?php
     $featured_id = $people->get_featured_profile();
     
     $num_images=$people->get_num_images($featured_id);
     if($num_images==0)
     {
         $gender=$people->check_gender($featured_id);
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
        $image_url=$people->get_image($featured_id);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
     $people_info=$people->get_info($featured_id);
     $profile_info=$people->get_profile($featured_id);
     $name=$people->get_name($featured_id);

?>
<tr>
<td class=text_black vAlign=center align=middle>
<A class=bold_black href="view_profile.php?member_id=<?=$featured_id?>"><?=$name?></A>
<br>
<a href="view_profile.php?member_id=<?=$featured_id?>">
<?=$image?>
</a>
</td>


</tr>

</TBODY>
</TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
<?php
     }
?>
<tr><td>&nbsp;</td></tr>

</TBODY></TABLE></TD></TR>

<tr><td>
<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr><td bgcolor="#999999"><font color="#FFFFFF" size="2">
Message from <?=$site_name?></font>
</td></tr>
<tr><td>
<?php
     $sql="select main_text from main_page";
     $page_res=mysql_query($sql);
     $page_set=mysql_fetch_array($page_res);
     print stripslashes($page_set["main_text"]);
?>
</td></tr>
</table>
</td></tr>

<TR>
<TD height=3></TD></TR></TBODY></TABLE></TD>
<TD width=5>&nbsp;</TD>
<TD vAlign=top width=285>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD>
<link  href="images/css_t.css" type=text/css rel=stylesheet>
<TABLE class=dark_b_border2 cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD bgcolor="#999999"><font color="#FFFFFF" size="2">Login </TD></TR>
<TR>
<TD>
<form name="frm" method="post" action="login1.php">
<TABLE width="100%" border=0>
<TBODY>
<TR>
<TD class=red_desc align=middle colSpan=2>
<?php
     if($HTTP_GET_VARS["err"]=="1")
     {
?>
Email Id or password is invalid or account has been disabled.
<?php
     }
     else
     {
?>
&nbsp;
<?php
     }
?>
</TD></TR>
<TR>
<TD class=bold_black align=left>Email </TD>
<TD align=left><INPUT name="email">
</TD></TR>

<TR>
<TD class=bold_black align=left>Password </TD>
<TD align=left><INPUT type=password name="password">
</TD></TR>

<TR>
<TD align=middle colSpan=2>
<a class=bold_gray href="forgot_password.php">Forgot your password?</A></TD></TR>
<TR>
<TD align=middle colSpan=2>&nbsp;</TD></TR>
<TR>
<TD align=middle colSpan=2><INPUT class=txt_topic style="WIDTH: 70px" type=submit value="Login" name="btnsubmit">&nbsp;&nbsp;&nbsp;
<input class=txt_topic style="WIDTH: 80px" onclick="document.location.href='join_us.php';return false;" type=button value="Sign Up" name=btnreg>
</TD></TR></TBODY></TABLE></FORM></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD height=3></TD></TR>

<TR>
<!--here add the picture of advertisement--->
<tr><td>
<table width='300' align="center" cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr><td bgcolor="#999999"><font color="#FFFFFF" size="2">
Please Support our Sponsors</font>
</td></tr>

<tr><td align="center">
<!-- add banner code here -->
<?php
    if (@include(getenv('DOCUMENT_ROOT').'/ads/phpadsnew.inc.php')) {
        if (!isset($phpAds_context)) $phpAds_context = array();
        $phpAds_raw = view_raw ('zone:5', 0, '', '', '0', $phpAds_context);
        echo $phpAds_raw['html'];
    }
?>

<!-- add banner code here -->
</td>
</tr>
</table>
</td></tr>

    </TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR><!-- #EndEditable --></TBODY></TABLE></TD></TR>

<!-- middle_content -->
<!-- Middle Text -->
</table>
<?php
include("includes/bottom1.php");
?>
