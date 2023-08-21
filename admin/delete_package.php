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
  print "<td class='headcell' width='100%' height='20'>Delete a package</td></tr>";

  print "<tr><td height='13' class='textcell'><table><b>Note:</b>Only packages with not users can be deleted.";

  include("includes/conn.php");
  include("../includes/packages.class.php");

  $pack=new packages;
  $pack_info=$pack->get_pack($HTTP_GET_VARS["id"]);


  print "<form name='AddSpeciality' action='delete_package1.php?id=$HTTP_GET_VARS[id]' method='post'>";



  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Package Name(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='package_name' size='20' value='$pack_info[pack_name]'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%'><p align='left'><font face='Verdana' color='#670808'>Package Price(*):</font></p></td>";
  print "<td width='70%'><p align='left'><input type='text' name='package_price' size='20' value='$pack_info[price]'></p></td>";
  print "</tr>";

  print "<tr>";
  print "<td width='30%' valign='top'><p align='left'><font face='Verdana' color='#670808'>Allowed Mods:</font></p></td>";
  print "<td width='70%'><p align='left'>";
        $allowed_mods=explode(",", $pack_info["allowed_mods"]);

        if(in_array("Search", $allowed_mods))
        {
         print "<input type='checkbox' name='mods[]' value='Search' checked>&nbsp;Search<br>";
        }
        else
        {
         print "<input type='checkbox' name='mods[]' value='Search'>&nbsp;Search<br>";
        }

        if(in_array("Mails", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Mails' checked>&nbsp;Private Messaging<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Mails'>&nbsp;Private Messaging<br>";
        }

        if(in_array("Browse", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Browse' checked>&nbsp;Browse Users<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Browse'>&nbsp;Browse Users<br>";
        }

        if(in_array("Bulletin", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Bulletin' checked>&nbsp;Bulletin Boards<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Bulletin'>&nbsp;Bulletin Boards<br>";
        }

        if(in_array("Journal", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Journal' checked>&nbsp;Journal<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Journal'>&nbsp;Journal<br>";
        }

        if(in_array("Address Book", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Address Book' checked>&nbsp;Address Book<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Address Book'>&nbsp;Address Book<br>";
        }

        if(in_array("Blogs", $allowed_mods))
        {
          print "<input type='checkbox' name='mods[]' value='Blogs' checked>&nbsp;Blogs<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Blogs'>&nbsp;Blogs<br>";
        }

        if(in_array("Classified", $allowed_mods))
        {
           print "<input type='checkbox' name='mods[]' value='Classified' checked>&nbsp;Classifieds<br>";
        }
        else
        {
          print "<input type='checkbox' name='mods[]' value='Classified'>&nbsp;Classified<br>";
        }

  print "</p></td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Delete a Package'></td>";
  print "</tr></table></table>";
  print "</form>";
}

?>


</BODY>
</HTML>
