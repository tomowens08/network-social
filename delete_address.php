<?php
session_start();
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
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Delete an address</h3></td></tr>";




        $sql="delete from address_book where address_id = ".$HTTP_GET_VARS["address_id"];
        $result=mysql_query($sql);
        if($result)
        {
                print "<tr>";
                print "<td width='100%' colspan='2' class='txt_label'><p align='center'>The address has been deleted.</p></td></tr>";
                print "<td width='100%' colspan='2' class='txt_label'><p align='center'><a href='address_book.php?page=1' class='style11'>Back</a></p></td></tr>";
        }
        else
        {
                print "<tr>";
                print "<td width='100%' colspan='2' class='txt_label'><p align='center'>There was an error!</p></td></tr>";
                print "<td width='100%' colspan='2' class='txt_label'><p align='center'><a href='address_book.php?page=1' class='style11'>Back</a></p></td></tr>";
        }
}



print "</table>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
