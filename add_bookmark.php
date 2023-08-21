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
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'  style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Add friend to bookmark!</h3></td></tr>";

        $sql="select * from bookmarks where member_id = ".$_SESSION["member_id"]." and member_book_id = ".$HTTP_GET_VARS["member_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
  if ($num_rows!=0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'>";
    print "<p align='center'>The friend is already in your bookmarks.</p>";
    print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to Profile</a>";
    print "</td></tr>";
  }
    else
  {

        $sql="insert into bookmarks";
        $sql.="(member_id, member_book_id)";
        $sql.="values($_SESSION[member_id], $HTTP_GET_VARS[member_id])";
        
        $result=mysql_query($sql);
        
        if($result)
        {
          print "<tr>";
          print "<td width='100%' colspan='2' class='login'>";
          print "<p align='center'>The friend has been added in your bookmark.</p>";
          print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to Profile</a>";
          print "</td></tr>";
        }
        else
        {
          print "<tr>";
          print "<td width='100%' colspan='2' class='login'>";
          print "<p align='center'>There was an error!</p>";
          print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to Profile</a>";
          print "</td></tr>";
        }

  } 



} 



    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
