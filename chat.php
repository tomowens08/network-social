<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

include("includes/conn.php");
include("includes/people.class.php");
$people=new people;
include("includes/profile.class.php");
$profile=new profile;

$name=$people->get_name($_SESSION["member_id"]);

include("includes/class.class.php");
$class=new classified;




//include("includes/right.php");
?>
<?php

require_once dirname(__FILE__)."/chat/src/phpfreechat.class.php";
$params = array();
$params["nick"] = "$name";  // setup the intitial nickname
$params["frozen_nick"] = true;
$params["isadmin"] = true; // just for debug ;)
$params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
$params["showsmileys"] = false;
$params["channels"] = array("room1");
$chat = new phpFreeChat( $params );


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
 <head>
  <link rel="stylesheet" title="classic" type="text/css" href="../style3.css" />
  <link rel="stylesheet" title="classic" type="text/css" href="../style4.css" />
 
  <?php $chat->printJavascript(); ?>
  <?php $chat->printStyle(); ?>  
<?php include("includes/top.php"); ?>
 </head>

<div class="body">
<div id="wrap">
  <div align="center">
    <?php
include("includes/nav.php");
?>
    
    
    
  </div>
  <div class="main">
    <div align="center">
      <?php $chat->printChat(); ?>
    </div>
  </div>
</div>
</div>
</html>
<?php
}
?>