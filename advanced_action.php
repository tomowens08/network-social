<?php
  session_start();
  $_SESSION["browse_gender"]=$HTTP_POST_VARS["gender"];
  $_SESSION["agefrom"]=$HTTP_POST_VARS["agefrom"];
  $_SESSION["ageto"]=$HTTP_POST_VARS["ageto"];
  $_SESSION["type"]=$HTTP_POST_VARS["type"];
  $_SESSION["browse_status"]=$HTTP_POST_VARS["status"];

  $_SESSION["country"]=$HTTP_POST_VARS["Country"];
  $_SESSION["distance"]=$HTTP_POST_VARS["distance"];
  $_SESSION["postal"]=$HTTP_POST_VARS["Postal"];
  $_SESSION["artist_here"]=$HTTP_POST_VARS["artist_here"];
  $_SESSION["orderby"]=$HTTP_POST_VARS["orderby"];

  $_SESSION["ethnicity"]=$HTTP_POST_VARS["ethnicity"];
  $_SESSION["body"]=$HTTP_POST_VARS["body"];
  $_SESSION["min_foot"]=$HTTP_POST_VARS["min_foot"];
  $_SESSION["min_inch"]=$HTTP_POST_VARS["min_inch"];
  $_SESSION["max_foot"]=$HTTP_POST_VARS["max_foot"];
  $_SESSION["max_inch"]=$HTTP_POST_VARS["max_inch"];


  print ("<script language='JavaScript'> window.location='advanced_search_browse.php'; </script>");
?>
