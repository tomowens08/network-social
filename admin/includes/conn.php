<?php
$hostname="localhost";
$dbuser="thenorth_fusn1";
$dbpass="fusn0";
$link = mysql_connect($hostname, $dbuser, $dbpass)
or Die("could'nt connect to my sql database");
$select_database = mysql_select_db("thenorth_fusn", $link)
or Die("could'nt select database");





$uploaddir = "http://www.ons2.com/fusn/user_images/";
//$writedir = "/temp_upload/";
$songdir = "http://www.ons2.com/fusn/songs/";
$emaildir = "http://www.fusn.ons2.com/emails/";


$writedir = "http://www.fusn.ons2.com/temp_upload/";
//$uploaddir = "/home/content/r/u/s/www.fusn.ons2.com/html/user_images/";
$mooddir = "http://www.fusn.ons2.com/moods/";
//$writedir = "/home/content/r/u/s/www.fusn.ons2.com/html/temp_upload/";
$site_location="http://www.fusn.ons2.com";
$site_email="tom0152@hotmail.co.uk";
$email_name="CommunitySite";
$site_url="http://www.fusn.ons2.com/";
$site_name="communitySite";
?>
