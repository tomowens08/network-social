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
  print "<td class='headcell' height='20'>Delete a forum sub category</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

include("includes/conn.php");

$id=$HTTP_GET_VARS["id"];
$cat_name=$HTTP_POST_VARS["cat_name"];
$cat_desc=$HTTP_POST_VARS["cat_desc"];
$main_cat=$HTTP_POST_VARS["main_cat"];

  if ($cat_name=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../classes/forum.class.php");

     $forum=new forum;
     $res=$forum->delete_sub_cat($id);

     if($res)
     {
         print "The sub category has been deleted successfully.<br>";
         print "<a href='modify_sub_cat.php'>Delete More</a>";
     }
     else
     {
         print "There was an error and the category was not deleted at this time.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

