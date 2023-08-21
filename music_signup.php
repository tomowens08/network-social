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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">
<?php
if ($HTTP_GET_VARS["err"]=="")
{
?>
<strong>&nbsp;Musicians Signup&nbsp;&nbsp;Step 1</strong></span></div>
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


<table width='830' border="0" cellspacing="5" cellpadding="5" bordercolor="000000" bgcolor="ffffff">
<tr>
<td class='txt_label'>
Find your Fans on <?=$site_name?> Music.<br>
<span style="color:red">Not a Musician? Click <a style="font-size:14px" href="join_us.php">Here</a> to Signup. </span></span>
</td>
</tr>

<tr>
<td class='txt_label'>
Getting started with <?=$site_name?> is easy.
<br>Just sign up <strong>(free!)</strong> with some basic info:
</td>
</tr>

<tr>
<td colspan="2">-
<a class="redlink7" href="login.php">Log In</a>-&nbsp;&nbsp;&nbsp;-
<a class="redlink7" href="forgot_password.php">Forgot Password?</a>-</span></td>
</tr>
<td valign="top">
<form action="band_join.php" method="post" name="theForm" id="theForm"">
<table width='100%' cellspacing="0" cellpadding="2" border="1" class="blue_border" style="border-collapse: collapse;">
<tr><td colspan="2" height="10">
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
</td></tr>
<tr><td colspan="2">
<table>
<tr><td class='txt_label'>(* means required field)</td></tr>
</table>
</td>
</tr>

<tr>
<td><span class="required">Email Address (*):</span></td>
<td><span class="required">
<input type="text" name="email" value="" size="40" maxlength="255" value='<?=$HTTP_POST_VARS["email"]?>'>
</td>
</tr>


<tr>
<td><span class="required">Band Name (*):</span></td>
<td><span class="required"><input type="text" name="first_name" value="" size="40" maxlength="255" value='<?=$HTTP_POST_VARS["first_name"]?>'></td>
</tr>

<tr>
<td><span class="required">Password (*):</span></td>
<td><span class="required">
<input type="password" name="password" size="10" maxlength="10" value='<?=$HTTP_POST_VARS["password"]?>'></td>
</tr>

<tr>
<td><span class="required">Genre (*):</span></td>
<td>
<span class="required">
<select name="genre">
<option value="0">- - choose one - -
<?php
     include("includes/music.class.php");
     $music = new music;
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($HTTP_POST_VARS["genre"]==$genre_set["id"])
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
<td><span class="required">Country (*):</span></td>
<td>
<?php
  print "<select name='country' size='1'>";
  // run loop to display all categories
     $sql="select * from states ORDER BY state_name";
     $state_res=mysql_query($sql);
     while($state_set=mysql_fetch_array($state_res))
     {
         if($HTTP_POST_VARS["country_id"]==$state_set["state_id"])
         {
          print "<option value='$state_set[state_id]' selected>$state_set[state_name]</option>";
         }
         else
         {
          print "<option value='$state_set[state_id]'>$state_set[state_name]</option>";
         }
     }

  // run loop to display all categories

  print "</select>";
?>
</td>
</tr>

<tr>
<td><span class="required">Zip Code:</span></td>
<td><input type="text" name="postal" value="" size="5" maxlength="11" value='<?=$HTTP_POST_VARS["postal_code"]?>'>
<span class="blacktext7"> (required for US, UK & Canada only)</span></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><span class="blackText7">By clicking "Sign Up" you agree to our <a class="black7" href="tos.php" target=_blank>Terms</a></span><br><br>
<input type="submit" value="-SignUp-" name='submit'>
</td>
</tr>
</table>
</div>
</td></tr>
</table>
</form>
</td></tr>
</table>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
