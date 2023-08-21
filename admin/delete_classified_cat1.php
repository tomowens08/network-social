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
  print "<td class='headcell' height='20'>Delete a classified category</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
include("includes/conn.php");

$cat_name=$HTTP_POST_VARS["cat_name"];
$cat_desc=$HTTP_POST_VARS["cat_desc"];


  if ($cat_name=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../includes/class.class.php");
     $group=new classified;
     $res=$group->delete_category($HTTP_GET_VARS["id"]);
     if($res)
     {
         print "The category has been deleted successfully.";
     }
     else
     {
         print "There was an error and the category was not deleted successfully.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

