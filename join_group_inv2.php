<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">
<?php
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong>&nbsp;Sign Up Process&nbsp;&nbsp;Step 2</strong></span></div>
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
</tr>
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

$country_id=$HTTP_POST_VARS["country"];
$email=$HTTP_POST_VARS["email"];
$first_name=$HTTP_POST_VARS["first_name"];
$last_name=$HTTP_POST_VARS["last_name"];
$password=addslashes($HTTP_POST_VARS["password"]);
$city=$HTTP_POST_VARS["city"];
$state=$HTTP_POST_VARS["us_state"];
$other_state=$HTTP_POST_VARS["other_state"];

$postal_code=$HTTP_POST_VARS["postal_code"];
$gender=$HTTP_POST_VARS["gender"];
$month=$HTTP_POST_VARS["month"];
$day=$HTTP_POST_VARS["day"];
$year=$HTTP_POST_VARS["year"];
$package=$HTTP_POST_VARS["package"];
$here_for1=$HTTP_POST_VARS["here_for"];
$here_for='';
$sr_no=0;
if($here_for1!=Null)
{
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

if ($email==Null||$first_name==Null||$password==Null||!isset($HTTP_POST_VARS["us_state"])||$gender==Null||$_SESSION["confirm_number"]!=$HTTP_POST_VARS["entered_number"])
{
if($_SESSION["confirm_number"]!=$HTTP_POST_VARS["entered_number"])
{
?>
<form name='send_back' action='join_group_inv.php?country_id=<?=$country_id?>&err=3' method='post'>
<?php
}
else
{
?>
<form name='send_back' action='join_group_inv.php?country_id=<?=$country_id?>&err=1' method='post'>
<?php
}
?>
<input type='hidden' name='email' value='<?=$email?>'>
<input type='hidden' name='first_name' value='<?=$first_name?>'>
<input type='hidden' name='last_name' value='<?=$last_name?>'>
<input type='hidden' name='state' value='<?=$state?>'>
<input type='hidden' name='city' value='<?=$city?>'>
<input type='hidden' name='other_state' value='<?=$other_state?>'>
<input type='hidden' name='postal_code' value='<?=$postal_code?>'>
<input type='hidden' name='gender' value='<?=$gender?>'>
<input type='hidden' name='month' value='<?=$month?>'>
<input type='hidden' name='day' value='<?=$day?>'>
<input type='hidden' name='year' value='<?=$year?>'>
</form>
<script language='JavaScript'>
document.send_back.submit();
</script>
<?php
}
else
{

    $num_rows=$signup->check_email($email);
    if($num_rows==1)
    {
        // send user back
?>
<form name='send_back' action='join_group_inv.php?country_id=<?=$country_id?>&err=2' method='post'>
<input type='hidden' name='email' value='<?=$email?>'>
<input type='hidden' name='first_name' value='<?=$first_name?>'>
<input type='hidden' name='last_name' value='<?=$last_name?>'>
<input type='hidden' name='state' value='<?=$state?>'>
<input type='hidden' name='city' value='<?=$city?>'>
<input type='hidden' name='postal_code' value='<?=$postal_code?>'>
<input type='hidden' name='gender' value='<?=$gender?>'>
<input type='hidden' name='month' value='<?=$month?>'>
<input type='hidden' name='day' value='<?=$day?>'>
<input type='hidden' name='year' value='<?=$year?>'>
</form>
<script language='JavaScript'>
document.send_back.submit();
</script>
<?php
        // send user back
    }
    else
    {
        $dob=$year."-".$month."-".$day;
        $country=$misc->get_countryname($country_id);
        
        // add user to database
           include("includes/packages.class.php");
           $pack = new packages;
           $pack_set = $pack->get_pack($package);
           if($pack_set["price"]==0.0)
           {
            $res = $signup->step1($package,$country_id, $email, $first_name,$last_name,$password,$city,$state,$postal_code,$gender,$dob, $month,$day,$year,$here_for);
           	if ($res) {
							$sql = "UPDATE members SET date_created = SYSDATE(), ip_created = '".$_SERVER['REMOTE_ADDR']."' WHERE member_id = ".$res;
							mysql_query($sql);
						}
					 }
           else
           {
            $res = $signup->step_paid($package,$country_id, $email, $first_name,$last_name,$password,$city,$state,$postal_code,$gender,$dob, $month,$day,$year,$here_for);
           }
        // add user to database
           if($res!=0)
           {
		       include("includes/profile.class.php");
               $profile=new profile;
               $friend_id=$profile->get_default_friend();
               $friend_res=$profile->add_default_friend($friend_id,$res);

			   
			   $sql="insert into invitations";
               $sql.="(member_id";
               $sql.=", friend_id";
			   $sql.=", group_id";
               $sql.=", approve";
               $sql.=", deleted";
			   $sql.=", is_invited";
               $sql.=", status)";
               $sql.=" values($res";
               $sql.=", 0";
			   $sql.=", $HTTP_GET_VARS[group_id]";
               $sql.=", 0";
			   $sql.=", 0";
               $sql.=", 1";
               $sql.=", 1)";
               
               $ins=mysql_query($sql);
               
                   // Send Verification Email
                      $user_id=$res;
                      $verify_code=1234*$user_id;
                      $send=$signup->send_verification_email($first_name, $email,$password,$verify_code,$email_name,$site_email,$site_name, $site_url);
                   // Send Verification Email

                   // show them next step

  $_SESSION["logged_in"]="yes";
  $_SESSION["member_id"]=$user_id;
  $_SESSION["member_name"]=$first_name;
  $_SESSION["member_lname"]=$last_name;
  $_SESSION["member_email"]=$email;
  $_SESSION["member_password"]=$password;
  $_SESSION["package"]=$package;
  $_SESSION["enabled"]=0;

  print "<form name='UploadImages' action='upload_new_photo1.php?user_id=$user_id' ENCTYPE='multipart/form-data' method='post'>";
?>

<tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="4">

<tr>
<td class='txt_label' height="30" colspan="2">
<strong>Upload Your Photo Graph</strong>
</td>
</tr>

<tr>
<td width="100%" colspan='2' class='txt_label'>
Your account has been created.<br>
An email has been sent to your email address.<br>
Please verify the email address.<br>
You will not be able to use your account unless you do that.<br>
</td>
</tr>

<tr>
<td width="194" class='txt_label'>
Select Photo:</td>
<td width="346" height="30">
<input type='file' size='40' name='image'>
</td>
</tr>

<!-- Main State Code -->


<tr>
<td height="30" class='style9' colspan="2"><div align="center">
<input class='txt_topic' type="submit" name="Submit" value="Submit">
<input class='txt_topic' style="WIDTH: 80px" onclick="document.location.href='invite.php?new=1';return false;" type=button value="Skip For Now" name=btnreg>
</div></td>
</tr>

<?php
        // show them next step

           }
    }
}

?>

</table>
</form>
</td></tr>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
<!-- Google Code for Signup Conversion Page -->
<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1067197466;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "FFFFFF";
if (1) {
  var google_conversion_value = 1;
}
var google_conversion_label = "Signup";
//-->
</script>
<script language="JavaScript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<img height=1 width=1 border=0 src="http://www.googleadservices.com/pagead/conversion/1067197466/?value=1&label=Signup&script=0">
</noscript>

<SCRIPT LANGUAGE="JavaScript">
<!-- Overture Services Inc. 07/15/2003
var cc_tagVersion = "1.0";
var cc_accountID = "8046106000";
var cc_marketID =  "0";
var cc_protocol="http";
var cc_subdomain = "convctr";
if(location.protocol == "https:")
{
    cc_protocol="https";
     cc_subdomain="convctrs";
}
var cc_queryStr = "?" + "ver=" + cc_tagVersion + "&aID=" + cc_accountID + "&mkt=" + cc_marketID +"&ref=" + escape(document.referrer);
var cc_imageUrl = cc_protocol + "://" + cc_subdomain + ".overture.com/images/cc/cc.gif" + cc_queryStr;
var cc_imageObject = new Image();
cc_imageObject.src = cc_imageUrl;
// -->
</SCRIPT>                                    