<?php
session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?
if ($_SESSION["user_admin"]!="Yes")
{

  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Add a new mood for blog</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

include("includes/conn.php");

$name=$HTTP_POST_VARS["cat_name"];
$image_name=$HTTP_POST_FILES["mood_image"]["name"];

  if ($name=="" || $image_name==Null)
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../includes/blog.class.php");
     
     // Upload Code
        $picture_name=$image_name;
        $picture_url="moods/".$picture_name;
        $result = move_uploaded_file($_FILES["mood_image"]["tmp_name"], $mooddir.$picture_name);
     // Upload Code

     $blog=new blog;
     $res=$blog->add_mood($name,$picture_url);
     if($res)
     {
         print "The mood has been added successfully.<br>";
         print "<a href='add_mood.php'>Add More</a>";
     }
     else
     {
         print "There was an error and the mood was not added successfully.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

