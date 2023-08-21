<?php
session_start();
include("includes/conn.php");
include("classes/photo_ratings.class.php");
$photo_rating=new photo_ratings;

  $sess_id=session_id();
  $photo_id=$HTTP_POST_VARS["photo_id"];
  $rating=$HTTP_POST_VARS["rdo_rate"];

  $res=$photo_rating->add_rating($photo_id,$rating,$sess_id,$_SESSION["member_id"]);
  if($res==1)
  {
   print ("<script language='JavaScript'> window.location='rate_photos.php'; </script>");
  }
  else
  {
      print "There was an error and the rating was not added at this time.";
  }
?>
