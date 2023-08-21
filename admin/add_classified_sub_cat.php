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

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' width='100%' height='20'>Add a new classified sub category</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  include("includes/conn.php");
  include("../includes/class.class.php");
  
  $class=new classified;

  print "<form name='AddSpeciality' action='add_classified_sub_cat1.php' method='post'>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Main Category(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<select name='main_cat' size='1'>";
     $cat_res=$class->get_all_cats();
     while($cat_set=mysql_fetch_array($cat_res))
     {
         print "<option value='$cat_set[id]'>$cat_set[cat_name]</option>";
     }
  print "</select>";
  print "</p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='cat_name' size='20'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Description:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<textarea name='cat_desc' rows='4' cols='40'></textarea>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Add Sub Category'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
