<?php
session_start();

if (count($HTTP_POST_VARS)) {
	foreach ($HTTP_POST_VARS as $k => $v) {
		if (!is_array($v)) {
			$v = ereg_replace('<([sS])([cC])([rR])([iI])([pP])([tT])(.*)([sS])([cC])([rR])([iI])([pP])([tT])>','',$v);
			$v = ereg_replace('<([sS])([cC])([rR])([iI])([pP])([tT])(.*)','',$v);
			$v = str_replace('<!--','',$v);
			$HTTP_POST_VARS[$k] = $v;
		}
	}
	$_POST = $HTTP_POST_VARS;
}
?>
<!-- Top.php -->
<html>
<head>
<title>YPN - Get Into It... A Place To Meet People From All Over The World!</title>
<META NAME="rating" content="SAFE FOR KIDS">
<META NAME="distribution" content="GLOBAL">
<META NAME="classification" content="Portal">
<META NAME="revisit-after" content="3 Days">
<META NAME="robots" content="index,follow">
<meta name="PErsonal Network" content=" Social, networking, website, YPN, community, space." />
<meta name="Keywords" content="space, Your Personal Network, social, networking, dating, friends, meet, web, people, network, networking, date, dates, friend, friendship, friendships, meeting, us, we, pictures, girls, boys, men, women, girl, boy, man, woman, me, sdcoil, nwtwork, dstind, datong, mysoace, mysace, socia, bys, grls, spce, xtrs, 
ara, area, grate, edyt, socilat, site, webs, personals, love, romance, find, Kindred, picture, UK, residents,
 postcode, search, Meet, country, touch, blog, blogs, forums, forum, email, groups, games, profiles, blogs, groups, photos,events, contemporary, pop, culture, features, videos, movies, movie, video, Blurbs, multimedia, bulletins, " />
<meta name="Description" content="YPN is a social netwroking website thats allows you to make an extension to the already popoular if over populated REVELLIN. Giving you more room, unlimited room is some instances, greater and more dymaic control over your profile with exciting and new features to come! Meet all the people at REVELLIN and if your a developer then make an applet to show off your sills to your mates!
personals, love and romance, find your Kindred Spirit.
A popular social networking website offering an interactive, user-submitted network of friends, personal  music and videos internationally.  

It has become an increasingly influential part of contemporary popular culture.


Profiles contain two standard blurbs: About Me and Who I'd Like to Meet sections. Profiles also contain an 
Interests section and a Details section. However, fields in these sections will not be displayed if members 
do not fill them in. Profiles also contain a blog with standard fields for content, emotion, and media. 
REVELLIN also supports uploading images. One of the images can be chosen to be the default image, 
the image that will be seen on the profile's main page, search page, and as the image that will appear to the 
side of the user's name on comments, messages, etc. Flash, such as on REVELLIN's video service, can be embedded. 
Also there is a details section which allows the user to provide personal information on the user such as 
his/her race, religion, and sexual orientation. Also with the option of gay or lesbian and bi or bi-sexual / 
bisexual. Friend Space An image used to signify when a user is signed inThe User's Friends Space contains a count of a user's friends,
 a Top Friends area, and a link to view all of the user's friends. Users can choose a certain number of friends
 to be displayed on their profile in the Top Friends area. The Top Friends used to be restricted to eight 
friends, commonly called the Top 8. People bypassed this limitation by using third-party tools to emulate a 
Top X friends. REVELLIN now allows four, eight, twelve, sixteen, twenty, twenty-four, and now up to and 
including forty friends to be displayed in the Top Friends area. If a friend's page has been deleted, blank 
spaces will be shown on the pages. If the user clicks onto edit friends, there will be a block that says, this 
profile no longer exists. Before the Top 8 system was put in place, the eight friends displayed on the user's 
profile were the first eight friends to sign up for REVELLIN. When the user's entire friend list is viewed, all of 
their friends are shown sorted in order of their ID number, regardless of their placement in the user's Top 
Friends.Comments Below the User's Friends Space by default is the comments section, wherein the user's friends may leave 
comments for all viewers to read. REVELLIN users have the option to delete any comment and/or require all comments 
to be approved before posting. If a user's account is deleted, every comment left on other profiles by that user 
will be deleted, and replaced with the comment saying This Profile No Longer Exists. Comments have been the 
real engine behind REVELLIN. Many sites were developed to offer HTML comments like REVELLIN 
comments. These HTML comments are mainly links to images on other sites, and offer bandwidth 
in return for visitors. Bulletins are messages that are posted on the bulletin board so that every friend the user has can see what the 
user is saying. Bulletins are commonly used to tell other users about updates on their profile, experiences, etc. Profile customization HTML REVELLIN to take on iTunesREVELLIN allows users to customize their user profile pages by entering HTML content can be included this way. Users also have the option to add music to their profile pages via REVELLIN Music, a service that allows bands to post songs for use on REVELLIN. A user can also change the general appearance of his page by entering CSS in a style 
into one of these fields to override the page's default style sheet using REVELLIN editors. This is often used 
to tweak fonts and colors, but it has its limitations due to poorly-structured HTML used on the profile page. 
The fact that the user-added CSS is located in the middle of the page rather than being located in the head 
element means that the page will begin to load with the default REVELLIN layout before abruptly changing to the 
custom layout. A special type of modification is a div overlay, where the default layout is dramatically changed by hiding default text with div tags and large images. There are several independent web sites offering REVELLIN layout design utilities which let a user select options and preview what their page will look like with them. Using this feature bypasses the CSS loading delay issue, as the REVELLIN default code is changed
 for the customized profile. Music profiles for musicians are different from normal profiles in that artists are allowed to upload up to has a Groups feature which allows a group of users to share a common page and message board. Groups can be created by anybody, and the moderator of the group can choose for anyone to join, or to approve or deny requests to join." />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">



<link href="style3.css" rel="stylesheet" type="text/css">
<link href="style4.css" rel="stylesheet" type="text/css"><body id="body" text="#000000" alink="#003399" vlink="#003399" link="#003399"  class="">

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2580805-2";
urchinTracker();
</script>

<?
if (!ereg('view_profile.php',$_SERVER['SCRIPT_NAME'])) {
?>
<link href="styles/css.css" type=text/css rel=stylesheet>
<link href="styles/css_t.css" type=text/css rel=stylesheet>
<link href="styles/myspace_css.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="styles/css_profile.css">

<?
} else {
?>
<STYLE type=text/css>

body { background-color: white; }

BODY {
	BACKGROUND-IMAGE: none; MARGIN: 0px
}
.menu {
	FONT-WEIGHT: bold; FONT-SIZE: 9px; COLOR: #ffffff; FONT-FAMILY: Tahoma; TEXT-DECORATION: none
}
.search {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #ffffff; FONT-FAMILY: Tahoma
}
.detination {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #6e7db4; FONT-FAMILY: Tahoma
}
.style1 {
	COLOR: #f4bb3a
}
.text_gray {
	FONT-SIZE: 11px; COLOR: #818181; FONT-FAMILY: Tahoma
}
.orange {
	BACKGROUND-COLOR: #ffffff;
}
.bottom {
	FONT-SIZE: 11px; COLOR: #777777; FONT-FAMILY: Tahoma; TEXT-DECORATION: none
}
.style2 {
	FONT-SIZE: 9px; COLOR: #777777; FONT-FAMILY: Tahoma; TEXT-DECORATION: none
}
.style3 {
	FONT-SIZE: 11px; COLOR: #ffffff; FONT-FAMILY: Tahoma
}
.news {
	FONT-SIZE: 11px; COLOR: #818181; FONT-FAMILY: Tahoma
}
.blue {
	COLOR: #6e7db4
}
.style5 {
	FONT-SIZE: 10px; COLOR: #6e7db4
}
.box_manishmanish {
	FONT-SIZE: 10px; MARGIN-BOTTOM: 0px; WIDTH: 121px; HEIGHT: 17px
}

.btext {
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #000000;
    FONT-FAMILY: Tahoma;
}
.txt_label {
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #000000;
    FONT-FAMILY: Tahoma;
}
.txt_note {
	FONT-SIZE: 11px; COLOR: #ff7f02
}
.txt_desc {
	FONT-SIZE: 11px; COLOR: #4d3591; FONT-FAMILY: Tahoma
}
.txt_desc:hover {
	FONT-SIZE: 11px; COLOR: #0000ff; FONT-FAMILY: Tahoma
}
.txt_link {
	FONT-WEIGHT: bold; FONT-SIZE: 12px; COLOR: #6e7db4; FONT-FAMILY: Verdana
}
.txt_link:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 12px; COLOR: #ffbb3a; FONT-FAMILY: Verdana
}
.txt_black {
	FONT-SIZE: 10px; COLOR: #000000; FONT-FAMILY: Tahoma
}
.txt_topic_over {
	COLOR: #f4bb3a
}
.txt_topic {
	FONT-WEIGHT: bold; FONT-SIZE: 11px; COLOR: #ac670b; FONT-FAMILY: Tahoma
}
.txt_href {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #ac670b; FONT-FAMILY: Verdana
}
.txt_href:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #ffffff; FONT-FAMILY: Verdana
}
.big_href {
	FONT-WEIGHT: bold; FONT-SIZE: 12px; COLOR: #ac670b; FONT-FAMILY: Verdana
}
.big_href:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 12px; COLOR: #ffffff; FONT-FAMILY: Verdana
}
.bgorange {
	BACKGROUND-COLOR: #ffbb3a
}
.txt_error {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #ffbf0f; FONT-FAMILY: Verdana
}
.list_table {
	BACKGROUND-COLOR: #ffcc66
}
.list_head {
	BACKGROUND-COLOR: #ffffff
}
.list_row {
	BACKGROUND-COLOR: #cccccc
}
.bdcolour {
	BACKGROUND-COLOR: #ffffff
}
a
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #000000;
    FONT-FAMILY: Tahoma;
    text-decoration:none;
}
a:hover
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #000000;
    FONT-FAMILY: Tahoma;
    text-decoration:underline;
}
.navbar
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #FFFFFF;
    FONT-FAMILY: Tahoma;
    text-decoration:none;
			background-color: #000000;
}
.navbar:hover
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #FFFFFF;
    FONT-FAMILY: Tahoma;
    text-decoration:underline;
			background-color: #000000;
}

.w_bold {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #397594; TEXT-DECORATION: none
}
.blue_border {
	BORDER-RIGHT: #397594 1px solid; BORDER-TOP: #397594 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #397594 1px solid; BORDER-BOTTOM: #397594 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #dae8f3
}
.dark_blue_white {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #C3CED5; TEXT-DECORATION: none
}
.dark_b_border {
	BORDER-RIGHT: #00309c 1px solid; BORDER-TOP: #00309c 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #00309c 1px solid; BORDER-BOTTOM: #C3CED5 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #dedcfc
}
.dark_purple_white_old {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #999999; TEXT-DECORATION: none
}
.dark_purple_border {
	BORDER-RIGHT: #9c65ce 1px solid; BORDER-TOP: #9c65ce 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #9c65ce 1px solid; BORDER-BOTTOM: #9c65ce 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #e7ebf7
}
.dark_white {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #f7f7f7; TEXT-DECORATION: none
}
.dark_white1 {
	BACKGROUND-COLOR: #e7ebf7
}
.dark_black_border {
	BORDER-RIGHT: #397594 1px solid; BORDER-TOP: #397594 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #397594 1px solid; COLOR: #cccccc; BORDER-BOTTOM: #397594 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #397594
}
.dark_white3 {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #ffffff; TEXT-DECORATION: none
}

.dark_b_border2 {
	BORDER-RIGHT: #003366 1px solid; BORDER-TOP: #003366 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #003366 1px solid; BORDER-BOTTOM: #003366 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
}
.dark_blue_white2 {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; TEXT-DECORATION: none
}
.dark_purple_white {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #999999; TEXT-DECORATION: none
}
.checkbox,.radio {
	border:0px;
	background-color: transparent;
	margin: 0px;
	vertical-align: bottom;
	}
.nametext{font-family:verdana,arial,sans-serif,helvetica; 
font-size:12pt; color:#000000; font-weight:bold;}
.whitetext12{font-family:verdana,arial,sans-serif,helvetica; 
font-size:9pt; color:#ffffff; font-weight:bold;}
.orangetext15{font-family:verdana,arial,sans-serif,helvetica; 
font-size:9pt; color:#ffffff; font-weight:bold;}


</STYLE>
</head>
<body>
#background-colour{ backgroud-color:#ffffff;}
<?
}
?>
