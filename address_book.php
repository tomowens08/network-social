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
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Address Book</h3></td></tr>";



  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";

  print "<table width='100%'>";

        $sql="select * from address_book where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);

  $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {


    print "<tr>";
    print "<td width='10%'><p align='left' class='login'>".$sr_no.".</td>";
    print "<td width='40%'><p align='left' class='login'>".$RSUser["name"].".</td>";
    print "<td width='40%'><p align='left' class='login'>".$RSUser["email"].".</td>";
    print "<td width='10%'><p align='left' class='login'><a href='delete_address.php?address_id=".$RSUser["address_id"]."' class='style11'>Delete</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  } 

  print "<tr>";
  print "<td width='100%' colspan='4'><p align='center' class='login'><a href='add_address.php' class='style11'>Add Address</a></td>";
  print "</tr>";



  print "</table>";

  print "</p></td></tr>";
    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
