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
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Edit Passwords</h3></td></tr>";


// Upload Image Code

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";

  $current_password=$HTTP_POST_VARS["current_password"];
  $new_password=$HTTP_POST_VARS["new_password"];
  
  if($current_password==Null||$new_password==Null)
  {
      print "You did not enter your passwords.";
  }
  else
  {
      $sql="select member_password from members where member_id = $_SESSION[member_id]";
      $res=mysql_query($sql);
      $data_set=mysql_fetch_array($res);
      if($data_set["member_password"]!=$current_password)
      {
          print "The current password you entered does not match with our records.";
      }
      else
      {
          $sql="update members set member_password = '$new_password' where member_id = $_SESSION[member_id]";
          $res=mysql_query($sql);
          if($res)
          {
              print "Your password has been changed.";
          }
          else
          {
              print "There was an error!";
          }
      }
  }

  print "</td></tr>";

// Upload Image Code


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
