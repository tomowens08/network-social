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
<table border="0" cellspacing="0" cellpadding="3" width="776" bordercolor="000000">
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
</a></td>
<!-- person 1 -->
<?php
    }
?>

<td width="218" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="15" height="1" border="0"></td>

<td width="389" colspan=10><img src="images/clear.gif" width="1" height="5" border="0">
  <table class="dark_b_border2" cellspacing="0" cellpadding="0" width="38%" border="0">
    <tbody>
      <tr>
        <td bgcolor="#999999"><font color="#FFFFFF" size="2">Featured Profile</font></td>
      </tr>
      <tr>
        <td><table height="110" cellspacing="0" cellpadding="0" width="62%" border="0">
            <tbody>
              <tr>
                <td height="110"><table bordercolor="#000000" height="100%" cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
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
                        <td class="text_black" valign="center" align="middle"><a class="bold_black" href="view_profile.php?member_id=<?=$featured_id?>">
                          <?=$name?>
                          </a> <br />
                          <a href="view_profile.php?member_id=<?=$featured_id?>">
                          <?=$image?>
                        </a> </td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
            </tbody>
        </table></td>
      </tr>
    </tbody>
  </table></td>

</table>
</td>
</tr>
</table>
</table>
<!-- cool new users -->

<tr><td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="dark_b_border2">
  <tbody>
    <tr>
      <td bgcolor="#999999"><p class="style3"><font color="#FFFFFF" size="2">Cool New People</font></p></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
          <tr>
            <td valign='top'><div align="right"><a href="getpaidtoshop.html" class='bottom'>Get Paid to Shop Now</a> | <a href="browse.php" class='bottom'>Browse Users &gt;&gt; </a></div></td>
          </tr>
        </tbody>
      </table>
          <table width="720" border="0" align="center">
            <tr>
              <td align="center" valign="top"><p>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500" height="300" title="Welcome to  Revellin'">
                    <param name="movie" value="RinFlash.swf" />
                    <param name="quality" value="high" />
                    <embed src="RinFlash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500" height="300"></embed>
                  </object>
                </p>
                  <p align="left"> </p></td>
              <td align="center" valign="top"><form action="login1.php" method="post" name="frm" id="frm">
                  <table width="100%" border="0">
                    <tbody>
                      <tr>
                        <td class="red_desc" colspan="2"><div align="left"><span class="style2">Login</span></div></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="red_desc" style3="style3" style4="style4"><div align="left">
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
                          &nbsp; </div>
                            <?php
     }
?></td>
                      </tr>
                      <tr>
                        <td align="left" class="style7" style3="style3" style4="style4">Email:</td>
                        <td align="left"><input name="email2" value="<?=$_COOKIE['member_email']?>" /></td>
                      </tr>
                      <tr>
                        <td align="left" class="style7" style3="style3" style4="style4">Password: </td>
                        <td align="left"><input name="password2" type="password" /></td>
                      </tr>
                      <tr>
                        <td><span class="style4"></span></td>
                        <td align="left"><span class="style1"><span class="style6">Remember me</span>
                              <input type="checkbox" name="remember_me" checked="checked" value="1" />
                        </span></td>
                      </tr>
                      <tr> </tr>
                      <tr>
                        <td align="center" colspan="2"><a href="forgot_password.php" class="style7" style5="style5" style3="style3" style4="style4">Forgot your password?</a></td>
                      </tr>
                      <tr>
                        <td  colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><input class="txt_topic" style="WIDTH: 70px" type="submit" value="Login" name="btnsubmit2" />
                          &nbsp;&nbsp;&nbsp;
                          <input class="txt_topic" style="WIDTH: 80px" onclick="document.location.href='join_us.php';return false;" type="button" value="Sign Up" name="btnreg2" /></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
     include("includes/music.class.php");
     $music=new music;
     $music_set=$music->get_latest_music_user();
     if($music_set["member_id"]!=Null)
     {
?>
                  </form>
                  <table class='dark_b_border2' cellspacing='0' cellpadding='0' width="100%" border='0'>
                    <tbody>
                      <tr>
                        <td bgcolor="#999999"><font color="#FFFFFF" size="2">Musician</font></td>
                      </tr>
                      <tr>
                        <td><table height="110" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td height="110"><table bordercolor="#000000" height="100%" cellspacing="0" cellpadding="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td class="text_black" valign="center" align="center" width="50%"><?php
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
                                          </a> </td>
                                        <td>&nbsp;&nbsp; </td>
                                        <td class="text" valign="top" align="left" width="50%"><a class="bold_black" href="view_profile.php?member_id=<?=$music_set["member_id"]?>">
                                          <?=$name?>
                                          </a>
                                            <?=$music_set["cat_name"]?>
                                            <br />
                                            <?=$music_set["current_state"]?>
                                            <?php
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
                                        </td>
                                      </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                  </table>
                  <br />
                  <a href="/join_us.php"></a>&nbsp;</td>
            </tr>
            <tr align="center" valign="top">
              <td colspan="2"></td>
            </tr>
          </table>
         </td>
      <td align="center" valign="top"></td>
    </tr>
  </tbody>
</table></td></tr>

<tr>
<td>&nbsp;</TD>
</TR>

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

<TD height=3></TD>
</TR></TBODY></TABLE></TD>
<TD width=5>&nbsp;</TD>
<TD vAlign=top width=285><?php
include("includes/bottom4.php");
?>
