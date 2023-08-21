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
  print "<td class='headcell' height='20'>Edit a Blog Mood</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

include("includes/conn.php");

$name=$HTTP_POST_VARS["cat_name"];
$image_name=$HTTP_POST_FILES["mood_image"]["name"];

  if ($name=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../includes/blog.class.php");
     $blog=new blog;

     if($image_name!=Null)
     {

     // Upload Code
        $picture_name=$image_name;
        $picture_url="moods/".$picture_name;
        $result = move_uploaded_file($_FILES["mood_image"]["tmp_name"], $mooddir.$picture_name);
     // Upload Code
     }
     else
     {
         $picture_url=$blog->get_mood_image($HTTP_GET_VARS["id"]);
     }

     $res=$blog->edit_mood($HTTP_GET_VARS["id"], $name,$picture_url);
     if($res)
     {
         print "The mood has been edited successfully.<br>";
         print "<a href='manage_mood.php'>Edit More</a>";
     }
     else
     {
         print "There was an error and the mood was not edited successfully.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

