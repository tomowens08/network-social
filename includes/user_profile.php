<link href="../csss/style5.css" rel="stylesheet" type="text/css">
<link href="../csss/style6.css" rel="stylesheet" type="text/css">

<?php
     $name = $people->get_name($HTTP_GET_VARS["member_id"]);
     $int = $profile->get_interests($HTTP_GET_VARS["member_id"]);
?>
<p>
  <?=$name?>
  <?php
     $sql="select display_name from members where member_id = $HTTP_GET_VARS[member_id]";
     $mem_res=mysql_query($sql);
     $mem_set=mysql_fetch_array($mem_res);
?><?
$sql = "SELECT code FROM member_profile WHERE member_id = '".$HTTP_GET_VARS["member_id"]."'";
$code = mysql_fetch_array(mysql_query($sql));
echo stripslashes($code['code']);
?>
</p>

  <tr>
    <td width="400"><table cellpadding="0" cellspacing="0" width="300">
      <tr>
        <td valign='top' width="75" height="75" bgcolor="ffffff" class="text"><?php
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($HTTP_GET_VARS["member_id"]);
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
        $image_url=$people->get_image($HTTP_GET_VARS["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_profile.php?$pic_name' border='0'>";
     }
?>
            <a href='gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>
            <?=$image?>
          </a></td>
        <td width="15" height="75" bgcolor="ffffff" class="text"><img src="images/clear.gif" width="15" height="8" border="0" alt="" /></td>
        <td width="193" height="75" bgcolor="ffffff" class="text"><?php
if($int["headline"]!=Null)
{
?>
          &quot;
          <?=stripslashes($int["headline"])?>
          &quot;
          <?php
}
?>
          <br />
          <?=$basic_info["gender"]?>
          <br />
          <?php
        //$days = datediff($basic_info["dob"], GetTodayDate(0));
				//$years = floor($days/365);
				ereg('([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})',$basic_info['dob'],$regs);
				$years = date('Y') - $regs[1];
				if (($regs[2] > date('m')) || ($regs[2] == date('m') && $regs[3] > date('d')))
					$years--;
?>
          <?=$years?>
          years old<br />
          <?=$basic_info["city"]?>
          <?php
     if($basic_info["city"]!=Null)
     {
?>
          ,
          <?php
     }
?>
          <?=$basic_info["current_state"]?>
          <?=$basic_info["zip_code"]?>
          <br />
          <?php
if($basic_info["country"]!=Null)
{
 if(is_numeric($basic_info["country"]))
 {
  $sql="select * from states where state_id = $basic_info[country]";
  $country_res=mysql_query($sql);
  $country_set=mysql_fetch_array($country_res);
 }
?>
          <?=$country_set["state_name"]?>
          <?php
 }
?>
          <?php
     if($basic_info["last_login"]!=Null)
     {
?>
          <br />
          <b>Last Login:</b>
          <?=strftime("%B %d %Y",strtotime($basic_info["last_login"]))?>
          <br />
          <?php
     }
     else
     {
?>
          <br />
          <b>Last Login:</b>
          <?=strftime("%B %d %Y",strtotime($basic_info["date_created"]))?>
          <br />
          <?php
     }
		 if ($people->check_online($HTTP_GET_VARS["member_id"]))
		 	echo '<b><font color="#ff0000">Online</font></b>';
?></td>
      </tr>
      <tr align="center" valign="middle">
        <td><a class='text' href="gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View more pics</a> </td>
      </tr>
    </table>
    <table cellspacing="0" cellpadding="0" width="300" class='dark_b_border2'>
<tr>
<td width="300" height="15" align="left" bgcolor="#999999" class='dark_blue_white2' style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;Contacting <?=$name?></span></td>
</tr>
<tr><td>

<table border="0" cellspacing="0" cellpadding="0" width="300" bordercolor="000000">
<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>

<tr>
<td width="120" height="5" nowrap bgcolor="ffffff" align="center" class="text">
<a href="send_message.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/sendMailIcon.gif" border="0" align="middle"></a>
</td>

<td width="15" height="5"  bgcolor="ffffff">
<img src="images/clear.gif" width="15" height="8" border="0"></td>
<td width="150" nowrap height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a href="forward_friend.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/forwardMailIcon.gif" border="0" align="middle"></a>
</td>
</tr>
<tr>
<td colspan="3">
<img src="images/clear.gif" width="1" height="2" border="0">
</td>
</tr>

<tr>
<td width="130" nowrap height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a href="invite_friend.php?friend_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/addFriendIcon.gif" border="0" align="middle"></a>
</td>

<td width="15" height="5" bgcolor="ffffff">
<img src="images/clear.gif" width="15" height="1" border="0"></td>
<td width="150" nowrap height="2" bgcolor="ffffff" align="center" class="text" valign="middle">
<a href="add_bookmark.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/addFavoritesIcon.gif" border="0" align="middle">
</td>
</tr>

<tr><td colspan="3">
<img src="images/clear.gif" width="1" height="2" border="0">
</td></tr>

<tr>
<td width="130" nowrap height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a href="rank_band.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/icon_rank_user4.gif" border="0" align="middle"></td>
</td>

<td width="15" height="5" bgcolor="ffffff"><img src="images/clear.gif" width="1" height="5" border="0"></td>
<td width="150" nowrap height="2" bgcolor="ffffff" align="center" class="text" valign="middle">
<a href='flag.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>'>Flag for review</a>
</td>
</tr>

<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>

<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>
</table>
</td>
</tr>
</table>
    <p>
        <?
$group_ids = $profile->get_groups($HTTP_GET_VARS["member_id"]);

if ($int["interests"] || $int["music"] || $int["movies"] || $int["television"] || $int["books"] ||$int["heroes"] || count($group_ids)) {
?>
</p>
      <table width="300" cellpadding="0" cellspacing="0" class='dark_b_border2'>
        <tr>
          <td width="300" height="25" align="left" valign="center" bgcolor="#999999" wrap="">&nbsp;&nbsp;&nbsp;<span class="whitetext12">
            <?=$name?>
            's Interests</span> </td>
        </tr>
        <tr valign="top">
          <td><table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" bgcolor="ffffff" border="0">
              <?php
     if($int["interests"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">General</span></td>
                <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($int["interests"])?>
                </td>
              </tr>
              <?php
     }
?>
              <?php
     if($int["music"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Music </td>
                <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($int["music"])?>
                </td>
              </tr>
              <?php
     }
?>
              <?php
     if($int["movies"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Movies</td>
                <td class='btext' width="175"><?=stripslashes($int["movies"])?>
                </td>
              </tr>
              <?php
     }
?>
              <?php
     if($int["television"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Television</td>
                <td width="175" class='btext'><?=stripslashes($int["television"])?>
                </td>
              </tr>
              <?php
     }
?>
              <?php
     if($int["books"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Books</td>
                <td width="175" class='btext'><?=stripslashes($int["books"])?></td>
              </tr>
              <?php
     }
?>
              <?php
     if($int["heroes"]!=Null)
     {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Heroes:</td>
                <td width="175" class='btext'><?=stripslashes($int["heroes"])?></td>
              </tr>
              <?php
     }
		 if (count($group_ids)) {
?>
              <tr>
                <td valign="top" align="left" width="100" class='btext'><span class="lightbluetext8">Groups:</td>
                <td class='btext' width="175"><?php
     $sql = "SELECT group_name, id FROM groups WHERE id IN (".implode(',',$group_ids).")";
		 $res = mysql_query($sql);
		 while($group_set = mysql_fetch_array($res))
     {
?>
                    <a href='view_group.php?group_id=<?=$group_set["id"]?>'>
                    <?=$group_set["group_name"]?>
                    </a>,
                  <?php
     }
?>
                    <br />
                    <br />
                </td>
              </tr>
              <?
		}
?>
          </table></td>
        </tr>
      </table>
      <p>
        <?
}
?>
      </p>
      <p>
        <?php
     $num_school=$profile->get_num_schools($HTTP_GET_VARS["member_id"]);
     if($num_school!=0)
     {
?>
      </p>
      <table width="300" cellpadding="0" cellspacing="0" class="dark_b_border2">
        <tr>
          <td width="300" height="10" align="left" bgcolor="#999999" class='whitetext12' style="word-wrap:break-word" wrap="">&nbsp;&nbsp;&nbsp;
              <?=$name?>
            's Schools</td>
        </tr>
        <tr>
          <td><table cellspacing="3" cellpadding="3" width="300" border="0">
              <?php
     $school_res=$profile->get_schools($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
              <tr>
                <td valign="top" align="left" width="240" class='btext'><?=stripslashes($school_set["school_name"])?>
                    <br />
                    <?=stripslashes($school_set["school_city"])?>
                  ,
                  <?=stripslashes($school_set["school_state"])?>
                  <br />
                  Grad Year:
                  <?=stripslashes($school_set["graduation_year"])?>
                  <br />
                  Student Status:
                  <?=stripslashes($school_set["status"])?>
                  <br />
                  Degree:
                  <?=stripslashes($school_set["degree"])?>
                  <br />
                  Major:
                  <?=stripslashes($school_set["major"])?>
                  <br />
                  Clubs:
                  <?=stripslashes($school_set["clubs_organizations"])?>
                  <br />
                </td>
                <td valign="top" align="middle" width="60" class='btext'>From
                  <?=$school_set["date_from"]?>
                  to
                  <?=$school_set["date_to"]?></td>
              </tr>
              <?php
     }
?>
          </table></td>
        </tr>
      </table>
      <p>
        <?php
}
?>
      </p>
      <p>
        <?php
     $num_companies=$profile->get_num_companies($HTTP_GET_VARS["member_id"]);
     if($num_companies!=0)
     {
?>
      </p>
      <table width="300" cellpadding="0" cellspacing="0" class="dark_b_border2">
        <tr>
          <td width="300" height="10" valign="center" bgcolor="#999999" class='dark_blue_white2' style="word-wrap:break-word" wrap="">&nbsp;&nbsp;&nbsp;<span class="whitetext12">
            <?=$name?>
            's Companies</span></td>
        </tr>
        <tr>
          <td><table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" border="0">
              <?php
     $school_res=$profile->get_companies($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
              <tr>
                <td valign="top" align="left" width="240" class='btext'><?=stripslashes($school_set["company_name"])?>
                    <br />
                    <?=stripslashes($school_set["company_city"])?>
                  ,
                  <?=stripslashes($school_set["company_state"])?>
                  <br />
                  Title:
                  <?=stripslashes($school_set["title"])?>
                  <br />
                  Division:
                  <?=stripslashes($school_set["division"])?>
                  <br />
                </td>
                <td valign="top" align="middle" width="60" class='btext'>Date Employed
                  <?=$school_set["date_employed"]?></td>
              </tr>
              <?php
     }
?>
          </table></td>
        </tr>
      </table>
    <p>
      <?php
}
?>
    </p>
    <p align="left">&nbsp;</p>
    <table width="300" cellpadding="0" cellspacing="0" class="dark_b_border2">
      <tr>
        <td valign="center" align="left" width="300" bgcolor="#999999" height="25" wrap="" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="whitetext12">
          <?=$name?>
          's Details</span> </td>
      </tr>
      <?php
     $profile_info=$profile->get_profile($HTTP_GET_VARS["member_id"]);
?>
      <tr valign="top">
        <td><table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" bgcolor="ffffff" border="0">
            <?php
if($profile_back["marital_status"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Status:</td>
              <td class='btext' width="175"><?php
if($profile_back["marital_status"]=="O")
{
?>
                Swinger
                <?php
}
?>
              <?php
if($profile_back["marital_status"]=="R")
{
?>
                In a relationship
                <?php
}
?>
                <?php
if($profile_back["marital_status"]=="S")
{
?>
                Single
                <?php
}
?>
                <?php
if($profile_back["marital_status"]=="D")
{
?>
                Divorced
                <?php
}
?>
                <?php
if($profile_back["marital_status"]=="M")
{
?>
                Married
                <?php
}
?>
              </td>
            </tr>
            <?php
     }
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Here for:</td>
              <td width="175" class='btext'><?=$basic_info["here_for"]?></td>
            </tr>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Orientation:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?php
if($profile_back["sexual"]=="1")
{
?>
                Straight
                <?php
}
?>
              <?php
if($profile_back["sexual"]=="2")
{
?>
                Gay
                <?php
}
?>
                <?php
if($profile_back["sexual"]=="3")
{
?>
                Bi
                <?php
}
?>
                <?php
if($profile_back["sexual"]=="4")
{
?>
                Not Sure
                <?php
}
?>
                <?php
if($profile_back["sexual"]=="0" || $profile_back["sexual"]==Null)
{
?>
                No Answer
                <?php
}
?>
              </td>
            </tr>
            <?php
if($profile_back["home_town"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Hometown:</td>
              <td width="175" class='btext'><?=stripslashes($profile_back["home_town"])?>
              </td>
            </tr>
            <?php
}
?>
            <?php
if($basic_info["body_type"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Body Type:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($basic_info["body_type"])?></td>
            </tr>
            <?php
}
?>
            <?php
if($basic_info["ethnicity"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Ethnicity:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($basic_info["ethnicity"])?>
              </td>
            </tr>
            <?php
}
?>
            <?php
if($profile_back["smoker"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Smoke / Drink:</td>
              <?=$profile_back["smoker"]?>
              /
              <?=$profile_back["drinker"]?>
              <?php
}
?>
              <?php
if($profile_back["education"]!=Null)
{
?>
            </tr>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Education:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($profile_back["education"])?>
              </td>
            </tr>
            <?php
}
?>
            <?php
if($profile_back["religion"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Religion:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($religion[$profile_back["religion"]])?>
              </td>
            </tr>
            <?php
}
?>
            <?php
if($basic_info["occupation"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Occupation:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=stripslashes($basic_info["occupation"])?></td>
            </tr>
            <?php
}
?>
            <?php
if($basic_info["height_feet"]!=Null&&$basic_info["height_inch"]!=Null)
{
?>
            <tr>
              <td valign="top" align="left" width="100" class='btext'>Height:</td>
              <td style="WORD-WRAP: break-word" width="175" class='btext'><?=$basic_info["height_feet"]?>
                &quot;
                <?=$basic_info["height_inch"]?>
                '</td>
            </tr>
            <?php
}
?>
        </table></td>
      </tr>
    </table>
    <table width="300" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" bgcolor="#999999"  valign="center" align="left" width="300" wrap="" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp; <span class="whitetext12">
          <?=$name?>
          's About</span></td>
      </tr>
      <tr>
        <td><table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" bgcolor="ffffff" border="0">
            <tr>
              <td valign="top" align="left" width="435" bgcolor="ffffff" class='btext' style="word-wrap:break-word"><b>About me:</b><br />
                  <br />
                  <?=stripslashes($int["about_me"])?>
              </td>
            </tr>
            <tr>
              <td valign="top" align="left" width="435" bgcolor="ffffff" style="word-wrap:break-word" class='btext'><b>Who I'd like to meet:</b><br />
                  <br />
                  <?=stripslashes($int["meet"])?>
              </td>
            </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
    <td width="400" valign="top"><table width="350" height="75" border="1" cellpadding="0" cellspacing="0" bordercolor="000000">
      <tr>
        <td valign="center" align="middle" width="435" class='btext' style="word-wrap:break-word"><?php
     if($_SESSION["member_id"]!=Null)
     {
      $sql="select * from invitations where member_id = $_SESSION[member_id] and friend_id = $HTTP_GET_VARS[member_id] and approve = '1'";
      $res=mysql_query($sql);
      $num_rows=mysql_num_rows($res);
     }
     else
     {
         $num_rows=0;
     }
     if($num_rows==1)
     {
?>
            <h2>
              <?=$name?>
              is your friend.</h2>
          <br />
            <?php
     }
     else
     {
?>
            <h4>
              <?=$name?>
              is in your extended network.</h4>
          <br />
            <?php
     }
?>
        </td>
      </tr>
    </table>
      <p class="text">&nbsp;</p>
      <table bordercolor="000000" cellspacing="3" cellpadding="0" width="400" bgcolor="ffffff" border="0">
        <tr>
          <td width="435" bgcolor="#999999" class='whitetext12' style="word-wrap:break-word"><?=$name?>
            's Latest Blog Entry [<a href="subscribe_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Subscribe to members Blog</a>]<br />
            <br /></td>
        </tr>
        <?php
    $num_blogs=$profile->get_num_blogs($HTTP_GET_VARS["member_id"]);
    if($num_blogs==0)
    {
?>
        <tr>
          <td class='btext' valign="top" align="left" bgcolor="ffffff" height="25"> No blogs entered by user yet. </td>
        </tr>
        <?php
    }
    else
    {
        $blog_info=$profile->get_latest_blog($HTTP_GET_VARS["member_id"]);
?>
        <tr valign="top">
          <td width="435" class='btext' style="word-wrap:break-word"><?=$blog_info["subject"]?>
            &nbsp;
            (<a href="view_blog.php?id=<?=$blog_info["id"]?>">view more</a>) <br />
                  <br />
          </td>
        </tr>
        <tr>
          <td valign="top" align="left" bgcolor="ffffff" height="25"> [<a href="view_member_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View All Blog Entries</a>]</td>
        </tr>
        <?php
    }
?>
      </table>
      <table bordercolor="000000" cellspacing="0" cellpadding="0" width="400" border="0">
        <tr>
          <td height="25" width="435" bgcolor="#999999" style="word-wrap:break-word"><span class="whitetext12">&nbsp;&nbsp;&nbsp;
                <?=$name?>
            's Friends</span>
              <?php
    $friend_res = $profile->get_friends($HTTP_GET_VARS["member_id"]);
	?>
            -
            <?=$name?>
            has
            <?=count($friend_res)?>
            friends. </td>
          <td bgcolor="ffffff" colspan="4" width="0" style="word-wrap:break-word" class='btext'></td>
        </tr>
        <tr>
          <td><table width="300" border="0" cellspacing="0" cellpadding="5" align="center">
              <tr>
                <?php

    $sr_no=0;
		if (count($friend_res)) {
		
		$sql = "SELECT member_id as friend_id FROM members WHERE member_id IN (".implode(',',$friend_res).") LIMIT 0,8";
		$friend_res = mysql_query($sql);
    while($friend_set=mysql_fetch_array($friend_res))
		{
        if($sr_no%4==0)
        {
          print "</tr><tr>";
        }

     $fname=$people->get_name($friend_set["friend_id"]);
     $num_images=$people->get_num_images($friend_set["friend_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($friend_set["friend_id"]);
         if($gender=="Male")
         {
          $fimage="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $fimage="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $fimage_url=$people->get_image($friend_set["friend_id"]);
        $pic_name=str_replace('user_images/', '', $fimage_url);
        $fimage = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }

?>
                <td bgcolor="FFFFFF" align="center" valign="top" width="1"><!-- friend place -->
                    <table border="0" cellspacing="0" align="center">
                      <tr>
                        <td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word">&nbsp;<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
                          <?=$fname?>
                        </a>&nbsp;</td>
                      </tr>
                      <tr>
                        <td bgcolor="FFFFFF" align="center" valign="top" width="25%"><a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
                          <?=$fimage?>
                          </a>
                            <?
if ($people->check_online($friend_set["friend_id"]))
	echo '<br><font color="#ff0000">Online</font>';
?></td>
                      </tr>
                    </table>
                  <?php
        $sr_no=$sr_no+1;
    }
	}
?>
                    <!-- friend place --></td>
              </tr>
          </table></td>
        </tr>
        <tr valign="center" align="right">
          <td bgcolor="FFFFFF" colspan="4"><a href="view_friends.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&amp;page=1" class="redlink">View All of
            <?=$name?>
            's Friends</a></td>
        </tr>
      </table>
    <p><span class="text">
      <?php
$res = $profile->getSongUrl($HTTP_GET_VARS["member_id"]);
$mas = mysql_fetch_array($res);
if (!empty($mas['song_file'])) {
?>
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="451" height="85" id="musicplayerLite" align="middle">
        <param name="movie" value="musicplayerLite.swf?BandID=<?=$mas['owner_id']?>&amp;BandName=<?=$mas['band_name']?>&amp;BandText=<?=$mas['song_name']?>&amp;SoundURL=<?=$mas['song_file']?>&amp;songID=<?=$mas['id']?>&amp;sid=<?=session_id()?>" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#ffffff" />
        <embed src="musicplayerLite.swf?BandID=<?=$mas['member_id']?>&amp;BandName=<?=$mas['band_name']?>&amp;BandText=<?=$mas['song_name']?>&amp;SoundURL=<?=$mas['song_file']?>&amp;songID=<?=$mas['id']?>&amp;sid=<?=session_id()?>" quality="high" bgcolor="#ffffff" width="451" height="85" name="musicplayerLite" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>
        </embed>
        </embed>
      </object>
      <br />
      <br />
    </span>
      <?php
     }
?>
    </p>
    <table width="400" border="0" cellpadding="0" cellspacing="0" bordercolor="000000">
      <tr>
        <td class="text" align="right" width="435" bgcolor="ffffff" height="20"><table cellspacing="0" cellpadding="0" width="400" height="25" bgcolor="#999999">
            <tr>
              <td width="441" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="whitetext12">
                <?=$name?>
                's Friends Comments</span></td>
            </tr>
          </table>
            <table bordercolor="000000" cellspacing="3" cellpadding="0" width="400" bgcolor="ffffff" border="0">
              <tr>
                <td class='btext'><?php
    $tot_comments=$profile->get_total_comments($HTTP_GET_VARS["member_id"]);
    if($tot_comments<=50)
    {
?>
                    <b>Displaying <span class="redtext">
                    <?=$tot_comments?>
                    </span> of <span class="redtext">
                    <?=$tot_comments?>
                    </span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
                  <?php
    }
    else
    {
?>
                    <b>Displaying <span class="redtext">50</span> of <span class="redtext">
                    <?=$tot_comments?>
                    </span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
                  <?php
    }
?>
                </td>
              </tr>
              <?php
    $test_res=$profile->get_profile_comments($HTTP_GET_VARS["member_id"]);
    while($test_set = mysql_fetch_array($test_res))
    {
     $fname=$people->get_name($test_set["test_user"]);
     $num_images=$people->get_num_images($test_set["test_user"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($test_set["test_user"]);
         if($gender=="Male")
         {
          $fimage="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $fimage="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $fimage_url=$people->get_image($test_set["test_user"]);
        $pic_name=str_replace('user_images/', '', $fimage_url);
        $fimage = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }
?>
              <tr>
                <td bordercolor="ff9933" bgcolor="ffcccc" class='btext'><table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="FFffff">
                    <tr>
                      <td align="center" valign="top" class='btext' width="150" bgcolor="#333333" style="word-wrap:break-word"><a href="view_profile.php?member_id=<?=$test_set["test_user"]?>">
                        <?=$fname?>
                        </a> <br />
                        <br />
                        <a href="view_profile.php?member_id=<?=$test_set["test_user"]?>">
                        <?=$fimage?>
                        </a>
                        <?
if ($people->check_online($test_set["test_user"]))
	echo '<br><font color="#ff0000">Online</font>';
?>
                        <br />
                        <br />
                      </td>
                      <td bgcolor="#CCCCCC" class='btext' align="left" valign="top" width="260" style="word-wrap:break-word"><?=$test_set["date_posted"]?>
                          <br />
                          <br />
                          <?=$test_set["test_text"]?></td>
                    </tr>
                </table></td>
              </tr>
              <?php
    }
?>
              <tr>
                <td colspan='2' bgcolor='#FFFFFF' align="right"><a href="add_testimonial.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Add Comment</a></td>
              </tr>
          </table></td>
      </tr>
    </table>
    <table width="400" border="0" cellpadding="0" cellspacing="0" bordercolor="000000">
      <tr>
        <td class="text" align="centre" width="435" bgcolor="ffffff" height="20"><table cellspacing="0" cellpadding="0" width="400" height="25" bgcolor="#999999">
            <tr>
              <td width="435" style="word-wrap:break-word"><span class="whitetext12">&nbsp;&nbsp;&nbsp;
                    <?=$name?>
                's Favorite Bands</span></td>
            </tr>
          </table>
            <table cellspacing="0" cellpadding="5" width="400" border="0">
              <tr>
                <td bgcolor="ffffff" colspan="4" width="435" style="word-wrap:break-word" class='btext'><?php
    $friend_res = $profile->get_bands($HTTP_GET_VARS["member_id"]);
?>
                    <?=$name?>
                  has <span class="redbtext">
                    <?=count($friend_res)?>
                  </span> favorite bands. </td>
              </tr>
              <tr>
                <td><table width="300" border="0" cellspacing="0" cellpadding="5" align="center">
                    <tr>
                      <?php
		if (count($friend_res)) {
		$sql = "SELECT member_id as friend_id FROM members WHERE member_id IN (".implode(',',$friend_res).") LIMIT 0,8";
		$friend_res = mysql_query($sql);
    while($friend_set=mysql_fetch_array($friend_res))
    {
        if($sr_no%4==0)
        {
          print "</tr><tr>";
        }

     $fname=$people->get_name($friend_set["friend_id"]);
     $num_images=$people->get_num_images($friend_set["friend_id"]);
     if($num_images==0)
     {
         $fimage="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
        $fimage_url=$people->get_image($friend_set["friend_id"]);
        $pic_name=str_replace('user_images/', '', $fimage_url);
        $fimage = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }

?>
                      <td bgcolor="FFFFFF" align="center" valign="top" width="1"><!-- friend place -->
                          <table border="0" cellspacing="0" align="center">
                            <tr>
                              <td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word">&nbsp;<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
                                <?=$fname?>
                              </a>&nbsp; </td>
                            </tr>
                            <tr>
                              <td bgcolor="FFFFFF" align="center" valign="top" width="25%"><a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
                                <?=$fimage?>
                              </a> </td>
                            </tr>
                          </table>
                        <?php
        $sr_no=$sr_no+1;
    }
	}
?>
                          <!-- music place -->
                      </td>
                    </tr>
                </table></td>
              </tr>
              <?
if ($friend_res) {
?>
              <tr valign="center" align="right">
                <td bgcolor="FFFFFF" colspan="4"><a href="view_bands.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&amp;page=1" class="redlink">View All of
                  <?=$name?>
                  's Favotite Bands</a> <br />
                  <br />
                </td>
              </tr>
              <?
}
?>
          </table></td>
      </tr>
    </table>
    <p><br />
</p>
    <table cellspacing="0" cellpadding="0" width="400" border="0">
      <tr>
        <th height="25" bgcolor="#999999"  valign="center" align="left" width="300" wrap="" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp; <span class="whitetext12">
          <?=$name?>
          's Poll</span></th>
      </tr>
      <tr>
        <td bgcolor="#ffffff"><?php
$votes = new TMultyPolls();

/**
 * show only active
 */
$all_polls_list = $votes->get_member_polls($vote_owner, 0, 0);
$default_poll = $votes->get_default_user_poll($vote_owner);
if(!$votes->can_member_vote($voter_id, $default_poll->poll_id)){
	$default_poll->poll_state = 0;
}
include_once('includes/_poll.default_poll.php');
?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
&nbsp;
<p>&nbsp;</p>
<p>&nbsp;</p>
<td width="249" valign="top">
