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
<title>MyExtraSpace</title>
<META NAME="description" content="MyExtraSpace">
<Meta name="keywords" content="MyExtraSpace">
<meta name="title" content="myextraspace.com">
<meta name="copyright" content="Copyright 2006, MyExtraSpace.com">
<META NAME="rating" content="SAFE FOR KIDS">
<META NAME="distribution" content="GLOBAL">
<META NAME="classification" content="Portal">
<META NAME="revisit-after" content="3 Days">
<META NAME="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link href="/csss/style5.css" rel="stylesheet" type="text/css">
<link href="/csss/style6.css" rel="stylesheet" type="text/css">


<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-711125-1";
urchinTracker();


var req;

function loadXMLDoc(url) 
{
    // branch for native XMLHttpRequest object
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange;
        req.open("GET", url, true);
        req.send(null);
    // branch for IE/Windows ActiveX version
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = processReqChange;
            req.open("GET", url, true);
            req.send();
        }
    }
}

function processReqChange() 
{
    // only if req shows "complete"
    if (req.readyState == 4) {
        // only if "OK"
        if (req.status == 200) {
            // ...processing statements go here...
	    	  response  = req.responseXML.documentElement;
					if (response) {

  	 		 	  method    = response.getElementsByTagName('method')[0].firstChild.data;
	
	   	 		  result    = response.getElementsByTagName('result')[0].firstChild.data;
						
     				if (method) eval(method + '(\'\', result)');
						return true;
					}
        } else {
            //alert("There was a problem retrieving the XML data:\n" + req.statusText);
        }
    }
}
function onloadH(e)
{
   /*get the event model*/
   emod = (e) ? (e.eventPhase) ? "W3C" : "NN4" : (window.event) ? "IE4+" : "unknown";

   if (emod == "NN4") {
      //document.captureEvents(Event.KEYDOWN);
	 		document.captureEvents(Event.MOUSEMOVE);
	 }
   //document.onkeydown = changeVal;
	 document.onmousemove = changeVal;
   return true;
}

/*define the event handler for the onload event*/
window.onload = onloadH;
d = new Date();
var cur_second = d.getSeconds();

function changeVal(e) {
	d = new Date();
	if (cur_second != d.getSeconds()) {
		e = window.event;
		url  = 'http://www.myextraspace.com/update_online.php?member_id=<?=$_SESSION['member_id']?>&time='+d.getMilliseconds();
		loadXMLDoc(url);
	}
	cur_second = d.getSeconds();
}
</script>
<meta name="my extra space" content=" Social, networking, website, myspace, my, extra, space.">
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
 for the customized profile.">
<meta name="keywords" content="
my, extra, space, myextraspace, social, networking, dating, friends, meet, web, people, network, networking,
date, dates, friend, friendship, friendships, meeting, us, we, pictures, girls, boys, men, women, girl, boy,
man, woman, me, xtra, pace, sdcoil, nwtwork, dstind, datong, mysoace, mysace, socia, bys, grls, spce, xtrs, 
ara, area, grate, edyt, socilat, site, webs, personals, love, romance, find, Kindred, picture, UK, residents,
 postcode, search, Meet, country, touch, blog, blogs, forums, forum, email, groups, games, events, 
contemporary, pop, culture, features, videos, movies, movie, video, Blurbs, multimedia, bulletins, 
">
</head>