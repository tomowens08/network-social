<table border="0" cellspacing="0" cellpadding="0" height=100>
<tr>
<td bgcolor="FFFFFF" class="text" colspan="3" align="left" valign="bottom" style="word-wrap:break-word">
<?php
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
?>
<span class="style9"><h2><?=$name?></h2></span>
</td>
</tr>
<tr><td>
<table cellpadding=0 cellspacing=0 width=300 align="center">
<tr>
<td width="75" height="75" bgcolor="ffffff" class="text">
<?php
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($HTTP_GET_VARS["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
?>
<?=$image?>
</td>
<td width="15" height="75" bgcolor="ffffff" class="text">
<img src="images/clear.gif" width="15" height="8" border="0" alt=""></td>
<td width="193" height="75" bgcolor="ffffff" class="text">
<br><br>
<?=$basic_info["country"]?>
<?php
     if($basic_info["last_login"]!=Null)
     {
?>
<br>Last Login: <?=$basic_info["last_login"]?><br>
<?php
     }
     else
     {
?>
<br>Last Login: <?=date("m/d/Y")?><br>
<?php
     }
?>
</td>
</tr>
<tr align="center" valign="middle">
<td>
<a class='text' href="gallery.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View more pics</a> </td>
</tr>
</table></td></tr>
</table><br>



<table class="contactTable" border="1" cellspacing="0" cellpadding="0" width="300" bordercolor="6699CC">
<tr>
<td width="300" height="15" bgcolor="6699CC" class="text" align="left" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="style18">Contacting <?=$name?></span></td></tr>
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

<!--
<tr>
<td width="130" nowrap height="5" bgcolor="ffffff" align="center" class="text" valign="top">
<a href="add_group.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/icon_add_to_group.gif" border="0" align="middle"></a>
</td>

<td width="15" height="5" bgcolor="ffffff">
<img src="images/clear.gif" width="15" height="1" border="0"></td>
<td width="150" nowrap height="2" bgcolor="ffffff" align="center" class="text" valign="middle">
<a href="rank_user.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">
<img src="images/icon_rank_user4.gif" border="0" align="middle"></td>
</tr>
-->
<tr><td><img src="images/clear.gif" width="1" height="5" border="0"></td></tr>
</table>
</td>
</tr>
</table><br>


<!-- interests -->
<table bordercolor="6699cc" cellspacing="0" cellpadding="0" width="300" bgcolor="6699cc" border="1">
<tr>
<td class="text" valign="center" align="left" width="300" bgcolor="6699cc" height="10" wrap="" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="style18"><?=$name?>'s Ganeral Information</span>
</td>
</tr>
<?php
     $int=$profile->get_interests($HTTP_GET_VARS["member_id"]);
?>
<tr valign="top">
<td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" bgcolor="ffffff" border="0">

<?php
     if($int["interests"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">General</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["interests"]?>
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
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Music</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["music"]?>
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
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Movies</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["movies"]?>
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
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Television</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["television"]?>
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
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Books</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["books"]?>
</td>
</tr>
<?php
     }
?>

<?php
     if($int["heroes"]!=Null)
     {
?>
<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Heroes:</span>
</td>
<td id="style18" style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?=$int["heroes"]?>
</td>
</tr>
<?php
     }
?>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0">
<span class="style9">Groups:</span>
</td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?php
     $group_res=$profile->get_groups($HTTP_GET_VARS["member_id"]);
     while($group_set=mysql_fetch_array($group_res))
     {
?>
     <a href='view_group.php?group_id=<?=$group_set["id"]?>'><?=$group_set["group_name"]?></a>,
<?php
     }
?>
<br><br>
</td>
</tr>
</table>
</td>
</tr>
</table><br>


<!-- interests -->



<!-- details -->
<table bordercolor="6699cc" cellspacing="0" cellpadding="0" width="300" bgcolor="6699cc" border="1">
<tr>
<td class="text" valign="center" align="left" width="300" bgcolor="6699cc" height="10" wrap="" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="style9"><?=$name?>'s Details</span>
</td>
</tr>
<?php
     $profile_info=$profile->get_profile($HTTP_GET_VARS["member_id"]);
?>
<tr valign="top">
<td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" bgcolor="ffffff" border="0">
<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="style9">Status:</span></td>
<td class='style9' width="175" bgcolor="d5e8fb">
<?php
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

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="style9">Here for:</span></td>
<td class='style9' width="175" bgcolor="d5e8fb"><?=$basic_info["here_for"]?></td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Orientation:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb">
<?php
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
<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Hometown:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$profile_back["home_town"]?></td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Body Type:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$basic_info["body_type"]?>
</td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Ethnicity:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$religion[$profile_back["religion"]]?>
</td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Smoke / Drink:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$profile_back["smoker"]?>
</td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Education:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$profile_back["education"]?>
</td>
</tr>

<tr>
<td valign="top" align="left" width="100" bgcolor="b1d0f0"><span class="lightbluetext8">Occupation:</span></td>
<td style="WORD-WRAP: break-word" width="175" bgcolor="d5e8fb"><?=$basic_info["occupation"]?></td>
</tr>
</table>
</td>
</tr>
</table><br>

<!-- details -->



<!-- school -->
<table bordercolor="#6699CC" cellspacing="0" cellpadding="0" width="300" border="1">
<tr>
<td class="text" valign="center" align="left" width="300" bgcolor="6699cc" height="10" wrap="" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="whitetext12"><?=$name?>'s Schools</span>
</td>
</tr>
<tr><td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" border="0">
<?php
     $school_res=$profile->get_schools($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
<tr>
<td valign="top" align="left" width="240" bgcolor="b1d0f0" class='style9'>
<?=$school_set["school_name"]?><br>
<?=$school_set["school_city"]?>, <?=$school_set["school_state"]?><br>
Grad Year: <?=$school_set["graduation_year"]?><br>
Student Status: <?=$school_set["status"]?><br>
Degree: <?=$school_set["degree"]?><br>
Major: <?=$school_set["major"]?><br>
Clubs: <?=$school_set["clubs_organizations"]?><br>
</td>
<td valign="top" align="middle" width="60" bgcolor="d5e8fb">From <?=$school_set["date_from"]?> to <?=$school_set["date_to"]?></td>
</tr>
<?php
     }
?>
</table>
</td></tr>
</table>
<br>


<!-- company -->
<!-- school -->
<table bordercolor="#6699CC" cellspacing="0" cellpadding="0" width="300" border="1">
<tr>
<td class="text" valign="center" align="left" width="300" bgcolor="6699cc" height="10" wrap="" style="word-wrap:break-word">
&nbsp;&nbsp;&nbsp;<span class="whitetext12"><?=$name?>'s Companies</span>
</td>
</tr>
<tr><td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="300" align="center" border="0">
<?php
     $school_res=$profile->get_companies($HTTP_GET_VARS["member_id"]);
     while($school_set=mysql_fetch_array($school_res))
     {
?>
<tr>
<td valign="top" align="left" width="240" bgcolor="b1d0f0" class='style9'>
<?=$school_set["company_name"]?><br>
<?=$school_set["company_city"]?>, <?=$school_set["company_state"]?><br>
Title: <?=$school_set["title"]?><br>
Division: <?=$school_set["division"]?><br>
</td>
<td valign="top" align="middle" width="60" bgcolor="d5e8fb">Date Employed <?=$school_set["date_employed"]?></td>
</tr>
<?php
     }
?>
</table>
</td></tr>
</table>
<br>


</td>
<td width="15" align="center" valign="top" bgcolor="White"><img height="1" src="images/clear.gif" width="20" border="0"></td>
<td width="435" align="center" valign="top" bgcolor="White" class="text">
<br>
<!-- school -->



<!-- friend or not -->

<table bordercolor="000000" height="75" cellspacing="0" cellpadding="0" width="435" border="1">
<tr>
<td valign="center" align="middle" width="435" style="word-wrap:break-word">
<?php
     $sql="select * from invitations where member_id = $_SESSION[member_id] and friend_id = $HTTP_GET_VARS[member_id] and approve = '1'";
     $res=mysql_query($sql);
     $num_rows=mysql_num_rows($res);

     if($num_rows==1)
     {
?>
<span class="style9"><h2><?=$name?> is your friend.</h2><br></span>
<?php
     }
     else
     {
?>
<span class="style9"><h4><?=$name?> is in your extended network.</h4><br></span>
<?php
     }
?>
</td></tr>
</table><br>
<!-- friend or not -->


<!-- blogs -->
<table bordercolor="000000" cellspacing="3" cellpadding="0" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td width="435" style="word-wrap:break-word">
<span class="btext"><?=$name?>'s Latest Blog Entry</span>[<a href="subscribe_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Subscribe to members Blog</a>]<br><br></td>
</tr>

<?php
    $num_blogs=$profile->get_num_blogs($HTTP_GET_VARS["member_id"]);
    if($num_blogs==0)
    {
?>
<tr>
<td class='style9' valign="top" align="left" bgcolor="ffffff" height="25">
No blogs entered by user yet.
</td>
</tr>
<?php
    }
    else
    {
        $blog_info=$profile->get_latest_blog($HTTP_GET_VARS["member_id"]);
?>
<tr valign="top">
<td width="435" style="word-wrap:break-word"><?=$blog_info["subject"]?>&nbsp;
(<a href="view_blog.php?id=<?=$blog_info["id"]?>">view more</a>)
<br><br>
</td>
</tr>

<tr>
<td valign="top" align="left" bgcolor="ffffff" height="25">
[<a href="view_member_blog.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View All Blog Entries</a>]</td>
</tr>
<?php
    }
?>
</table><br>
<!-- blogs -->





<!-- blurbs -->
<table bordercolor="ffcc99" cellspacing="0" cellpadding="0" width="435" bgcolor="ffcc99" border="0">
<tr>
<td class="text" valign="center" align="left" width="300" bgcolor="ffcc99" height="17" wrap="" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="orangetext15">
<?=$name?>'s Blurbs</span></td>
</tr>
<tr><td>
<table bordercolor="000000" cellspacing="3" cellpadding="3" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td valign="top" align="left" width="435" bgcolor="ffffff" style="word-wrap:break-word">
<span class="orangetext15">About me:</span><BR>
<?=$int["about_me"]?>
</td>
</tr>
<tr>
<td valign="top" align="left" width="435" bgcolor="ffffff" style="word-wrap:break-word">
<span class="orangetext15">Who I'd like to meet:</span><BR>
<?=$int["meet"]?>
</td>
</tr>
</table>
</td></tr>
</table><br>
<!-- blurbs -->





<!-- friend_space -->

<table bordercolor="000000" cellspacing="0" cellpadding="0" width="435" border="0">
<tr><td class="text" align="left" width="435" bgcolor="ffffff" height="20">
<table height="20" cellspacing="0" cellpadding="0" width="435" bgcolor="ffcc99">
<tr><td width="435" style="word-wrap:break-word">&nbsp;&nbsp;&nbsp;<span class="orangetext15">
<?=$name?>'s Friend Space</span></td></tr>
</table>
<table cellspacing="0" cellpadding="5" width="435" align="center" border="0">
<tr>
<td bgcolor="ffffff" colspan="4" width="435" style="word-wrap:break-word">
<span class="btext">
<?php
    $num_friends=$profile->get_num_friends($HTTP_GET_VARS["member_id"]);
?>
<?=$name?> has <span class="redbtext"><?=$num_friends?></span> friends.
</span>
</td>
</tr>

<tr>
<td>
<table width="435" border="0" cellspacing="0" cellpadding="5" align="center">
<tr>

<?php
    $friend_res=$profile->get_profile_friends($HTTP_GET_VARS["member_id"]);
    $sr_no=0;
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
         $fimage="<img alt='' src='$image_url' width=90 border=0>";
     }

?>
<td bgcolor="FFFFFF" align="center" valign="top" width="1">

<!-- friend place -->
<table border="0" cellspacing="0" align="center">
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="107" style="word-wrap:break-word">
&nbsp;<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>"><?=$fname?></a>&nbsp;
</td>
</tr>
<tr>
<td bgcolor="FFFFFF" align="center" valign="top" width="25%">
<a href="view_profile.php?member_id=<?=$friend_set["friend_id"]?>">
<?=$image?>
</a>
</td>
</tr>
</table>
<?php
        $sr_no=$sr_no+1;
    }
?>
<!-- friend place -->

</td>
</tr>
</table>

</td>
</tr>

<tr valign="center" align="right">
<td bgcolor="FFFFFF" colspan="4">
<a href="view_friends.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>&page=1" class="redlink">View All of <?=$name?>'s Friends</a>
<br><br>
</td>
</tr>
</table>
</td></tr>
</table><br>
<!-- friend_space -->

<!-- comments_space -->
<table bordercolor="000000" cellspacing="0" cellpadding="0" width="435" border="0">
<tr><td class="text" align="left" width="435" bgcolor="ffffff" height="20">
<table bordercolor="ffcc99" height="20" cellspacing="0" cellpadding="0" width="441" bgcolor="ffcc99" border="1">
<tr>
<td width="441" style="word-wrap:break-word"><span class="orangetext15"><?=$name?>'s Friends Comments</span></td></tr>
</table>

<table bordercolor="000000" cellspacing="3" cellpadding="0" width="435" align="center" bgcolor="ffffff" border="0">
<tr>
<td>
<?php
    $tot_comments=$profile->get_total_comments($HTTP_GET_VARS["member_id"]);
    if($tot_comments<=50)
    {
?>
<b>Displaying <span class="redtext"><?=$tot_comments?></span> of <span class="redtext"><?=$tot_comments?></span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
<?php
    }
    else
    {
?>
<b>Displaying <span class="redtext">50</span> of <span class="redtext"><?=$tot_comments?></span> comments (<a href="view_testimonials.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">View/Edit All Comments</a>)
<?php
    }
?>
</td>
</tr>
<?php
    $test_res=$profile->get_profile_comments($HTTP_GET_VARS["member_id"]);
    while($test_set=mysql_fetch_array($test_res))
    {
     $fname=$people->get_name($test_set["member_id"]);
     $num_images=$people->get_num_images($test_set["member_id"]);
     if($num_images==0)
     {
         $fimage="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $fimage_url=$people->get_image($test_set["member_id"]);
         $fimage="<img alt='' src='$image_url' width=90 border=0>";
     }
?>
<tr>
<td bordercolor="ff9933" bgcolor="ffcccc">
<table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="FFffff">
<tr>
<td align="center" valign="top" width=150 bgcolor="FF9933" style="word-wrap:break-word">
<a href="view_profile.php?member_id=<?=$test_set["member_id"]?>"><?=$fname?></a>
<br><br>
<a href="view_profile.php?member_id=<?=$test_set["member_id"]?>">
<?=$image?>
</a>
<br><br>
</td>
<td bgcolor="F9D6B4" align="left" valign="top" width="260" style="word-wrap:break-word">
<span class="blacktext10">
<?=$test_set["date_posted"]?>
</span><br><br><?=$test_set["test_text"]?>
</td>
</tr>
</table>
</td></tr>
<?php
    }
?>
<tr>
<td colspan='2' bgcolor='#FFFFFF' align="right">
<a href="add_testimonial.php?member_id=<?=$HTTP_GET_VARS["member_id"]?>">Add Comment</a></td>
</tr>

</table>
</table>
