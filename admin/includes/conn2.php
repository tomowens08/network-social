<?php
$hostname="p50mysql19.secureserver.net";
$dbuser="ruskidom3";
$dbpass="Ruskid0m";
$link = mysql_connect($hostname, $dbuser, $dbpass)
or Die("could'nt connect to my sql database");
$select_database = mysql_select_db("ruskidom3", $link)
or Die("could'nt select database");

$writedir = "/home/content/r/u/s/ruskidom3/html/temp_upload/";
$uploaddir = "/home/content/r/u/s/ruskidom3/html/user_images/";
$mooddir = "/home/content/r/u/s/ruskidom3/html/moods/";
$writedir = "/home/content/r/u/s/ruskidom3/html/temp_upload/";
$site_location="http://www.ruskidom.com/";
$site_email="myloungesadmin@gmail.com";
$email_name="RuskiDom";
?>
