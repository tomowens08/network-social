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
<strong>&nbsp;Musicians Signup&nbsp;&nbsp;Step 2</strong></span></div>
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

$email=$HTTP_POST_VARS["email"];
$band_name=$HTTP_POST_VARS["first_name"];
$password=$HTTP_POST_VARS["password"];
$genre=$HTTP_POST_VARS["genre"];
$country_id=$HTTP_POST_VARS["country"];
$postal_code=$HTTP_POST_VARS["postal"];

if ($email==Null||$band_name==Null||$password==Null||$postal_code==Null)
{
?>
<form name='send_back' action='music_signup.php?err=1' method='post'>
<input type='hidden' name='email' value='<?=$email?>'>
<input type='hidden' name='first_name' value='<?=$band_name?>'>
<input type='hidden' name='password' value='<?=$password?>'>
<input type='hidden' name='postal_code' value='<?=$postal_code?>'>
<input type='hidden' name='genre' value='<?=$genre?>'>
<input type='hidden' name='country_id' value='<?=$country_id?>'>
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
<form name='send_back' action='music_signup.php?err=2' method='post'>
<input type='hidden' name='email' value='<?=$email?>'>
<input type='hidden' name='first_name' value='<?=$band_name?>'>
<input type='hidden' name='password' value='<?=$password?>'>
<input type='hidden' name='postal_code' value='<?=$postal_code?>'>
<input type='hidden' name='genre' value='<?=$genre?>'>
<input type='hidden' name='country_id' value='<?=$country_id?>'>
</form>
<script language='JavaScript'>
document.send_back.submit();
</script>
<?php
        // send user back
    }
    else
    {
        $country = $HTTP_POST_VARS["country"];

        // add user to database
        if($HTTP_GET_VARS["err"]==Null)
        {
           $res=$signup->music_step1($country,$email,$band_name,$password,$postal_code,$genre);
        }
        else
        {
            $res=$HTTP_GET_VARS["user_id"];
        }
        // add user to database
           if($res!=0)
           {
                   // Send Verification Email
                      $user_id=$res;
                      $verify_code=1234*$user_id;

                      if($HTTP_GET_VARS["err"]==Null)
                      {
                       $send=$signup->send_verification_email($first_name, $email,$password,$verify_code,$email_name,$site_email,$site_name, $site_url);
                      }
                   // Send Verification Email

                   // show them next step
?>
<?php
  $_SESSION["logged_in"]="yes";
  $_SESSION["member_id"]=$user_id;
  $_SESSION["member_name"]=$first_name;
  $_SESSION["member_lname"]=$last_name;
  $_SESSION["member_email"]=$email;
  $_SESSION["member_password"]=$password;
  $sql="select * from members where member_id = $user_id";
  $res=mysql_query($sql);
  $data_set=mysql_fetch_array($res);
?>

<table align="center" border="0" cellspacing="5" cellpadding="5" width="100%" bordercolor="000000" bgcolor="ffffff">

<form action="band_join_step2.php?user_id=<?=$user_id?>" method="post" name="theForm" id="theForm">

<tr>
<td valign="top" class='txt_label'>Your <?=$site_name?> URL:</td>
<td class='txt_label'><?=$site_url?>bands/<input type="text" name="username" value="<?=$data_set["member_name"]?>" size="25" maxlength="255" onblur="this.value=this.value.replace(/[^A-Za-z0-9]/gi, '').toLowerCase();"><br>
<font size=1>(e.g. <?=$site_url?>bands/yourbandname)</font></td>
</tr>

<tr>
<td class='txt_label' nowrap>Genre 1:</td>
<td class='txt_label'>
<select name="genre1">
<option value="0">- - choose one - -</option>
<?php
     include("includes/music.class.php");
     $music = new music;
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($data_set["genre"]==$genre_set["id"])
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
</span>
</td>
</tr>

<tr>
<td nowrap class='txt_label'>Genre 2:</td>
<td class='txt_label'>
<select name="genre2">
<option value="0">- - choose one - -</option>
<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
     }
?>
</select>
</td>
</tr>

<tr>
<td nowrap class='txt_label'>Genre 3:</td>
<td>
<select name="genre3">
<option value="0">- - choose one - -</option>
<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
     }
?>
</select>
</td>
</tr>

<tr>
<td class='txt_label'>Website:</td>
<td class='txt_label'>
<input type="text" name="url" value="" size="40" maxlength="255">
</td>
</tr>
<tr>
<td nowrap class='txt_label'>Current Record Label:</td>
<td class='txt_label'>
<input type="text" name="label" value="unsigned" size="40" maxlength="100">
</td>
</tr>

<tr>
<td class='txt_label' nowrap>Label Type:</td>
<td>
<select name="gabelType">
<option value="">- - choose one - -
<option value="None">None</option>
<option value="Major">Major</option>
<option value="Indie">Indie</option>
<option value="Self-Produced">Self-Produced</option>
</select>
</td>
</tr>

<tr>
<td valign='top' class='txt_label'>&nbsp;Here for:</td>
<td height="30" class='txt_label'>
<input type='checkbox' name='here_for[]' value='Networking with Fans'>&nbsp;Networking with Fans<br>
<input type='checkbox' name='here_for[]' value='Networking with Bands'>&nbsp;Networking with Bands<br>
<input type='checkbox' name='here_for[]' value='Fan Community'>&nbsp;Fan Community<br>
<input type='checkbox' name='here_for[]' value='Distribution'>&nbsp;Distribution<br>
<input type='checkbox' name='here_for[]' value='Promotion'>&nbsp;Promotion<br>
<input type='checkbox' name='here_for[]' value='Online Marketing'>&nbsp;Online Marketing<br>
<input type='checkbox' name='here_for[]' value='Record Deal'>&nbsp;Record Deal<br>
<input type='checkbox' name='here_for[]' value='Concert Gigs'>&nbsp;Concert Gigs<br>
<input type='checkbox' name='here_for[]' value='Constructive Reviews'>&nbsp;Constructive Reviews<br>
<input type='checkbox' name='here_for[]' value='Recording'>&nbsp;Recording<br>
<input type='checkbox' name='here_for[]' value='Licensing'>&nbsp;Licensing<br>
<input type='checkbox' name='here_for[]' value='Manager'>&nbsp;Manager<br>
<input type='checkbox' name='here_for[]' value='Producer'>&nbsp;Producer<br>
<input type='checkbox' name='here_for[]' value='Attorney'>&nbsp;Attorney<br>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" value="Continue"></td>
</tr>
</table>
</form>
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
