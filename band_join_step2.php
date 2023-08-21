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
<?php
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong>&nbsp;Musicians Signup&nbsp;&nbsp;Step 3</strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==1)
{
?>
<strong>(You did not enter all the required fields) Musicians Signup Process&nbsp;&nbsp;</strong></span></div>
<?
}
if($HTTP_GET_VARS["err"]==2)
{
?>
<strong>(The email address you choose is already registered with us.) Musicians Signup Process&nbsp;&nbsp;</strong></span></div>
<?
}
?>
</td>
</tr>

<tr><td>

<!-- middle_content -->
<?php
include("includes/signup.class.php");
include("includes/misc.class.php");

    $signup=new signup;
    $misc=new misc;

?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php

$username=$HTTP_POST_VARS["username"];
$genre1=$HTTP_POST_VARS["genre1"];
$genre2=$HTTP_POST_VARS["genre2"];
$genre3=$HTTP_POST_VARS["genre3"];
$url=$HTTP_POST_VARS["url"];
$label=$HTTP_POST_VARS["label"];
$gabelType=$HTTP_POST_VARS["gabelType"];

$here_for1=$HTTP_POST_VARS["here_for"];
$here_for='';
$sr_no=0;
if (is_array($here_for1)) {
foreach($here_for1 as $aa)
{
    if($sr_no==0)
    {
        $here_for=$aa;
    }
    else
    {
        $here_for=$here_for.",".$aa;
    }
    $sr_no=$sr_no+1;
}
}


if ($genre1==Null)
{
?>
<form name='send_back' action='band_join.php?err=1&user_id=<?=$HTTP_GET_VARS["user_id"]?>' method='post'>
</form>
<script language='JavaScript'>
document.send_back.submit();
</script>
<?php
}
else
{
    $num_rows=$signup->check_username($username);
    if($num_rows==1)
    {
        // send user back
?>
<form name='send_back' action='band_join.php?err=2&user_id=<?=$HTTP_GET_VARS["user_id"]?>' method='post'>
</form>
<script language='JavaScript'>
document.send_back.submit();
</script>
<?php
        // send user back
    }
    else
    {
        $user_id=$HTTP_GET_VARS["user_id"];

        // add user to database
           $res=$signup->music_step2($user_id, $username,$genre1,$genre2,$genre3,$url,$label, $gabelType, $here_for);
        // add user to database
           if($res!=0)
           {
                   // Send Verification Email
                      $user_id=$HTTP_GET_VARS["user_id"];
//                      $verify_code=1234*$user_id;
//                      $send=$signup->send_verification_email($first_name, $email,$password,$verify_code,$email_name,$site_email,$site_name, $site_url);
                   // Send Verification Email

                   // show them next step
?>

<table width='450' border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCFE">
<tr>
<td height="30" colspan='2' class='txt_label'>
Your account has been created.<br>
An email has been sent to your email address.<br>
Please verify the email address.<br>
You will not be able to use your account unless you do that.<br>
<a href='upload_new_photo.php?user_id=<?=$user_id?>' class="style11" target='_top'>Upload Your Photographs</a>
</td>
</tr>
<?php
  print "<form name='UploadImages' action='upload_new_photo1.php?user_id=$HTTP_GET_VARS[user_id]' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";

  print "<INPUT TYPE='FILE' SIZE='40' NAME='image'><BR>";
  print "</td></tr>";

  print "<tr>";
  print "<td width='100%' align='center' colspan='2' class='login'><p align='center'><input class='txt_topic' type='submit' name='submit' value='Save Changes'>&nbsp;
	<input class='txt_topic' style='WIDTH: 80px' onclick=\"document.location.href='invite.php?new=1';return false;\" type=button value='Skip For Now' name=btnreg></p></td></tr>";
  print "</form>";

        // show them next step
?>
<?php

           }
    }
}

?>

</table>
</td></tr>
</table>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
