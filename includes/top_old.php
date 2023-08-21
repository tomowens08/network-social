<?php
session_start();
?>
<!-- Top.php -->
<html>
<head>
<title>RuskiDom.com - Home To Russians From All Over The World</title>
<META NAME="description" content="RuskiDom.com">
<Meta name="keywords" content="RuskiDom.com">
<meta name="title" content="RuskiDom.com">
<meta name="copyright" content="Copyright 2005, RuskiDom.com">
<META NAME="rating" content="SAFE FOR KIDS">
<META NAME="distribution" content="GLOBAL">
<META NAME="classification" content="Portal">
<META NAME="revisit-after" content="3 Days">
<META NAME="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<?
if (!ereg('view_profile.php',$_SERVER['SCRIPT_NAME'])) {
?>
<STYLE type=text/css>
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
	BACKGROUND-COLOR: orange
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
.nav
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #FFFFFF;
    FONT-FAMILY: Tahoma;
    text-decoration:none;
}
.nav:hover
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #FFFFFF;
    FONT-FAMILY: Tahoma;
    text-decoration:underline;
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
	BORDER-RIGHT: #003366 1px solid; BORDER-TOP: #003366 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; BORDER-LEFT: #003366 1px solid; BORDER-BOTTOM: #003366 1px solid; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #ffffff
}
.dark_blue_white2 {
	PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 11px; WORD-SPACING: 0.1em; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #999999; TEXT-DECORATION: none
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
</STYLE>
<?
} else {
?>
<STYLE type=text/css>
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
	BACKGROUND-COLOR: orange
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
}
.navbar:hover
{
	FONT-WEIGHT: normal;
    FONT-SIZE: 11px;
    COLOR: #FFFFFF;
    FONT-FAMILY: Tahoma;
    text-decoration:underline;
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
<?
}
?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-146953-5";
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
					response = req.responseXML.documentElement;
					//alert(response.getElementsByTagName('result')[0].firstChild.data);
					return true;
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
		url  = 'http://www.ruskidom.com/update_online.php?member_id=<?=$_SESSION['member_id']?>&time='+d.getMilliseconds();
		loadXMLDoc(url);
	}
	cur_second = d.getSeconds();
}
</script>
</head>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0>
