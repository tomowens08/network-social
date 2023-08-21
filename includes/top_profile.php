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
<title>REVELLIN- a place to meet people</title>
<META NAME="rating" content="SAFE FOR KIDS">
<META NAME="distribution" content="GLOBAL">
<META NAME="classification" content="Portal">
<META NAME="revisit-after" content="3 Days">
<META NAME="robots" content="index,follow">
<META NAME="description" content="Revellin">
<Meta name="keywords" content="social, mates, space,">
<meta name="title" content="revellin.com">
<meta name="copyright" content="Copyright 2006, revellin.com">
<META NAME="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">



<link href="style3.css" rel="stylesheet" type="text/css">
<link href="style4.css" rel="stylesheet" type="text/css">




<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2580805-2";
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
		url  = '/update_online.php?member_id=<?=$_SESSION['member_id']?>&time='+d.getMilliseconds();
		loadXMLDoc(url);
	}
	cur_second = d.getSeconds();
}
</script>
</head>