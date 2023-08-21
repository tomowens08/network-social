<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Edit city</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='AddSpeciality' action='edit_city1.php?city_id=".$HTTP_GET_VARS["city_id"]."' method='post'>";

  print "<tr bgColor='#ffffff'>";
  print "<td class='text'><p align='left'>State Name:</p></td>";
  print "<td class='text'>";
        $sql="select * from cities where city_id = ".$HTTP_GET_VARS["city_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
  print "<select name='state_name' size='1'>";
        $sql="select * from states where state_id = ".$RSUser1["state_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
?>
<option value='<?   echo $RSUser["state_id"]; ?>'><?   echo $RSUser["state_name"]; ?></option>
<? 
        $sql="select * from states where state_id <> ".$RSUser1["state_id"];
        $result=mysql_query($sql);
  while($RSUser=mysql_fetch_array($result))
  {

?>
<option value='<?     echo $RSUser["state_id"]; ?>'><?     echo $RSUser["state_name"]; ?></option>
<? 
  }
  print "</select>";
  print "</td>";
  print "</tr>";


  print "<tr bgColor='#ffffff'>";
  print "<td class='text'><p align='left'>City Name:</p></td>";
  print "<td class='text'><input type='text' name='city_name' value='".$RSUser1["city_name"]."' size='20'></td>";
  print "</tr>";

  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'>&nbsp;</td>";
  print "<td class='text'><input type='submit' value='Edit City'></td>";
  print "</tr></table></table>";
  print "</form>";
} 
?>
</BODY>
</HTML>
