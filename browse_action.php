<?php
session_start();
  $_SESSION["browse_gender"]=$HTTP_POST_VARS["gender"];
  $_SESSION["agefrom"]=$HTTP_POST_VARS["agefrom"];
  $_SESSION["ageto"]=$HTTP_POST_VARS["ageto"];
  $_SESSION["type"]=$HTTP_POST_VARS["type"];
  $_SESSION["browse_status"]=$HTTP_POST_VARS["status"];

  $_SESSION["countries"]=$HTTP_POST_VARS["countries"];
  $_SESSION["distances"]=$HTTP_POST_VARS["distances"];
  $_SESSION["postal"]=$HTTP_POST_VARS["Postal"];
  $_SESSION["artist_here"]=$HTTP_POST_VARS["artist_here"];
  $_SESSION["orderby"]=$HTTP_POST_VARS["orderby"];
  $_SESSION["city1"]=$HTTP_POST_VARS["city"];

  $_SESSION["network"]=$HTTP_POST_VARS["network"];
  $_SESSION["ethnicity1"]=$HTTP_POST_VARS["ethnicity"];
  $_SESSION["body"]=$HTTP_POST_VARS["body"];
  $_SESSION["heightBetween"]=$HTTP_POST_VARS["Height"];
  $_SESSION["min_foot"]=$HTTP_POST_VARS["min_foot"];
  $_SESSION["min_inch"]=$HTTP_POST_VARS["min_inch"];
  $_SESSION["max_foot"]=$HTTP_POST_VARS["max_foot"];
  $_SESSION["max_inch"]=$HTTP_POST_VARS["max_inch"];
  $_SESSION["smoker"]=$HTTP_POST_VARS["smoker"];
  $_SESSION["drinker"]=$HTTP_POST_VARS["drinker"];
  $_SESSION["orientation"]=$HTTP_POST_VARS["orientation"];
  $_SESSION["EducationID"]=$HTTP_POST_VARS["EducationID"];
  $_SESSION["ReligionID"]=$HTTP_POST_VARS["ReligionID"];
  $_SESSION["IncomeID"]=$HTTP_POST_VARS["IncomeID"];
  $_SESSION["ChildrenID"]=$HTTP_POST_VARS["ChildrenID"];


  print ("<script language='JavaScript'> window.location='browse.php'; </script>");
?>
Redirecting...
