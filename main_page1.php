<?php
session_start();
?>
<HTML>
<HEAD>
<style type="text/css">
<!--
.style1 {color: #1941A5}
-->
</style>
</HEAD>
<BODY>
<span class="style1"></span>
<?
if ($_SESSION["user_admin"]!="Yes")
{

  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Change Main Page Text</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
  include("includes/conn.php");

  $sql="update main_page set main_text='$HTTP_POST_VARS[details]'";
  $result=mysql_query($sql);
  if($result)
  {
  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'><p align='left'>The Main Page text has been edited successfully.</p></td>";
  print "</tr>";
  print "</table></table>";
  }
  else
  {
  print mysql_error();
  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'><p align='left'>There was an error!.</p></td>";
  print "</tr>";
  print "</table></table>";
  }
}
?>
</BODY>
</HTML>
