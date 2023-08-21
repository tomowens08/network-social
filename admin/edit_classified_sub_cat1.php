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
  print "<td class='headcell' height='20'>Edit a classified sub category</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

include("includes/conn.php");

$id=$HTTP_GET_VARS["id"];
$main_id=$HTTP_POST_VARS["main_cat"];
$cat_name=addslashes($HTTP_POST_VARS["cat_name"]);
$cat_desc=addslashes($HTTP_POST_VARS["cat_desc"]);

  if ($cat_name=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../includes/class.class.php");

     $group=new classified;
     $res=$group->edit_sub_cat($id,$main_id,$cat_name,$cat_desc);
     if($res)
     {
         print "The category has been edited successfully.<br>";
         print "<a href='modify_classified_sub_cat.php'>Edit More</a>";
     }
     else
     {
         print "There was an error and the category was not edited successfully.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

