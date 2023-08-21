<?php
  session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Address Book (Import an address)</h3></td></tr>";



  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";

  print "<table width='100%'>";

        $sql="select * from address_book where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $sr_no=1;

  print "<form name='Address' action='import_address1.php?group=$HTTP_GET_VARS[group]&group_id=$HTTP_GET_VARS[group_id]' method='post'>";
  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr>";
    print "<td width='10%'><p align='left' class='login'><input type='checkbox' name='".$RSUser["address_id"]."'></td>";
    print "<td width='40%'><p align='left' class='login'>".$RSUser["name"].".</td>";
    print "<td width='40%'><p align='left' class='login'>".$RSUser["email"].".</td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  } 

  print "<tr>";
  print "<td width='100%' colspan='4'><p align='center' class='login'>Select the emails you want to send the invitation and click on submit button.</td>";
  print "</tr>";
  print "<tr>";
  print "<td width='100%' colspan='4'><p align='center' class='login'><input type='submit' value='Confirm'></td>";
  print "</tr>";



  print "</table>";

  print "</p></td></tr>";
  print "</table>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
