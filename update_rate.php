<?php
  session_start();
  $_SESSION["rate_gender"]=$HTTP_POST_VARS["gender"];
  $_SESSION["age"]=$HTTP_POST_VARS["age"];
  $_SESSION["rate_age"]=$HTTP_POST_VARS["age"];
  $_SESSION["rate_state"]=$HTTP_POST_VARS["state"];

  print ("<script language='JavaScript'> window.location='rate_photos.php'; </script>");
?>
