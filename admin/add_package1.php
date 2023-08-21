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
  print "<td class='headcell' height='20'>Add a new package</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
include("includes/conn.php");

$package_name=$HTTP_POST_VARS["package_name"];
$package_price=$HTTP_POST_VARS["package_price"];
$allowed_mods='';

foreach($HTTP_POST_VARS["mods"] as $mods)
{
    if($allowed_mods=='')
    {
     $allowed_mods=$mods;
    }
    else
    {
     $allowed_mods=$allowed_mods.",".$mods;
    }
}

  if ($package_name=="" || $package_price=="")
  {
    print "You did not enter all the required fields. Please go back and correct the problem.";
  }
    else
  {
     include("../includes/packages.class.php");
     $pack=new packages;
     $res=$pack->add_package($package_name,$package_price,$allowed_mods);
     if($res)
     {
         print "The package has been added successfully.";
     }
     else
     {
         print "There was an error and the package was not added successfully.";
     }
  }
 }
print "</table></table>";
?>


</BODY>
</HTML>

