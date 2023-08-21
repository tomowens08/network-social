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
  print "<td class='headcell' width='100%' height='20'>Add a new forum sub category</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='AddSpeciality' action='add_sub_cat1.php' method='post'>";
        include("includes/conn.php");
        include("../classes/forum.class.php");
        $forum=new forum;
        
        $forum_res=$forum->get_all_main_cat();

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Main Category(*):</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<select name='main_cat' size='1'>";
  while($forum_set=mysql_fetch_array($forum_res))
  {
   print "<option value='$forum_set[id]'>$forum_set[cat_name]</option>";
  }
  print "</select>";
  print "</p></td>";
  print "</tr>";


  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Category Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='cat_name' size='20'></p></td>";
  print "</tr>";


  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Category Description:</font></p></td>";
  print "<td width='70%'><p align='left'>";
  print "<textarea name='cat_desc' rows='4' cols='40'></textarea>";
  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Add Category'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
