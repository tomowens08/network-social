<?php
@session_start();
if ($_SESSION['member_id']) {

	header('Location: logincomplete.php');
	exit;
}

include("includes/top_index.php");
include("includes/conn.php");


?>



<meta name="My Extra Space" content="My Extra Space is a social netwroking website thats allows you to make an extension to the already popoular if over populated Myspace. Giving you more room, unlimited room is some instances, greater and more dymaic control over your profile with exciting and new features to come! Meet all the people at My Extra Space and if your a developer then make an applet to show off your sills to your mates! personals, love and romance, find your Kindred Spirit.">
<meta name="keywords" content="my, extra, space, myextraspace, social, networking, dating, friends, meet, web, people, network, networking,
date, dates, friend, friendship, friendships, meeting, us, we, pictures, girls, boys, men, women, girl, boy,
man, woman, me, xtra, pace, sdcoil, nwtwork, dstind, datong, mysoace, mysace, socia, bys, grls, spce, xtrs, 
ara, area, grate, edyt, socilat, site, webs, personals, love, romance, find, Kindred, picture, UK, residents,
 postcode, search, Meet, country, touch, blog, blogs, forums, forum, email, groups, games, events, 
contemporary, pop, culture, features, videos, movies, movie, video, Blurbs, multimedia, bulletins, 
">
<meta name="description" content="My Extra Space is a social netwroking website thats allows you to make an extension to the already popoular 
if over populated Myspace. Giving you more room, unlimited room is some instances, greater and more dymaic 
control over your profile with exciting and new features to come! Meet all the people at My Extra Space and 
if your a developer then make an applet to show off your sills to your mates!
personals, love and romance, find your Kindred Spirit.

A popular social networking website offering an interactive, user-submitted network of friends, personal profiles,
 blogs, groups, photos, music and videos internationally.  

It has become an increasingly influential part of contemporary popular culture.


Profiles contain two standard blurbs: About Me and Who I'd Like to Meet sections. Profiles also contain an 
Interests section and a Details section. However, fields in these sections will not be displayed if members 
do not fill them in. Profiles also contain a blog with standard fields for content, emotion, and media. 
My Extra Space also supports uploading images. One of the images can be chosen to be the default image, 
the image that will be seen on the profile's main page, search page, and as the image that will appear to the 
side of the user's name on comments, messages, etc. Flash, such as on MySpace's video service, can be embedded. 
Also there is a details section which allows the user to provide personal information on the user such as 
his/her race, religion, and sexual orientation. Also with the option of gay or lesbian and bi or bi-sexual / 
bisexual.


Friend Space
 
An image used to signify when a user is signed inThe User's Friends Space contains a count of a user's friends,
 a Top Friends area, and a link to view all of the user's friends. Users can choose a certain number of friends
 to be displayed on their profile in the Top Friends area. The Top Friends used to be restricted to eight 
friends, commonly called the Top 8. People bypassed this limitation by using third-party tools to emulate a 
Top X friends. MySpace now allows four, eight, twelve, sixteen, twenty, twenty-four, and now up to and 
including forty friends to be displayed in the Top Friends area. If a friend's page has been deleted, blank 
spaces will be shown on the pages. If the user clicks onto edit friends, there will be a block that says, this 
profile no longer exists. Before the Top 8 system was put in place, the eight friends displayed on the user's 
profile were the first eight friends to sign up for Myspace. When the user's entire friend list is viewed, all of 
their friends are shown sorted in order of their ID number, regardless of their placement in the user's Top 
Friends.


Comments
Below the User's Friends Space by default is the comments section, wherein the user's friends may leave 
comments for all viewers to read. MySpace users have the option to delete any comment and/or require all comments 
to be approved before posting. If a user's account is deleted, every comment left on other profiles by that user 
will be deleted, and replaced with the comment saying This Profile No Longer Exists. Comments have been the 
real engine behind MySpace.[citation needed] Many sites were developed to offer HTML comments like MySpace 
comments. [citation needed] These HTML comments are mainly links to images on other sites, and offer bandwidth 
in return for visitors.[citation needed]


Bulletins
Bulletins are messages that are posted on the bulletin board so that every friend the user has can see what the 
user is saying. Bulletins are commonly used to tell other users about updates on their profile, experiences, etc.


Profile customization HTML

My Extra Space to take on iTunesMySpace allows users to customize their user profile pages by entering HTML 
but not JavaScript into such areas as About Me, I'd Like to Meet, and Interests. Videos, and flash-based 
content can be included this way. Users also have the option to add music to their profile pages via MySpace 
Music, a service that allows bands to post songs for use on MySpace.

A user can also change the general appearance of his page by entering CSS in a style ... /style element 
into one of these fields to override the page's default style sheet using myspace editors. This is often used 
to tweak fonts and colors, but it has its limitations due to poorly-structured HTML used on the profile page. 
The fact that the user-added CSS is located in the middle of the page rather than being located in the head 
element means that the page will begin to load with the default MySpace layout before abruptly changing to the 
custom layout. A special type of modification is a div overlay, where the default layout is dramatically changed 
by hiding default text with div tags and large images.

There are several independent web sites offering MySpace layout design utilities which let a user select options
 and preview what their page will look like with them.

MySpace has recently added its own Profile Customizer to the site, allowing users to change their profile 
through MySpace. Using this feature bypasses the CSS loading delay issue, as the MySpace default code is changed
 for the customized profile.


Music
MySpace profiles for musicians are different from normal profiles in that artists are allowed to upload up to 
four MP3 songs. Though recently myspace has promoted the ability to add up to five songs, instead of four by 
artists adding a company to their friends list. The uploader must have rights to use the songs e.g their own
 work, permission granted, etc. Unsigned musicians can use MySpace to post and sell music, which has proven 
popular among MySpace users.


MyExtra Space features

Bulletins are posts that are posted on to a bulletin board for everyone on a MyExtraSpace user's friends list to 
see. Bulletins can be useful for notifying an entire, but usually a portion of the friends list depending on 
how many friends are added, without resorting to messaging users individually. Some users choose to use 
Bulletins as a service for delivering chain messages about politics, religion, or anything else and sometimes 
these chain messages are considered threatening to the users, especially the ones that mention bad luck, death,
 or topics similar to that. They have also become the primary attack point for phishing. Bulletins are 
deleted after ten days.


Groups
MyExtraSpace has a Groups feature which allows a group of users to share a common page and message board. 
Groups can be created by anybody, and the moderator of the group can choose for anyone to join, or to approve or 
deny requests to join.
" >
<body id="splash" bgcolor="#CCCCCC" text="#000000" alink="#003399" vlink="#003399" link="#003399"  class="">

<div id="wrap">

  <div id="top">
  

  
  </div>
  <div id="header">
  
    <div id="sitename"><?=$site_name?></div>
  </div>
  
  <div id="topnav">
  
  <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="white" href="logincomplete.php"><font color="#FFFFFF" size="2" face="MS Sans Serif">Home</font></a>&nbsp;|
            <?php
}
else
{
?>
            <a class="nav" href="index.php">Home</a>&nbsp;|
            <?php
}
?>
            <a class="nav" href="browse.php">Browse</a>&nbsp;|
            <a class="nav" href="polls.php">Polls</a>&nbsp;|
            <a class="nav" href="blog.php">Blog</a>&nbsp;|
            <a class="nav" href="chat.php">Chat</a>&nbsp;|
            <a class="nav" href="message_board.php">Forum</a>&nbsp;|
            <a class="nav" href="groups.php">Groups</a>&nbsp;|
            <a class="nav" href="events.php">Events</a>&nbsp;|
            <a class="nav" href="classified.php">Classifieds</a>&nbsp;|
            <a class="nav" href="view_all_journal.php">Journal</a>&nbsp;|
            <a class="nav" href="videos.php">Videos</a>&nbsp;|
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="nav" href="music.php">Music</a>&nbsp;|
            <?php
}
else
{
?>
            <a class="nav" href="music_signup.php">Music</a>&nbsp;|
            <?php
}
?>
            
            <?php
if ($_SESSION["logged_in"]=="yes")
{
?>
            <a class="nav" href="logout.php">Log Off</a>
            <?php
}
else
{
?>
            <a class="nav" href="join_us.php">Join Us</a> |
            <a class="nav" href="login.php">Login</a>
            <?php
}
?>
            
  

  <!-- Nav.php -->
  
  </div>
  
  
  


  
  <div id="main">
  
    <div id="nav">
	
	  <div id="intro">
	  
	  <img src="images/logo.jpg" width="460" height="192">	  
	  <style> 
	  ... 
	  </style>
	  <div></div>
	  </div>
    </div>
	
	<div id="content">
  
    <div id="contentWrap">
	
	<div id="splash_login" class="section">


	<h5 class="heading">Member Login</h5>
	<form name="frm" method="post" action="login1.php">
		<div class="row">
			<label for="email">E-Mail:</label>
			<INPUT value="<?=$_COOKIE['member_email']?>" name="email">
		</div>
		<div class="row">
			<label for="password">Password:</label>
			<INPUT type=password name="password"><br />
		</div>
		<div class="clear" style="margin-left:-8px; margin-bottom:3px;">
			<input type="checkbox" name="remember_me" checked value="1">
			<label for="checkbox">Remember Me</label><br />
		</div>
		<div style="margin-left:21%">
			<INPUT class=txt_topic style="WIDTH: 70px" type=submit value="Login" name="btnsubmit">
			<input class=txt_topic style="WIDTH: 80px" onClick="document.location.href='join_us.php';return false;" type=button value="Sign Up" name=btnreg><br />
			<div style="margin-top:10px"><a href="forgot_password.php"forgot_password.php"" class="alignC">Forgot your password?</a></div>
			<div class="clear"></div>
		</div>
	</form>
</div>
    </div>
  </div>
  
	<div id="splash_coolNewPeople" class="section">
	<h5 class="heading">Cool New People</h5>
    
            <div class="">
<table border="0" cellspacing="0" cellpadding="3" width="100%">
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
	        </div>
        
	
	<div class="clear"></div>
</div>

		
  
    <div id="footer">
	
	<br />
	<a href="#" target="_blank">About</a> | 
	<a href="tos.php" target="_blank">Terms</a> | 
	<a href="privacy_policy.php" target="_blank">Privacy Policy</a> |  
	<a href="#" target="_blank">Contact <?=$site_name?></a> 

	<br /><br />
    &copy;2006 <?=$site_name?>. All Rights Reserved.
	
	<br /><br />
	
	<div align='right'>
	<a class='bold_gray' href="<?=$site_url?>"  target='_blank'>Powered By <?=$site_name?></a>
	</div>
	
	</div>
	
  </div>
  
  
  
  

  
  
</div>







</body>